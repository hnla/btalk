<?php
/**
 * The template for displaying 404 pages (not found)
 *
 *
 * @package btalk-testering
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry we couldn&rsquo;t find that page.', 'btalk' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'This may have been due to a typo or we have removed the page?. Maybe try one of the links below or a search?', 'btalkr' ); ?></p>

					<?php  btalk_site_search( array( 'parent_class' => array( 'wide') ) ); ?>
					<?php get_template_part('template-parts/content-parts/no-results-suggested-content'); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('pages');
get_footer();
