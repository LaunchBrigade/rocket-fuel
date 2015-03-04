<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1 class="show-for-mobile"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#">Menu <i class="icon-menu"></i></a></li>
  </ul>

  <section class="top-bar-section">
    <?php rfuel_get_navbar_menu(); ?>
  </section>
</nav>
