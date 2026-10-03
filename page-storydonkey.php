<?php get_header(); ?>

<main class="storydonkey-page">
  <section class="storydonkey-hero">
    <div class="wrap">
      <div class="storydonkey-lockup">
        <img class="storydonkey-wordmark" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/storydonkey-wordmark.png'); ?>" alt="StoryDonkey">
      </div>
      <p class="kicker">STORYDONKEY</p>
      <h1>Your vision for a book.<br><span>The donkey does the legwork.</span></h1>
      <p class="subhead">StoryDonkey carries the structure, context, and continuity so you can stay focused on what the story is trying to become.</p>
      <div class="cta">
        <a class="btn btn-primary" href="mailto:savagesbydesignhq@gmail.com?subject=StoryDonkey%20beta%20access">Join the beta</a>
        <a class="btn btn-ghost" href="#how-it-works">How it works</a>
      </div>
      <div class="storydonkey-proof" aria-label="StoryDonkey workflow">
        <div><b>01</b><span>YOUR VISION</span><strong>the spark</strong></div>
        <i>→</i>
        <div><b>02</b><span>DONKEY WORK</span><strong>the structure</strong></div>
        <i>→</i>
        <div><b>03</b><span>YOUR BOOK</span><strong>the finished story</strong></div>
      </div>
    </div>
  </section>

  <section class="wrap storydonkey-how" id="how-it-works">
    <p class="kicker">FROM IDEA TO FINISHED STORY</p>
    <h2>The donkey keeps receipts.</h2>
    <div class="grid storydonkey-steps">
      <article class="card"><span class="storydonkey-number">01</span><h3>Bring the idea</h3><p>The premise, the people, the impossible scene. Start wherever the story starts.</p></article>
      <article class="card"><span class="storydonkey-number">02</span><h3>Build the shape</h3><p>Turn the mess in your head into a world, an arc, and a path forward.</p></article>
      <article class="card"><span class="storydonkey-number">03</span><h3>Keep going</h3><p>Carry context and continuity through the long middle and out the other side.</p></article>
    </div>
  </section>

  <section class="storydonkey-beta" id="beta">
    <div class="wrap">
      <p class="kicker">COMING TO IOS · EARLY ACCESS</p>
      <h2>Make the story real.</h2>
      <p>Get early access to StoryDonkey and help shape the app built to carry a story all the way through.</p>
      <?php if (isset($_GET['beta']) && $_GET['beta'] === 'thanks') : ?>
        <p class="storydonkey-success">You’re on the list. We’ll be in touch.</p>
      <?php else : ?>
        <form class="storydonkey-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <input type="hidden" name="action" value="sbd_beta_signup">
          <?php wp_nonce_field('sbd_beta_signup', 'sbd_beta_nonce'); ?>
          <label class="sr-only" for="storydonkey-email">Email address</label>
          <input id="storydonkey-email" name="email" type="email" required placeholder="you@example.com" autocomplete="email">
          <label class="sr-only" for="storydonkey-making">What do you want to make?</label>
          <select id="storydonkey-making" name="making" required>
            <option value="" disabled selected>What do you want to make?</option>
            <option>Novel</option><option>Short story</option><option>Fan fiction</option><option>RPG / world story</option><option>Something else</option>
          </select>
          <input class="storydonkey-honeypot" name="company" type="text" tabindex="-1" autocomplete="off" aria-hidden="true">
          <button class="btn" type="submit">Join the beta</button>
        </form>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
