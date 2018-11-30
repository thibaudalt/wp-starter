<?php get_header() ?>

    <div class="main">

      <div class="container">

        <div class="page 404">

          <div class="page-header">
            <h1 class="page-title">404 - <?php _e( 'Page not found', 'ws-starter' ); ?></h1>
          </div><!-- .page-header -->

          <div class="page-body">
            <p><?php _e( 'It seems than what you\'re looking for is no longer here.', 'ws-starter' ); ?></p>
            <a href="<?php echo home_url() ?>" title="<?php _e( 'Back to homepage', 'ws-starter' ); ?>" rel="home"><?php _e( 'Back to the homepage', 'ws-starter' ); ?></a>
          </div><!-- .page-body -->

        </div><!-- .page -->

      </div><!-- .container -->

    </div><!-- .main -->

<?php get_footer() ?>
