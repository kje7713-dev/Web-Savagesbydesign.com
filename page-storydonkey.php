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

  <section class="storydonkey-demo" id="see-it">
    <div class="wrap">
      <p class="kicker">SEE THE DONKEY WORK</p>
      <h2>From a story in your head<br><span>to something you can share.</span></h2>
      <div class="storydonkey-demo-grid">
        <figure>
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/storydonkey-demo/story-start.jpg'); ?>" alt="StoryDonkey projects screen showing story projects">
          <figcaption><b>01 · START WITH THE IDEA</b><span>Your projects, characters, and story sparks in one place.</span></figcaption>
        </figure>
        <figure>
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/storydonkey-demo/story-shape.jpg'); ?>" alt="StoryDonkey novel workspace showing outline sections">
          <figcaption><b>02 · SHAPE THE STORY</b><span>Build the path, sections, and next useful step.</span></figcaption>
        </figure>
        <figure>
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/storydonkey-demo/story-share.jpg'); ?>" alt="StoryDonkey shared outputs screen showing a finished story">
          <figcaption><b>03 · READ AND SHARE</b><span>Get the work out of the workspace and into the world.</span></figcaption>
        </figure>
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
          <label class="sr-only" for="storydonkey-arc">Which story arc are you interested in?</label>
          <select id="storydonkey-arc" name="arc" required>
            <option value="" disabled selected>Which story arc are you interested in?</option>
            <option>Three-Act</option><option>Hero's Journey</option><option>Mystery</option><option>Save the Cat!</option><option>Story Circle</option><option>Freytag's Pyramid</option><option>Kishōtenketsu</option><option>Romance / HEA</option><option>Psychological / Domestic Thriller</option><option>Romantasy</option><option>Suspense / Countdown Thriller</option><option>Science-Fiction Problem / Survival</option><option>Dystopian Rebellion</option><option>Dark Romance</option><option>Epic Fantasy Quest</option><option>Seven-Point Story Structure</option><option>Horror / Escalating Dread</option><option>Sports Romance</option><option>Romantic Suspense</option><option>Conspiracy / Artifact Thriller</option><option>Progression Fantasy / LitRPG</option><option>Historical War / Survival</option><option>Coming-of-Age / Bildungsroman</option><option>Revenge</option><option>Heist / Caper</option><option>Redemption / Rebirth</option><option>Family Saga / Generational</option>
          </select>
          <input class="storydonkey-honeypot" name="company" type="text" tabindex="-1" autocomplete="off" aria-hidden="true">
          <button class="btn" type="submit">Join the beta</button>
        </form>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
