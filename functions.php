<?php
// Serve app-ads.txt at the site root for Google AdMob/AdSense publisher verification
add_action('init', function () {
  if (isset($_SERVER['REQUEST_URI']) && esc_url_raw(wp_unslash($_SERVER['REQUEST_URI'])) === '/app-ads.txt') {
    header('Content-Type: text/plain; charset=utf-8');
    echo "google.com, pub-9428188855756038, DIRECT, f08c47fec0942fa0\n";
    exit;
  }
}, 1);

// Keep beta leads in WordPress even when the host's default mail transport fails.
add_action('init', function () {
  register_post_type('sbd_beta_lead', [
    'labels' => ['name' => 'StoryDonkey Beta Leads', 'singular_name' => 'StoryDonkey Beta Lead'],
    'public' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'supports' => ['title', 'editor'],
    'menu_icon' => 'dashicons-email-alt',
  ]);
});

// Receive StoryDonkey beta interest without exposing a third-party signup dependency.
add_action('admin_post_nopriv_sbd_beta_signup', 'sbd_handle_beta_signup');
add_action('admin_post_sbd_beta_signup', 'sbd_handle_beta_signup');
function sbd_handle_beta_signup() {
  if (!isset($_POST['sbd_beta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['sbd_beta_nonce'])), 'sbd_beta_signup')) {
    wp_die('Invalid signup request.', 'StoryDonkey beta', ['response' => 400]);
  }

  if (!empty($_POST['company'])) {
    wp_safe_redirect(home_url('/storydonkey/?beta=thanks#beta'));
    exit;
  }

  $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
  $arc = isset($_POST['arc']) ? sanitize_text_field(wp_unslash($_POST['arc'])) : '';
  if (!is_email($email)) {
    wp_safe_redirect(home_url('/storydonkey/?beta=invalid#beta'));
    exit;
  }

  $subject = 'StoryDonkey beta signup';
  $body = "Email: {$email}\nStory arc: {$arc}\nSource: StoryDonkey landing page";
  wp_insert_post([
    'post_type' => 'sbd_beta_lead',
    'post_status' => 'private',
    'post_title' => $email,
    'post_content' => "Email: {$email}\nStory arc: {$arc}\nSource: StoryDonkey landing page",
  ]);
  wp_mail('savagesbydesignhq@gmail.com', $subject, $body, [
    'Reply-To: ' . $email,
    'From: StoryDonkey <wordpress@savagesbydesign.com>',
  ]);
  wp_safe_redirect(home_url('/storydonkey/?beta=thanks#beta'));
  exit;
}

// Load theme stylesheet
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style(
    'sbd-brutalist',
    get_stylesheet_uri(),
    [],
    filemtime(get_stylesheet_directory() . '/style.css')
  );
});

// Give the StoryDonkey landing page its own masthead treatment.
add_filter('body_class', function ($classes) {
  if (is_page('storydonkey')) {
    $classes[] = 'storydonkey-template';
  }
  return $classes;
});

// Force the StoryDonkey landing page template even when an existing WordPress
// page has a saved default template assignment from an earlier theme version.
add_filter('template_include', function ($template) {
  $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
  if ($path === 'storydonkey' || is_page('storydonkey')) {
    $storydonkey_template = get_stylesheet_directory() . '/page-storydonkey.php';
    if (file_exists($storydonkey_template)) {
      status_header(200);
      return $storydonkey_template;
    }
  }

  return $template;
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
    'storydonkey'               => 'StoryDonkey Beta',
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
  $version = '2026-10-03-v5';

  if ( get_option( 'sbd_required_pages_version' ) === $version ) {
    return;
  }

  sbd_create_required_pages();
  update_option( 'sbd_required_pages_version', $version );
  // New theme-driven page slugs need a rewrite refresh before pretty URLs resolve.
  flush_rewrite_rules( false );
}