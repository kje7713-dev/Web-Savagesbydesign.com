<?php
$respond = static function ($status, array $payload) {
  http_response_code($status);
  header('Content-Type: application/json; charset=utf-8');
  header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
  echo json_encode($payload);
  exit;
};

$wp_load = __DIR__ . '/wp-load.php';
if (!is_file($wp_load)) {
  $respond(500, ['ok' => false, 'wp_load' => 'not-found']);
}

require_once $wp_load;

$expected_token = defined('SBD_DEPLOY_TOKEN') ? (string) SBD_DEPLOY_TOKEN : (string) getenv('SBD_DEPLOY_TOKEN');
$provided_token = isset($_POST['token']) ? (string) wp_unslash($_POST['token']) : '';
if ($expected_token === '' || $provided_token === '' || !hash_equals($expected_token, $provided_token)) {
  $respond(403, ['ok' => false, 'error' => 'invalid token']);
}

$functions_file = get_stylesheet_directory() . '/functions.php';
$marker_file = get_stylesheet_directory() . '/deployment-marker.txt';
$marker_sha = '';
if (is_file($marker_file)) {
  $marker_contents = (string) file_get_contents($marker_file);
  if (preg_match('/^sha=([a-f0-9]{40})$/m', $marker_contents, $matches)) {
    $marker_sha = $matches[1];
  }
}

$respond(200, [
  'ok' => true,
  'active_stylesheet' => (string) get_option('stylesheet'),
  'active_template' => (string) get_option('template'),
  'stylesheet_directory_basename' => basename(get_stylesheet_directory()),
  'template_directory_basename' => basename(get_template_directory()),
  'runtime_functions_sha256' => is_file($functions_file) ? hash_file('sha256', $functions_file) : '',
  'deployment_marker_sha' => $marker_sha,
  'bootstrap_hook_registered' => has_action(
    'admin_post_nopriv_sbd_deploy_bootstrap',
    'sbd_handle_deploy_bootstrap'
  ) !== false,
  'required_pages_version' => get_option('sbd_required_pages_version'),
]);
