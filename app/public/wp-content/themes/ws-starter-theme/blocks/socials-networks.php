<?php

  $mail = get_acf_option( 'socials_networks_mail' );
  $fb   = get_acf_option( 'socials_networks_facebook' );
  $tw   = get_acf_option( 'socials_networks_twitter' );
  $lk   = get_acf_option( 'socials_networks_linkedin' );
  $yt   = get_acf_option( 'socials_networks_youtube' );
  $gp   = get_acf_option( 'socials_networks_gplus' );
  $rss  = get_acf_option( 'socials_networks_rss' );

  if ( $mail || $fb || $tw || $lk || $yt || $gp || $rss ) :

?>

    <ul class="socials-networks">

      <?php if ( $mail ) : ?>
        <li class="mail">
          <a class="px-1" href="mailto:<?php echo $mail ?>" title="Contact"><i class="fas fa-envelope-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $fb ) : ?>
        <li class="fascebook">
          <a class="px-1" href="<?php echo $fb ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $tw ) : ?>
        <li class="twitter">
          <a class="px-1" href="<?php echo $tw ?>" title="Twitter" target="_blank"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $lk ) : ?>
        <li class="linkedin">
          <a class="px-1" href="<?php echo $lk ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $yt ) : ?>
        <li class="youtube">
          <a class="px-1" href="<?php echo $yt ?>" title="YouTube" target="_blank"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $gp ) : ?>
        <li class="gplus">
          <a class="px-1" href="<?php echo $gp ?>" title="Google+" target="_blank"><i class="fab fa-google-plus-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

      <?php if ( $rss ) : ?>
        <li class="rss">
          <a class="px-1" href="<?php bloginfo('rss2') ?>" title="RSS" target="_blank"><i class="fas fa-rss-square" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>

    </ul>

<?php
  endif;
?>
