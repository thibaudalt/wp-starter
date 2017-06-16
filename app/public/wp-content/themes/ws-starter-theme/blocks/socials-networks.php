<ul class="socials-networks navbar-nav mr-auto">

  <?php if ( $url = get_acf_option( 'socials_networks_facebook' ) ) : ?>
    <li class="nav-item">
      <a class="px-1 nav-link social facebook" href="<?php echo $url ?>" title="Facebook" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $url = get_acf_option( 'socials_networks_twitter' ) ) : ?>
    <li class="nav-item">
      <a class="px-1 nav-link social twitter" href="<?php echo $url ?>" title="Twitter" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

    <?php if ( $url = get_acf_option( 'socials_networks_gplus' ) ) : ?>
    <li class="nav-item">
      <a class="px-1 nav-link social gplus" href="<?php echo $url ?>" title="Google+" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

    <?php if ( $url = get_acf_option( 'socials_networks_mail' ) ) : ?>
    <li class="nav-item">
      <a class="px-1 nav-link social mail" href="mailto:<?php echo $url ?>" title="Contact"><i class="fa fa-envelope-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <li class="nav-item">
    <a class="px-1 nav-link social rss" href="<?php bloginfo('rss2_url'); ?>" title="RSS" target="_blank"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
  </li>

</ul>
