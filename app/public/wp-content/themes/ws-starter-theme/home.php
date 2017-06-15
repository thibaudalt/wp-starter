<?php get_header(); ?>

  <div class="main">

    <div class="page home">
      <div class="container">

        <div class="page-header">
          <h1 class="page-title"><?php wb_title(); ?></h1>
        </div><!-- .page-header -->

        <div class="row">

          <div class="col-sm-9">

            <div class="page-body">

              <?php if ( have_posts() ) :
                      while ( have_posts() ) : the_post();
                        ws_get_block( 'loop' );
                      endwhile;
                    else: ?>

                <div class="alert alert-info">
                  <p><?php _e( 'New articles will be available soon...', 'ws-starter' ); ?></p>
                </div>

              <?php endif; ?>

            </div><!-- .page-body -->

            <div class="page-footer">
              <?php wb_pagination(); ?>
            </div><!-- .page-footer -->

          </div>

          <div class="col-sm-3">
            <?php get_sidebar(); ?>
          </div>

        </div><!-- .row -->

      </div><!-- .container -->
    </div><!-- .home -->

  </div><!-- .main -->

<?php get_footer(); ?>
