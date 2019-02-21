<?php get_header() ?>

  <div class="main">

    <div class="page archive">
      <div class="container">

        <div class="page-header">
          <h1 class="page-title"><?php get_the_title() ?></h1>
        </div><!-- .page-header -->

        <div class="row">

          <div class="col-sm-9">

            <div class="page-body">

              <?php if ( have_posts() ) :
                      while ( have_posts() ) : the_post();
                        get_article();
                      endwhile;
                    else: ?>

                <div class="alert alert-info">
                  <p><?php _e( 'New articles will be available soon...', 'wp-starter' ); ?></p>
                </div>

              <?php endif; ?>

            </div><!-- .page-body -->

            <div class="page-footer">

            </div><!-- .page-footer -->

          </div>

          <?php get_sidebar() ?>

        </div><!-- .row -->

      </div><!-- .container -->
    </div><!-- .home -->

  </div><!-- .main -->

<?php get_footer() ?>
