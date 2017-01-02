<?php

class Onepage_Data {

    var $dummy_data = null;
    var $show_dummy = false;

    function __construct() {

        if (onepage_get_option('onepage_showdummy')) {
            $this->show_dummy = onepage_get_option('onepage_showdummy');
        }
        $this->dummy_data = require(ONEPAGE_DIR . '/includes/dummy-data/dummy-data.php');
    }

    static function Init() {
        $obj = new Onepage_Data();
        add_action('admin_notices', array($obj, 'notice'));
    }

    static function get_instance() {
        return new Onepage_Data();
    }

    function notice() {
        $class = 'notice notice-info is-dismissible';
        ?>
        <div class="<?php echo $class; ?>">
            <p><strong><?php _e('Onepage front page has been moved to as One Page template due to WordPress theme guidlines.', 'one-page'); ?></strong></p>
            <p><strong><?php printf(__('To getting back your home page as One Page, Create a page and set One Page template from template selection and set this page to Front Page from <a href="', 'one-page') . admin_url('options-reading.php') . __('">Reading settings</a> option.', 'one-page')); ?></strong></p>
        </div>
        <?php
    }

    function sliders() {
        $sliders[] = array(
            'onepage_slider_trans' => onepage_get_option('onepage_slider_trans_1', 'horizontal'),
            'onepage_slider_image' => onepage_get_option('onepage_slider_image_1'),
            'onepage_slider_heading' => onepage_get_option('onepage_slider_heading_1'),
            'onepage_slider_subheading' => onepage_get_option('onepage_slider_subheading_1'),
            'onepage_slider_button_link' => onepage_get_option('onepage_slider_button_link_1'),
            'onepage_slider_button_text' => onepage_get_option('onepage_slider_button_text_1'),
            'onepage_slider_overlay' => onepage_get_option('onepage_slider_overlay_1'),
        );
        $sliders[] = array(
            'onepage_slider_trans' => onepage_get_option('onepage_slider_trans_2', 'horizontal'),
            'onepage_slider_image' => onepage_get_option('onepage_slider_image_2'),
            'onepage_slider_heading' => onepage_get_option('onepage_slider_heading_2'),
            'onepage_slider_subheading' => onepage_get_option('onepage_slider_subheading_2'),
            'onepage_slider_button_link' => onepage_get_option('onepage_slider_button_link_2'),
            'onepage_slider_button_text' => onepage_get_option('onepage_slider_button_text_2'),
            'onepage_slider_overlay' => onepage_get_option('onepage_slider_overlay_2'),
        );
        $sliders[] = array(
            'onepage_slider_trans' => onepage_get_option('onepage_slider_trans_3', 'horizontal'),
            'onepage_slider_image' => onepage_get_option('onepage_slider_image_3'),
            'onepage_slider_heading' => onepage_get_option('onepage_slider_heading_3'),
            'onepage_slider_subheading' => onepage_get_option('onepage_slider_subheading_3'),
            'onepage_slider_button_link' => onepage_get_option('onepage_slider_button_link_3'),
            'onepage_slider_button_text' => onepage_get_option('onepage_slider_button_text_3'),
            'onepage_slider_overlay' => onepage_get_option('onepage_slider_overlay_3'),
        );
        $sliders[] = array(
            'onepage_slider_trans' => onepage_get_option('onepage_slider_trans_4', 'horizontal'),
            'onepage_slider_image' => onepage_get_option('onepage_slider_image_4'),
            'onepage_slider_heading' => onepage_get_option('onepage_slider_heading_4'),
            'onepage_slider_subheading' => onepage_get_option('onepage_slider_subheading_4'),
            'onepage_slider_button_link' => onepage_get_option('onepage_slider_button_link_4'),
            'onepage_slider_button_text' => onepage_get_option('onepage_slider_button_text_4'),
            'onepage_slider_overlay' => onepage_get_option('onepage_slider_overlay_4'),
        );
        $sliders[] = array(
            'onepage_slider_trans' => onepage_get_option('onepage_slider_trans_5', 'horizontal'),
            'onepage_slider_image' => onepage_get_option('onepage_slider_image_5'),
            'onepage_slider_heading' => onepage_get_option('onepage_slider_heading_5'),
            'onepage_slider_subheading' => onepage_get_option('onepage_slider_subheading_5'),
            'onepage_slider_button_link' => onepage_get_option('onepage_slider_button_link_5'),
            'onepage_slider_button_text' => onepage_get_option('onepage_slider_button_text_5'),
            'onepage_slider_overlay' => onepage_get_option('onepage_slider_overlay_5'),
        );

        $slider_arr = array('onepage_slider_image_1', 'onepage_slider_image_2', 'onepage_slider_image_3', 'onepage_slider_image_4', 'onepage_slider_image_5');

        $slider_exists = array();
        foreach ($slider_arr as $slider) {
            if (onepage_get_option($slider) != '') {
                $slider_exists[] = onepage_get_option($slider);
            }
        }
        if ($this->show_dummy && empty($slider_exists)) {
            $sliders = array_merge($sliders, $this->dummy_data['slider']);
        }
        return $sliders;
    }

    function services() {
        $services = array();
        $includes = array('animation', 'row');
        foreach ($this->dummy_data['service'] as $fkey => $service) {
            if (is_array($service) && $fkey == 'services') {
                foreach ($service as $skey => $pr) {
                    if (is_array($pr)) {
                        foreach ($pr as $tkey => $p) {
                            if (in_array($tkey, $includes)) {
                                $services['services'][$skey][$tkey] = $p;
                            } else {
                                $services['services'][$skey][$tkey] = onepage_get_option($tkey, $p);
                            }
                        }
                    }
                }
            } else {
                $services[$fkey] = onepage_get_option($fkey, $service);
            }
        }
        return $services;
    }

    function pricing() {
        $pricings = array();
        $includes = array('animation', 'count');
        foreach ($this->dummy_data['pricing'] as $fkey => $pricing) {
            if (is_array($pricing) && $fkey == 'pricing') {
                foreach ($pricing as $skey => $pr) {
                    if (is_array($pr)) {
                        foreach ($pr as $tkey => $p) {
                            if (in_array($tkey, $includes)) {
                                $pricings['pricings'][$skey][$tkey] = $p;
                            } else {
                                $pricings['pricings'][$skey][$tkey] = onepage_get_option($tkey, $p);
                            }
                        }
                    }
                }
            } else {
                $pricings[$fkey] = onepage_get_option($fkey, $pricing);
            }
        }
        return $pricings;
    }

    function team() {
        $teams = array();
        $includes = array('animation');
        foreach ($this->dummy_data['team'] as $fkey => $team) {
            if (is_array($team) && $fkey == 'teams') {
                foreach ($team as $skey => $pr) {
                    if (is_array($pr)) {
                        foreach ($pr as $tkey => $p) {
                            if (in_array($tkey, $includes)) {
                                $teams['teams'][$skey][$tkey] = $p;
                            } else {
                                $teams['teams'][$skey][$tkey] = onepage_get_option($tkey, $p);
                            }
                        }
                    }
                }
            } else {
                $teams[$fkey] = onepage_get_option($fkey, $team);
            }
        }
        return $teams;
    }

    function testimonial() {
        $testimonials = array();
        $includes = array('');
        foreach ($this->dummy_data['testimonial'] as $fkey => $testimonial) {
            if (is_array($testimonial) && $fkey == 'testimonials') {
                foreach ($testimonial as $skey => $pr) {
                    if (is_array($pr)) {
                        foreach ($pr as $tkey => $p) {
                            if (in_array($tkey, $includes)) {
                                $testimonials['testimonials'][$skey][$tkey] = $p;
                            } else {
                                $testimonials['testimonials'][$skey][$tkey] = onepage_get_option($tkey, $p);
                            }
                        }
                    }
                }
            } else {
                $testimonials[$fkey] = onepage_get_option($fkey, $testimonial);
            }
        }
        return $testimonials;
    }

    function contact() {
        $contacts = array();
        foreach ($this->dummy_data['contact'] as $fkey => $contact) {
            $contacts[$fkey] = onepage_get_option($fkey, $contact);
        }
        return $contacts;
    }

    function gallery() {
        $gallerys = array();
        foreach ($this->dummy_data['gallery'] as $fkey => $gallery) {
            $gallerys[$fkey] = onepage_get_option($fkey, $gallery);
        }
        return $gallerys;
    }

    function video() {
        $gallerys = array();
        foreach ($this->dummy_data['video'] as $fkey => $gallery) {
            $gallerys[$fkey] = onepage_get_option($fkey, $gallery);
        }
        return $gallerys;
    }

    function blog() {
        $gallerys = array();
        foreach ($this->dummy_data['blog'] as $fkey => $gallery) {
            $gallerys[$fkey] = onepage_get_option($fkey, $gallery);
        }
        return $gallerys;
    }

    function social() {
        $socials = array();
        foreach ($this->dummy_data['social'] as $fkey => $social) {
            if (is_array($social)) {
                foreach ($social as $skey => $p) {
                    if ($skey == 'link') {
                        $socials[$fkey][$skey] = onepage_get_option($skey, $p);
                    } else {
                        $socials[$fkey][$skey] = $p;
                    }
                }
            }
        }
        return $socials;
    }

}

Onepage_Data::Init();
