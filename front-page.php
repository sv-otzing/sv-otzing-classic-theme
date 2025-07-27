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
            the_post_thumbnail('medium', ['alt' => get_the_title(), 'loading' => 'lazy']);
          } else {
            echo '<img src="https://picsum.photos/800/600?random=' . get_the_ID() . '" alt="" loading="lazy">';
          }
          ?>
        </a>
        <div class="news-overlay">
          <div class="news-overlay-content">

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
      </div>
      <?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<p>Keine News gefunden.</p>';
  endif;
  ?>
</div>

<div class="swiper news-swiper-mobile">
  <div class="swiper-wrapper">
    <?php
    $args = array(
      'posts_per_page' => 4,
      'post_status' => 'publish'
    );
    $latest_posts = new WP_Query($args);

    if ($latest_posts->have_posts()):
      while ($latest_posts->have_posts()):
        $latest_posts->the_post(); ?>
        <div class="swiper-slide">
          <a href="<?php the_permalink(); ?>">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('medium', ['alt' => get_the_title(), 'loading' => 'lazy']);
            } else {
              echo '<img src="https://picsum.photos/800/600?random=' . get_the_ID() . '" alt="" loading="lazy">';
            }
            ?>
            <div class="news-overlay">
              <div class="news-overlay-content">
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
          </a>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>

  <!-- Optional: Navigation -->
  <div class="swiper-pagination"></div>
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


  <div id="bfv1750015429708">Laden...</div>
  <script>
    BFVWidget.HTML5.zeigeVereinSpiele("00ES8GNI4S00000TVV0AG08LVUPGND5I", "bfv1750015429708", { height: "100%", width: "100%", selectedTab: BFVWidget.HTML5.vereinTabs.spiele, colorResults: "#1a1a1a", colorNav: "#ffffff", colorClubName: "#d32f2f", backgroundNav: "#d32f2f" });
  </script>
</section>

<section class="section">
  <div class="banner-container">
    <div class="banner-modern">
      <div class="content">
        <div class="text-content">
          <h1>werde Teil des SV Otzing!</h1>
          <p>Engagiere dich in unserem Verein – ob als Spieler, Fan oder Unterstützer. Wir freuen uns auf dich!
          </p>
          <a href="/verein/mitgliedschaft" class="svo-button-white">
            <?php feather_icon(name: 'mouse-pointer'); ?>
            Jetzt Mitglied werden
          </a>
          </a>
        </div>
        <div class="photo-section">
          <?php
          $startseite = get_page_by_title('Startseite');
          $logo = get_field("mitglieder_bild", $startseite->ID);
          if ($logo):
            $img_url = $logo['sizes']['medium_large'];
            $alt_text = $logo['alt'] ?: get_the_title($startseite->ID);
            ?>
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" loading="lazy">
            <?php
          endif;
          ?>

        </div>
      </div>
    </div>

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
              <?php the_post_thumbnail('medium', array('class' => 'wp-post-image', 'loading' => 'lazy')); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-news.jpg"
                alt="<?php the_title(); ?>" loading="lazy">
            <?php endif; ?>

            <div class="news-overlay">
              <div class="news-overlay-content">

                <?php
                $categories = get_the_category();
                if (!empty($categories)):
                  ?>
                  <span class="news-category"><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>

                <h3 class="news-title entry-title"><?php the_title(); ?></h3>

                <div class="news-meta entry-meta">
                  <?php echo get_the_date('d.m.Y'); ?>
                </div>
              </div>

            </div>
          </a>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>

  <div class="button-container">
    <a href="/category/news" class="svo-button">
      <?php feather_icon(name: 'book-open'); ?>
      Alle News anzeigen
    </a>
  </div>

</section>

<section class="section">
  <h1>Tradition Emotion SVO</h1>
  <?php
  $startseite = get_page_by_title('Startseite');
  $verein_text = get_field('verein_text', $startseite->ID);
  if ($verein_text):
    echo wp_kses_post($verein_text);
  else:
    echo '<p>Hier entsteht gerade eine neue Vereinsbeschreibung.</p>';
  endif;
  ?>
  <div class="button-container">
    <a href="/verein" class="svo-button">
      <i class="fa fa-caret-right
"></i> Mehr erfahren
    </a>
  </div>

</section>


<?php get_footer() ?>