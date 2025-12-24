<?php
/**
 * Template part for displaying the brand wheel image
 * 
 * @package Savage_By_Design_Brutalist
 */

// Build the URL path to the wheel asset in the theme's template-parts directory
$brand_wheel_url = get_template_directory_uri() . '/template-parts/9954152A-8A70-4A27-86E2-7B395F7AE12E.png';

$context = isset($args['context']) ? $args['context'] : 'default';
$class = isset($args['class']) ? $args['class'] : '';

// Don't lazy load hero image (it's above the fold), but do lazy load header
$loading_attr = ($context === 'hero') ? '' : 'loading="lazy"';
?>

<img 
  src="<?php echo esc_url($brand_wheel_url); ?>" 
  alt="Savage by Design lifestyle wheel representing strength, nature, and combat"
  class="brand-wheel brand-wheel--<?php echo esc_attr($context); ?> <?php echo esc_attr($class); ?>"
  <?php if ($loading_attr) { echo esc_attr($loading_attr); } ?>
  width="1024"
  height="1024"
/>
