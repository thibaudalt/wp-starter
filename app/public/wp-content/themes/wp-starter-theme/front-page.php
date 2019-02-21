<?php get_header() ?>

  <div class="main">

    <?php while ( have_posts() ): the_post() ?>

      <div <?php post_class( 'front-page' ) ?>>

        <?php get_carousel() ?>

        <div class="container">

          <?php get_acf_layouts() ?>

          <div class="page-header">
            <?php get_edit_button() ?>
            <h1 class="page-title"><?php the_title() ?></h1>
          </div><!-- .page-header -->

          <div class="page-body">
            <div class="content">
              <?php the_content() ?>
            </div>
          </div><!-- .page-body -->

          <div class="page-footer">

          </div><!-- .page-footer -->

        </div><!-- .container -->

      </div><!-- .front-page -->

    <?php endwhile; ?>

  </div><!-- .main -->

<?php get_footer() ?>
