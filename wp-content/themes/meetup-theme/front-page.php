<?php
get_header();

$heroHeader = esc_attr(get_option('hero_header'));
$heroSubtitle1 = esc_attr(get_option('hero_subtitle_1'));
$heroSubtitle2 = esc_attr(get_option('hero_subtitle_2'));
$heroButton = esc_attr(get_option('hero_button'));
$heroButtonLink = esc_attr(get_option('hero_button_link'));
$heroImage = esc_attr(get_option('hero_image'));
?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $heroImage ?>);"></div>
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large testClass"><?php echo $heroHeader ?></h1>
        <h2 class="headline headline--medium"><?php echo $heroSubtitle1 ?></h2>
        <h3 class="headline headline--small"><?php echo $heroSubtitle2 ?></h3>
        <a href="<?php echo $heroButtonLink ?>" class="btn btn--large btn--blue"><?php echo $heroButton ?></a>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

            <?php
            $today = date('Y-m-d H:i:s'); //date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'event',
                'order' => 'ASC',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'DATETIME' //'numeric'
                    )
                )
            ));

            while ($homepageEvents->have_posts()) {
                $homepageEvents->the_post();
                get_template_part('/template-parts/content', get_post_type());
            }
            ?>

            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>

        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Latest <?php echo get_the_title(get_option('page_for_posts')); ?></h2>
            <?php
            $homepagePosts = new WP_Query(array(
                'posts_per_page' => 2
            ));

            while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post();
                ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="#">
                        <span class="event-summary__month"><?php the_time('M') ?></span>
                        <span class="event-summary__day"><?php the_time('j') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p>
                            <?php echo wp_trim_words(get_the_content(), 14); ?>
                            <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                        </p>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>

            <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All <?php echo get_the_title(get_option('page_for_posts')); ?></a></p>
        </div>
    </div>
</div>

<?php
$sliderHeader1 = esc_attr(get_option('slider_header_1'));
$sliderHeader2 = esc_attr(get_option('slider_header_2'));
$sliderHeader3 = esc_attr(get_option('slider_header_3'));
$sliderSubtitle1 = esc_attr(get_option('slider_subtitle_1'));
$sliderSubtitle2 = esc_attr(get_option('slider_subtitle_2'));
$sliderSubtitle3 = esc_attr(get_option('slider_subtitle_3'));
$sliderButtonText1 = esc_attr(get_option('slider_button_text_1'));
$sliderButtonText2 = esc_attr(get_option('slider_button_text_2'));
$sliderButtonText3 = esc_attr(get_option('slider_button_text_3'));
$sliderButtonLink1 = esc_attr(get_option('slider_button_link_1'));
$sliderButtonLink2 = esc_attr(get_option('slider_button_link_2'));
$sliderButtonLink3 = esc_attr(get_option('slider_button_link_3'));
$sliderImage1 = esc_attr(get_option('slider_image_1'));
$sliderImage2 = esc_attr(get_option('slider_image_2'));
$sliderImage3 = esc_attr(get_option('slider_image_3'));
?>
<div id="hero-slider" class="hero-slider">
    <div class="hero-slider__slide" style="background-image: url(<?php echo $sliderImage1 ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center"><?php echo $sliderHeader1 ?></h2>
                <p class="t-center"><?php echo $sliderSubtitle1 ?></p>
                <p class="t-center no-margin"><a href="<?php echo $sliderButtonLink1 ?>" class="btn btn--blue"><?php echo $sliderButtonText1 ?></a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo $sliderImage2 ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center"><?php echo $sliderHeader2 ?></h2>
                <p class="t-center"><?php echo $sliderSubtitle2 ?></p>
                <p class="t-center no-margin"><a href="<?php echo $sliderButtonLink2 ?>" class="btn btn--blue"><?php echo $sliderButtonText2 ?></a></p>
            </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo $sliderImage3 ?>);">
        <div class="hero-slider__interior container">
            <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center"><?php echo $sliderHeader3 ?></h2>
                <p class="t-center"><?php echo $sliderSubtitle3 ?></p>
                <p class="t-center no-margin"><a href="<?php echo $sliderButtonLink3 ?>" class="btn btn--blue"><?php echo $sliderButtonText3 ?></a></p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>