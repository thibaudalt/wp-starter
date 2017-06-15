<?php get_header() ?>

  <div class="main">

    <?php while ( have_posts() ): the_post() ?>

      <div <?php post_class() ?>>

        <?php ws_get_acf( 'layouts' ) ?>

        <div class="container">

          <div class="page-header">
            <?php get_template_part( 'blocks/edit-buttons' ) ?>
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

      </div><!-- .page -->

    <?php endwhile; ?>

  </div><!-- .main -->

<?php get_footer() ?>
