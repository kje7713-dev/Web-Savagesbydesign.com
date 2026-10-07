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
  $nonce_valid = isset($_POST['sbd_beta_nonce']) && wp_verify_nonce(
    sanitize_text_field(wp_unslash($_POST['sbd_beta_nonce'])),
    'sbd_beta_signup'
  );
  $token = isset($_POST['sbd_beta_token']) ? sanitize_text_field(wp_unslash($_POST['sbd_beta_token'])) : '';
  $cache_safe_token = hash_hmac('sha256', 'sbd_beta_signup', wp_salt('auth'));
  if (!$nonce_valid && !hash_equals($cache_safe_token, $token)) {
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

// Repository-owned StoryDonkey pages use one deterministic theme route map.
// WordPress still hands unknown pretty URLs to index.php; this early handler
// serves only explicitly approved routes before canonical/404 redirects and
// preserves the normal theme environment (get_header(), wp_head(), get_footer(),
// and wp_footer()).
function sbd_theme_routes() {
  return [
    'storydonkey'         => 'page-storydonkey.php',
    'storydonkey-privacy' => 'page-storydonkey-privacy.php',
    'storydonkey-terms'   => 'page-storydonkey-terms.php',
    'storydonkey-support' => 'page-storydonkey-support.php',
  ];
}

function sbd_current_theme_route() {
  $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
  return array_key_exists($path, sbd_theme_routes()) ? $path : null;
}

add_filter('body_class', function ($classes) {
  if (sbd_current_theme_route() === 'storydonkey') {
    $classes[] = 'storydonkey-template';
  }
  return $classes;
});

add_action('template_redirect', function () {
  $route = sbd_current_theme_route();
  if ($route === null) {
    return;
  }

  $route_template = get_stylesheet_directory() . '/' . sbd_theme_routes()[$route];
  if (!file_exists($route_template)) {
    error_log('StoryDonkey route template missing: ' . $route_template);
    return;
  }

  global $wp_query;
  if ($wp_query instanceof WP_Query) {
    $wp_query->is_404 = false;
  }
  status_header(200);
  include $route_template;
  exit;
}, 0);

add_action('wp_head', function () {
  $marker_file = get_stylesheet_directory() . '/deployment-marker.txt';
  if (file_exists($marker_file)) {
    $marker = trim((string) file_get_contents($marker_file));
    if ($marker !== '') {
      echo '<meta name="sbd-deployment" content="' . esc_attr($marker) . '">';
    }
  }
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
  foreach (sbd_get_required_pages() as $slug => $title) {
    if (get_page_by_path($slug)) {
      continue;
    }

    $page_id = wp_insert_post([
      'post_title'   => $title,
      'post_name'    => $slug,
      'post_status'  => 'publish',
      'post_type'    => 'page',
      'post_content' => '',
    ], true);

    if (is_wp_error($page_id)) {
      error_log('Unable to create required page ' . $slug . ': ' . $page_id->get_error_message());
      return $page_id;
    }
  }

  return true;
}

// Run on theme activation (covers first-time setup).
add_action( 'after_switch_theme', 'sbd_create_required_pages' );

// Also run on init so that pages added after the initial theme activation
// are created automatically on the next request after a deploy, without
// needing to re-activate the theme.  A version string gates the work so
// that it only executes once per deploy rather than on every request.
add_action( 'init', 'sbd_ensure_required_pages' );

function sbd_ensure_required_pages() {
  // Bump this string only when a legacy required page is added or removed.
  $version = '2026-10-07-v10';

  if (get_option('sbd_required_pages_version') === $version) {
    return;
  }

  $result = sbd_create_required_pages();
  if (is_wp_error($result)) {
    return;
  }

  update_option('sbd_required_pages_version', $version);
}