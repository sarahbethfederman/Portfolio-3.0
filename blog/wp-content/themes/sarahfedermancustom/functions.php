<?php
// Enable Wordpress's handling of the <title> tag
function sf_show_title_tag() {
   add_theme_support('title-tag');
}
add_action('after_setup_theme', 'sf_show_title_tag');

// Load main stylesheet (for browsers only, not admin)
// We are loading our main styles in site.css instead of style.css so we can minimize the file
// Style.css contains the theme meta data and will only be loaded on admin screens
function sf_load_styles() {
  if (!is_admin()) {
    wp_register_style('main-styles', 'http://sarahbethfederman.com/site.css', false, '1.0');
    wp_enqueue_style('main-styles');
  }
}
add_action('wp_enqueue_scripts', 'sf_load_styles');

// Deregister WordPress default jQuery
// Register and Enqueue Google CDN jQuery
function sf_jquery_enqueue() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null, true);
  wp_enqueue_script( 'jquery' );
}
if ( !is_admin() ) {
  add_action( 'wp_enqueue_scripts', 'sf_jquery_enqueue');
}

// Filter and trim the excerpt
function sf_filter_function_name($excerpt) {
  $excerpt = strip_tags($excerpt);
  $limit = 100;

  if (strlen($excerpt) <= $limit) {
    return $excerpt;
  } else {
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt .= " ...";
  }
  return $excerpt;
}
add_filter( 'get_the_excerpt', 'sf_filter_function_name' );

// Add infinite scroll
function sf_infinite_scroll_init() {
  add_theme_support( 'infinite-scroll', array(            // We Modified the Plugin File! Line 402 of infinity.php
        'type'           => 'scroll',   // type click
        'footer'         => false,
        'container'      => 'content',
        'wrapper'        => false,
        'render'         => false,
        'posts_per_page' => 9,
        'footer-widgets' => false )
    );
}
add_action( 'after_setup_theme', 'sf_infinite_scroll_init' );

// Load main custom js in the footer
function sf_load_scripts() {
    wp_register_script('skrollr', 'http://sarahbethfederman.com/js/min/skrollr.min.js', false, null, true);
    wp_enqueue_script('skrollr');
    wp_register_script('fancybox', 'http://sarahbethfederman.com/js/fancybox.js', false, null, true);
    wp_enqueue_script('fancybox');
    wp_register_script('main-script', 'http://sarahbethfederman.com/js/script.js', array("jquery"), '1.0', true);
    wp_enqueue_script('main-script');
}
add_action('wp_enqueue_scripts', 'sf_load_scripts');
?>
