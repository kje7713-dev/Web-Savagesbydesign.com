<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists('wp_body_open') ) { wp_body_open(); } ?>

<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
      SAVAGE BY DESIGN
    </a>
  </div>
  <nav class="nav">
    <a href="/app/">App</a>
    <a href="/offerings/">Offerings</a>
    <a href="/guides/">Guides</a>
    <a href="/reviews/">Reviews</a>
    <a href="/deals/">Deals</a>
    <a href="/contact/">Contact</a>
  </nav>
</header>