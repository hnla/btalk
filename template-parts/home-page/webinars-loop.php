<?php
/**
* The home page primary post loop
*
* @package btalk
* @since 0.1.0
*/

$args = array(
	'category_name' => 'webinars',
	'posts_per_page' => '3',
	'order' => 'ASC'
	);

$webinars = new WP_Query( $args );

if ( $webinars->have_posts() ) { ?>

<ul class="webinars-loop">
<?php
	while ($webinars->have_posts() ) {
		$webinars->the_post(); ?>

		<li class="item-entry">
			<div class="box">
				<h2 class="item-title"><?php the_title(); ?></h2>
				<div class="entry-content">
					<div class="responsive-wrap">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		</li>
<?php	} ?>

</ul>

<?php wp_reset_postdata(); ?>

<?php

} else{

	get_template_part( 'template-parts/content', 'none' );

}
