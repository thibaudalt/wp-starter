<?php if ( !is_user_administrator() ) return; ?>

<a href="<?php echo get_edit_post_link( get_the_ID() ) ?>" class="btn btn-primary btn-sm btn-edit float-right" title="Edit">
  <span class="edit"></span>
</a>
