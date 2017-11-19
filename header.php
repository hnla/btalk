<?php
/**
 * The header for Btalk Testering
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 *
 * @package btalk-testering
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="site-wrap">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bp-progenitor' ); ?></a>

		<div id="page" class="site">

			<div class="top-bar">

				<div class="site-logo">

					<?php if( btalk_get_custom_logo()  ) {

						btalk_custom_logo();

					} else {

						if( ! is_front_page() ) { ?>

							<a href="<?php echo home_url( '/'); ?>" class="home-link">
								<img src="<?php echo esc_url_raw( default_custom_logo() ); ?>" alt="" />
							</a>

					<?php	} else { ?>

							<img src="<?php echo esc_url_raw( default_custom_logo() ) ; ?>" width="" height="" alt="" />

					<?php }

					} ?>
				</div>

				<nav id="site-navigation" class="main-navigation site-navs primary-color">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav><!-- #site-navigation -->

			</div>

			<header id="masthead" class="site-header">

				<?php if( has_header_image() ) : ?>
				<div class="header-background">
				<?php endif; ?>

				<?php if ( is_page_template( 'templates/page-channel-list.php' ) ) { ?>

					<div class="site-branding">
						<p class="page-title"><?php echo get_the_title( $post ); ?></p>
					</div>

				<?php } else { ?>
					<div class="site-branding">

						<?php

							if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; ?></p>
							<?php endif; ?>


					</div><!-- //site-branding -->

					<?php } ?>

				<?php if( has_header_image() ) : ?>
				</div><!-- // .header-background -->
				<?php endif; ?>

			</header><!-- #masthead -->

			<div id="content" class="site-content">
