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
      take charge of how you live, train, learn and play
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
    <p>Most fitness apps don’t sell training — they sell belief systems.</p>

    <p class="stack">
      Secret templates.<br>
      Paywalled systems.<br>
      “Science” buzzwords wrapped around a checkout button.
    </p>

    <p>Savage by Design isn’t here to tell you what to believe.</p>
    <p>You decide where you’re going. The outside world is a consultant — <strong>not your leader</strong>.</p>
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

    <p>There’s no approved list of movements.</p>

    <p class="stack">
      Fran to Smolov.<br>
      Kegels to keg throws.<br>
      Running, rowing, walking, downward dog.<br>
      BJJ rounds, pickup games, trail miles.
    </p>

    <p>If it matters to you, it belongs in the system.</p>
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

    <div class="cta">
      <a class="btn" href="/contact/">Get Notified When It Launches</a>
      <a class="btn btn-ghost" href="/app/">Read About The App</a>
    </div>
  </section>

</main>

<?php get_footer(); ?>