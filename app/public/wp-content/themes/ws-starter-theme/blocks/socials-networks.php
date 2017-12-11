<ul class="socials-networks">

  <?php if ( $url = get_acf_option( 'socials_networks_facebook' ) ) : ?>
    <li class="facebook">
      <a class="px-1" href="<?php echo $url ?>" title="Facebook" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $url = get_acf_option( 'socials_networks_twitter' ) ) : ?>
    <li class="twitter">
      <a class="px-1" href="<?php echo $url ?>" title="Twitter" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $url = get_acf_option( 'socials_networks_gplus' ) ) : ?>
    <li class="gplus">
      <a class="px-1" href="<?php echo $url ?>" title="Google+" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $url = get_acf_option( 'socials_networks_mail' ) ) : ?>
    <li class="mail">
      <a class="px-1" href="mailto:<?php echo $url ?>" title="Contact"><i class="fa fa-envelope-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( get_acf_option( 'socials_networks_rss' ) ) : ?>
    <li class="rss">
      <a class="px-1" href="<?php bloginfo('rss2_url'); ?>" title="RSS" target="_blank"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

</ul>
