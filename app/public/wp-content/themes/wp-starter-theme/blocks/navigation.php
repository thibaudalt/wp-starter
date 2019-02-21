<?php if ( !empty( $prev = get_previous_post() ) ) : ?>
  <a class="btn btn-info btn-sm float-left" href="<?php echo $prev->guid ?>">
    <i class="fas fa-arrow-left" aria-hidden="true"></i>
    <?php echo $prev->post_title ?>
  </a>
<?php endif ?>

<?php if ( !empty( $next = get_next_post() ) ) : ?>
  <a class="btn btn-info btn-sm float-right" href="<?php echo $next->guid ?>">
    <?php echo $next->post_title ?>
    <i class="fas fa-arrow-right" aria-hidden="true"></i>
  </a>
<?php endif; ?>
