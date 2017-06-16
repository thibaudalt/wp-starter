<?php if ( !empty( $prev = get_previous_post() ) ) : ?>
  <a class="btn btn-info btn-sm pull-left" href="<?php echo $prev->guid ?>">
    <i class="fa fa-arrow-left" aria-hidden="true"></i>
    <?php echo $prev->post_title ?>
  </a>
<?php endif ?>

<?php if ( !empty( $next = get_next_post() ) ) : ?>
  <a class="btn btn-info btn-sm pull-right" href="<?php echo $next->guid ?>">
    <?php echo $next->post_title ?>
    <i class="fa fa-arrow-right" aria-hidden="true"></i>
  </a>
<?php endif; ?>
