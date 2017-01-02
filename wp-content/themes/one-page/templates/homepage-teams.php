<?php
$teams = Onepage_Data::get_instance()->team();
if (!empty($teams)) {
    $count = 1;
    $non_empty_count = 0;
    foreach ($teams['teams'] as $team) {
        if (!empty($team['onepage_member' . $count . '_image_link'])) {
            $non_empty_count++;
        }
        $count++;
    }
    if ($non_empty_count > 0) {
        ?>
        <!--Team Information section-->
        <section id="team" class="section_8">
            <div class="team_div">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="main_head"><?php echo esc_html($teams['onepage_team_main_heading']); ?></h2>
                            <hr class="team_sep">
                            <p class="main_desc"><?php echo esc_html($teams['onepage_team_sub_heading']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="team_wrapper">
                            <?php
                            $count = 1;
                            foreach ($teams['teams'] as $team) {
                                ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="team_item animated bounce" style="animation-delay: <?php echo esc_attr($team['animation']); ?>">
                                        <div class="team_image">
                                            <img src='<?php echo esc_url($team['onepage_member' . $count . '_image_link']); ?>' />
                                            <div class="team_caption">
                                                <p><?php echo wp_kses_post($team['onepage_member' . $count . '_caption_text']); ?></p>
                                            </div>
                                        </div>
                                        <h4><?php echo esc_html($team['onepage_member' . $count . '_name']); ?></h4>
                                        <span><?php echo esc_html($team['onepage_member' . $count . '_designation']); ?></span>
                                        <ul class="team_social">
                                            <li>
                                                <a href="<?php echo esc_url($team['onepage_member' . $count . '_fb_link']); ?>"><i class="fa fa-fw fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($team['onepage_member' . $count . '_g_plus_link']); ?>"><i class="fa fa-fw fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($team['onepage_member' . $count . '_tw_link']); ?>"><i class="fa fa-fw fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url($team['onepage_member' . $count . '_ln_link']); ?>"><i class="fa fa-fw fa-linkedin"></i></a>
                                            </li>
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
        <!--/Team Information section-->
    <?php }
}
?>
