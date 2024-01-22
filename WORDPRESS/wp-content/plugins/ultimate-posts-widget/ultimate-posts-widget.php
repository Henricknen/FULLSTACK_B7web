<?php
/*
Plugin Name: Ultimate Posts Widget
Plugin URI: http://wordpress.org/plugins/ultimate-posts-widget/
Description: The ultimate widget for displaying posts, custom post types or sticky posts with an array of options.
Version: 2.3.0
Author: Clever Widgets
Author URI: https://themecheck.info
Text Domain: ultimate-posts-widget
License: MIT
*/
require_once 'analyst/main.php';

analyst_init(array(
	'client-id' => 'vmg6q36wn85b8kzr',
	'client-secret' => '35dcca0d55e95f21b3b1f3c6987ae34cf38c65c5',
	'base-dir' => __FILE__
));

if (!class_exists('WP_Widget_Ultimate_Posts')) {

  class WP_Widget_Ultimate_Posts extends WP_Widget {

    function __construct() {

      $widget_options = array(
        'classname' => 'widget_ultimate_posts',
        'description' => __( 'Displays list of posts with an array of options', 'ultimate-posts-widget' )
      );

      $control_options = array(
        'width' => 450
      );

      parent::__construct(
        'sticky-posts',
        __( 'Ultimate Posts', 'ultimate-posts-widget' ),
        $widget_options,
        $control_options
      );

      $this->alt_option_name = 'widget_ultimate_posts';

      add_action('save_post', array(&$this, 'flush_widget_cache'));
      add_action('deleted_post', array(&$this, 'flush_widget_cache'));
      add_action('switch_theme', array(&$this, 'flush_widget_cache'));
      add_action('admin_enqueue_scripts', array(&$this, 'enqueue_admin_scripts'));

      /* Admin notice to check Classic Widgets Plugin is not already installed and WordPress version 5.8 or higher */
      add_action( 'admin_notices', array( &$this, 'flush_admin_notice__warning' ) );

      if (apply_filters('upw_enqueue_styles', true) && !is_admin()) {
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_theme_scripts'));
      }

    }

    function flush_admin_notice__warning() {
      global $wp_version;

      if ( version_compare( $wp_version, '5.8' ) >= 0 && !is_plugin_active( 'classic-widgets/classic-widgets.php' ) ) {

        $upw_hide_admin_notification = get_option( 'upw_hide_admin_notification' );
        if( 'yes' === $upw_hide_admin_notification ) {
          return;
        }
      ?>
      <div class="notice notice-warning upw-notice-wrapper is-dismissible">
        <p><?php
          echo sprintf(
            __( '%1$sUltimate Posts Widget:%2$s This plugin provides a classic widget type, and needs the %3$sClassic Widgets%4$s plugin to function properly on this WordPress version.', 'ultimate-posts-widget' ),
            '<b>',
            '</b>',
            '<a href="https://wordpress.org/plugins/classic-widgets/" target="_blank">',
            '</a>'
          );
        ?></p>
      </div>
      <?php
      }
    }

    function enqueue_admin_scripts() {
      wp_register_style('upw_admin_styles', plugins_url('css/upw-admin.min.css', __FILE__));
      wp_enqueue_style('upw_admin_styles');

      wp_register_script('upw_admin_scripts', plugins_url('js/upw-admin.min.js', __FILE__), array('jquery'), null, true);
      wp_enqueue_script('upw_admin_scripts');

      wp_localize_script( 'upw_admin_scripts', 'upw_admin_scripts_ajax_object',
        array(
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'nonce' => wp_create_nonce( 'upw_hide_admin_notification' ),
        )
      );
    }

    function enqueue_theme_scripts() {
      wp_register_style('upw_theme_standard', plugins_url('css/upw-theme-standard.min.css', __FILE__));
      wp_enqueue_style('upw_theme_standard');
    }

    function widget( $args, $instance ) {

      global $post;

      if ( is_object( $post ) ) {
        $current_post_id = $post->ID;
      } else {
        $current_post_id = 0;
      }

      $cache = wp_cache_get( 'widget_ultimate_posts', 'widget' );

      if ( !is_array( $cache ) )
        $cache = array();

      if ( isset( $cache[$args['widget_id']] ) ) {
        echo $cache[$args['widget_id']];
        return;
      }

      ob_start();
      extract( $args );

      $title = esc_attr(apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base));
			$title_link = esc_attr($instance['title_link']);
      $class = esc_attr($instance['class']);
      $number = empty($instance['number']) ? -1 : $instance['number'];
      $types = empty($instance['types']) ? 'any' : explode(',', $instance['types']);
      $cats = empty($instance['cats']) ? '' : explode(',', $instance['cats']);
      $tags = empty($instance['tags']) ? '' : explode(',', $instance['tags']);
      $atcat = $instance['atcat'] ? true : false;
      $thumb_size = $instance['thumb_size'];
      $attag = $instance['attag'] ? true : false;
      $exclude_current = isset($instance['exclude_current']) ? ($instance['exclude_current'] == true) : false;
      $excerpt_length = $instance['excerpt_length'];
      $excerpt_readmore = $instance['excerpt_readmore'];
      $sticky = $instance['sticky'];
      $order = $instance['order'];
      $orderby = $instance['orderby'];
      $meta_key = $instance['meta_key'];
			$custom_empty = isset($instance['custom_empty']) ? $instance['custom_empty'] : '';
      $custom_fields = $instance['custom_fields'];

			if (strlen($custom_empty) == 0) {
				$custom_empty = 'No posts found.';
				$instance['custom_empty'] = 'No posts found.';
			}


      // Sticky posts
      if ($sticky == 'only') {
        $sticky_query = array( 'post__in' => get_option( 'sticky_posts' ) );
      } elseif ($sticky == 'hide') {
        $sticky_query = array( 'post__not_in' => get_option( 'sticky_posts' ) );
      } else {
        $sticky_query = null;
      }

      // If $atcat true and in category
      if ($atcat && is_category()) {
        $cats = get_query_var('cat');
      }

      // If $atcat true and is single post
      if ($atcat && is_single()) {
        $cats = '';
        foreach (get_the_category() as $catt) {
          $cats .= $catt->term_id.' ';
        }
        $cats = str_replace(' ', ',', trim($cats));
      }

      // If $attag true and in tag
      if ($attag && is_tag()) {
        $tags = get_query_var('tag_id');
      }

      // If $attag true and is single post
      if ($attag && is_single()) {
        $tags = '';
        $thetags = get_the_tags();
        if ($thetags) {
            foreach ($thetags as $tagg) {
                $tags .= $tagg->term_id . ' ';
            }
        }
        $tags = str_replace(' ', ',', trim($tags));
      }

      // Excerpt more filter
      $new_excerpt_more = function($more) { return "..."; };
      add_filter('excerpt_more', $new_excerpt_more);

      // Excerpt length filter
      $new_excerpt_length = function($length) use ($excerpt_length) { return $excerpt_length; };
      if ( $instance['excerpt_length'] > 0 ) add_filter('excerpt_length', $new_excerpt_length);
      if( $class ) {
        $before_widget = str_replace('class="', 'class="'. $class . ' ', $before_widget);
      }

      echo $before_widget;

      if ( $title ) {
        echo $before_title;
        if ( $title_link ) echo "<a href='$title_link'>";
        echo $title;
        if ( $title_link ) echo '</a>';
        echo $after_title;
      }

      $args = array(
        'posts_per_page' => $number,
        'order' => $order,
        'orderby' => $orderby,
        'category__in' => $cats,
        'tag__in' => $tags,
        'post_type' => $types,
				'post_status' => array('publish', 'inherit')
      );

			if ($exclude_current) {
				$args['post__not_in'] = array($post->ID);
			}

      if ($orderby === 'meta_value') {
        $args['meta_key'] = $meta_key;
      }

      if (!empty($sticky_query)) {
        $args[key($sticky_query)] = reset($sticky_query);
      }

      $args = apply_filters('upw_wp_query_args', $args, $instance, $this->id_base);
      $upw_query = new WP_Query($args);

      if ($instance['template'] === 'custom') {
        $custom_template_path = apply_filters('upw_custom_template_path',  '/upw/' . $instance['template_custom'] . '.php', $instance, $this->id_base);
        if ( $template = locate_template($custom_template_path) ) {
          include $template;
        } else {
          include 'templates/standard.php';
        }
      } elseif ($instance['template']) {
        include 'templates/' . $instance['template'] . '.php';
      } else {
        include 'templates/legacy.php';
      }

      // Reset the global $the_post as this query will have stomped on it
      wp_reset_postdata();

      echo $after_widget;

      if ($cache) {
        $cache[$args['widget_id']] = ob_get_flush();
      }
      wp_cache_set( 'widget_ultimate_posts', $cache, 'widget' );

			remove_filter('excerpt_more', $new_excerpt_more);
			if ( $instance['excerpt_length'] > 0 ) remove_filter('excerpt_length', $new_excerpt_length);

			ob_end_flush();
    }

    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['title'] = esc_attr(strip_tags( $new_instance['title'] ));
      $instance['class'] = esc_attr(strip_tags( $new_instance['class']));
      $instance['title_link'] = esc_attr(strip_tags( $new_instance['title_link'] ));
      $instance['number'] = esc_attr(strip_tags( $new_instance['number'] ));
      $instance['types'] = (isset( $new_instance['types'] )) ? implode(',', (array) $new_instance['types']) : '';
      $instance['cats'] = (isset( $new_instance['cats'] )) ? implode(',', (array) $new_instance['cats']) : '';
      $instance['tags'] = (isset( $new_instance['tags'] )) ? implode(',', (array) $new_instance['tags']) : '';
      $instance['atcat'] = isset( $new_instance['atcat'] );
      $instance['attag'] = isset( $new_instance['attag'] );
      $instance['show_excerpt'] = isset( $new_instance['show_excerpt'] );
      $instance['exclude_current'] = isset( $new_instance['exclude_current'] );
      $instance['show_content'] = isset( $new_instance['show_content'] );
      $instance['show_thumbnail'] = isset( $new_instance['show_thumbnail'] );
      $instance['show_date'] = isset( $new_instance['show_date'] );
      $instance['date_format'] = esc_attr(strip_tags( $new_instance['date_format'] ));
      $instance['show_title'] = isset( $new_instance['show_title'] );
      $instance['show_author'] = isset( $new_instance['show_author'] );
      $instance['show_comments'] = isset( $new_instance['show_comments'] );
      $instance['thumb_size'] = esc_attr(strip_tags( $new_instance['thumb_size'] ));
      $instance['show_readmore'] = isset( $new_instance['show_readmore']);
      $instance['excerpt_length'] = esc_attr(strip_tags( $new_instance['excerpt_length'] ));
      $instance['excerpt_readmore'] = esc_attr(strip_tags( $new_instance['excerpt_readmore'] ));
      $instance['sticky'] = $new_instance['sticky'];
      $instance['order'] = $new_instance['order'];
      $instance['orderby'] = $new_instance['orderby'];
      $instance['meta_key'] = $new_instance['meta_key'];
      $instance['show_cats'] = isset( $new_instance['show_cats'] );
      $instance['show_tags'] = isset( $new_instance['show_tags'] );
      $instance['custom_fields'] = esc_attr(strip_tags( $new_instance['custom_fields'] ));
      $instance['template'] = esc_attr(strip_tags( $new_instance['template'] ));
			$instance['custom_empty'] = esc_attr(strip_tags( $new_instance['custom_empty'] ));
      $instance['template_custom'] = esc_attr(strip_tags( $new_instance['template_custom'] ));

      if (current_user_can('unfiltered_html')) {
        $instance['before_posts'] =  $new_instance['before_posts'];
        $instance['after_posts'] =  $new_instance['after_posts'];
      } else {
        $instance['before_posts'] = wp_filter_post_kses($new_instance['before_posts']);
        $instance['after_posts'] = wp_filter_post_kses($new_instance['after_posts']);
      }

      $this->flush_widget_cache();

      $alloptions = wp_cache_get( 'alloptions', 'options' );
      if ( isset( $alloptions['widget_ultimate_posts'] ) )
        delete_option( 'widget_ultimate_posts' );

      return $instance;

    }

    function flush_widget_cache() {

      wp_cache_delete( 'widget_ultimate_posts', 'widget' );

    }

    function form( $instance ) {

      // Set default arguments
      $instance = wp_parse_args( (array) $instance, array(
        'title' => __('Ultimate Posts', 'ultimate-posts-widget'),
        'class' => '',
        'title_link' => '' ,
        'number' => '5',
        'types' => 'post',
        'cats' => '',
        'tags' => '',
        'atcat' => false,
        'thumb_size' => 'thumbnail',
        'attag' => false,
        'excerpt_length' => 10,
        'excerpt_readmore' => __('Read more &rarr;', 'ultimate-posts-widget'),
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_key' => '',
        'sticky' => 'show',
        'show_cats' => false,
        'show_tags' => false,
        'show_title' => true,
        'show_date' => true,
        'date_format' => get_option('date_format') . ' ' . get_option('time_format'),
        'show_author' => true,
        'show_comments' => false,
        'show_excerpt' => true,
        'exclude_current' => false,
        'show_content' => false,
        'show_readmore' => true,
        'show_thumbnail' => true,
				'custom_empty' => 'No posts found.',
        'custom_fields' => '',
        // Set template to 'legacy' if field from UPW < 2.0 is set.
        'template' => empty($instance['morebutton_text']) ? 'standard' : 'legacy',
        'template_custom' => '',
        'before_posts' => '',
        'after_posts' => ''
      ) );

      // Or use the instance
      $title  = esc_attr(strip_tags($instance['title']));
      $class  = esc_attr(strip_tags($instance['class']));
      $title_link  = esc_attr(strip_tags($instance['title_link']));
      $number = esc_attr(strip_tags($instance['number']));
      $types  = $instance['types'];
      $cats = $instance['cats'];
      $tags = $instance['tags'];
      $atcat = $instance['atcat'];
      $thumb_size = $instance['thumb_size'];
      $attag = $instance['attag'];
      $excerpt_length = esc_attr(strip_tags($instance['excerpt_length']));
      $excerpt_readmore = esc_attr(strip_tags($instance['excerpt_readmore']));
      $order = $instance['order'];
      $orderby = $instance['orderby'];
      $meta_key = $instance['meta_key'];
      $sticky = $instance['sticky'];
      $show_cats = $instance['show_cats'];
      $show_tags = $instance['show_tags'];
      $show_title = $instance['show_title'];
      $show_date = $instance['show_date'];
      $date_format = $instance['date_format'];
      $show_author = $instance['show_author'];
      $show_comments = $instance['show_comments'];
      $show_excerpt = $instance['show_excerpt'];
      $exclude_current = $instance['exclude_current'];
      $show_content = $instance['show_content'];
      $show_readmore = $instance['show_readmore'];
      $show_thumbnail = $instance['show_thumbnail'];
			$custom_empty = esc_attr(strip_tags($instance['custom_empty']));
      $custom_fields = esc_attr(strip_tags($instance['custom_fields']));
      $template = $instance['template'];
      $template_custom = esc_attr(strip_tags($instance['template_custom']));
      $before_posts = format_to_edit($instance['before_posts']);
      $after_posts = format_to_edit($instance['after_posts']);

      // Let's turn $types, $cats, and $tags into an array if they are set
      if (!empty($types)) $types = explode(',', $types);
      if (!empty($cats)) $cats = explode(',', $cats);
      if (!empty($tags)) $tags = explode(',', $tags);

      // Count number of post types for select box sizing
      $cpt_types = get_post_types( array( 'public' => true ), 'names' );
      if ($cpt_types) {
        foreach ($cpt_types as $cpt ) {
          $cpt_ar[] = $cpt;
        }
        $n = count($cpt_ar);
        if($n > 6) { $n = 6; }
      } else {
        $n = 3;
      }

      // Count number of categories for select box sizing
      $cat_list = get_categories( 'hide_empty=0' );
      if ($cat_list) {
        foreach ($cat_list as $cat) {
          $cat_ar[] = $cat;
        }
        $c = count($cat_ar);
        if($c > 6) { $c = 6; }
      } else {
        $c = 3;
      }

      // Count number of tags for select box sizing
      $tag_list = get_tags( 'hide_empty=0' );
      if ($tag_list) {
        foreach ($tag_list as $tag) {
          $tag_ar[] = $tag;
        }
        $t = count($tag_ar);
        if($t > 6) { $t = 6; }
      } else {
        $t = 3;
      }

      ?>

      <div class="upw-tabs">
        <a class="upw-tab-item active" data-toggle="upw-tab-general"><?php _e('General', 'ultimate-posts-widget'); ?></a>
        <a class="upw-tab-item" data-toggle="upw-tab-display"><?php _e('Display', 'ultimate-posts-widget'); ?></a>
        <a class="upw-tab-item" data-toggle="upw-tab-filter"><?php _e('Filter', 'ultimate-posts-widget'); ?></a>
        <a class="upw-tab-item" data-toggle="upw-tab-order"><?php _e('Order', 'ultimate-posts-widget'); ?></a>
      </div>

      <div class="upw-tab upw-tab-general">

        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo sanitize_text_field($title); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'title_link' ); ?>"><?php _e( 'Title URL', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title_link' ); ?>" name="<?php echo $this->get_field_name( 'title_link' ); ?>" type="text" value="<?php echo sanitize_text_field($title_link); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'CSS class', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo sanitize_text_field($class); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('before_posts'); ?>"><?php _e('Before posts', 'ultimate-posts-widget'); ?>:</label>
          <textarea class="widefat" id="<?php echo $this->get_field_id('before_posts'); ?>" name="<?php echo $this->get_field_name('before_posts'); ?>" rows="5"><?php echo $before_posts; ?></textarea>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('after_posts'); ?>"><?php _e('After posts', 'ultimate-posts-widget'); ?>:</label>
          <textarea class="widefat" id="<?php echo $this->get_field_id('after_posts'); ?>" name="<?php echo $this->get_field_name('after_posts'); ?>" rows="5"><?php echo $after_posts; ?></textarea>
        </p>

				<p>
					<label for="<?php echo $this->get_field_id( 'custom_empty' ); ?>"><?php _e( 'No posts found message', 'ultimate-posts-widget' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'custom_empty' ); ?>" name="<?php echo $this->get_field_name( 'custom_empty' ); ?>" type="text" value="<?php echo sanitize_text_field($custom_empty); ?>" placeholder="No posts found." />
				</p>

      </div>

      <div class="upw-tab upw-hide upw-tab-display">

        <p>
          <label for="<?php echo $this->get_field_id('template'); ?>"><?php _e('Template', 'ultimate-posts-widget'); ?>:</label>
          <select name="<?php echo $this->get_field_name('template'); ?>" id="<?php echo $this->get_field_id('template'); ?>" class="widefat">
            <option value="legacy"<?php if( $template == 'legacy') echo ' selected'; ?>><?php _e('Legacy', 'ultimate-posts-widget'); ?></option>
            <option value="standard"<?php if( $template == 'standard') echo ' selected'; ?>><?php _e('Standard', 'ultimate-posts-widget'); ?></option>
            <option value="custom"<?php if( $template == 'custom') echo ' selected'; ?>><?php _e('Custom', 'ultimate-posts-widget'); ?></option>
          </select>
        </p>

        <p<?php if ($template !== 'custom') echo ' style="display:none;"'; ?>>
          <label for="<?php echo $this->get_field_id('template_custom'); ?>"><?php _e('Custom Template Name', 'ultimate-posts-widget'); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id('template_custom'); ?>" name="<?php echo $this->get_field_name('template_custom'); ?>" type="text" value="<?php echo sanitize_text_field($template_custom); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo sanitize_text_field($number); ?>" min="-1" />
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" type="checkbox" <?php checked( (bool) $show_title, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show title', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p>
          <input class="box" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" type="checkbox" <?php checked( (bool) $show_date, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Show published date', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p<?php if (!$show_date) echo ' style="display:none;"'; ?>>
          <label for="<?php echo $this->get_field_id('date_format'); ?>"><?php _e( 'Date format', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('date_format'); ?>" name="<?php echo $this->get_field_name('date_format'); ?>" value="<?php echo sanitize_text_field($date_format); ?>" />
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'show_author' ); ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" type="checkbox" <?php checked( (bool) $show_author, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php _e( 'Show post author', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>" type="checkbox" <?php checked( (bool) $show_comments, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e( 'Show comments count', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'exclude_current' ); ?>" name="<?php echo $this->get_field_name( 'exclude_current' ); ?>" type="checkbox" <?php checked( (bool) $exclude_current, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'exclude_current' ); ?>"><?php _e( 'Exclude current post from the list', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" type="checkbox" <?php checked( (bool) $show_excerpt, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php _e( 'Show excerpt', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p<?php if (!$show_excerpt) echo ' style="display:none;"'; ?>>
          <label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e( 'Excerpt length (in words)', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" type="number" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo sanitize_text_field($excerpt_length); ?>" min="-1" />
        </p>

        <p>
          <input class="checkbox" id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" type="checkbox" <?php checked( (bool) $show_content, true ); ?> />
          <label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show content', 'ultimate-posts-widget' ); ?></label>
        </p>

        <p<?php if (!$show_excerpt && !$show_content) echo ' style="display:none;"'; ?>>
          <label for="<?php echo $this->get_field_id('show_readmore'); ?>">
          <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_readmore'); ?>" name="<?php echo $this->get_field_name('show_readmore'); ?>"<?php checked( (bool) $show_readmore, true ); ?> />
          <?php _e( 'Show read more link', 'ultimate-posts-widget' ); ?>
          </label>
        </p>

        <p<?php if (!$show_readmore  || (!$show_excerpt && !$show_content)) echo ' style="display:none;"'; ?>>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('excerpt_readmore'); ?>" name="<?php echo $this->get_field_name('excerpt_readmore'); ?>" value="<?php echo sanitize_text_field($excerpt_readmore); ?>" />
        </p>

        <?php if ( function_exists('the_post_thumbnail') && current_theme_supports( 'post-thumbnails' ) ) : ?>

          <?php $sizes = get_intermediate_image_sizes(); ?>

          <p>
            <input class="checkbox" id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" <?php checked( (bool) $show_thumbnail, true ); ?> />

            <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Show thumbnail', 'ultimate-posts-widget' ); ?></label>
          </p>

          <p<?php if (!$show_thumbnail) echo ' style="display:none;"'; ?>>
            <select id="<?php echo $this->get_field_id('thumb_size'); ?>" name="<?php echo $this->get_field_name('thumb_size'); ?>" class="widefat">
              <?php foreach ($sizes as $size) : ?>
                <option value="<?php echo sanitize_text_field($size); ?>"<?php if ($thumb_size == $size) echo ' selected'; ?>><?php echo $size; ?></option>
              <?php endforeach; ?>
              <option value="full"<?php if ($thumb_size == $size) echo ' selected'; ?>><?php _e('full'); ?></option>
            </select>
          </p>

        <?php endif; ?>

        <p>
          <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_cats'); ?>" name="<?php echo $this->get_field_name('show_cats'); ?>" <?php checked( (bool) $show_cats, true ); ?> />
          <label for="<?php echo $this->get_field_id('show_cats'); ?>"> <?php _e('Show post categories', 'ultimate-posts-widget'); ?></label>
        </p>

        <p>
          <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_tags'); ?>" name="<?php echo $this->get_field_name('show_tags'); ?>" <?php checked( (bool) $show_tags, true ); ?> />
          <label for="<?php echo $this->get_field_id('show_tags'); ?>"> <?php _e('Show post tags', 'ultimate-posts-widget'); ?></label>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'custom_fields' ); ?>"><?php _e( 'Show custom fields (comma separated)', 'ultimate-posts-widget' ); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'custom_fields' ); ?>" name="<?php echo $this->get_field_name( 'custom_fields' ); ?>" type="text" value="<?php echo sanitize_text_field($custom_fields); ?>" />
        </p>

      </div>

      <div class="upw-tab upw-hide upw-tab-filter">

        <p>
          <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('atcat'); ?>" name="<?php echo $this->get_field_name('atcat'); ?>" <?php checked( (bool) $atcat, true ); ?> />
          <label for="<?php echo $this->get_field_id('atcat'); ?>"> <?php _e('Show posts only from current category', 'ultimate-posts-widget');?></label>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e( 'Categories', 'ultimate-posts-widget' ); ?>:</label>
          <select name="<?php echo $this->get_field_name('cats'); ?>[]" id="<?php echo $this->get_field_id('cats'); ?>" class="widefat" style="height: auto;" size="<?php echo $c ?>" multiple>
            <option value="" <?php if (empty($cats)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;') ?></option>
            <?php
            $categories = get_categories( 'hide_empty=0' );
            foreach ($categories as $category ) { ?>
              <option value="<?php echo sanitize_text_field($category->term_id); ?>" <?php if(is_array($cats) && in_array($category->term_id, $cats)) echo 'selected="selected"'; ?>><?php echo $category->cat_name;?></option>
            <?php } ?>
          </select>
        </p>

        <?php if ($tag_list) : ?>
          <p>
            <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('attag'); ?>" name="<?php echo $this->get_field_name('attag'); ?>" <?php checked( (bool) $attag, true ); ?> />
            <label for="<?php echo $this->get_field_id('attag'); ?>"> <?php _e('Show posts only from current tag', 'ultimate-posts-widget');?></label>
          </p>

          <p>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e( 'Tags', 'ultimate-posts-widget' ); ?>:</label>
            <select name="<?php echo $this->get_field_name('tags'); ?>[]" id="<?php echo $this->get_field_id('tags'); ?>" class="widefat" style="height: auto;" size="<?php echo $t ?>" multiple>
              <option value="" <?php if (empty($tags)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;') ?></option>
              <?php
              foreach ($tag_list as $tag) { ?>
                <option value="<?php echo sanitize_text_field($tag->term_id); ?>" <?php if (is_array($tags) && in_array($tag->term_id, $tags)) echo 'selected="selected"'; ?>><?php echo $tag->name;?></option>
              <?php } ?>
            </select>
          </p>
        <?php endif; ?>

        <p>
          <label for="<?php echo $this->get_field_id('types'); ?>"><?php _e( 'Post types', 'ultimate-posts-widget' ); ?>:</label>
          <select name="<?php echo $this->get_field_name('types'); ?>[]" id="<?php echo $this->get_field_id('types'); ?>" class="widefat" style="height: auto;" size="<?php echo $n ?>" multiple>
            <option value="" <?php if (empty($types)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;') ?></option>
            <?php
            $args = array( 'public' => true );
            $post_types = get_post_types( $args, 'names' );
            foreach ($post_types as $post_type ) { ?>
              <option value="<?php echo sanitize_text_field($post_type); ?>" <?php if(is_array($types) && in_array($post_type, $types)) { echo 'selected="selected"'; } ?>><?php echo $post_type;?></option>
            <?php } ?>
          </select>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('sticky'); ?>"><?php _e( 'Sticky posts', 'ultimate-posts-widget' ); ?>:</label>
          <select name="<?php echo $this->get_field_name('sticky'); ?>" id="<?php echo $this->get_field_id('sticky'); ?>" class="widefat">
            <option value="show"<?php if( $sticky === 'show') echo ' selected'; ?>><?php _e('Show All Posts', 'ultimate-posts-widget'); ?></option>
            <option value="hide"<?php if( $sticky == 'hide') echo ' selected'; ?>><?php _e('Hide Sticky Posts', 'ultimate-posts-widget'); ?></option>
            <option value="only"<?php if( $sticky == 'only') echo ' selected'; ?>><?php _e('Show Only Sticky Posts', 'ultimate-posts-widget'); ?></option>
          </select>
        </p>

      </div>

      <div class="upw-tab upw-hide upw-tab-order">

        <p>
          <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order by', 'ultimate-posts-widget'); ?>:</label>
          <select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_id('orderby'); ?>" class="widefat">
            <option value="date"<?php if( $orderby == 'date') echo ' selected'; ?>><?php _e('Published Date', 'ultimate-posts-widget'); ?></option>
            <option value="title"<?php if( $orderby == 'title') echo ' selected'; ?>><?php _e('Title', 'ultimate-posts-widget'); ?></option>
            <option value="comment_count"<?php if( $orderby == 'comment_count') echo ' selected'; ?>><?php _e('Comment Count', 'ultimate-posts-widget'); ?></option>
            <option value="rand"<?php if( $orderby == 'rand') echo ' selected'; ?>><?php _e('Random'); ?></option>
            <option value="meta_value"<?php if( $orderby == 'meta_value') echo ' selected'; ?>><?php _e('Custom Field', 'ultimate-posts-widget'); ?></option>
            <option value="menu_order"<?php if( $orderby == 'menu_order') echo ' selected'; ?>><?php _e('Menu Order', 'ultimate-posts-widget'); ?></option>
          </select>
        </p>

        <p<?php if ($orderby !== 'meta_value') echo ' style="display:none;"'; ?>>
          <label for="<?php echo $this->get_field_id( 'meta_key' ); ?>"><?php _e('Custom field', 'ultimate-posts-widget'); ?>:</label>
          <input class="widefat" id="<?php echo $this->get_field_id('meta_key'); ?>" name="<?php echo $this->get_field_name('meta_key'); ?>" type="text" value="<?php echo sanitize_text_field($meta_key); ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'ultimate-posts-widget'); ?>:</label>
          <select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>" class="widefat">
            <option value="DESC"<?php if( $order == 'DESC') echo ' selected'; ?>><?php _e('Descending', 'ultimate-posts-widget'); ?></option>
            <option value="ASC"<?php if( $order == 'ASC') echo ' selected'; ?>><?php _e('Ascending', 'ultimate-posts-widget'); ?></option>
          </select>
        </p>

      </div>

			<div class="etw-carousel-ad-trigger">
				<div class="etw-new-label"><?php _e( 'New', 'ultimate-posts-widget' ); ?></div>
				<span><?php _e( 'Please check out our other plugins too!', 'ultimate-posts-widget' ); ?></span>
				<div class="etw-check-it-label"><?php _e( 'Check it out', 'ultimate-posts-widget' ); ?></div>
			</div>

      <?php if ( $instance ) { ?>

        <script>

          jQuery(document).ready(function($){

            var show_excerpt = $("#<?php echo $this->get_field_id( 'show_excerpt' ); ?>");
            var exclude_current = $("#<?php echo $this->get_field_id( 'exclude_current' ); ?>");
            var show_content = $("#<?php echo $this->get_field_id( 'show_content' ); ?>");
            var show_readmore = $("#<?php echo $this->get_field_id( 'show_readmore' ); ?>");
            var show_readmore_wrap = $("#<?php echo $this->get_field_id( 'show_readmore' ); ?>").parents('p');
            var show_thumbnail = $("#<?php echo $this->get_field_id( 'show_thumbnail' ); ?>");
            var show_date = $("#<?php echo $this->get_field_id( 'show_date' ); ?>");
            var date_format = $("#<?php echo $this->get_field_id( 'date_format' ); ?>").parents('p');
            var excerpt_length = $("#<?php echo $this->get_field_id( 'excerpt_length' ); ?>").parents('p');
            var excerpt_readmore_wrap = $("#<?php echo $this->get_field_id( 'excerpt_readmore' ); ?>").parents('p');
            var thumb_size_wrap = $("#<?php echo $this->get_field_id( 'thumb_size' ); ?>").parents('p');
            var order = $("#<?php echo $this->get_field_id('orderby'); ?>");
            var meta_key_wrap = $("#<?php echo $this->get_field_id( 'meta_key' ); ?>").parents('p');
            var template = $("#<?php echo $this->get_field_id('template'); ?>");
            var template_custom = $("#<?php echo $this->get_field_id('template_custom'); ?>").parents('p');

            var toggleReadmore = function() {
              if (show_excerpt.is(':checked') || show_content.is(':checked')) {
                show_readmore_wrap.show('fast');
              } else {
                show_readmore_wrap.hide('fast');
              }
              toggleExcerptReadmore();
            }

            var toggleExcerptReadmore = function() {
              if ((show_excerpt.is(':checked') || show_content.is(':checked')) && show_readmore.is(':checked')) {
                excerpt_readmore_wrap.show('fast');
              } else {
                excerpt_readmore_wrap.hide('fast');
              }
            }

            // Toggle read more option
            show_excerpt.click(function() {
              toggleReadmore();
            });

            // Toggle read more option
            show_content.click(function() {
              toggleReadmore();
            });

            // Toggle excerpt length on click
            show_excerpt.click(function(){
              excerpt_length.toggle('fast');
            });

            // Toggle excerpt length on click
            show_readmore.click(function(){
              toggleExcerptReadmore();
            });

            // Toggle date format on click
            show_date.click(function(){
              date_format.toggle('fast');
            });

            // Toggle excerpt length on click
            show_thumbnail.click(function(){
              thumb_size_wrap.toggle('fast');
            });

            // Show or hide custom field meta_key value on order change
            order.change(function(){
              if ($(this).val() === 'meta_value') {
                meta_key_wrap.show('fast');
              } else {
                meta_key_wrap.hide('fast');
              }
            });

            // Show or hide custom template field
            template.change(function(){
              if ($(this).val() === 'custom') {
                template_custom.show('fast');
              } else {
                template_custom.hide('fast');
              }
            });

          });

        </script>

      <?php

      }

    }

  }

  function init_wp_widget_ultimate_posts() {
    register_widget( 'WP_Widget_Ultimate_Posts' );
  }

  add_action( 'widgets_init', 'init_wp_widget_ultimate_posts' );
}

add_action('admin_init', function () {
	require_once 'banner/misc.php';
});

add_action( 'wp_ajax_upw_hide_admin_notification', 'upw_hide_admin_notification_callback' );

function upw_hide_admin_notification_callback() {
  
  if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['nonce']), 'upw_hide_admin_notification')) {
    wp_send_json_error();
    die;
  }

  $option_name = 'upw_hide_admin_notification';
  $new_value = 'yes';

  if ( get_option( $option_name ) !== false ) {
    update_option( $option_name, $new_value );
  } else {
    $deprecated = null;
    $autoload = 'no';
    add_option( $option_name, $new_value, $deprecated, $autoload );
  }
  wp_send_json_success();
  die;
}

// Activation of tryOutPlugins module
add_action('plugins_loaded', function () {

  if (!(class_exists('\Inisev\Subs\Inisev_Try_Out_Plugins') || class_exists('Inisev\Subs\Inisev_Try_Out_Plugins') || class_exists('Inisev_Try_Out_Plugins'))) {
    require_once __DIR__ . '/modules/tryOutPlugins/tryOutPlugins.php';
    $try_out_plugins = new \Inisev\Subs\Inisev_Try_Out_Plugins(__FILE__, __DIR__, 'Ultimate Posts Widget', 'plugins.php?s=Ultimate%20Posts%20Widget&plugin_status=all');
  }

});

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), function ($links) {

	$tifm_action = array('<a href="#!" id="upw_tifm_disable">' . __('Disable Plugin Test Feature', 'ultimate-posts-widget') . '</a>');
	if (get_option('_tifm_feature_enabled') === 'disabled') {
		$tifm_action = array('<a href="#!" id="upw_tifm_enable">' . __('Enable Plugin Test Feature', 'ultimate-posts-widget') . '</a>');
	}

	return array_merge($links, $tifm_action);

});

add_action('admin_footer', function () {

	global $pagenow;
	if ($pagenow === 'plugins.php') {
		?>
		<script type="text/javascript">
			(function () {
				let nonceTIFM = "<?php echo wp_create_nonce('tifm_notice_nonce') ?>";
				jQuery('#upw_tifm_enable').on('click', (e) => {
					e.preventDefault();
					jQuery.post(ajaxurl, { action: 'tifm_save_decision', decision: 'true', nonce: nonceTIFM }).done(() => {
						window.location.reload();
					}).fail(() => {
						alert('There was an error and we could not update this option.');
					});
				});
				jQuery('#upw_tifm_disable').on('click', (e) => {
					e.preventDefault();
					jQuery.post(ajaxurl, { action: 'tifm_save_decision', decision: 'false', nonce: nonceTIFM }).done(() => {
						window.location.reload();
					}).fail(() => {
						alert('There was an error and we could not update this option.');
					});
				});
			})();
		</script>
		<?php
	}

});

if (!has_action('wp_ajax_tifm_save_decision')) {
  add_action('wp_ajax_tifm_save_decision', function () {

    // Nonce verification
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field($_POST['nonce']), 'tifm_notice_nonce')) {
      wp_send_json_error();
      return;
    }

    if (isset($_POST['decision'])) {

      if ($_POST['decision'] == 'true') {
        update_option('_tifm_feature_enabled', 'enabled');
        delete_option('_tifm_disable_feature_forever', true);
        wp_send_json_success();
        exit;
      } else if ($_POST['decision'] == 'false') {
        update_option('_tifm_feature_enabled', 'disabled');
        update_option('_tifm_disable_feature_forever', true);
        wp_send_json_success();
        exit;
      } else if ($_POST['decision'] == 'reset') {
        delete_option('_tifm_feature_enabled');
        delete_option('_tifm_hide_notice_forever');
        delete_option('_tifm_disable_feature_forever');
        wp_send_json_success();
        exit;
      }

      wp_send_json_error();
      exit;

    }

  });
}
