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
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php grid_mag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<?php
		$thumbnail_size = 'grid-mag-image-big';
		$sizes = '(min-width: 60em) calc( (100vw - (2.5em + (100vw - 60em) / 5) * 2) * 2 / 3 - .75em ), (min-width: 40em) calc(100vw - (1.5em + (100vw - 40em) / 20) * 2), calc(100vw - 3em)';
		if ( is_home() && is_front_page() ) {
			if ( $wp_query->current_post > 0 ) {
				$thumbnail_size = 'grid-mag-card-tiny';
				$sizes = '(min-width: 60em) calc( (100vw - (2.5em + (100vw - 60em) / 5) * 2 - 3em) / 3 ), (min-width: 40em) calc( (100vw - (1.5em + (100vw - 40em) / 20) * 2 - 1.5em) / 2 ), calc(100vw - 3em)';
			}
			else {
				$thumbnail_size = 'grid-mag-card-small';
				$sizes = '(min-width: 60em) calc( (100vw - (2.5em + (100vw - 60em) / 5) * 2 - 3em) / 3 * 2 + 1.5em ), (min-width: 40em) calc( 100vw - (1.5em + (100vw - 40em) / 20) * 2 ), calc(100vw - 3em)';
			}
		}
		if ( is_single() ) {
			$thumbnail_size = 'grid-mag-wide-medium';
			$sizes = '(min-width: 60em) calc( 100vw - (2.5em + (100vw - 60em) / 5) * 2) ), (min-width: 40em) calc(100vw - (1.5em + (100vw - 40em) / 20) * 2), calc(100vw - 3em)';
		}
		?>
		<?php the_post_thumbnail( $thumbnail_size, array( 'sizes' => $sizes ) ); ?>
	</a>
	<?php endif; ?>

	<div class="entry-content">
		<?php
			if ( is_single() ) {

				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grid-magazine' ),
					'after'  => '</div>',
				) );

			}
			else {
				the_excerpt();
			}

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php grid_mag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
