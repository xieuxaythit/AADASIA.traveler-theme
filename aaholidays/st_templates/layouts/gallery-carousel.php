<?php
$gallery_array = array();
$gallery_full_array = array();

if(!empty($attr['images'])){
    $img_arr = explode(',', $attr['images']);
    
    if(!empty($img_arr)){
        foreach ($img_arr as $key => $value){
            array_push($gallery_array, wp_get_attachment_image_url($value, 'medium'));
            array_push($gallery_full_array, wp_get_attachment_image_url($value, 'full'));
        }
    }
}
?>
<div class="st-aboutus-gallery">
    <?php if ( !empty( $gallery_array ) ) { ?>
        <div class="st-flickity st-gallery">
        <?php 
        if(!$attr['lightbox']) {
            ?>
            <div class="carousel" data-flickity='{"fullscreen": true, "wrapAround": true, "pageDots": true , "autoPlay": true, "bgLazyLoad": 2}'>
            <?php
            foreach ( $gallery_array as $value ) {
                ?>
                <div class="item" data-flickity-bg-lazyload="<?php echo esc_attr($value); ?>"></div>
                <?php
            }
            ?>
            </div>
            <?php
        }
        else {
            ?>
            <div class="carousel" data-flickity='{"wrapAround": true, "pageDots": true , "autoPlay": true, "bgLazyLoad": 2}'>
            <?php
            foreach ( $gallery_array as $k => $v ) {
                ?>
                <div class="item" data-flickity-bg-lazyload="<?php echo esc_attr($gallery_array[$k]); ?>">
                    <a class="item__lightbox" href="<?php echo esc_attr($gallery_full_array[$k]); ?>" data-lightbox="lightbox"></a>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
        ?>
            <div class="slogan">
                <h4><?php echo esc_html($attr['title']); ?></h4>
                <?php
                $link  = vc_build_link($attr['link']);
                if(!empty($link)){
                    ?>
                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="btn btn-primary"><?php echo esc_html($link['title']); ?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    <?php } ?>
</div>
