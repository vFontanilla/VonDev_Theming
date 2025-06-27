<?php
/**
 * Footer Navigation Template
 * @package CustomTheme
 */


?>

<style>
    .container-section {
        max-width: 1200px;
        margin: auto;
        padding-left: 16px;
        padding-right: 16px;
    }
    .footer-content {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 3rem;
        margin-bottom: 48px;
    }
</style>

<div class="container container-section">
    <div class="footer-content">
        <div class="footer-section">
            <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
                } else {
                ?>
                <h3>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h3>
            <?php } ?>
        </div>
        <div class="footer-section">
            2
        </div>
        <div class="footer-section">
            3
        </div>
        <div class="footer-section">
            4
        </div>
    </div>
</div>

