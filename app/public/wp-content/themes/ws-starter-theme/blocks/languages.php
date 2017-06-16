<?php
  if ( !function_exists( 'icl_get_languages' ) || !defined( 'ICL_LANGUAGE_CODE' ) )
    return;
?>

<ul class="languages nav navbar-nav">

  <?php foreach ( icl_get_languages() as $lang ) : ?>

    <li class="nav-item <?php if ( $lang['language_code'] == ICL_LANGUAGE_CODE ) echo 'active'; ?>">
      <a class="p-1 nav-link" href="<?php echo $lang[ 'url' ]; ?>"><?php echo strtoupper($lang['language_code']); ?></a>
    </li>

  <?php endforeach; ?>

</ul><!-- .languages -->
