<!-- Footer -->
<?php
if (is_active_sidebar('first-footer-widget-area') || is_active_sidebar('second-footer-widget-area') || is_active_sidebar('third-footer-widget-area') || is_active_sidebar('fourth-footer-widget-area')) :
    ?>
    <div class="footer_wrapper">
        <div class="footer" <?php echo "style='background-color:" . onepage_get_option('onepage_footer_sidebar_bg_color', '#111') . "'"; ?>>
            <div class="container">
                <div class="row">
                    <?php
                    /* A sidebar in the footer? Yep. You can can customize
                     * your footer with four columns of widgets.
                     */
                    get_sidebar('footer');
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
    ?>
    <!--</div>-->
    <div class="bottom_footer" <?php echo "style='background-color:" . onepage_get_option('onepage_footer_bg_color', '#0d141b') . "'"; ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $logo = '';
                    $logo_text = '';
                    $logo_text = onepage_get_option('onepage_header_logo_text');
                    if (isset($logo_text) && $logo_text != '') {
                        $logo = "<h1 class='logo_text_footer'>" . $logo_text . "</h1>";
                    } else {
                        if (onepage_get_option('onepage_header_logo_img') != '') {
                            $logo = "<img src='" . onepage_get_option('onepage_header_logo_img', ONEPAGE_DIR_URI . 'assets/images/site_logo.png') . "' alt='logo' />";
                        } else {
                            $logo = "<img src='" . ONEPAGE_DIR_URI . 'assets/images/site_logo.png' . "' alt='logo' />";
                        }
                    }
                    echo $logo;
                    $socials = Onepage_Data::get_instance()->social();
                    if (!empty($socials)) {
                        ?>
                        <ul class="footer_social">
                            <?php
                            foreach ($socials as $social) {
                                if ($social['link'] != '') {
                                    ?>
                                    <li>
                                        <a class="<?php echo esc_attr($social['class']); ?> animated bounce" href="<?php echo esc_url($social['link']); ?>" title="<?php echo esc_attr($social['title']); ?>" style="animation-delay: <?php echo esc_attr($social['animation']); ?>"><i class="fa <?php echo esc_attr($social['icon']); ?>"></i></a>
                                    </li>                                      
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    <?php } ?>
                    <p><?php echo esc_attr(onepage_get_option('onepage_footer_copyright_text', 'Copyright &copy; InkThemes.com')); ?></p>
                    <div class="scroll-top page-scroll visible-xs visible-sm">
                        <a class="to_top page-scroll" href="#page-top">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>