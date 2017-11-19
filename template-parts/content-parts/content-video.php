<?php
/**
* content template for webinars
*
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

	<h2 class="entry-title"><?php	the_title(); ?></h2>

	<?php	if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php btalk_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if ( is_singular() ) {

		 the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'btalk' ),
				'after'  => '</div>',
			) );

		} else {
			the_excerpt();
		} ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php btalk_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
