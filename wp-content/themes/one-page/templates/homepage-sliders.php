<?php
$sliders = Onepage_Data::get_instance()->sliders();
if (!empty($sliders)) {
    $non_empty_count = 0;
    foreach ($sliders as $key => $slider) {
        if (!empty($slider['onepage_slider_image'])) {
            $non_empty_count++;
        }
    }
    if ($non_empty_count > 0) {
        ?>
        <!-- slider section-->
        <section class="section_1">
            <div id="slider" class="sl-slider-wrapper">
                <div class="sl-slider">
                    <?php
                    foreach ($sliders as $key => $slider) {
                        if (!empty($slider['onepage_slider_image'])) {
                            ?>
                            <!-- Slider 1 -->
                            <div class="sl-slide" data-orientation="<?php echo esc_attr($slider['onepage_slider_trans']); ?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                                <div class="sl-slide-inner">
                                    <div class="bg-img bg-img-1"><img src='<?php echo esc_url($slider['onepage_slider_image']); ?>' alt=""/></div>
                                    <div class="slider_caption_wrapper">
                                        <div class="slider_caption">
                                            <h2><?php echo esc_attr($slider['onepage_slider_heading']); ?></h2>
                                            <div class="slider_sep"></div>
                                            <p><?php echo esc_attr($slider['onepage_slider_subheading']); ?></p>
                                            <a class="slider_button" href="<?php echo esc_url($slider['onepage_slider_button_link']); ?>"><?php echo esc_attr($slider['onepage_slider_button_text']); ?></a>
                                        </div>
                                    </div>
                                    <div class="slider_overlay" <?php echo "style='background-color:" . $slider['onepage_slider_overlay'] . "'"; ?>></div>
                                </div>
                            </div>
                            <!-- /Slider 1 -->
                            <?php
                        }
                    }
                    ?>

                </div><!-- /sl-slider -->
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </nav>
            </div>
        </section>
        <!-- /slider section-->
    <?php }
} ?>
