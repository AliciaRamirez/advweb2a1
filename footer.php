<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package advweb2a1
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
	<?php get_sidebar(); ?>
		<div class="site-info cute-12-phone">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'advweb2a1' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'advweb2a1' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'advweb2a1' ), 'advweb2a1', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
