<div class="post">
    <div class="post__content">
      <h4><?php echo get_the_date('F j, Y'); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p class="excerpt">
        <?php echo get_the_excerpt(); ?>
      </p>
    </div>
</div>
