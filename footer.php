<?php
/**
 * Created by PhpStorm.
 * User: gbueno
 * Date: 10/14/2014
 * Time: 12:21 PM
 *
 * @package WordPress
 * @subpackage Musicwhore 2015
 * @since Musicwhore 2014 1.0
 */
?>
			</div>

			<footer class="col-md-12" role="contentinfo">

				<?php get_sidebar( 'footer' ); ?>

				<div class="site-info">
					<?php do_action( 'musicwhore2015_credits' ); ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'musicwhore2015' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'musicwhore2015' ), 'WordPress' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div>

	<?php wp_footer(); ?>
	</body>
</html>