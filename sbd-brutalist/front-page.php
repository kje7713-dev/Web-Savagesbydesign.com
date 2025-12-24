<?php get_header(); ?>

<main class="wrap">
  <section class="hero">
    <div class="hero-content">
      <h1>Modern comforts create a cage. We're here to help break you out.</h1>
      
      <div class="hero-visual">
        <?php get_template_part('template-parts/brand-wheel', null, array('context' => 'hero')); ?>
      </div>
      
      <p class="subhead">
        The world rewards stillness and comfort. Your body was built for movement, resistance, and exposure. Savage by Design exists to close that gap — through sun, strain, and disciplined effort. This is training for the real arenas of life, not the artificial ones.
      </p>
    </div>
  </section>

  <section class="grid">
    <article class="card">
      <h2>Training</h2>
      <p>Strength blocks, conditioning, and the boring work that makes you dangerous.</p>
      <a href="/guides/">Go to Guides →</a>
    </article>

    <article class="card">
      <h2>Reviews</h2>
      <p>Gear and tools we actually use. No influencer fluff.</p>
      <a href="/reviews/">Go to Reviews →</a>
    </article>

    <article class="card">
      <h2>Deals</h2>
      <p>Discounts and affiliate picks, clearly labeled.</p>
      <a href="/deals/">Go to Deals →</a>
    </article>
  </section>
</main>

<?php get_footer(); ?>