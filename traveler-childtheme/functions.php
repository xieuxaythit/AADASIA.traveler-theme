<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/v2/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/v2/css/font-awesome.min.css');
    wp_enqueue_style('fotorama-css', get_template_directory_uri() . '/v2/js/fotorama/fotorama.css');
    wp_enqueue_style('rangeSlider-css', get_template_directory_uri() . '/v2/js/ion.rangeSlider/css/ion.rangeSlider.css');
    wp_enqueue_style('rangeSlider-skinHTML5-css', get_template_directory_uri() . '/v2/js/ion.rangeSlider/css/ion.rangeSlider.skinHTML5.css');
    wp_enqueue_style('daterangepicker-css', get_template_directory_uri() . '/v2/js/daterangepicker/daterangepicker.css');

    wp_enqueue_style('sweetalert2-css', get_template_directory_uri() . '/v2/css/sweetalert2.css');
    wp_enqueue_style('select2.min-css', get_template_directory_uri() . '/v2/css/select2.min.css');
    wp_enqueue_style('flickity-css', get_template_directory_uri() . '/v2/css/flickity.css');
    wp_enqueue_style('magnific-css', get_template_directory_uri() . '/v2/js/magnific-popup/magnific-popup.css');
    wp_enqueue_style('owlcarousel-css', get_template_directory_uri() . '/v2/js/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('enquire-css', get_template_directory_uri() . '/v2/css/enquire.css');
    wp_enqueue_style('mCustomScrollbar-css', 'https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.min.css');
    

    wp_enqueue_style('helpers-css', get_template_directory_uri() . '/v2/css/helpers.css');
    wp_enqueue_style('st-style-css', get_template_directory_uri() . '/v2/css/style.css');
    wp_enqueue_style('affilate-css', get_template_directory_uri() . '/v2/css/affilate.css');
    wp_enqueue_style('affilate-h-css', get_template_directory_uri() . '/v2/css/affilate-h.css');
    wp_enqueue_style('search-result-css', get_template_directory_uri() . '/v2/css/search_result.css');
    wp_enqueue_style('st-fix-safari-css', get_template_directory_uri() . '/v2/css/fsafari.css');
    wp_enqueue_style('checkout-css', get_template_directory_uri() . '/v2/css/checkout.css');
    wp_enqueue_style('partner-page-css', get_template_directory_uri() . '/v2/css/partner_page.css');
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/v2/css/responsive.css');
    wp_enqueue_style('single-tour', get_template_directory_uri() . '/v2/css/sin-tour.css');
    if ('location' === get_post_type()) {
        wp_enqueue_style('location-css', get_template_directory_uri() . '/v2/css/location.css');
    }

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/style.css');
}

if (!function_exists('st_add_custom_css')) {
    remove_action(defined('W3TC') ? 'st_after_footer' : 'wp_head', 'st_add_custom_css', 21);

    add_action(defined('W3TC') ? 'st_after_footer' : 'wp_head', 'st_add_custom_css', 21);

    function st_add_custom_css() {
        ?>
            <style id="theme_setting_custom_css">
            <?php echo st()->get_option('custom_css'); ?>
            </style>
        <?php
    }
}

add_filter( 'vc_grid_item_shortcodes', 'my_module_add_grid_shortcodes' );
function my_module_add_grid_shortcodes( $shortcodes ) {
    $shortcodes['vc_custom_post_meta'] = array(
        'name' => __( 'Tour min price', 'my-text-domain' ),
        'base' => 'vc_custom_post_meta',
        'category' => __( 'Content', 'my-text-domain' ),
        'description' => __( 'Show custom post meta', 'my-text-domain' ),
        'post_type' => Vc_Grid_Item_Editor::postType(),
    );
 
    return $shortcodes;
}
// output function
add_shortcode( 'vc_custom_post_meta', 'vc_custom_post_meta_render' );
function vc_custom_post_meta_render($atts, $content, $tag) {
    return '<h2>Lorem ipsum: {{ custom_meta }}</h2>';
}
  
add_filter( 'vc_gitem_template_attribute_custom_meta', 'vc_gitem_template_attribute_custom_meta ', 10, 2 );
function vc_gitem_template_attribute_custom_meta( $value, $data ) {
    /**    
     * @var Wp_Post $post
    * @var string $data
    */
    extract( array_merge( array(
        'post' => null,
        'data' => '',
    ), $data ) );

    return var_export( get_post_meta( $post->ID, 'min_price' ), true );
}

// function mytheme_includes() {
// 	require_once get_theme_file_path( 'inc/best-seller.php' );
// }
// add_action( 'after_setup_theme', 'mytheme_includes' );

include_once  "inc/shortcodes.php";
include_once  "inc/custom_currency.php";
