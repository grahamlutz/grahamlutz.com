<?php
$services = Onepage_Data::get_instance()->services();
if (!empty($services)) {
    $count = 1;
    $non_empty_count = 0;
    foreach ($services['services'] as $key => $service) {
        if (!empty($service['onepage_service_box_heading_' . $count])) {
            $non_empty_count++;
        }
        $count++;
    }
    if ($non_empty_count > 0) {
        ?>
        <!--service section-->
        <section id="services" class="section_2">
            <div class="services_div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="main_head animated fade_in_up"><?php echo esc_html($services['onepage_service_section_heading']); ?></h2>
                            <hr class="service_sep animated fade_in_up">
                            <p class="main_desc animated fade_in_up"><?php echo esc_html($services['onepage_service_section_sub_heading']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        //print_var( $services );
                        $count = 1;
                        foreach ($services['services'] as $key => $service) {
                            ?>
                            <!-- Service Box <?php echo $count; ?> -->
                            <div class="col-md-3">
                                <div class="services_item animated fade_in_up" style="animation-delay: <?php echo esc_attr($service['animation']); ?>">
                                    <span class="glyphicon <?php echo esc_attr($service['onepage_service_box_icon_' . $count]); ?> <?php echo esc_attr($service['row']); ?>"></span>
                                    <h4><?php echo esc_html($service['onepage_service_box_heading_' . $count]); ?></h4>
                                    <p><?php echo esc_html($service['onepage_service_box_desc_' . $count]); ?></p>
                                </div>
                            </div>
                            <!-- /Service Box <?php echo $count; ?> -->           
                            <?php
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--/service section-->
    <?php }
} ?>

