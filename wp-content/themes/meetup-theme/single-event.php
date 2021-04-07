<?php

    get_header();

    while (have_posts()) {
        the_post();
        pageBanner();

        ?>
            <div class="container container--narrow page-section">
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo site_url('/events'); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Back to Events
                        </a>
                        <?php $eventDate = new DateTime(get_post_field('event_date')); ?>
                        <span class="metabox__main"><?php the_title() ?></span>
                    </p>
                </div>

                <div class="generic-content"><?php the_content(); ?></div>

                <div class="generic-content">
                    <br>
                    <p>Date: <strong><?php echo $eventDate->format(get_option('date_format')); ?></p></strong>
                    <p>Time: <strong><?php echo $eventDate->format(get_option('time_format')); ?></p></strong>
                    <p>Location: <strong><?php echo get_post_field('address'); ?></p></strong>
                </div>

                <?php 
                    $mapLocation = get_field('map_location'); 
                    $googleAPIKey = esc_attr(get_option('google_api_key'));
                    if($googleAPIKey) { 
                        ?>
                            <div class="acf-map">
                                <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php echo $mapLocation['address']; ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        <?php
    }

    get_footer();

?>