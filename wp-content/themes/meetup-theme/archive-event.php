<?php
    get_header();
    pageBanner(array(
        'title' => 'Events',
        'subtitle' => ' '
    ));
?>

<div class="container container--narrow page-section">
    <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content-event');
        }
        echo paginate_links();
    ?>
    <hr class="section-break">
    <p>Looking for a recap of our events? <a href="<php echo site_url('/past-events') ?>">Click here to view our past events.</a></p>
</div>

<?php get_footer(); ?>