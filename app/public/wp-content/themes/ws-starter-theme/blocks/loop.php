<article <?php post_class() ?>>
  <div class="row">

    <div class="col-md-4 thumbnail">

      <a href="<?php the_permalink() ?>">
        <?php if ( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail( '510x510', array('class' => 'post-image') ) ?>
        <?php else: ?>
          <img src="<?php the_asset( 'placeholder.jpg' ) ?>" alt="<?php bloginfo( 'name' ) ?>"/>
        <?php endif; ?>
      </a>

    </div><!-- .thumbnail -->

    <div class="col-md-8 content">

      <p class="post-date"><?php ws_posted_on() ?></p>

      <h2 class="post-title">

        <?php get_edit_button() ?>

        <a href="<?php the_permalink() ?>" title="<?php the_title();?>">
          <?php the_title() ?>
        </a>

      </h2>

      <div class="post-body text-justify">
        <?php the_excerpt() ?>
      </div><!-- .content -->

    </div><!-- .thumbnail -->

  </div><!-- .row -->
</article><!-- .post -->
<hr>
