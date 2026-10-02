<?php
$sbd_request_path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '/' );

// Keep the landing page theme-driven even if WordPress has not created the
// routing placeholder page yet. This fallback also handles stale rewrite data.
if ( $sbd_request_path === 'storydonkey' ) {
  status_header( 200 );
  nocache_headers();
  include get_template_directory() . '/page-storydonkey.php';
  return;
}

get_header();
?>

<main class="site-main">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      the_content();
    endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>