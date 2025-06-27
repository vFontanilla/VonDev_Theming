<?php 
/**
 * Footer template.
 * 
 * @package CustomTheme
 */

 ?>

 <style>
    .site-footer {
        background: #3D405B;
        color: white;
        padding-top: 64px;
        padding-bottom: 32px;
    }
 </style>

<div id="pagefooter" class="site bg-light shadow-sm">
    <footer id="mastfoot" class="site-footer" role="banner">
        <?php get_template_part( 'template-parts/footer/sitefooter' ) ?>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>