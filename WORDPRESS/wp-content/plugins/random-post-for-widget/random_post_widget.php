<?php
/*
Plugin Name:       	Random Post for Widget
Plugin URI:        	http://www.shashidharkumar.com/random-post-widget-wordpress/
Description: 		Random Post for Widget will show random post on your sidebar. You can exclude certain posts by ID.
Author URI:        	http://www.shashidharkumar.com/
Author:            	Shashi Dhar Kumar
Donate link: 		http://www.shashidharkumar.com/donate/
Tags: 			    plugin, posts, random, random post, random posts, simple plugin, widget, Wordpress
Requires at least: 	4.5
Tested up to: 		6.1.1
Stable tag: 		trunk
Version:           	5.0
License: 		    GPLv2 or later
License URI: 		http://www.gnu.org/licenses/gpl-2.0.html
*/
 
 
class RandomPostForWidget extends WP_Widget
{
  function RandomPostForWidget()
  {
    $widget_ops = array('classname' => 'RandomPostForWidget', 'description' => 'Displays a random post' );
    $this->WP_Widget('RandomPostForWidget', 'Random Post', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
	$noofpost = $instance['noofpost'];
	$hidepost = $instance['hidepost'];
?>
  <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label>
  <label for="<?php echo $this->get_field_id('noofpost'); ?>">No. of Post: <input class="widefat" id="<?php echo $this->get_field_id('noofpost'); ?>" name="<?php echo $this->get_field_name('noofpost'); ?>" type="text" value="<?php echo attribute_escape($noofpost); ?>" /></label>
  <label for="<?php echo $this->get_field_id('hidepost'); ?>">Exclude Posts by ID(comma seperated): <input class="widefat" id="<?php echo $this->get_field_id('hidepost'); ?>" name="<?php echo $this->get_field_name('hidepost'); ?>" type="text" value="<?php echo attribute_escape($hidepost); ?>" /></label>
  </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['noofpost'] = $new_instance['noofpost'];
	$instance['hidepost'] = $new_instance['hidepost'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$noofpost = $instance['noofpost'];
	$hidepost = $instance['hidepost'];
 
    if (!empty($title))
      echo $before_title . $title . $after_title;
	if (!empty($noofpost))
		{
	  		$noofpost;
	  	}
	else
		{
	 		$noofpost=5; 
	  	}
    // WIDGET CODE GOES HERE
	$arr = explode(",",$hidepost);
	$args = array(
	'post__not_in' => $arr,
	'post_type' => 'post',
	'posts_per_page' => $noofpost,
	'post_status' => 'publish',
	'orderby' => 'rand'
	);
	query_posts( $args );
	if (have_posts()) : 
		echo "<ul>";
		while (have_posts()) : the_post(); 
			echo "<li><a href='".get_permalink()."'>".get_the_title();
			echo "</a></li>";	
	 
		endwhile;
		echo "</ul>";
	endif; 
	wp_reset_query();
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostForWidget");') );?>