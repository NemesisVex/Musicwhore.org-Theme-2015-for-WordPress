<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 6:47 PM
 *
 * @package WordPress
 * @subpackage Musicwhore 2015
 * @since Musicwhore 2014 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) :
	return;
endif;
?>

<?php if ( have_comments() ) : ?>

	<h3>Comments</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav role="navigation">
		<h4 class="sr-only"><?php _e( 'Comment navigation', 'musicwhore2015' ); ?></h4>

		<ul class="pager">
			<li><?php previous_comments_link( __( '&larr; Older Comments', 'musicwhore2015' ) ); ?></li>
			<li><?php next_comments_link( __( 'Newer Comments &rarr;', 'musicwhore2015' ) ); ?></li>
		</ul>

	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'      => 'ol',
			'short_ping' => true,
			'avatar_size'=> 34,
		) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav role="navigation">
			<h4 class="sr-only"><?php _e( 'Comment navigation', 'musicwhore2015' ); ?></h4>

			<ul class="pager">
				<li><?php previous_comments_link( __( '&larr; Older Comments', 'musicwhore2015' ) ); ?></li>
				<li><?php next_comments_link( __( 'Newer Comments &rarr;', 'musicwhore2015' ) ); ?></li>
			</ul>


		</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
		<p><?php _e( 'Comments are closed.', 'musicwhore2015' ); ?></p>
	<?php endif; ?>

<?php endif; ?>

<?php
	$comment_args = array(
		'fields' => apply_filters('comment_form_default_fields', array(
			'author' => '<div class="form-group"><label for="author" class="col-md-2 control-label">' . __( 'Name', 'musicwhore2015' ) . ' <span class="required">*</span></label> ' . ( $req ? '<div class="col-md-6">' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" class="form-control" ' . $aria_req . ' /></div></div>',
			'email' => '<div class="form-group"><label for="email" class="col-md-2 control-label">' . __( 'Email', 'musicwhore2015' ) . ' <span class="required">*</span></label> ' . ( $req ? '<div class="col-md-6">' : '' ) . '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" class="form-control" ' . $aria_req . ' /></div></div>',
			'url' => '<div class="form-group"><label for="url" class="col-md-2 control-label">' . __( 'Website', 'musicwhore2015' ) . '</label>' . '<div class="col-md-6"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" class="form-control" /></div></div>',
		)),
		'comment_field' => '<div class="form-group"><label for="comment" class="col-sm-2 control-label">' . _x( 'Comment', 'noun' ) . '</label><div class="col-md-6"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea></div></div>',
		'comment_notes_after' => '<p>' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), allowed_tags() ) . '</p>',
		'class_form' => 'form-horizontal',
		'class_submit' => 'btn btn-default',
	);
	(function_exists( 'bootstrap_comment_form' ) === true ) ? bootstrap_comment_form($comment_args) : comment_form($comment_args);
