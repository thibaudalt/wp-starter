<button class="btn btn-offcanvas hidden-md-up" data-toggle="offcanvas" data-target="#offcanvas">
  <span class="hamburger"></span>
</button>

<div id="offcanvas" class="offcanvas">

  <button class="btn btn-close" data-toggle="offcanvas" data-target="#offcanvas">
    <span class="cross"></span>
  </button>

  <?php
    wp_nav_menu(array(
      'theme_location'  => 'main',
      'menu_id'         => 'offcanvas-menu',
      'menu_class'      => 'offcanvas-menu',
    ));
  ?>

  <hr>

  <?php get_languages() ?>

</div><!-- /#offcanvas -->
