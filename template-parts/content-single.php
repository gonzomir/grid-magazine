<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grid_Magazine
 */


global $wp_query;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-thumbnail">
		<?php
		$thumbnail_size = 'grid-mag-wide-medium';
		$sizes = '(min-width: 60em) calc( 100vw - (2.5em + (100vw - 60em) / 5) * 2 ), (min-width: 40em) calc(100vw - (1.5em + (100vw - 40em) / 20) * 2), calc(100vw - 3em)';
		?>
		<?php the_post_thumbnail( $thumbnail_size, array( 'sizes' => $sizes ) ); ?>
	</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<?php if ( 'post' === get_post_type() ) : ?>
	<footer class="entry-meta">
		<p>
		<?php grid_mag_posted_on(); ?>
		<?php grid_mag_entry_footer(); ?>
		</p>
	</footer><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			if ( is_single() ) {

				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grid-magazine' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

			}
			else {
				the_excerpt();
			}

		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
