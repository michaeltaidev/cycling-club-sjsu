<?php
    get_header();
    pageBanner();
?>

<div class="container container--narrow page-section">
    <?php
        $today = date('Y-m-d H:i:s');
        $pastEvents = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            'posts_per_page' => 10,
            'post_type' => 'event',
            'order' => 'DESC',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '<=',
                    'value' => $today,
                    'type' => 'DATETIME'
                )
            )
        ));

        while ($pastEvents->have_posts()) {
            $pastEvents->the_post();
            get_template_part('template-parts/content-event');
        }
        echo paginate_links(array(
            'total' => $pastEvents->max_num_pages
        ));
    ?>
</div>

<?php get_footer(); ?>