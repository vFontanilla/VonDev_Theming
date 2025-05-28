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

        //load classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
    }
 }