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

// Auto-create required pages on theme activation
add_action('after_switch_theme', 'sbd_create_required_pages');

function sbd_create_required_pages() {
  $pages = [
    'app' => 'App',
    'offerings' => 'Offerings',
    'guides' => 'Guides',
    'reviews' => 'Reviews',
    'deals' => 'Deals',
    'contact' => 'Contact',
    'privacy' => 'Privacy Policy'
  ];

  foreach ($pages as $slug => $title) {
    // Check if page already exists
    $page = get_page_by_path($slug);
    
    if (!$page) {
      // Create the page
      wp_insert_post([
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '' // Empty content - template controls display
      ]);
    }
  }
}