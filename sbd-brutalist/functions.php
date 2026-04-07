<?php
// Load theme stylesheet
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style(
    'sbd-brutalist',
    get_stylesheet_uri(),
    [],
    filemtime(get_stylesheet_directory() . '/style.css')
  );
});

// Required pages manifest — bump $version whenever you add or remove entries.
// This version string is stored in the WP options table; creation runs only
// when the stored value differs from $version (i.e. after a new deploy).
function sbd_get_required_pages() {
  return [
    'app'                       => 'App',
    'offerings'                 => 'Offerings',
    'guides'                    => 'Guides',
    'reviews'                   => 'Reviews',
    'deals'                     => 'Deals',
    'contact'                   => 'Contact',
    'privacy'                   => 'Privacy Policy',
    'terms'                     => 'Terms of Service',
    'user-guide'                => 'User Guide',
    'pizza-chicken-pop-support' => 'Pizza Chicken Pop Support',
  ];
}

// Create any missing required pages (idempotent — never duplicates).
function sbd_create_required_pages() {
  foreach ( sbd_get_required_pages() as $slug => $title ) {
    if ( ! get_page_by_path( $slug ) ) {
      wp_insert_post( [
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
      ] );
    }
  }
}

// Run on theme activation (covers first-time setup).
add_action( 'after_switch_theme', 'sbd_create_required_pages' );

// Also run on init so that pages added after the initial theme activation
// are created automatically on the next request after a deploy, without
// needing to re-activate the theme.  A version string gates the work so
// that it only executes once per deploy rather than on every request.
add_action( 'init', 'sbd_ensure_required_pages' );

function sbd_ensure_required_pages() {
  // Bump this string whenever sbd_get_required_pages() is updated.
  $version = '2026-04-07-v1';

  if ( get_option( 'sbd_required_pages_version' ) === $version ) {
    return;
  }

  sbd_create_required_pages();
  update_option( 'sbd_required_pages_version', $version );
}