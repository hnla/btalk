<?php
/**
 * Template name: Channel list
 *
 * @package btalk-testering
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php echo do_shortcode('[BrightTALK channelid=1166 commid=0 displaymode=channellist track="tracking data"]'); ?>

	</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar('pages');
get_footer();
