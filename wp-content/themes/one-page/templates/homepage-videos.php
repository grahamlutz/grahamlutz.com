<?php
$video = Onepage_Data::get_instance()->video();
if (!empty($video['onepage_video_iframe'])) {
    ?>
    <!--iframe/video section-->
    <section id="frame" class="section_5">
        <div class="frame_div">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="main_head animated fade_in_up"><?php echo esc_attr($video['onepage_video_main_heading']); ?></h2>
                        <hr class="frame_sep animated fade_in_up">
                        <p class="main_desc animated fade_in_up"><?php echo esc_attr($video['onepage_video_sub_heading']); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="frame_wrapper animated fade_in_up">
                        <?php echo $video['onepage_video_iframe']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/iframe/video section-->
<?php } ?>