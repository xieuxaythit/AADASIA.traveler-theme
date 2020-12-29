<?php
    // Note: If an error occurs because of missing function "st_reg_shortcode", 
    // check if plugin Traveler-code is up to date and active

    function st_location_list_tour_func($attr) {
        global $st_search_args;
        $data = shortcode_atts(
                array(
            'st_location_style' => "",
            'st_location_num' => "",
            'st_location_orderby' => "",
            'st_location_order' => "",
            'st_location' => get_the_ID()
                ), $attr, 'st_location_list_tour');
        extract($data);
        $st_search_args = $data;
        $return = '';
        $query = array(
            'post_type' => 'st_tours',
            'posts_per_page' => $st_location_num,
            'order' => $st_location_order,
            'orderby' => $st_location_orderby,
            'post_status' => 'publish',
        );
        if (STInput::request('style')) {
            $st_location_style = STInput::request('style');
        };
        if ($st_location_style == 'list') {
            $return .= "<ul class='booking-list loop-tours style_list loop-tours-location'>";
        } else {
            //$return .= '<div class="row row-wrap grid-tour-location">';
            //$return .= '<div class="search-result-page st-tours service-slider-wrapper"><div class="st-hotel-result"><div class="owl-carousel list-service-style2">';
            $return .= '<div class="search-result-page st-tours row row-wrapper">';
        }
        $tour = STTour::get_instance();
        $tour->alter_search_query();
        query_posts($query);
        while (have_posts()) {
            the_post();
            if ($st_location_style == 'list') {
                $return .= st()->load_template('tours/elements/loop/loop-1', null, array('tour_id' => get_the_ID()));
            } else {
                //$return .= st()->load_template('tours/elements/loop/loop-2', null, array('tour_id' => get_the_ID()));

                // Load grid template from chidtheme "traveler-childtheme/st_templates/layouts/tour-grid.php"
                $return .= st()->load_template('layouts/tour-grid', ''); 
            }
        }
        $tour->remove_alter_search_query();
        wp_reset_query();
        if ($st_location_style == 'list') {
            $return .= "</ul>";
        } else {
            //$return .= "</div>";
            //$return .= '</div></div></div>';
            $return .= "</div>";
        }
        return $return;
    }

    st_reg_shortcode('st_location_list_tour', 'st_location_list_tour_func');


    //Best seller program
    function st_best_seller_ft($attr, $content = null) {
        return st()->load_template('layouts/best-seller', '', array('attr' => $attr));
    }
    st_reg_shortcode('st_best_seller', 'st_best_seller_ft');
?>