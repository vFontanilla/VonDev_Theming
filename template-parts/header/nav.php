<?php
/**
 * Header Navigation Template (Refactored with Toggle Search Input)
 * 
 * @package CustomTheme
 */

$menu_class = \CUSTOMTHEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'customtheme-header-menu' );
$header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<div class="container-fluid border-bottom py-2">
	<div class="d-flex align-items-center justify-content-between">
		<!-- Logo -->
		<div class="fw-bold fs-4">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-decoration-none text-dark">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>

		<!-- Navigation Menu -->
		<div class="flex-grow-1 text-center">
			<?php
				wp_nav_menu([
					'theme_location' => 'customtheme-header-menu',
					'menu_class' => 'nav justify-content-center gap-3',
					'container' => false,
				]);
			?>
		</div>

		<!-- Search Button -->
		<div>
			<form role="search" method="get" class="d-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="form-control me-2" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
				<button class="btn btn-primary" type="submit">Search</button>
			</form>
		</div>
	</div>
</div>
