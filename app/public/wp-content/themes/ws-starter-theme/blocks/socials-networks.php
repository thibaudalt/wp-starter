<?php

  $fb_url   = get_acf_option( 'socials_networks_facebook' );
  $tw_url   = get_acf_option( 'socials_networks_twitter' );
  $gp_url   = get_acf_option( 'socials_networks_gplus' );
  $mail_url = get_acf_option( 'socials_networks_mail' );
  $rss      = get_acf_option( 'socials_networks_rss' );

  if ( !$fb_url && !$tw_url && !$gp_url && !$mail_url && !$rss ) return;

?>

<ul class="socials-networks">

  <?php if ( $fb_url ) : ?>
    <li class="facebook">
      <a class="px-1" href="<?php echo $fb_url ?>" title="Facebook" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $tw_url ) : ?>
    <li class="twitter">
      <a class="px-1" href="<?php echo $tw_url ?>" title="Twitter" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $gp_url ) : ?>
    <li class="gplus">
      <a class="px-1" href="<?php echo $gp_url ?>" title="Google+" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $mail_url ) : ?>
    <li class="mail">
      <a class="px-1" href="mailto:<?php echo $mail_url ?>" title="Contact"><i class="fa fa-envelope-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

  <?php if ( $rss ) : ?>
    <li class="rss">
      <a class="px-1" href="<?php bloginfo('rss2_url'); ?>" title="RSS" target="_blank"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
    </li>
  <?php endif; ?>

</ul>
