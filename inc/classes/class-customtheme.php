<?php

/**
 * Bootstrap the theme.
 *
 * @package CustomTheme
 */

 namespace CUSTOMTHEME\Inc;

use CUSTOMTHEME\Inc\Traits\Singleton;

class CUSTOMTHEME {
    use Singleton;

    protected function __construct() {

        //Load classes

        Menus::get_instance();

        Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */

        add_action('wp_enqueue_scripts', [ $this, 'register_styles' ] );
        add_action('wp_enqueue_scripts', [ $this, 'register_scripts' ] );
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'header-text'   => [ 'site-title', 'site-description' ],
            'height'        => 100,
            'width'         => 400,
            'flex-height'   => true,
            'flex-width'    => true,
        ] );

        add_theme_support( 'custom-background', [ 
            'default-color' => '#fff',
            'default-image' => '',
         ] );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'script',
            'style',
        ] );

        add_editor_style();
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'responsive-embeds' );

        global $content_width;
        if ( ! isset( $content_width )) {
            $content_width = 1240;
        }
    }

    public function register_styles() {
        //Register Styles
        wp_register_style( 'main-stylesheet', get_stylesheet_uri(), [], filemtime( CUSTOMTHEME_DIR_PATH . '/style.css'), 'all' );
        wp_register_style( 'bootstrap-css', CUSTOMTHEME_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

        //Enqueue Styles
        wp_enqueue_style( 'main-stylesheet' );
        wp_enqueue_style( 'bootstrap-css' );
    }

    public function register_scripts() {
        //Register Scripts
        wp_register_script( 'main-js', CUSTOMTHEME_DIR_URI . '/assets/main.js', [], filemtime( CUSTOMTHEME_DIR_PATH . '/assets/main.js'), true );
        wp_register_script( 'bootstrap-js', CUSTOMTHEME_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );
    
        //Enqueue Scripts
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );
    }
}