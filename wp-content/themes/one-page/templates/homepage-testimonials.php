<?php
$testimonials = Onepage_Data::get_instance()->testimonial();
if (!empty($testimonials)) {
    $count = 1;
    $non_empty_count = 0;
    foreach ($testimonials['testimonials'] as $testimonial) {
        if (!empty($testimonial['onepage_testimonial_' . $count . '_image'])) {
            $non_empty_count++;
        }
        $count++;
    }
    if ($non_empty_count > 0) {
        ?>
        <!-- testimonial Section -->
        <section id="testimonial" class="section_6">
            <div class="testimonial_div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="main_head animated fade_in_up"><?php echo esc_html($testimonials['onepage_testimonial_main_heading']); ?></h2>
                            <hr class="testimonial_sep animated fade_in_up">
                            <p class="main_desc animated fade_in_up"><?php echo esc_html($testimonials['onepage_testimonial_sub_heading']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="testimonial_wrapper">
                            <!-- Testimonial -->
                            <div class="testimonials-slider">
                                <?php
                                $count = 1;
                                foreach ($testimonials['testimonials'] as $testimonial) {
                                    ?>
                                    <div class="slide">
                                        <img class="animated fade_left" src='<?php echo esc_url($testimonial['onepage_testimonial_' . $count . '_image']); ?>' onmouseover="javascript: this.title = '';" title="">
                                        <div class="bx-caption animated fade_right">
                                            <span><a class="arrow"></a>
                                                <?php echo esc_html($testimonial['onepage_testimonial_' . $count . '_content']); ?>
                                                <a class="testimonial"><?php echo esc_html($testimonial['onepage_testimonial_' . $count . '_name']); ?></a>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- END Testimonial -->
                                    <?php
                                    $count++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--/testimonial section-->
    <?php }
} ?>