<?php get_header() ?>

  <div class="main">

    <?php while ( have_posts() ): the_post() ?>

      <div <?php post_class() ?>>

        <?php ws_get_acf( 'layouts' ) ?>

        <div class="container">

          <div class="post-header mt-3">
            <?php get_template_part( 'blocks/edit-buttons' ) ?>
            <h1 class="post-title"><?php the_title() ?></h1>
          </div><!-- .post-header -->

          <div class="post-body">
            <div class="content">
              <?php the_content() ?>
            </div>
          </div><!-- .post-body -->

          <div class="post-footer">
            <?php wb_pager() ?>
          </div><!-- .post-footer -->

        </div><!-- .container -->

      </div><!-- .post -->

    <?php endwhile; ?>

  </div><!-- .main -->

<?php get_footer() ?>
