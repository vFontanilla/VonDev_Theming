<?php
/**
 * Header Navigation Template
 * 
 * 
 * @package CustomTheme
 */

$menu_class = \CUSTOMTHEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'customtheme-header-menu' );
$header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<div class="header-wrapper">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<!-- Logo -->
			<div class="site-logo">
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

			<!-- Mobile Toggler with inline label -->
			<button class="navbar-toggler " type="button"
			        data-bs-toggle="collapse"
			        data-bs-target="#navbarSupportedContent"
			        aria-controls="navbarSupportedContent"
			        aria-expanded="false"
			        aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Menu -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
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
										<a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" id="navbarDropdown-<?php echo esc_attr( $menu_item->ID ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false" target="<?php echo esc_attr( $link_target ); ?>">
											<?php echo esc_html( $menu_item->title ); ?>
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown-<?php echo esc_attr( $menu_item->ID ); ?>">
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
		</nav>
	</div>
</div>
