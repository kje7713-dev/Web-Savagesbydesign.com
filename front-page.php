<?php get_header(); ?>

<section class="hero">
  <!-- Optional: Video background for sizzle reel (uncomment and add video file) -->
  <?php 
  $video_url = get_template_directory_uri() . '/assets/img/hero-sizzle.mp4';
  // Only show video if file exists - for now, we'll use pure typography
  // Uncomment the following lines when video is available:
  /*
  if (file_exists(get_template_directory() . '/assets/img/hero-sizzle.mp4')) : ?>
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
    </video>
  <?php endif;
  */
  ?>
  
  <!-- Overlay for text readability -->
  <div class="hero-overlay"></div>
  
  <!-- Hero content -->
  <div class="hero-content">
    <h1 class="hero-title">
      TAKE CHARGE<br>OF HOW YOU<br>LIVE, TRAIN,<br>LEARN AND PLAY
    </h1>
    <p class="subhead hero-subhead">
      Collaborate with AI. Make a plan. Actually do it. No gurus required.
    </p>
  </div>
  
  <!-- Scroll indicator -->
  <div class="hero-scroll">Scroll ↓</div>
</section>

<main class="wrap">

  <!-- MANIFESTO -->
  <section class="section">
    <h2>No More Noise</h2>
    <p>Most apps try to push rigid systems wrapped in technology. We're here to give you a flexible process to support your goals.</p>

    <p>Savage by Design isn't just for lifting (though you're in the right place if that's your goal) — it's an experience engineering platform.</p>

    <p>From your next training block, to the next skill you want to learn, to how you structure your travel day, to how you maximize your time at Disney World, this app helps you design, plan, organize, act and track those goals.</p>

    <p class="stack">
      No secret templates.<br>
      No "Science” buzzwords wrapped around a checkout button.
    </p>

    <p>Savage by Design isn’t here to judge your goals.</p>
    <p>You decide where you’re going. We'll help you get there. </p>
  </section>

  <!-- PRINCIPLES -->
  <section class="section">
    <h2>You Are the Program</h2>

    <p>Your life isn’t standard. Your goals aren’t to optimize bullshit. Your training shouldn’t be either.</p>

    <p>
      Some weeks you lift heavy. Some weeks you roll on the mats. Some weeks you hike hills, row intervals,
      surf waves, or just try to move without breaking yourself.
    </p>

    <ul>
      <li><strong>Create a workout</strong> for today</li>
      <li><strong>Create workout programs</strong> for weeks</li>
      <li><strong>Create timed segments</strong> for sport training and curriculum design</li>
      <li><strong>Mix and match</strong>, change as needed</li>
      <li><strong>Collect the blocks</strong> to build you</li>
    </ul>

    <p>No one tells you what <em>counts</em> as training.</p>
  </section>

  <!-- APP SCREENSHOTS -->
  <section class="section app-gallery">
    <h2>See It In Action</h2>
    
    <p>Simple. Direct. Built for training that works.</p>

    <div class="app-screenshots">
      <div class="screenshot-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/IMG_3464.png" alt="Savage by Design app - Block overview" loading="lazy">
      </div>
      <div class="screenshot-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/IMG_3485.png" alt="Savage by Design app - Workout session" loading="lazy">
      </div>
      <div class="screenshot-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/IMG_3486.png" alt="Savage by Design app - Exercise tracking" loading="lazy">
      </div>
    </div>
  </section>

  <!-- AI -->
  <section class="section section-dark">
    <h2>AI Without the Cult</h2>

    <p class="stack">
      AI doesn’t care if your goals are fashionable.<br>
      It doesn’t care if your lifestyle is “optimal.”<br>
      It doesn’t care if your goal is normal.
    </p>

    <p>You use AI the way you should use any tool: to see patterns, think clearly, and explore alternatives.</p>

    <p>
      Your block isn’t going well? Life throws a curveball and now your knee won’t let you squat?
    </p>

    <p class="stack">
      Export your data.<br>
      Review it.<br>
      Ask better questions.<br>
      Design a different plan.
    </p>

    <p>No gurus required.</p>
  </section>

  <!-- FLEXIBILITY -->
  <section class="section">
    <h2>Maximum Flexibility. Zero Dogma.</h2>

    <p>There’s no approved list of activities or movements.</p>

    <p class="stack">
      Fran to Smolov.<br>
      Kegels to keg throws.<br>
      Running, rowing, walking, downward dog.<br>
      BJJ rounds, pickup games, trail miles.<br>
      Teaching a class, learning to surf, structuring guitar practice or an AI prompting seminar.
    </p>

    <p>If it matters to you, it matters to us.</p>
  </section>

  <!-- SEE IT IN ACTION -->
  <section class="section app-gallery">
    <h2>See It In Action</h2>
    
    <p>Flexible and functional.</p>

    <div class="app-screenshots">
      <div class="screenshot-item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/IMG_3487.png" alt="Savage by Design app - Progress view" loading="lazy">
      </div>
    </div>
  </section>

  <!-- DATA -->
  <section class="section">
    <h2>Your Data Is Yours</h2>

    <p>This isn’t a data-extraction business.</p>

    <p class="stack">
      No dark patterns.<br>
      No locked exports.<br>
      No selling your training history to fund ads.<br>
      No “trust us” privacy theater.
    </p>

    <p>You keep your data. You can export it. You can analyze it however you want — today or ten years from now.</p>
  </section>

  <!-- PRICING PHILOSOPHY -->
  <section class="section">
    <h2>A Useful Product at a Reasonable Price</h2>

    <p>Savage by Design isn’t built to bankroll podcast tours or influencer campaigns.</p>

    <p class="stack">
      Useful.<br>
      Flexible.<br>
      Fairly priced.
    </p>

    <p>You pay for the product. Not the marketing machine behind it.</p>
  </section>

  <!-- CLOSER -->
  <section class="section closer">
    <h2>The Point</h2>

    <p class="stack">
      You become what you repeatedly do.<br>
      Not what you read.<br>
      Not what you follow.<br>
      Not what someone sold you.
    </p>

    <p>
      Savage by Design helps you track the doing — honestly, flexibly, and without bullshit.
      The rest is on you.
    </p>


  </section>

</main>

<?php get_footer(); ?>