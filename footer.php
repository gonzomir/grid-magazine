<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grid_Magazine
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'grid-magazine' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'grid-magazine' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'grid-magazine' ), sprintf( '<a href="https://github.com/gonzomir/grid-magazine">%s</a>', esc_html__( 'Grid Magazine', 'grid-magazine' ) ), esc_html__( 'Milen Petrinski - Gonzo', 'grid-magazine' ) ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
