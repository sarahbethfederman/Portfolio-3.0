<?php get_header(); ?>
<header class="blog-header">
  <div class="container">
    <h3 class="date"><?php echo get_the_date(); ?></h3>
    <h1><?php echo get_the_title(); ?></h1>
  </div>
</header>

  <div class="container">
  <?php
    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();

        the_content();

      endwhile;

      // Previous/next post navigation.
      //twentyfourteen_paging_nav();

      // Comments

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endif;
  ?>

  </div>
<?php get_footer(); ?>
