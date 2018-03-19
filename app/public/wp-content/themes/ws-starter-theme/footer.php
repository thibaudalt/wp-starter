<footer class="footer py-2 bg-dark">
  <div class="container">

    <?php get_socials_networks() ?>

    <div class="credits float-md-right">
      <small>&copy <?php echo bloginfo('name').' '.date('Y') ?> | <?php _e( 'Developed by', 'ws-starter' ) ?>
        <a href="https://we-studio.ch/" target="_blank">We studio</a>
      </small>
    </div><!-- /.credits -->

  </div><!-- /.container -->
</footer><!-- /.footer -->

<?php wp_footer(); ?>

</body>
</html>
