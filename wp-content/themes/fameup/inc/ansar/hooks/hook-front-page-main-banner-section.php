<?php
if (!function_exists('fameup_front_page_banner_section')) :
    /**
     *
     * @since Fameup
     *
     */
    function fameup_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $fameup_enable_main_slider = fameup_get_option('show_main_news_section');
        $select_vertical_slider_news_category = fameup_get_option('select_vertical_slider_news_category');
        $vertical_slider_number_of_slides = fameup_get_option('vertical_slider_number_of_slides');
        $all_posts_vertical = fameup_get_posts($vertical_slider_number_of_slides, $select_vertical_slider_news_category);
        if ($fameup_enable_main_slider): ?>
         <div class="col-12">
            <?php $fameup_slider_layout = get_theme_mod('fameup_slider_layout','slider-default');

            if($fameup_slider_layout == 'slider-default' ) { ?>
            <div class="homemain bs swiper-container">
            <?php } elseif($fameup_slider_layout == 'slider-three-col'){ ?>
                <div class="homemain bs two swiper-container">
            <?php } elseif($fameup_slider_layout == 'slider-two-col'){ ?>
                <div class="homemain three bs swiper-container">
            <?php }
            elseif($fameup_slider_layout == 'slider-two-col'){ ?>
                <div class="homemain three bs swiper-container">
            <?php } elseif($fameup_slider_layout == 'slider-full-col'){ ?>
            <div class="swiper bs thumbs-slider2">
            <?php } ?>

                <?php if($fameup_slider_layout == 'slider-full-col'){?>
                <div class="swiper-wrapper">
                   <?php fameup_get_block('list', 'banner'); ?>         
                </div>
                <div thumbsslider="" class="swiper thumbs-slider swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">

                <div class="swiper-wrapper" id="swiper-wrapper-3869a62b19f938ba" aria-live="polite" style="transform: translate3d(-330px, 0px, 0px); transition-duration: 0ms;">

                <?php fameup_get_block('thumb', 'banner'); ?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                </div>
                </div>
                
                <?php } else { ?>
                <div class="swiper-wrapper">
                   <?php fameup_get_block('list', 'banner'); ?>         
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <?php } ?>
            </div>
        </div>
    </div>
        <!--==/ Home Slider ==-->
        <?php endif; ?>
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('fameup_action_front_page_main_section_1', 'fameup_front_page_banner_section', 40);