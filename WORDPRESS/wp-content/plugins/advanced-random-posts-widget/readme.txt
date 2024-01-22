=== Advanced Random Posts Widget ===
Contributors: satrya
Tags: random posts, thumbnail, widget, widgets, sidebar, excerpt, category, post tag, post type, taxonomy, shortcode, multiple widgets, random posts widget
Requires at least: 4.5
Tested up to: 6.1
Stable tag: 2.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides flexible and advanced random posts. Display it via shortcode or widget with thumbnails, post excerpt, and much more!

== Description ==

= Notice =

This plugin is no longer supported, please use [Recent posts widget Extended](https://wordpress.org/plugins/recent-posts-widget-extended/) instead.

This plugin will enable a custom, flexible and advanced random posts. It allows you to display a list of random posts via shortcode or widget with thumbnail, excerpt and post date, also you can display it from all or specific or multiple taxonomy.

= Features Include =

* Allow you to set title url.
* Display thumbnails, with customizable size and alignment.
* Display excerpt, with customizable length.
* Display from all, specific or multiple category.
* Display from all, specific or multiple tag.
* Display from all, specific or multiple taxonomy.
* Display post date.
* Display post modified date.
* Post types.
* Post status.
* Allow you to set custom css class per widget.
* Add custom html or text before and/or after random posts.
* Multiple widgets.

= Support Me =

* Purchase or download my [WordPress themes](https://wp.idenovasi.com/).
* Purchase my [Services](https://www.fiverr.com/idenovasi).
* Try another [WordPress plugin](https://profiles.wordpress.org/idenovasi/#content-plugins) from me.
* Contribute on [Github](https://github.com/idenovasi/advanced-random-posts-widget).

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
2. Type **advanced random posts widget** in the search box and click on search button.
3. Find **Advanced Random Posts Widget** plugin.
4. Then click on Install Now after that activate the plugin.
5. Go to the widgets page **Appearance -> Widgets**.
6. Find **Random Posts** widget.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the **advanced-random-posts-widget** folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.
6. Go to the widgets page **Appearance -> Widgets**.
6. Find **Random Posts** widget.

== Frequently Asked Questions ==

= No image/thumbnail options? =
Your theme needs to support Post Thumbnail, please go to http://codex.wordpress.org/Post_Thumbnails to read more info and how to activate it in your theme.

= Thumbnail Size =
By default it uses **arpw-thumbnail** which have **50x50** size. If you want to use custom image size, you can install http://wordpress.org/plugins/simple-image-sizes/ then create new image size, it will appear in the **Thumbnail Size** selectbox in the widget option.

= Thumbnail Size Not Working Properly =
I have mentioned it in the plugin description. If you use images that were uploaded to the media library before you installed this plugin and/or you have your own custom image sizes, please install [Regenerate Thumbnails](https://wordpress.org/plugins/force-regenerate-thumbnails/) plugin to fix the image size.

= How to add custom style? =
The plugin comes with a very basic style, if you want to add custom style please do `wp_dequeue_style` to remove the default stylesheet. Place the code below in your theme `functions.php`.
`
function prefix_remove_arpw_style() {
	wp_dequeue_style( 'arpw-style' );
}
add_action( 'wp_enqueue_scripts', 'prefix_remove_arpw_style', 10 );
`
Then you can add your custom style using Custom CSS plugin or in your theme `style.css`. Here's the plugin selector
`
/* ul */
.arpw-ul {}

/* li */
.arpw-li {}

/* title */
.arpw-title {}

/* thumbnail */
.arpw-thumbnail {}

/* date */
.arpw-time {}

/* excerpt */
.arpw-summary {}
`

== Screenshots ==

1. The widget settings

== Shorcode Explanation ==

Explanation of shortcode options:

Basic shortcode
`
[arpw]
`

Display 10 random posts
`
[arpw limit="10"]
`

Display with thumbnail and set the size
`
[arpw thumbnail="true" thumbnail_size="arpw-thumbnail"]
`

Display posts based on category by id
`
[arpw thumbnail="true" cat="10"]
`

Display portfolio post type
`
[arpw post_type="portfolio"]
`

**Here's the full default shortcode arguments**
`
title=""
offset=""
limit="5"
post_type="post"
post_status="publish"
ignore_sticky="1"
taxonomy=""
cat=""
tag=""
thumbnail="false"
thumbnail_size="arpw-thumbnail"
thumbnail_align="left"
excerpt="false"
excerpt_length="10"
date="false"
date_modified="false"
date_relative="false"
css_class=""
before=""
after=""
`

== Changelog ==

= 2.2.0 - March 07, 2019 =
* Support WordPress 5.1
* Added: Display full post. props [Rhys Wynne](https://profiles.wordpress.org/rhyswynne/)
* Added: `width` and `height` attribute if using custom image size

