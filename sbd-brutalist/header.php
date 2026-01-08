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
    <div class="brand-mark-container">
      <?php get_template_part('template-parts/brand-wheel', null, array('context' => 'header')); ?>
    </div>
    <div class="brand-text-container">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
        SAVAGE BY DESIGN
      </a>
    </div>
  </div>
  <button class="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
    <span class="nav-toggle-icon"></span>
    MENU
  </button>
  <nav class="nav">
    <a href="/app/">App</a>
    <a href="/offerings/">Offerings</a>
    <a href="/guides/">Guides</a>
    <a href="/reviews/">Reviews</a>
    <a href="/deals/">Deals</a>
    <a href="/contact/">Contact</a>
  </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const navToggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.nav');
  
  if (navToggle && nav) {
    navToggle.addEventListener('click', function() {
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', !isExpanded);
      nav.classList.toggle('nav-open');
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!nav.contains(event.target) && !navToggle.contains(event.target)) {
        navToggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('nav-open');
      }
    });
    
    // Close menu when clicking a nav link
    const navLinks = nav.querySelectorAll('a');
    navLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        navToggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('nav-open');
      });
    });
  }
});
</script>