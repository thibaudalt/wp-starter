<footer class="footer navbar navbar-toggleable-md navbar-light bg-faded">
  <div class="container">

    <div class="collapse navbar-collapse">

      <?php get_socials_networks() ?>

      <nav class="credits navbar-text">

        <small>&copy <?php echo get_bloginfo('name').' '.date('Y') ?> | <?php __( 'Developed by', 'ws-starter' ) ?>
          <a href="https://we-studio.ch/" target="_blank">We studio</a>
        </small>

      </nav><!-- /.credits -->

    </div><!-- .footer-menu -->

  </div><!-- /.container -->
</footer><!-- /.footer -->

<?php wp_footer(); ?>

</body>
</html>
