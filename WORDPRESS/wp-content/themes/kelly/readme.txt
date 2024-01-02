=== Kelly ===
Contributors: automattic
Donate link:
Tags: green, light, custom-background, custom-colors, custom-header, custom-menu, infinite-scroll, post-formats, rtl-language-support, translation-ready, one-column, blog photoblogging, photography, journal, clean, colorful, modern, minimal, simple, fixed-layout, responsive-layout
Tested up to: 3.8
Stable tag: 3.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Kelly is a colorful, one-column personal blogging theme, perfect for displaying your thoughts and photographs in a big, bold way.

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does Kelly use featured images? =

Featured Images work best at 1200px wide, and will display above the post on the blog and archives.

= Where are my widgets? =

Widgets will appear in the footer area of this one-column theme.

= Quick Specs (all measurements in pixels) =

1. The main column width is 1200.
2. The footer sidebar widths are 360 each.

== Changelog ==

= 9 June 2017 =
* Add theme support for title tags. Bump version number.

= 8 June 2017 =
* Add JavaScript resize event, to fix aspect ratio issues for video widgets. Update styles for lists and overflowing text to fix issues in widgets.

= 30 May 2017 =
* Correct errors in colour annotations that were preventing setting the scheme back to default.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 7 February 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 9 June 2016 =
* Add Headstart annotations;

= 12 May 2016 =
* Add new classic-menu tag.

= 20 August 2015 =
* Add text domain and/or remove domain path. (J-O)

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 29 June 2015 =
* Removed updater.php file and functions.php include. Added in error - this is auto-generated.
* Version bump - removed updater.php call in dotorg version.

= 16 June 2015 =
* Updating version number for regenerated download.

= 6 May 2015 =
* Fully remove example.html from Genericons folders.
* Remove index.html file from Genericions.

= 3 March 2015 =
* Ensure reply title font family matches with the rest of the theme.

= 17 December 2014 =
* Allow tablets to access submenu items in the site navigation.

= 29 October 2014 =
* Fix font size bug for Gists.

= 27 October 2014 =
* Enqueue proper version of Open Sans, fixes #2724; enqueue Google Fonts the proper way, without relying on init hook.

= 24 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 15 July 2014 =
* Revert r18839, an accidentally commit with testing code.
* Ensure items in the first column clear the previous row.

= 30 June 2014 =
* Add 'container_class' and 'menu_class' to Primary Nav to fix custom menus missalignment.

= 29 May 2014 =
* Add required bypostauthor class for WP.org submission
* Update readme for submission to WP.org
* Add POT file
* Left-align widget titles and make post backgrounds white
* Fix missing comma in style tags
* Update description.

= 28 May 2014 =
* Correct theme author info in footer and style.css.

= 27 May 2014 =
* Update responsive videos support moving into jetpack compat file; minor tweaks to colors for contrast, and spacing between elements; remove trailing whitespace

= 23 May 2014 =
* Improvements to entry format icons for mobile
* Add RTL styles
* Ensure submenus on mobile don't have a background color
* Add support for post thumbnails; single image post format displays featured image above content
* Add post format icons
* Styling for custom headers in front and back end
* Additional styles for custom headers on the front end
* Add readme.txt, delete README.md, add support for post formats in the posted_on string, begin adding support for custom header images

= 22 May 2014 =
* New screenshot

= 21 May 2014 =
* Cleaning up infinite scroll styles
* Ensure link post format title links to the given URL in the content
* Add Genericons support; standardize border radius throughout stylesheet
* Minor tweak to focus styles for inputs
* Improvements to search for small screens
* Improvements to search widget appearance for large screens
* Clean up post meta on single post view
* Improvements to footer entry meta appearance for mobile
* Update form allowed tags code size and add theme tags
* Adjust border color on mobile navigation menu; set left and right margins on page title for mobile devices
* Make font sizes larger at largest breakpoint

= 20 May 2014 =
* Additional improvement to search field for large screens
* Improve appearance of search widget form
* Improvement to dropdown submenu placement
* Fix for site description in admin and navigation submenu padding
* Styling for custom header text appearance in admin; mobile style tweaks for site title and description
* Begin adding support for custom headers; enqueue Google Fonts in functions.php rather than linked in header.php; add dequeue Google Fonts function to inc/wpcom.php
* Move post format links to footer meta
* Move post format archive links, add Galleries to archives page
* Add support for displaying post format archive links, add support for Gallery post format
* Improvements to comment styles on mobile; gallery styles; add table of contents
* Main navigation style
* Widget styling, menu styling, 404/no search results styling
* Adjustments to comment avatar sizes, add HTML5 markup functions, remove unused image navigation function
* Adjustments to comments area font sizes/styles
* Adding padding to comments area and site navigation areas
* Correction to footer credit link
* Adjustments to footer entry meta and wpstats smiley
* Adjustments to menu font size and footer entry meta display
* Adjustments to font sizes, footer styling
* Delete unused files; update archive.php to latest version of _s, with author setup function in inc/extras.php
* Style tweaks to make layout mobile first
* Style footer widgets
* More style cleanup, vertical rhythm and font size tweaks
* Correct footer credits; style.css cleanup, improvements to vertical rhythm
* Add two more widget areas to make three total in the footer; add these sidebars to the Jetpack infinite scroll setup; add WordPress.com specific styles and functions; minor style.css cleanup; delete image.php template
* Update style.css header
* Initial import from design repo
