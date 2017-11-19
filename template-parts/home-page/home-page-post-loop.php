<?php
/**
* The home page primary post loop
*
* @package btalk
* @since 0.1.0
*/

if ( have_posts() ) : ?>

	<div class="front-page-general-loop">

		<ul class="posts-loop-home">

		<?php /* Start the Loop */
		while ( have_posts() ) : the_post(); ?>

		<li class="entry-item">
			<div class="box <?php echo ( is_sticky() )? ' sticky-post' : ''; ?>">
				<?php get_template_part( 'template-parts/content-parts/content', get_post_format() ); ?>
			</div>
		</li>

		<?php endwhile; ?>

		</div>
	</ul>

	<?php if ( ! is_front_page() ) {
		btalk_post_navigation( array('prev_text' => 'Older posts', 'next_text' => 'Newer Posts', 'icons' => true) );
	}; ?>

<?php else :

	get_template_part( 'template-parts/content', 'none' );

endif;
