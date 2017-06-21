<button class="btn btn-offcanvas hidden-md-up" data-toggle="offcanvas" data-target="#offcanvas">
  <i class="fa fa-bars" aria-hidden="true"></i>
</button>

<div id="offcanvas" class="offcanvas">

  <button class="btn btn-close" data-toggle="offcanvas" data-target="#offcanvas">
    <i class="fa fa-times" aria-hidden="true"></i>
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
