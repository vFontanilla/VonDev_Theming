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
}