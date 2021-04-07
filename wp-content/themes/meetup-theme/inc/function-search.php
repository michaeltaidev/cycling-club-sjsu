<?php

    add_action('rest_api_init', 'meetupRegisterSearch');

    function meetupRegisterSearch() {
        register_rest_route('meetup/v1', 'search', array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'meetupSearchResults'
        ));
    }

    function meetupSearchResults($data) {
        $mainQuery = new WP_Query(array(
            'post_type' => array('event', 'post'),
            'posts_per_page' => -1,
            's' => sanitize_text_field($data['term']) 
        ));

        $results = array(
            'news' => array(), 
            'events' => array()
        );

        while($mainQuery->have_posts()) {

            $mainQuery->the_post();

            if(get_post_type() == 'post') {
                array_push($results['news'], array(
                    'title' => get_the_title(),
                    'description' => wp_trim_words(get_the_content(), 14),
                    'permalink' => get_the_permalink(),
                    'month' => get_the_time('M'),
                    'day' => get_the_time('d')
                ));
            }

            if (get_post_type() == 'event') {

                $eventDate = new DateTime(get_post_field('event_date'));

                array_push($results['events'], array(
                    'title' => get_the_title(),
                    'description' => wp_trim_words(get_the_content(), 14),
                    'permalink' => get_the_permalink(),
                    'month' => $eventDate->format('M'),
                    'day' => $eventDate->format('d')
                ));
            }
        }

        return $results;
    }

?>