<?php
/**
 * Created by PhpStorm.
 * User: gbueno
 * Date: 10/14/2014
 * Time: 10:35 AM
 *
 * @package WordPress
 * @subpackage Musicwhore2015
 * @since Musicwhore 2014 1.0
 */

namespace VigilantMedia\WordPress\Themes\Musicwhore2015;

?>
<?php get_header(); ?>

<div class="col-md-8">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : // Start the Loop. ?>
		<?php the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	<?php TemplateTags::paging_nav(); ?>
<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer();
