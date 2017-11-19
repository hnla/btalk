<?php
/**
	* Hooks, filters & general WP site functions
	*
	* @package btalk-testering
	*/

/**
	* Add a pingback url auto-discovery header for singularly identifiable articles.
	*/
function btalk_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'btalk_pingback_header' );


/**
* Filter the default excerpt length for post loops
*
* @since 0.1.0
*
* @todo Add some checking for  page types & various excerpt lengths.
*/
function btalk_post_excerpt_length( $length ) {

	$length = 20;

	return $length;
}
add_filter( 'excerpt_length', 'btalk_post_excerpt_length' );


/**
* Return the post navigation for the haeder region.
*
* @since 0.1.0
*
* @return string
*/
function btalk_post_navigation( $args = array() ) {

	echo btalk_get_post_navi( $args );

	return;
}

/**
* The post navi with custom args - this is a copy
* of the WP 'get_the_post_navigation'
*
* @since 0.1.0
*
*/
function btalk_get_post_navi( $args ) {

	$args = wp_parse_args( $args, array(
		'prev_text'          => '%title',
		'next_text'          => '%title',
		'icons'              => false,
		'in_same_term'       => false,
		'excluded_terms'     => '',
		'taxonomy'           => 'category',
		'screen_reader_text' => __( 'Post navigation' ),
	) );

	$navigation = '';

	$icon_left  = '';
	$icon_right = '';
	if ( true === $args['icons'] ) {
		$icon_left  = '<span class="fa fa-angle-double-left"  aria-hidden="true"></span>';
		$icon_right = '<span class="fa fa-angle-double-right" aria-hidden="true"></span>';
	}

	$previous = get_previous_post_link(
		'<div class="nav-previous">' . $icon_left . ' %link</div>',
		$args['prev_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	$next = get_next_post_link(
		'<div class="nav-next">%link ' . $icon_right . '</div>',
		$args['next_text'],
		$args['in_same_term'],
		$args['excluded_terms'],
		$args['taxonomy']
	);

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
					$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
	}

				return $navigation;
}

/**
* Single instance of the comments loop for posts/pages
* Can be used to show comments seperate from the reply form.
*
* @since 0.1.0
*/
function btalk_comments() {
	?>
	<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( ! have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'btalk' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'btalk' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'btalk' ); ?></p>
		<?php
		endif;

 else : ?>

 <p class="no-comments"><?php _e('There are no comments to display.', 'btalk'); ?></p>

	<?php endif; // Check for have_comments().

	return;
}
