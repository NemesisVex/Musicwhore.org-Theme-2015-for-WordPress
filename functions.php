<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 3:11 PM
 *
 * @since Musicwhore 2014 1.0
 */

class Musicwhore2015_Theme {

	public static function get_cdn_uri() {
		return VIGILANTMEDIA_CDN_BASE_URI;
	}

	public static function posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			$sticky = translate( 'Sticky', 'musicwhore2015' );
			echo <<< POSTED_ON
<li><span class="glyphicon glyphicon-star"></span> $sticky</li>
POSTED_ON;
		}

		// Set up and print post meta information.
		printf( '
<li>
	<span class="glyphicon glyphicon-calendar"></span>
	<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a>
</li>
<li>
	<span class="glyphicon glyphicon-user"></span>
	<a href="%4$s" rel="author">%5$s</a>
</li>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	public static function post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}

		?>
		<nav role="navigation">
			<h4 class="sr-only"><?php _e( 'Post navigation', 'musicwhore2014' ); ?></h4>
			<ul class="pager">
				<?php if ( is_attachment() ) : ?>
					<li><?php previous_post_link( '%link', __( 'Published In %title', 'musicwhore2015' ) ); ?></li>
				<?php else : ?>
					<li><?php previous_post_link( '%link', __( '<span title="Previous Post: %title">Previous</span>', 'musicwhore2015' ) ); ?></li>
					<li><?php next_post_link( '%link', __( '<span title="Next Post: %title">Next</span>', 'musicwhore2015' ) ); ?></li>
				<?php endif; ?>
			</ul>
		</nav><!-- .navigation -->
	<?php
	}
}

add_filter( 'wp_page_menu_args', function ( $args ) {
	$args['show_home'] = false;
	$args['container'] = false;
	$args['menu_class'] = 'nav navbar-nav';
	return $args;
} );

add_filter( 'wp_title', function ( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'musicwhore2015' ), max( $paged, $page ) );
	}

	return $title;
}, 10, 2 );

add_action( 'after_setup_theme', function () {
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


} );

add_action( 'widgets_init', function () {
//	require get_template_directory() . '/inc/widgets.php';
//	register_widget( 'Musicwhore2014_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'musicwhore2015' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'musicwhore2015' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'musicwhore2015' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'musicwhore2015' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'musicwhore2015' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'musicwhore2015' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'musicwhore2014-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

} );
