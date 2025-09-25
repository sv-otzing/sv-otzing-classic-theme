<?php wp_footer() ?>

<footer class="site-footer">
    <div class="footer-sponsors swiper sponsor-swiper">
        <div class="swiper-wrapper">
            <?php
            $sponsor_args = array(
                'post_type' => 'sponsor',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $sponsor_query = new WP_Query($sponsor_args);

            if ($sponsor_query->have_posts()):
                while ($sponsor_query->have_posts()):
                    $sponsor_query->the_post();
                    $sponsor_url = get_field('sponsor_url');
                    $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if ($logo_url):
                        ?>
                        <div class="swiper-slide">
                            <?php if ($sponsor_url): ?>
                                <a href="<?php echo esc_url($sponsor_url); ?>" target="_blank" rel="noopener">
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            <?php else: ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="footer-main">
        <div class="footer-column">
            <h4>LINKS</h4>
            <ul>
                <li><a href="/downloads">Downloads</a></li>
                <li><a href="/privacy">Datenschutz</a></li>
                <li><a href="/impressum">Impressum</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>KONTAKT</h4>
            <p class="white">Email: <a href="mailto:vorstand@sv-otzing.de">vorstand@sv-otzing.de</a></p>
        </div>
        <div class="footer-column">
            <h4>ANFAHRT</h4>
            <p class="white">
                <a href="https://maps.app.goo.gl/pWgCqwKZcCDQvHDz6" target="_blank" rel="noopener noreferrer">
                    Schulweg 10<br>94563 Otzing
                </a>
            </p>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-logo-wrapper">
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        bloginfo('name');
                    } ?>
                </a>
            </div>
        </div>
        <p class="footer-clubname">SV OTZING 1946 E.V.</p>
    </div>
</footer>

</body>

</html>