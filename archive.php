<?php
/**
 * The template for displaying archive pages
 *
 * @package btalk-testeriser
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

			<div class="loop-wrap">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<div class="box">
					<?php get_template_part( 'template-parts/content-parts/content', get_post_format() ); ?>
				</div>

			<?php	endwhile; ?>

			</div>

			<?php

			btalk_postloop_paginate();

		else :

			get_template_part( 'template-parts/content-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
