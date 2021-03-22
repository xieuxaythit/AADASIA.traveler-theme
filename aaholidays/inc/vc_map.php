<?php

add_action('vc_before_init', 'load_ALH_Gallery_Carousel');

function load_ALH_Gallery_Carousel() {
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
}

?>