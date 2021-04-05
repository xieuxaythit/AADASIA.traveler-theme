<?php

add_action('vc_before_init', 'load_ALH_Custom_Controls');

function load_ALH_Custom_Controls() {
    vc_map([
        "name" => __("ALH Gallery Carousel", 'traveler'),
        "base" => "alh_gallery_carousel",
        "icon" => "icon-alh",
        "content_element" => true,
        "category" => "Modern Layout",
        "params" => array(
            [
                "type" => "attach_images",
                "heading" => __("Gallery", 'traveler'),
                "param_name" => "images",
                "description" => "",
            ],
            [
                "type" => "textfield",
                "heading" => __("Title", 'traveler'),
                "param_name" => "title",
                "description" => "",
            ],
            [
                "type" => "vc_link",
                "heading" => __("Link to Lorem ipsum", 'traveler'),
                "param_name" => "link",
                "description" => "",
            ],
            [
                "type" => "checkbox",
                "heading" => __("Open image in Lightbox?", 'traveler'),
                "param_name" => "lightbox",
                "value" => [__("Yes", 'traveler') => true],
                "std" => '',
            ],
        )
    ]);

    vc_map(array(
        'name' => esc_html__("ALH Tour Search Form", 'traveler'),
        'base' => 'alh_tour_search_form',
        'icon' => 'icon-alh',
        'category' => 'Modern Layout',
        'params' => array(
            [
                'type' => 'dropdown',
                'heading' => __('Style', 'traveler'),
                'param_name' => 'style',
                'value' => [
                    __('Style 1', 'traveler') => 'style1',
                    __('Style 2', 'traveler') => 'style2',
                    __('Style 3', 'traveler') => 'style3',
                ],
                'std' => 'style1'
            ],
        )
    ));
}

?>