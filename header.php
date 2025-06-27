    <?php 
    /*
     * Header template.
     * 
     * @package CustomTheme
    */

?>

<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('hello-class'); ?>>

<?php 
if (function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<style>
    .site-header {
        background: #FFFFFF;
    }
</style>

<div id="page" class="site bg-light shadow-sm">
    <header id="masthead" class="site-header" role="banner">
        <?php get_template_part( 'template-parts/header/nav' ) ?>
    </header>
</div>


    

