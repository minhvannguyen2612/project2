<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/header.inc';
include __DIR__ . '/nav.inc';
?>
  <!-- Banner -->
  <section class="banner" aria-label="Banner">
    <img src="styles/images/banner.jpg" alt="Technology banner" loading="lazy">
  </section>

  <!-- Main Section -->
  <main class="container" role="main" aria-labelledby="main-heading">
    <h1 id="main-heading" class="visually-hidden">FutureTech Solutions — Home</h1>

    <section class="section__title">
      <h2>About Our Company</h2>
    </section>

    <section class="section__content">
      <p>
        FutureTech Solutions is an IT company that provides software
        development, digital transformation, and business technology
        consulting services. Our team focuses on creating innovative solutions
        that drive growth and efficiency for enterprises worldwide.
      </p>
    </section>

    <section class="btn">
      <a href="about_en.html">Discover More</a>
    </section>
  </main>

  <!-- Customer Impression -->
  <section class="customer__impression" aria-label="Customer impression">
    <figure>
      <img src="styles/images/logo2.jpg" alt="Client meeting" loading="lazy" />
    </figure>

    <article>
      <h2 class="impression__right-title">Leading Quality</h2>
      <p class="impression__right-decs">
        At FutureTech Solutions, we believe that quality is more than a promise — it’s the foundation of everything we deliver.
      </p>
      <p class="impression__right-decs-1">
        We build long-term trust with our clients by maintaining the highest standards in every project, from concept to completion.
      </p>
      <p class="impression__right-decs-1">
        Our vision goes beyond delivering excellent results — we strive to empower businesses through smart solutions,
        data-driven insights, and sustainable practices.
      </p>
      <ul class="impression__right-list">
        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Trusted by global clients</li>
        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Professional project management</li>
        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Efficient and innovative solutions</li>
        <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Commitment to long-term value</li>
      </ul>
    </article>
  </section>

  <!-- Work Procedure -->
  <section class="procedure" aria-label="Our process">
    <h2 class="procedure__title">Our Process</h2>
      <div class="procedure__list">
        <article class="procedure__item">
          <figure class="procedure__item-img">
            <img src="styles/images/index1.jpg" alt="Analysis step" loading="lazy" />
          </figure>
          <h3 class="procedure__item-heading">1. Requirement Analysis</h3>
          <p>We discuss your goals and analyze business requirements.</p>
        </article>

        <article class="procedure__item">
          <figure class="procedure__item-img">
            <img src="styles/images/index2.jpg" alt="Design step" loading="lazy" />
          </figure>
          <h3 class="procedure__item-heading">2. System Design</h3>
          <p>Our designers build system architecture and UX prototypes.</p>
        </article>

        <article class="procedure__item">
          <figure class="procedure__item-img">
            <img src="styles/images/index3.jpg" alt="Implementation step" loading="lazy" />
          </figure>
          <h3 class="procedure__item-heading">3. Implementation</h3>
          <p>Developers turn design concepts into real-world applications.</p>
        </article>

        <article class="procedure__item">
          <figure class="procedure__item-img">
            <img src="styles/images/index4.jpg" alt="Testing step" loading="lazy" />
          </figure>
          <h3 class="procedure__item-heading">4. Testing & Deployment</h3>
          <p>We ensure high-quality testing and deploy to production safely.</p>
        </article>
      </div>
  </section>
<?php if (file_exists(__DIR__ . '/footer.inc')) { include __DIR__ . '/footer.inc'; } else { ?> <footer> <p>&copy; <?= date('Y') ?> FutureTech Solutions</p> </footer> </body> </html> <?php } ?>
?>
