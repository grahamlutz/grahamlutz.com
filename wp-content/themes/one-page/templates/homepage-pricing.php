<?php
$pricings = Onepage_Data::get_instance()->pricing();
//print_r($pricings);
if (!empty($pricings)) {
    $count = 1;
    $non_empty_count = 0;
     foreach ($pricings['pricings'] as $pricing) {
        if (!empty($pricing['onepage_pricing_box' . $count . '_heading'])) {
            $non_empty_count++;
        }
        $count++;
    }
    if ($non_empty_count > 0) {
        ?>
        <!-- pricing Section -->
        <section id="pricing" class="section_7">
            <div class="pricing_div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="main_head animated fade_in_up"><?php echo esc_html($pricings['onepage_pricing_main_heading']); ?></h2>
                            <hr class="pricing_sep animated fade_in_up">
                            <p class="main_desc animated fade_in_up"><?php echo esc_html($pricings['onepage_pricing_sub_heading']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pricing_wrapper">
                            <style></style>
                            <?php
                            $count = 1;
                            foreach ($pricings['pricings'] as $pricing) {
                                ?>
                                <div class="col-md-4">
                                    <div class="pricing_item <?php echo esc_attr($pricing['count']); ?> animated bounce" style="animation-delay: <?php echo esc_attr($pricing['animation']); ?>;">
                                        <ul>
                                            <li class="table_icon"><span class="glyphicon <?php echo esc_attr($pricing['onepage_pricing_box' . $count . '_icon']); ?>"></span></li>
                                            <li class="table_heading"><h3><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_heading']); ?></h3></li>
                                            <li class="table_price"><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_price']); ?></li>
                                            <li><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_feature1']); ?></li>
                                            <li><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_feature2']); ?></li>
                                            <li><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_feature3']); ?></li>
                                            <li><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_feature4']); ?></li>
                                            <li><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_feature5']); ?></li>
                                            <li class="table_button"><a href="<?php echo esc_url($pricing['onepage_pricing_box' . $count . '_button_link']); ?>"><?php echo esc_html($pricing['onepage_pricing_box' . $count . '_button_text']); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ pricing Section -->
    <?php }
} ?>
