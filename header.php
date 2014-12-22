<?php
/**
 * Created by PhpStorm.
 * User: gbueno
 * Date: 10/14/2014
 * Time: 12:15 PM
 *
 * @package WordPress
 * @subpackage Musicwhore 2015
 * @since Musicwhore 2014 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="google-site-verification" content="RiLd9aJ5wvjS2zUZ5GhRrYB3ZbSBtq1QqdFTG1uFWVA" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>

	<div id="page" class="container">
		<header id="masthead" class="site-header" role="banner">
			<div class="header-main">
				<div class="hidden-xs">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php $description = get_bloginfo( 'description', 'display' ); ?>
						<?php if ( ! empty ( $description ) ) : ?><small class="site-description"><?php echo esc_html( $description ); ?></small><?php endif; ?>
					</h1>
				</div>

				<nav id="primary-navigation" class="navbar navbar-inverse" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-nav"><?php /*_e( 'Primary Menu', 'musicwhore2014' );*/ ?>
								<a class="sr-only" href="#content"><?php _e( 'Skip to content', 'musicwhore2015' ); ?></a>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="visible-xs">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
							</div>
						</div>
						<div class="collapse navbar-collapse" id="bs-nav">
							<?php $nav_menu_args = array( 'theme_location' => 'primary' ); ?>
							<?php if ( function_exists( 'bootstrap_page_menu' ) ) { $nav_menu_args[ 'fallback_cb' ] = 'bootstrap_page_menu'; } ?>
							<?php wp_nav_menu( $nav_menu_args ); ?>
							<?php get_search_form(); ?>
							<ul class="nav navbar-nav">
								<li>
									<ul class="nav-icon-list">
										<li><a href="http://twitter.com/MusicwhoreOrg/" title="[Twitter]"><img src="<?php echo Musicwhore2015_Template_Tags::get_cdn_uri(); ?>/web/images/icons/twitter.png" alt="[Twitter]" /></a></li>
										<li><a href="https://www.facebook.com/pages/Musicwhoreorg/109288145780351" title="[Facebook]"><img src="<?php echo Musicwhore2015_Template_Tags::get_cdn_uri(); ?>/web/images/icons/facebook.png" alt="[Facebook]" /></a></li>
										<li><a href="http://last.fm/user/NemesisVex/" title="[Last.fm]"><img src="<?php echo Musicwhore2015_Template_Tags::get_cdn_uri(); ?>/web/images/icons/lastfm.png" alt="[Last.fm]" /></a></li>
										<li><a href="<?php bloginfo( 'siteurl' ); ?>/feed/" title="[Musicwhore.org Feed]"><img src="<?php echo Musicwhore2015_Template_Tags::get_cdn_uri(); ?>/web/images/icons/feed.png" alt="[Feed]" /></a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>

			<div class="search-box">
			</div>
		</header><!-- #masthead -->

		<div class="row">
