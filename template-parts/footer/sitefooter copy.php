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
        padding: 16px;
    }   
</style>

<div class="container container-section">
    <div class="container-fluid d-flex align-items-left justify-content-between gap-5">
        <div class="flex-fill flex-sm-grow-0 col-12 col-sm-6 col-md-3">
            <div class="d-flex justify-content-left align-items-left">
                <!-- Content 1 -->
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
            <div class="mt-4">
                <p>
                    Bringing culinary excellence to home kitchens through inspiring recipes, expert tips, and a passionate food community.
                </p>
            </div>
            <div class="d-flex justify-content-start align-items-center gap-2 mt-4">
                <a href="https://facebook.com" target="_blank" class="text-dark">
                    <i class="bi bi-facebook fs-4"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-dark">
                    <i class="bi bi-twitter-x fs-4"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="text-dark">
                    <i class="bi bi-instagram fs-4"></i>
                </a>
                <a href="https://youtube.com" target="_blank" class="text-dark">
                    <i class="bi bi-youtube fs-4"></i>
                </a>
            </div>
        </div>
        <div class="flex-fill flex-sm-grow-0 col-12 col-sm-6 col-md-3">
            <div class="d-flex justify-content-left align-items-left">
                <h4>Recipes</h4>
            </div>
        </div>
        <div class="flex-fill flex-sm-grow-0 col-12 col-sm-6 col-md-3">
            <div class="d-flex justify-content-left align-items-left">
                <h4>Learn</h4>
            </div>
        </div>
        <div class="flex-fill flex-sm-grow-0 col-12 col-sm-6 col-md-3">
            <div class="d-flex justify-content-left align-items-left">
                <h4>Company</h4>
            </div>
        </div>
    </div>
</div>

