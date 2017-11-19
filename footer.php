<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package btalk-testering
 */

?>

			</div><!-- // #content -->

		<?php if ( is_active_sidebar( 'first-footer-widget-area' )
		        || is_active_sidebar( 'second-footer-widget-area' )
		         || is_active_sidebar( 'third-footer-widget-area' ) ) : ?>

			<div id="container-widget-footer" class="footer-widgets-wrap" role="complementary">

				<div id="footer-widgets" class="<?php  esc_attr( progenitor_foot_widgets_count() ); ?> widgets-parent">
					<?php get_template_part( 'template-parts/footer-widgets') ?>
				</div>

			</div>
		<?php endif; ?>

		</div><!-- // #page -->
	</div><!-- // #site-wrap -->

	<footer id="colophon" class="site-footer primary-color">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'btalk' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'btalk' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'btalk testering' ), 'btalk', '<a href="https://github.com/hnla/btalk">Hugo Ashmore</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- footer -->


<?php wp_footer(); ?>

</body>
</html>
