<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package btalk-testering
 */

if ( get_post_format() ) {
	$custom_type = get_post_format();
} else {
	$custom_type = get_post_type();
}

/**
 * Check category
 * Diplay sidebar and region blocks based on cat
 * This would be done normally from template-functions.php
 * or better we would set up a dedicated CPT for post_type 'Webinars'
 *
 */

$the_cat = get_the_category();
if ( 'webinars' == $the_cat[0]->slug) {
	$is_webinar = true;

	// if we have  widgets set the class webinar
	// styles will hook on the class to change the layout structure.
	if ( is_active_sidebar('webinars') ) {
		$class_webinar = 'webinar';
	} else {
		$class_webinar = '';
	}
} else {
	$is_webinar = false;
}

get_header(); ?>

	<div id="primary" class="content-area <?php echo $class_webinar; ?>">
		<main id="main" class="site-main">

		<?php if (	$is_webinar ) { ?>
		<div class="post-block-1">
		<?php } ?>

		<?php

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-parts/content', $custom_type );


		?>

		<?php if (	$is_webinar ) { ?>
		</div><!-- // .post-block-1 -->
		<?php } ?>

		<?php if (	$is_webinar ) { ?>
		<div class="post-block-2">
		<?php } ?>

			<?php dynamic_sidebar('webinars'); ?>

		<?php if (	$is_webinar ) { ?>
		</div><!-- // .post-block-2 -->
		<?php } ?>

		<?php	endwhile; // End of the loop. ?>

		<?php if ( ! $class_webinar ) {
		 btalk_post_navigation( array( 'icons' => true ) );

			if ( comments_open() || get_comments_number() ) :
			comments_template();
		 endif;
			} ?>

		</main><!-- #main -->

		<?php if ( $class_webinar ) {
		 btalk_post_navigation( array( 'icons' => true ) );

			if ( comments_open() || get_comments_number() ) :
			comments_template();
		 endif;
		} ?>

	</div><!-- #primary -->

<?php
// only if this isn't a webinar
if ( ! $is_webinar) {
	get_sidebar('posts');
}

get_footer();
