<?php

/**
 * Enqueue theme assets
 * 
 * @package CustomTheme
 */

namespace CUSTOMTHEME\Inc;

use CUSTOMTHEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
    }

    public function register_styles() {
        wp_register_style( 'main-stylesheet', get_stylesheet_uri(), [], filemtime( CUSTOMTHEME_DIR_PATH . '/style.css' ), 'all' );
        wp_register_style( 'bootstrap-css', CUSTOMTHEME_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

        wp_enqueue_style( 'main-stylesheet' );
        wp_enqueue_style( 'bootstrap-css' );
    }

    public function register_scripts() {
        wp_register_script( 'main-js', CUSTOMTHEME_DIR_URI . '/assets/main.js', [], filemtime( CUSTOMTHEME_DIR_PATH . '/assets/main.js' ), true );
        wp_register_script( 'bootstrap-js', CUSTOMTHEME_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );
    }
}
