<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 10:09 PM
 *
 * @package WordPress
 * @subpackage Musicwhore 2015
 * @since Musicwhore 2014 1.0
 */
?>
<?php get_header(); ?>

	<div class="col-md-8">

			<header>
				<h2><?php _e( 'Not Found', 'musicwhore2015' ); ?></h2>
			</header>

			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'musicwhore2015' ); ?></p>

			<?php get_search_form(); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer();