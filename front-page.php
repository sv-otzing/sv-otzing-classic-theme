<?php get_header() ?>

<div class="news-gallery" id="newsGallery">
  <?php
  $args = array(
    'posts_per_page' => 4,
    'category_name' => 'news',
    'orderby' => 'date',
    'order' => 'DESC',
  );

  $news_query = new WP_Query($args);

  if ($news_query->have_posts()):
    while ($news_query->have_posts()):
      $news_query->the_post(); ?>
      <div class="news-card">
        <a href="<?php the_permalink(); ?>">
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('medium_large', ['alt' => get_the_title()]);
          } else {
            echo '<img src="https://picsum.photos/800/600?random=' . get_the_ID() . '" alt="">';
          }
          ?>
        </a>
        <div class="news-overlay">
          <div class="news-meta">
            <?php
            echo get_the_date('d.m.Y') . ' – ';
            $categories = get_the_category();
            if (!empty($categories)) {
              echo esc_html($categories[0]->name);
            }
            ?>
          </div>
          <div class="news-title"><?php the_title(); ?></div>
        </div>
      </div>
      <?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<p>Keine News gefunden.</p>';
  endif;
  ?>
</div>
<div class="carousel-dots" id="carouselDots">

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      console.log("🚀 DOM geladen");

      const gallery = document.getElementById("newsGallery");
      const dotsContainer = document.getElementById("carouselDots");

      // Logging zur Fehlersuche
      if (!gallery) {
        console.error("❌ #newsGallery nicht gefunden");
        return;
      }
      if (!dotsContainer) {
        console.error("❌ #carouselDots nicht gefunden");
        return;
      }

      const cards = gallery.querySelectorAll(".news-card");
      if (cards.length === 0) {
        console.error("❌ Keine .news-card Elemente gefunden");
        return;
      }

      console.log("✅ Galerie gefunden mit", cards.length, "Karten");

      // Dots erzeugen
      cards.forEach((_, index) => {
        const dot = document.createElement("div");
        dot.classList.add("carousel-dot");
        if (index === 0) dot.classList.add("active");
        dotsContainer.appendChild(dot);
      });

      const dots = dotsContainer.querySelectorAll(".carousel-dot");

      gallery.addEventListener("scroll", () => {
        const scrollLeft = gallery.scrollLeft;
        const cardWidth = gallery.offsetWidth;
        const currentIndex = Math.round(scrollLeft / cardWidth);

        dots.forEach((dot, i) => {
          dot.classList.toggle("active", i === currentIndex);
        });
      });
    });
  </script>
</div>


<?php
$args = array(
  'posts_per_page' => 6,
  'category_name' => 'news',
  'orderby' => 'date',
  'order' => 'DESC',
);

$news_query = new WP_Query($args);
?>

<section class="section">
  <h1>Nächste Spiele</h1>

</section>

<section class="section">
  <h2>Werde Teil der SVO-Familie!</h2>
  <p>Engagiere dich in unserem Verein – ob als Spieler, Fan oder Unterstützer. Wir freuen uns auf dich!</p>
  <div class="button-container">
    <a href="/mitglied-werden" class="svo-button">
      <i class="fa fa-heart"></i> Jetzt Mitglied werden
    </a>
  </div>
</section>


<section class="section">
  <div class="news-header">
    <h1>News</h1>
  </div>

  <div class="news-grid">
    <?php if ($news_query->have_posts()): ?>
      <?php while ($news_query->have_posts()):
        $news_query->the_post(); ?>
        <article class="news-item">
          <a href="<?php the_permalink(); ?>" class="news-link">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('medium_large', array('class' => 'wp-post-image')); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news.jpg"
                alt="<?php the_title(); ?>">
            <?php endif; ?>

            <div class="news-overlay">
              <?php
              $categories = get_the_category();
              if (!empty($categories)):
                ?>
                <span class="news-category"><?php echo esc_html($categories[0]->name); ?></span>
              <?php endif; ?>

              <h3 class="news-title entry-title"><?php the_title(); ?></h3>

              <div class="news-meta entry-meta">
                <?php echo get_the_date('l, d.m.Y'); ?>
              </div>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>

<section class="section">
  <h1>Tradition Emotion SVO</h1>
  <?php
  $verein_text = get_field('verein_text', 24);
  if ($verein_text):
    echo wp_kses_post($verein_text);
  else:
    echo '<p>Hier entsteht gerade eine neue Vereinsbeschreibung.</p>';
  endif;
  ?>
  <div class="button-container">
    <a href="/verein" class="svo-button">
      <i class="fa fa-heart"></i> Mehr erfahren
    </a>
  </div>

</section>


<?php get_footer() ?>