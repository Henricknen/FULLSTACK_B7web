<?php
/**
 * Widget forms.
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<script>
	jQuery( function( $ ) {

		// Cache selector in a variable
		var $form = $( ".arpw-form-tabs" );

		$form.tabs({
			active   : $.cookie( "activetab" ),
			activate : function( event, ui ) {
				$.cookie( "activetab", ui.newTab.index(), {
					expires : 10
				});
			}
		}).addClass( "ui-tabs-vertical" );

		// Add custom class
		$form.closest( ".widget-inside" ).addClass( "arpw-bg" );

	});
</script>

<div class="arpw-form-tabs">

	<ul class="arpw-tabs">
		<li><a href="#tab-1"><?php _ex( 'General', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
		<li><a href="#tab-2"><?php _ex( 'Posts', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
		<li><a href="#tab-3"><?php _ex( 'Taxonomy', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
		<li><a href="#tab-4"><?php _ex( 'Thumbnail', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
		<li><a href="#tab-5"><?php _ex( 'Extras', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
		<li><a href="#tab-6"><?php _ex( 'Custom CSS', 'widget tab name', 'advanced-random-posts-widget' ); ?></a></li>
	</ul>

	<div class="arpw-tabs-content">

		<div id="tab-1" class="arpw-tab-content">

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>">
					<?php _e( 'Title', 'advanced-random-posts-widget' ); ?>
				</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'title_url' ); ?>">
					<?php _e( 'Title URL', 'advanced-random-posts-widget' ); ?>
				</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_url' ); ?>" name="<?php echo $this->get_field_name( 'title_url' ); ?>" value="<?php echo esc_url( $instance['title_url'] ); ?>" placeholder="<?php echo esc_attr( 'http://' ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'css_class' ); ?>">
					<?php _e( 'CSS Class', 'advanced-random-posts-widget' ); ?>
				</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" value="<?php echo sanitize_html_class( $instance['css_class'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'before' ); ?>">
					<?php _e( 'HTML or text before the random posts', 'advanced-random-posts-widget' );?>
				</label>
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'before' ); ?>" name="<?php echo $this->get_field_name( 'before' ); ?>" rows="5"><?php echo htmlspecialchars( stripslashes( $instance['before'] ) ); ?></textarea>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'after' ); ?>">
					<?php _e( 'HTML or text after the random posts', 'advanced-random-posts-widget' );?>
				</label>
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'after' ); ?>" name="<?php echo $this->get_field_name( 'after' ); ?>" rows="5"><?php echo htmlspecialchars( stripslashes( $instance['after'] ) ); ?></textarea>
			</p>

		</div><!-- #tab-1 -->

		<div id="tab-2" class="arpw-tab-content">

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['ignore_sticky'], 1 ); ?> id="<?php echo $this->get_field_id( 'ignore_sticky' ); ?>" name="<?php echo $this->get_field_name( 'ignore_sticky' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'ignore_sticky' ); ?>">
					<?php _e( 'Ignore sticky posts', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
					<?php _e( 'Number of posts to show', 'advanced-random-posts-widget' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="-1" value="<?php echo (int) $instance['limit']; ?>" />
				<small>-1 <?php _e( 'to show all posts.', 'advanced-random-posts-widget' ); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'offset' ); ?>">
					<?php _e( 'Offset', 'advanced-random-posts-widget' ); ?>
				</label>
				<input type="number" step="1" min="0" class="widefat" id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" value="<?php echo (int) $instance['offset']; ?>" />
				<small><?php _e( 'The number of posts to skip', 'advanced-random-posts-widget' ); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'post_type' ); ?>">
					<?php _e( 'Post type', 'advanced-random-posts-widget' ); ?>
				</label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
					<?php foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $post_type ) { ?>
						<option value="<?php echo esc_attr( $post_type->name ); ?>" <?php selected( $instance['post_type'], $post_type->name ); ?>><?php echo esc_html( $post_type->labels->singular_name ); ?></option>
					<?php } ?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'post_status' ); ?>">
					<?php _e( 'Post status', 'advanced-random-posts-widget' ); ?>
				</label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'post_status' ); ?>" name="<?php echo $this->get_field_name( 'post_status' ); ?>" style="width:100%;">
					<?php foreach ( get_available_post_statuses() as $status_value => $status_label ) { ?>
						<option value="<?php echo esc_attr( $status_label ); ?>" <?php selected( $instance['post_status'], $status_label ); ?>><?php echo esc_html( ucfirst( $status_label ) ); ?></option>
					<?php } ?>
				</select>
			</p>

		</div><!-- #tab-2 -->

		<div id="tab-3" class="arpw-tab-content">

			<div class="arpw-multiple-check-form">
				<label>
					<?php _e( 'Limit to Category', 'advanced-random-posts-widget' ); ?>
				</label>
				<ul>
					<?php foreach ( arpw_term_list( 'category' ) as $category ) : ?>
						<li>
							<input type="checkbox" value="<?php echo (int) $category->term_id; ?>" id="<?php echo $this->get_field_id( 'cat' ) . '-' . (int) $category->term_id; ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>[]" <?php checked( is_array( $instance['cat'] ) && in_array( $category->term_id, $instance['cat'] ) ); ?> />
							<label for="<?php echo $this->get_field_id( 'cat' ) . '-' . (int) $category->term_id; ?>">
								<?php echo esc_html( $category->name ); ?>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="arpw-multiple-check-form">
				<label>
					<?php _e( 'Limit to Tag', 'advanced-random-posts-widget' ); ?>
				</label>
				<ul>
					<?php foreach ( arpw_term_list( 'post_tag' ) as $post_tag ) : ?>
						<li>
							<input type="checkbox" value="<?php echo (int) $post_tag->term_id; ?>" id="<?php echo $this->get_field_id( 'tag' ) . '-' . (int) $post_tag->term_id; ?>" name="<?php echo $this->get_field_name( 'tag' ); ?>[]" <?php checked( is_array( $instance['tag'] ) && in_array( $post_tag->term_id, $instance['tag'] ) ); ?> />
							<label for="<?php echo $this->get_field_id( 'tag' ) . '-' . (int) $post_tag->term_id; ?>">
								<?php echo esc_html( $post_tag->name ); ?>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<p>
				<label for="<?php echo $this->get_field_id( 'taxonomy' ); ?>">
					<?php _e( 'Limit to Taxonomy', 'advanced-random-posts-widget' ); ?>
				</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>" value="<?php echo esc_attr( $instance['taxonomy'] ); ?>" />
				<small><?php _e( 'Ex: category=1,2,4&amp;post_tag=6,12', 'advanced-random-posts-widget' );?><br />
				<?php _e( 'Available: ', 'advanced-random-posts-widget' ); echo implode( ', ', get_taxonomies( array( 'public' => true ) ) ); ?></small>
			</p>

		</div><!-- #tab-3 -->

		<div id="tab-4" class="arpw-tab-content">

			<?php if ( current_theme_supports( 'post-thumbnails' ) ) : ?>

				<p>
					<input class="checkbox" type="checkbox" <?php checked( $instance['thumbnail'] ); ?> id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" />
					<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>">
						<?php _e( 'Display thumbnail', 'advanced-random-posts-widget' ); ?>
					</label>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'thumbnail_size' ); ?>">
						<?php _e( 'Thumbnail Size ', 'advanced-random-posts-widget' ); ?>
					</label>
					<select class="widefat" id="<?php echo $this->get_field_id( 'thumbnail_size' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_size' ); ?>" style="width:100%;">
						<?php foreach ( get_intermediate_image_sizes() as $size ) { ?>
							<option value="<?php echo esc_attr( $size ); ?>" <?php selected( $instance['thumbnail_size'], $size ); ?>><?php echo esc_html( $size ); ?></option>
						<?php }	?>
					</select>
					<small><?php printf( __( 'Please read %1$sFAQ%2$s for more information.', 'advanced-random-posts-widget' ), '<a href="http://wordpress.org/plugins/advanced-random-posts-widget/faq/" target="_blank">', '</a>' ); ?></small>
				</p>

				<p>
					<input class="checkbox" type="checkbox" <?php checked( $instance['thumbnail_custom'] ); ?> id="<?php echo $this->get_field_id( 'thumbnail_custom' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_custom' ); ?>" />
					<label for="<?php echo $this->get_field_id( 'thumbnail_custom' ); ?>">
						<?php _e( 'Use custom thumbnail sizes', 'advanced-random-posts-widget' ); ?>
					</label>
				</p>

				<p>
					<label class="arpw-block" for="<?php echo $this->get_field_id( 'thumbnail_width' ); ?>">
						<?php _e( 'Width & Height', 'advanced-random-posts-widget' ); ?>
					</label>
					<input class="arpw-input-half" id="<?php echo $this->get_field_id( 'thumbnail_width' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_width' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['thumbnail_width'] ); ?>" />
					<input class="arpw-input-half" id="<?php echo $this->get_field_id( 'thumbnail_height' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_height' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['thumbnail_height'] ); ?>" />
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'thumbnail_align' ); ?>">
						<?php _e( 'Thumbnail Alignment', 'advanced-random-posts-widget' ); ?>
					</label>
					<select class="widefat" id="<?php echo $this->get_field_id( 'thumbnail_align' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_align' ); ?>" style="width:100%;">
						<option value="left" <?php selected( $instance['thumbnail_align'], 'left' ); ?>><?php _e( 'Left', 'advanced-random-posts-widget' ) ?></option>
						<option value="right" <?php selected( $instance['thumbnail_align'], 'right' ); ?>><?php _e( 'Right', 'advanced-random-posts-widget' ) ?></option>
						<option value="center" <?php selected( $instance['thumbnail_align'], 'center' ); ?>><?php _e( 'Center', 'advanced-random-posts-widget' ) ?></option>
					</select>
				</p>

			<?php else : ?>
				<p><?php printf( __( 'Your theme does not support Post Thumbnail feature, please go to %1$shttp://codex.wordpress.org/Post_Thumbnails%2$s to read more info and how to activate it in your theme.', 'advanced-random-posts-widget' ), '<a href="http://codex.wordpress.org/Post_Thumbnails" target="_blank">', '</a>'  ); ?></p>
			<?php endif; ?>

		</div><!-- #tab-4 -->

		<div id="tab-5" class="arpw-tab-content">

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['content'] ); ?> id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'content' ); ?>">
					<?php _e( 'Display full post', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['excerpt'] ); ?> id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>">
					<?php _e( 'Display excerpt', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>">
					<?php _e( 'Excerpt Length', 'advanced-random-posts-widget' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['excerpt_length'] ); ?>" />
			</p>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $instance['date'] ); ?> id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" />
				<label for="<?php echo $this->get_field_id( 'date' ); ?>">
					<?php _e( 'Display Date', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'date_modified' ); ?>" name="<?php echo $this->get_field_name( 'date_modified' ); ?>" type="checkbox" <?php checked( $instance['date_modified'] ); ?> />
				<label for="<?php echo $this->get_field_id( 'date_modified' ); ?>">
					<?php _e( 'Display Modified Date', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'date_relative' ); ?>" name="<?php echo $this->get_field_name( 'date_relative' ); ?>" type="checkbox" <?php checked( $instance['date_relative'] ); ?> />
				<label for="<?php echo $this->get_field_id( 'date_relative' ); ?>">
					<?php _e( 'Use Relative Date. eg: 5 days ago', 'advanced-random-posts-widget' ); ?>
				</label>
			</p>

		</div><!-- #tab-5 -->

		<div id="tab-6" class="arpw-tab-content">

			<p>
				<label for="<?php echo $this->get_field_id( 'css' ); ?>">
					<?php _e( 'Custom CSS', 'advanced-random-posts-widget' ); ?>
				</label>
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'css' ); ?>" name="<?php echo $this->get_field_name( 'css' ); ?>" style="height:180px;"><?php echo $instance['css']; ?></textarea>
				<small><?php printf( __( 'You can find the plugin css selector on %1$sFAQ page%2$s.' ), '<a href="https://wordpress.org/plugins/advanced-random-posts-widget/faq/" target="_blank">', '</a>' ); ?></small>
			</p>

		</div><!-- #tab-6 -->

	</div><!-- .arpw-tabs-content -->

</div>
