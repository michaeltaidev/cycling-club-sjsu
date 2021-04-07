<footer class="site-footer">

    <div class="site-footer__inner container container--narrow">

        <div class="group">

            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?php echo home_url() ?>">
                        <?php $siteLogo = esc_attr(get_option('site_logo')); ?>
                        <img src="<?php echo $siteLogo ?>" class="header-logo">
                    </a>
                </h1>
                <?php
                $contactPhone = esc_attr(get_option('contact_phone'));
                $contactEmail = esc_attr(get_option('contact_email'));
                ?>
                <p class="contact_info_text"><?php echo $contactPhone ?></p>
                <p class="contact_info_text"><?php echo $contactEmail ?></p>
                <br>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">
                    <h3 class="headline headline--small">Explore</h3>
                    <nav class="nav-list">
                        <ul>
                            <li><a href="<?php echo site_url('/about-us') ?>"><?php echo get_the_title(11); ?></a></li>
                            <li><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
                            <li><a href="<?php echo site_url('/blog'); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small">Learn</h3>
                    <nav class="nav-list">
                        <ul>
                            <li><a href="<?php echo site_url('/legal') ?>">Legal</a></li>
                            <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four footer-social_btns">
                <h3 class="headline headline--small">Connect With Us</h3>
                <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>