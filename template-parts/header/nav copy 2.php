<?php
/**
 * Header Navigation Template
 * 
 * @package CustomTheme
 */

$menu_class = \CUSTOMTHEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'customtheme-header-menu' );
$header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<style>
@media (max-width: 360px) {
	.navbar .site-logo a,
	.navbar .site-logo img {
		font-size: 0.9rem;
		max-width: 160px;
	}
	.navbar-toggler span {
		font-size: 0.9rem;
	}
	.header-wrapper .d-flex.flex-column {
		transition: all 0.3s ease-in-out;
	}
}
.offcanvas-backdrop.show {
	opacity: 0.75;
}
@media (min-width: 992px) {
	.navbar-nav .dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0;
	}
	.navbar-nav .dropdown-toggle::after {
		transition: transform 0.2s ease;
	}
	.navbar-nav .dropdown:hover .dropdown-toggle::after {
		transform: rotate(180deg);
	}
	.navbar-nav.d-flex.flex-row > .nav-item:not(:last-child) {
		margin-right: 1rem;
	}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const links = document.querySelectorAll('#mobileOffcanvasMenu .nav-link');
	const offcanvasEl = document.getElementById('mobileOffcanvasMenu');
	const bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);
	links.forEach(link => {
		link.addEventListener('click', () => {
			bsOffcanvas.hide();
		});
	});
});
</script>

<div class="header-wrapper bg-light py-4 position-relative">
	<div class="container">
		<nav class="navbar navbar-light p-0 position-relative w-100 d-flex justify-content-between align-items-center flex-wrap">

			<!-- Logo -->
			<div class="site-logo mb-2 mb-lg-0">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a>
					<?php
				}
				?>
			</div>

			<!-- Desktop Menu -->
			<?php if ( ! empty( $header_menus ) && is_array( $header_menus ) ) : ?>
				<div class="d-none d-lg-block">
					<ul class="navbar-nav d-flex flex-row align-items-center">
						<?php foreach ( $header_menus as $menu_item ) :
							if ( ! $menu_item->menu_item_parent ) :
								$child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
								$has_children     = ! empty( $child_menu_items );
								$link_target      = ( '_blank' === $menu_item->target ) ? '_blank' : '_self';
								if ( ! $has_children ) : ?>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $menu_item->title ); ?>
										</a>
									</li>
								<?php else : ?>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="desktop-dropdown-<?php echo esc_attr( $menu_item->ID ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $menu_item->title ); ?>
										</a>
										<ul class="dropdown-menu" aria-labelledby="desktop-dropdown-<?php echo esc_attr( $menu_item->ID ); ?>">
											<?php foreach ( $child_menu_items as $child_menu_item ) :
												$link_target = ( '_blank' === $child_menu_item->target ) ? '_blank' : '_self'; ?>
												<li>
													<a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
														<?php echo esc_html( $child_menu_item->title ); ?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<!-- Offcanvas Toggler (mobile only) -->
			<button class="navbar-toggler d-lg-none d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileOffcanvasMenu" aria-controls="mobileOffcanvasMenu">
				<span class="navbar-toggler-icon"></span>
				<span class="d-none d-sm-inline">Menu</span>
			</button>

		</nav>
	</div>
</div>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="mobileOffcanvasMenu" aria-labelledby="mobileOffcanvasLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="mobileOffcanvasLabel">Menu</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<?php if ( ! empty( $header_menus ) && is_array( $header_menus ) ) : ?>
			<ul class="navbar-nav">
				<?php foreach ( $header_menus as $menu_item ) :
					if ( ! $menu_item->menu_item_parent ) :
						$child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
						$has_children     = ! empty( $child_menu_items );
						$link_target      = ( '_blank' === $menu_item->target ) ? '_blank' : '_self';
						if ( ! $has_children ) : ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $menu_item->title ); ?>
								</a>
							</li>
						<?php else : ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="dropdown-<?php echo esc_attr( $menu_item->ID ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false" target="<?php echo esc_attr( $link_target ); ?>">
									<?php echo esc_html( $menu_item->title ); ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropdown-<?php echo esc_attr( $menu_item->ID ); ?>">
									<?php foreach ( $child_menu_items as $child_menu_item ) :
										$link_target = ( '_blank' === $child_menu_item->target ) ? '_blank' : '_self'; ?>
										<li>
											<a class="dropdown-item" href="<?php echo esc_url( $child_menu_item->url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<?php echo esc_html( $child_menu_item->title ); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
