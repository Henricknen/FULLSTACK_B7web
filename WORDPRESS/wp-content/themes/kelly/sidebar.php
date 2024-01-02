<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package kelly
 */

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) )
	return;
?>
	<div id="secondary" class="widget-areas clear" role="complementary">
		<div class="widget-areas-inner">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div>
			<?php endif; // end sidebar widget area ?>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php endif; // end sidebar widget area ?>
			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php endif; // end sidebar widget area ?>
		</div>
	</div><!-- #secondary -->