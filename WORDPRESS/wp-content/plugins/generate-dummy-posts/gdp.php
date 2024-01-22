<?php
/**
 * Generate Dummy Posts
 *
 * Plugin Name: Generate Dummy Posts
 * Plugin URI:  https://wordpress.org/plugins/generate-dummy-posts
 * Description: Create dummy posts in your wordpress website in just one click.
 * Version:     1.0.0
 * Author:      Saurav Sharma
 * Author URI:  https://phpesperto.com/saurav-sharma
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: generate-dummy-posts
 * Domain Path: /languages
 * Requires at least: 4.9
 * Tested up to: 5.8
 * Requires PHP: 5.2.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

//----------------------------------------------------------------------
// Add menu option in Sidebar
//----------------------------------------------------------------------
function gdposts_menu() {
	$adminPage = add_submenu_page("options-general.php", "Generate Posts", "Generate Posts","manage_options", "gdposts", "gdpostsMainFunction");
	add_action( 'load-' . $adminPage, 'gdposts_admin_scripts' );
}
add_action("admin_menu", "gdposts_menu");

//----------------------------------------------------------------------
// We can't just enqueue our scripts here – it's too early. 
// Register against the proper action hook to do it
//----------------------------------------------------------------------
function gdposts_admin_scripts(){
        add_action( 'admin_enqueue_scripts', 'gdposts_css_jsscripts' );
}
//----------------------------------------------------------------------
// Main method (include file)
//----------------------------------------------------------------------
function gdpostsMainFunction(){
   include "include/main.php";
}

/* Include CSS and Script */
//----------------------------------------------------------------------
// Method to include js and css file
//----------------------------------------------------------------------
function gdposts_css_jsscripts() {
   // CSS
   wp_enqueue_style( 'gdposts', plugins_url( '/assets/css/style.css', __FILE__ ));

   // JavaScript
   wp_enqueue_script( 'gdposts', plugins_url( '/assets/js/script.js', __FILE__ ),array('jquery'));

   // Pass ajax_url to script.js
   wp_localize_script( 'gdposts', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

//----------------------------------------------------------------------
// Method : Set post featured image using post id from extranal url
//----------------------------------------------------------------------
function gdpostsFeaturedImage($url, $post_id){
	//condition filter to check post
	if ( ! filter_var($url, FILTER_VALIDATE_URL) ||  empty($post_id) ) {
		return;
	}
	
	// Add Featured Image to Post
	$image_url 		  = preg_replace('/\?.*/', '', $url); // removing query string from url & Define the image URL here
	$image_name       = basename($image_url);
	$upload_dir       = wp_upload_dir(); // Set upload folder
	
	$responseImage = wp_remote_get( $url );
	if( is_array($responseImage) ) {
	  $image_data       = $responseImage['body']; // Get image data
	}

	$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
	$filename         = basename( $unique_file_name ); // Create image file name

	// Check folder permission and define file location
	if( wp_mkdir_p( $upload_dir['path'] ) ) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}

	// Create the image  file on the server
	file_put_contents( $file, $image_data );

	// Check image file type
	$wp_filetype = wp_check_filetype( $filename, null );

	// Set attachment data
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);

	// Create the attachment
	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	// Include image.php
	require_once(ABSPATH . 'wp-admin/includes/image.php');

	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	// Assign metadata to attachment
	wp_update_attachment_metadata( $attach_id, $attach_data );

	// And finally assign featured image to post
	set_post_thumbnail( $post_id, $attach_id );
}

//----------------------------------------------------------------------
// Method : This method create dummy text from 2 arrays $allWords and $firstLetter
//----------------------------------------------------------------------
function getDummyPostContent(){
	// array variable from where content will generated
	$allWords = array("lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "ut", "aliquam", "purus", "sit", "amet", "luctus", "venenatis", "lectus", "magna", "fringilla", "urna", "porttitor", "rhoncus", "dolor", "purus", "non", "enim", "praesent", "elementum", "facilisis", "leo", "vel", "fringilla", "est", "ullamcorper", "eget", "nulla", "facilisi", "etiam", "dignissim", "diam", "quis", "enim", "lobortis", "scelerisque", "fermentum", "dui", "faucibus", "in", "ornare", "quam", "viverra", "orci", "sagittis", "eu", "volutpat", "odio", "facilisis", "mauris", "sit", "amet", "massa", "vitae", "tortor", "condimentum", "lacinia", "quis", "vel", "eros", "donec", "ac", "odio", "tempor", "orci", "dapibus", "ultrices", "in", "iaculis", "nunc", "sed", "augue", "lacus", "viverra", "vitae", "congue", "eu", "consequat", "ac", "felis", "donec", "et", "odio", "pellentesque", "diam", "volutpat", "commodo", "sed", "egestas", "egestas", "fringilla", "phasellus", "faucibus", "scelerisque", "eleifend", "pretium", "vulputate", "sapien", "nec", "sagittis", "aliquam", "malesuada", "bibendum", "arcu", "vitae", "elementum", "curabitur", "vitae", "nunc", "sed", "velit", "dignissim", "sodales", "ut", "eu", "sem", "integer", "vitae", "justo", "eget", "magna", "fermentum", "iaculis", "eu", "non", "diam", "phasellus", "vestibulum", "lorem", "sed", "risus", "ultricies", "tristique", "nulla", "aliquet", "enim", "tortor", "at", "auctor", "urna", "nunc", "id", "cursus", "metus", "aliquam", "eleifend", "mi", "in", "nulla", "posuere", "sollicitudin", "aliquam", "ultrices", "sagittis", "orci", "a", "scelerisque", "purus", "semper", "eget", "duis", "at", "tellus", "at", "urna", "condimentum", "mattis", "pellentesque", "id", "nibh", "tortor", "id", "aliquet", "lectus", "proin", "nibh", "nisl", "condimentum", "id", "venenatis", "a", "condimentum", "vitae", "sapien", "pellentesque", "habitant", "morbi", "tristique", "senectus", "et", "netus", "et", "malesuada", "fames", "ac", "turpis", "egestas", "sed", "tempus", "urna", "et", "pharetra", "pharetra", "massa", "massa", "ultricies", "mi", "quis", "hendrerit", "dolor", "magna", "eget", "est", "lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "pellentesque", "habitant", "morbi", "tristique", "senectus", "et", "netus", "et", "malesuada", "fames", "ac", "turpis", "egestas", "integer", "eget", "aliquet", "nibh", "praesent", "tristique", "magna", "sit", "amet", "purus", "gravida", "quis", "blandit", "turpis", "cursus", "in", "hac", "habitasse", "platea", "dictumst", "quisque", "sagittis", "purus", "sit", "amet", "volutpat", "consequat", "mauris", "nunc", "congue", "nisi", "vitae", "suscipit", "tellus", "mauris", "a", "diam", "maecenas", "sed", "enim", "ut", "sem", "viverra", "aliquet", "eget", "sit", "amet", "tellus", "cras", "adipiscing", "enim", "eu", "turpis", "egestas", "pretium", "aenean", "pharetra", "magna", "ac", "placerat", "vestibulum", "lectus", "mauris", "ultrices", "eros", "in", "cursus", "turpis", "massa", "tincidunt", "dui", "ut", "ornare", "lectus", "sit", "amet", "est", "placerat", "in", "egestas", "erat", "imperdiet", "sed", "euismod", "nisi", "porta", "lorem", "mollis", "aliquam", "ut", "porttitor", "leo", "a", "diam", "sollicitudin", "tempor", "id", "eu", "nisl", "nunc", "mi", "ipsum", "faucibus", "vitae", "aliquet", "nec", "ullamcorper", "sit", "amet", "risus", "nullam", "eget", "felis", "eget", "nunc", "lobortis", "mattis", "aliquam", "faucibus", "purus", "in", "massa", "tempor", "nec", "feugiat", "nisl", "pretium", "fusce", "id", "velit", "ut", "tortor", "pretium", "viverra", "suspendisse", "potenti", "nullam", "ac", "tortor", "vitae", "purus", "faucibus", "ornare", "suspendisse", "sed", "nisi", "lacus", "sed", "viverra", "tellus", "in", "hac", "habitasse", "platea", "dictumst", "vestibulum", "rhoncus", "est", "pellentesque", "elit", "ullamcorper", "dignissim", "cras", "tincidunt", "lobortis", "feugiat", "vivamus", "at", "augue", "eget", "arcu", "dictum", "varius", "duis", "at", "consectetur", "lorem", "donec", "massa", "sapien", "faucibus", "et", "molestie", "ac", "feugiat", "sed", "lectus", "vestibulum", "mattis", "ullamcorper", "velit", "sed", "ullamcorper", "morbi", "tincidunt", "ornare", "massa", "eget", "egestas", "purus", "viverra", "accumsan", "in", "nisl", "nisi", "scelerisque", "eu", "ultrices", "vitae", "auctor", "eu", "augue", "ut", "lectus", "arcu", "bibendum", "at", "varius", "vel", "pharetra", "vel", "turpis", "nunc", "eget", "lorem", "dolor", "sed", "viverra", "ipsum", "nunc", "aliquet", "bibendum", "enim", "facilisis", "gravida", "neque", "convallis", "a", "cras", "semper", "auctor", "neque", "vitae", "tempus", "quam", "pellentesque", "nec", "nam", "aliquam", "sem", "et", "tortor", "consequat", "id", "porta", "nibh", "venenatis", "cras", "sed", "felis", "eget", "velit", "aliquet", "sagittis", "id", "consectetur", "purus", "ut", "faucibus", "pulvinar", "elementum", "integer", "enim", "neque", "volutpat", "ac", "tincidunt", "vitae", "semper", "quis", "lectus", "nulla", "at", "volutpat", "diam", "ut", "venenatis", "tellus", "in", "metus", "vulputate", "eu", "scelerisque", "felis", "imperdiet", "proin", "fermentum", "leo", "vel", "orci", "porta", "non", "pulvinar", "neque", "laoreet", "suspendisse", "interdum", "consectetur", "libero", "id", "faucibus", "nisl", "tincidunt", "eget", "nullam", "non", "nisi", "est", "sit", "amet", "facilisis", "magna", "etiam", "tempor", "orci", "eu", "lobortis", "elementum", "nibh", "tellus", "molestie", "nunc", "non", "blandit", "massa", "enim", "nec", "dui", "nunc", "mattis", "enim", "ut", "tellus", "elementum", "sagittis", "vitae", "et", "leo", "duis", "ut", "diam", "quam", "nulla", "porttitor", "massa", "id", "neque", "aliquam", "vestibulum", "morbi", "blandit", "cursus", "risus", "at", "ultrices", "mi", "tempus", "imperdiet", "nulla", "malesuada", "pellentesque", "elit", "eget", "gravida", "cum", "sociis", "natoque", "penatibus", "et", "magnis", "dis", "parturient", "montes", "nascetur", "ridiculus", "mus", "mauris", "vitae", "ultricies", "leo", "integer", "malesuada", "nunc", "vel", "risus", "commodo", "viverra", "maecenas", "accumsan", "lacus", "vel", "facilisis", "volutpat", "est", "velit", "egestas", "dui", "id", "ornare", "arcu", "odio", "ut", "sem", "nulla", "pharetra", "diam", "sit", "amet", "nisl", "suscipit", "adipiscing", "bibendum", "est", "ultricies", "integer", "quis", "auctor", "elit", "sed", "vulputate", "mi", "sit", "amet", "mauris", "commodo", "quis", "imperdiet", "massa", "tincidunt", "nunc", "pulvinar", "sapien", "et", "ligula", "ullamcorper", "malesuada", "proin", "libero", "nunc", "consequat", "interdum", "varius", "sit", "amet", "mattis", "vulputate", "enim", "nulla", "aliquet", "porttitor", "lacus", "luctus", "accumsan", "tortor", "posuere", "ac", "ut", "consequat", "semper", "viverra", "nam", "libero", "justo", "laoreet", "sit", "amet", "cursus", "sit", "amet", "dictum", "sit", "amet", "justo", "donec", "enim", "diam", "vulputate", "ut", "pharetra", "sit", "amet", "aliquam", "id", "diam", "maecenas", "ultricies", "mi", "eget", "mauris", "pharetra", "et", "ultrices", "neque", "ornare", "aenean", "euismod", "elementum", "nisi", "quis", "eleifend", "quam", "adipiscing", "vitae", "proin", "sagittis", "nisl", "rhoncus", "mattis", "rhoncus", "urna", "neque", "viverra", "justo", "nec", "ultrices", "dui", "sapien", "eget", "mi", "proin", "sed", "libero", "enim", "sed", "faucibus", "turpis", "in", "eu", "mi", "bibendum", "neque", "egestas", "congue", "quisque", "egestas", "diam", "in", "arcu", "cursus", "euismod", "quis", "viverra", "nibh", "cras", "pulvinar", "mattis", "nunc", "sed", "blandit", "libero", "volutpat", "sed", "cras", "ornare", "arcu", "dui", "vivamus", "arcu", "felis", "bibendum", "ut", "tristique", "et", "egestas", "quis", "ipsum", "suspendisse", "ultrices", "gravida", "dictum", "fusce", "ut", "placerat", "orci", "nulla", "pellentesque", "dignissim", "enim", "sit", "amet", "venenatis", "urna", "cursus", "eget", "nunc", "scelerisque", "viverra", "mauris", "in", "aliquam", "sem", "fringilla", "ut", "morbi", "tincidunt", "augue", "interdum", "velit", "euismod", "in", "pellentesque", "massa", "placerat", "duis", "ultricies", "lacus", "sed", "turpis", "tincidunt", "id", "aliquet", "risus", "feugiat", "in", "ante", "metus", "dictum", "at", "tempor", "commodo", "ullamcorper", "a", "lacus", "vestibulum", "sed", "arcu", "non", "odio", "euismod", "lacinia", "at", "quis", "risus", "sed", "vulputate", "odio", "ut", "enim", "blandit", "volutpat", "maecenas", "volutpat", "blandit", "aliquam", "etiam", "erat", "velit", "scelerisque", "in", "dictum", "non", "consectetur", "a", "erat", "nam", "at", "lectus", "urna", "duis", "convallis", "convallis", "tellus", "id", "interdum", "velit", "laoreet", "id", "donec", "ultrices", "tincidunt", "arcu", "non", "sodales", "neque", "sodales", "ut", "etiam", "sit", "amet", "nisl", "purus", "in", "mollis", "nunc", "sed", "id", "semper", "risus", "in", "hendrerit", "gravida", "rutrum", "quisque", "non", "tellus", "orci", "ac", "auctor", "augue", "mauris", "augue", "neque", "gravida", "in", "fermentum", "et", "sollicitudin", "ac", "orci", "phasellus", "egestas", "tellus", "rutrum", "tellus", "pellentesque", "eu", "tincidunt", "tortor", "aliquam", "nulla", "facilisi", "cras", "fermentum", "odio", "eu", "feugiat", "pretium", "nibh", "ipsum", "consequat", "nisl", "vel", "pretium", "lectus", "quam", "id", "leo", "in", "vitae", "turpis", "massa", "sed", "elementum", "tempus", "egestas", "sed", "sed", "risus", "pretium", "quam", "vulputate", "dignissim", "suspendisse", "in", "est", "ante", "in", "nibh", "mauris", "cursus", "mattis", "molestie", "a", "iaculis", "at", "erat");

	$imagesArray = array("https://images.pexels.com/photos/2215380/pexels-photo-2215380.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/3493777/pexels-photo-3493777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/62600/pexels-photo-62600.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/848573/pexels-photo-848573.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/1076240/pexels-photo-1076240.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2262628/pexels-photo-2262628.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/6152103/pexels-photo-6152103.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/288093/pexels-photo-288093.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/3551207/pexels-photo-3551207.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/3148596/pexels-photo-3148596.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2604792/pexels-photo-2604792.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/343701/pexels-photo-343701.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/1054417/pexels-photo-1054417.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/4019400/pexels-photo-4019400.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/7245371/pexels-photo-7245371.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/842687/pexels-photo-842687.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2403916/pexels-photo-2403916.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/190482/pexels-photo-190482.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/888919/pexels-photo-888919.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/3791901/pexels-photo-3791901.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2545204/pexels-photo-2545204.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2761152/pexels-photo-2761152.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2976684/pexels-photo-2976684.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/245584/pexels-photo-245584.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2446556/pexels-photo-2446556.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/3459765/pexels-photo-3459765.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/2472426/pexels-photo-2472426.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/6121962/pexels-photo-6121962.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/8676810/pexels-photo-8676810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/4053188/pexels-photo-4053188.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500","https://images.pexels.com/photos/4129949/pexels-photo-4129949.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
	
	//count title length
	$randVal = rand(6,12);
	
	//count content length
	
	$randValDesc = rand(300,450);
	shuffle($allWords);
	shuffle($allWords);
	shuffle($imagesArray);

	$post = array();
	$titleIS = ucfirst($allWords[0]);
	for($i=1;$i<$randVal;$i++){
			$titleIS .= ' '.$allWords[$i];
	}
	$post['title'] = $titleIS;
	$post['image'] = $imagesArray[0];

	$descIS = '<p>'.$allWords[1];
	for($j=1;$j<$randValDesc;$j++){
			$descIS .= ' '.$allWords[$j];
	}
	$post['content'] = $descIS.'.</p>';
	//it will return array of title, image and content
	return json_encode($post);
}


//----------------------------------------------------------------------
// Method : wp_remote_get request to get data from API https://themeslib.phpesperto.com/gdposts.php
//----------------------------------------------------------------------
function gdpostsApiCreatePostsLoop(){
	//include "include/api.php";
	$postJson = getDummyPostContent();
	
	$post = json_decode($postJson,true);
	$postData = array(
		'post_title' => $post['title'],
		'post_content' => $post['content'],
		'post_status' => 'publish'
	);

	$post_id = wp_insert_post( $postData );
	//----------------------------------------------------------------------
	// set the featured image from extranal url
	//----------------------------------------------------------------------
	gdpostsFeaturedImage($post['image'], $post_id);
	return $post['title'];
}
//----------------------------------------------------------------------
// Method: AJAX call back request
//----------------------------------------------------------------------
add_action( 'wp_ajax_gdpostsAjaxReqiest', 'gdpostsAjaxCallBack' );
add_action( 'wp_ajax_nopriv_gdpostsAjaxReqiest', 'gdpostsAjaxCallBack' );
function gdpostsAjaxCallBack() {
	$inputVal = 1;
	$titleArray = array();
	
	if(isset($_POST['inputVal'])){
		$inputVal = sanitize_text_field( $_POST['inputVal'] );
	}
	for($i=0;$i<$inputVal;$i++){
		$titleArray[] = gdpostsApiCreatePostsLoop();
	}
	echo json_encode($titleArray);
    wp_die(); 
}