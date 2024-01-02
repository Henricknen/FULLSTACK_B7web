<?php
/**
 * @package kelly
 */

$formats = get_theme_support( 'post-formats' );
$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && 'image' == $format ) : ?>
		<div class="entry-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'kelly-featured-image' ); ?></a>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<?php if ( 'link' == $format ) : ?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( kelly_get_link_url() ) . '" rel="bookmark">', '</a></h1>' ); ?>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>

		<div class="entry-meta">
			<?php kelly_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kelly' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'kelly' ) );
				if ( $categories_list && kelly_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'kelly' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				the_tags( sprintf( '<span class="tags-links">%s ', esc_html__( 'Tagged', 'kelly' ) ), esc_html__( ', ', 'kelly' ), '</span>' ); ?>

		<?php edit_post_link( __( 'Edit', 'kelly' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
