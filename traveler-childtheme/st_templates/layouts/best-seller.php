<?php
extract(shortcode_atts(array(
    'best_seller' => '',
    'id' => '',
    'link' => '',
), $attr));
$st_link = vc_build_link($link);
$args = [
    'post_type' => 'st_tours',
    'posts_per_page' => 1,
    'post__in' => explode(',', $attr['id'])
];
$tour = STTour::get_instance();
$tour->alter_search_query();
$query = new WP_Query($args);

if ($query->have_posts()) {
    echo '<div class="best-seller-swapper">';
    echo '<div class="container">';

    echo '<div class="row st-best-seller">';
    while ($query->have_posts()) {
        $query->the_post();
        global $post;

        ?>
        <?php
        if (has_post_thumbnail()) {
            ?>
            <div class="thumb col-sm-6 col-sm-push-6 ">
               <div class="item">
                   <a href="<?php echo esc_url(get_the_permalink()); ?>">
                       <?php the_post_thumbnail(); ?>
                   </a>
               </div>
            </div>
        <?php }
        ?>
        <div class="st-best-seller-text col-sm-6 col-sm-pull-6  ">
            <label class="best-seller-label"><?php echo esc_html($best_seller) ?></label>
            <h2 class="tour-title"><?php echo get_the_title()?></h2>
            <p class="tour-description"><?php echo esc_html(wp_trim_words(get_the_excerpt(),50)); ?></p>
            <p class="price">
                <span>
                        <?php echo TravelHelper::getNewIcon('thunder', '#ffab53', '10px', '16px'); ?>
                </span>
                <span class="value">
                   <?php
                   echo STTour::get_price_html($post->ID);
                   ?>
                </span>
                <span><?php echo esc_html__('/person',ST_TEXTDOMAIN) ?></span>

            </p>
            <a class="st-tour-link" href="<?php echo esc_url($st_link['url']) ?>"><?php echo esc_html__('View Detail',ST_TEXTDOMAIN)  ?></a>

        </div>

    <?php }

    echo '</div></div></div>';
}
$tour->remove_alter_search_query();
wp_reset_postdata();
?>

