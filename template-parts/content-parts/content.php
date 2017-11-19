<?php
/**
 * Template part for displaying posts
 *
 * @package btalk-testering
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>

		<?php if( is_category() || is_archive() || is_tag() || is_home() || is_search() || is_author() ) : ?>
			<div class="featured-image"><?php the_post_thumbnail( 'lists-featured-thumb' ); ?></div>
		<?php endif; ?>

	<?php } ?>

	<header class="entry-header">

		<?php	if ( ! is_singular() ) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php btalk_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if( is_category() || is_archive() || is_tag() || is_home()  || is_search() || is_author() ) :

		the_excerpt();

		else:

			the_content( sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'btalk' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'btalk' ),
				'after'  => '</div>',
			) );

	 endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php btalk_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

