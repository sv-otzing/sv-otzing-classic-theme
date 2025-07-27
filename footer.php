<?php wp_footer() ?>

<footer class="site-footer">

    <div class="footer-sponsors swiper sponsor-swiper">
        <div class="swiper-wrapper">
            <?php
            $startseite = get_page_by_title('Startseite');
            for ($i = 1; $i <= 10; $i++):
                $logo = get_field("sponsor_logo_$i", $startseite->ID);
                if ($logo):
                    ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
                    </div>
                    <?php
                endif;
            endfor;
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
            <p class="white">Email: <a href="mailto:vorstand@sv-otzing.de">info@sv-otzing.de</a></p>
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