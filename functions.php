<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 3:11 PM
 *
 * @since Musicwhore 2014 1.0
 */

require get_template_directory() . '/lib/Musicwhore2015_Filters.php';
require get_template_directory() . '/lib/Musicwhore2015_Template_Tags.php';

add_filter( 'wp_page_menu_args', array( 'Musicwhore2015_Filters', 'wp_page_menu_args' ) );

add_filter( 'wp_title', array( 'Musicwhore2015_Filters', 'wp_title' ), 10, 2 );

add_action( 'after_setup_theme', array( 'Musicwhore2015_Filters', 'after_setup_theme' ) );

add_action( 'widgets_init', array( 'Musicwhore2015_Filters', 'widgets_init' ) );

add_action( 'wp_enqueue_scripts', array( 'Musicwhore2015_Filters', 'wp_enqueue_scripts' ) );

add_action( 'mt_id_mapper_pattern_setup', array( 'Musicwhore2015_Filters', 'register_mt_id_patterns' ) );
