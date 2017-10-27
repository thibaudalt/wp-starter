<?php if ( !is_user_administrator() ) return; ?>

<a href="<?php echo get_edit_post_link( get_the_ID() ) ?>" class="mt-2 btn btn-primary btn-sm pull-right" title="Edit">
  <i class="fa fa-pencil" aria-hidden="true"></i>
</a>
