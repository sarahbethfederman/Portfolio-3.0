<?php
  get_header();
?>

<header class="blog-header">
  <div class="container">
    <h1>Welcome to my Blog!</h1>
    <h2>This is a place to reflect on my thoughts and experiences in the realm of design &amp; development.</h2>
  </div>
</header>

<div class="container" id="content">
  <?php
    if ( have_posts() ) :
      // Start the Loop.
      while ( have_posts() ) : the_post();

        get_template_part( 'content', get_post_format() );

      endwhile;
      // Previous/next post navigation.
      //twentyfourteen_paging_nav();

    endif;
  ?>
</div>

  <div id="footer" style="float: left; margin: 0 auto; width: 100%;">
    <h4 style="text-align:center; margin: 30px auto;">End of Posts</h4>
  </div>

<?php
  get_footer();
?>
