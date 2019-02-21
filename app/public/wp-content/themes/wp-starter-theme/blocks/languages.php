<?php
  if ( !function_exists( 'icl_get_languages' ) || !defined( 'ICL_LANGUAGE_CODE' ) )
    return;
?>

<ul class="languages <?php echo $args[ 'CLASS' ] ?>">

  <?php foreach ( icl_get_languages() as $lang ) : ?>

    <li class="<?php if ( $lang['language_code'] == ICL_LANGUAGE_CODE ) echo 'active'; ?>">
      <a class="p-1" href="<?php echo $lang[ 'url' ]; ?>"><?php echo strtoupper($lang['language_code']); ?></a>
    </li>

  <?php endforeach; ?>

</ul><!-- .languages -->
