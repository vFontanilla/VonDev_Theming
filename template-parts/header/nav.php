<?php
/**
 * Header Navigation Template (Mobile Overlay Fix)
 * @package CustomTheme
 */

$menu_class = \CUSTOMTHEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('customtheme-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);
?>

<style>
  /* Desktop Search */
  .search-container {
    width: 0;
    overflow: hidden;
    transition: width 0.3s ease;
  }

  .search-container.active {
    width: 250px;
  }

  .search-input {
    width: 100%;
    font-size: 0.9rem;
  }

  /* Mobile Search */
  #mobileSearchBar {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: white;
    z-index: 999;
    padding: 0.75rem 1rem;
    border-top: 1px solid #ddd;
  }

  #mobileSearchBar.active {
    display: block;
  }

  @media (min-width: 992px) {
    #mobileSearchBar {
      display: none !important;
    }
  }

  /* Mobile Navbar Overlay */
  @media (max-width: 991.98px) {
    .navbar-collapse {
      position: absolute;
      top: 100%;
	  left: 0;
      width: 100%;
      background: #F8F9FA;
      /* background: red; */
      z-index: 999;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
	  justify-content: center;
	  text-align: center;
    }
  }
</style>

<div class="container position-relative">
  <nav class="navbar navbar-expand-lg navbar-light position-relative">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <!-- Logo -->
      <div class="d-flex align-items-center">
        <?php
        if (function_exists('the_custom_logo') && has_custom_logo()) {
          the_custom_logo();
        } else {
          ?>
          <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
          </a>
        <?php } ?>
      </div>

      <!-- Mobile Icons -->
      <div class="d-flex d-lg-none align-items-center">
        <!-- Search -->
        <button id="searchToggle" class="btn btn-link me-2">
          <i class="bi bi-search"></i>
        </button>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <!-- Desktop Content -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
        <ul class="navbar-nav mb-2 mb-lg-0" id="navMenu">
          <?php
          if (!empty($header_menus) && is_array($header_menus)) {
            foreach ($header_menus as $menu_item) {
              $active = (get_permalink() == $menu_item->url) ? 'active' : '';
              echo '<li class="nav-item">
                      <a class="nav-link ' . $active . '" href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a>
                    </li>';
            }
          }
          ?>
        </ul>
      </div>

      <!-- Desktop Search -->
      <div class="d-none d-lg-flex align-items-center ms-auto gap-2">
        <div id="desktopSearch" class="search-container">
          <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" class="form-control form-control-sm search-input" placeholder="Search..." name="s" />
          </form>
        </div>
        <button id="searchToggleDesktop" class="btn btn-outline-secondary">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Search Bar -->
  <div id="mobileSearchBar" class="d-lg-none">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <div class="input-group">
        <input type="search" class="form-control" placeholder="Search..." name="s" required />
        <button class="btn btn-primary" type="submit">Go</button>
      </div>
    </form>
  </div>
</div>

<script>
  const searchToggleDesktop = document.getElementById('searchToggleDesktop');
  const desktopSearch = document.getElementById('desktopSearch');
  const searchToggle = document.getElementById('searchToggle');
  const mobileSearchBar = document.getElementById('mobileSearchBar');

  // Toggle desktop search bar
  searchToggleDesktop?.addEventListener('click', () => {
    desktopSearch.classList.toggle('active');
  });

  // Toggle mobile search bar
  searchToggle?.addEventListener('click', () => {
    mobileSearchBar.classList.toggle('active');
  });
</script>
