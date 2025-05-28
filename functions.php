<?php 
/**
 * Theme Functions
 * 
 * @package CustomTheme
 */

use CUSTOMTHEME\Inc\CUSTOMTHEME;

 // Define directory path constant
if ( ! defined( 'CUSTOMTHEME_DIR_PATH' ) ) {
	define( 'CUSTOMTHEME_DIR_PATH', untrailingslashit( get_template_directory() ) );
} 

if ( ! defined( 'CUSTOMTHEME_DIR_URI' ) ) {
    define( 'CUSTOMTHEME_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

// Require the autoloader
require_once CUSTOMTHEME_DIR_PATH . '/inc/helpers/autoloader.php';

function customtheme_get_theme_instance () {
    \CUSTOMTHEME\Inc\CUSTOMTHEME::get_instance();
}

customtheme_get_theme_instance();

function customtheme_enqueue_scripts() {

    
}
add_action('wp_enqueue_scripts', 'customtheme_enqueue_scripts');
?>

