<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Shortcode to show all images as slider.
 */
add_shortcode('myslideshow', 'myslideshow_func');
function myslideshow_func($atts)
{
    wp_enqueue_style('rtcamp-owl-min-style');
    wp_enqueue_style('rtcamp-owl-theme-style');
    wp_enqueue_script('rtcamp-owl-carousel');
    wp_enqueue_script('rtcamp-fronted-script');

    $rtcamp_slideshow_images = get_option('rtcamp_slideshow_images');

    ob_start();
    include_once RTCAMP_PATH .  '/templates/slider.php';
    return ob_get_clean();
}

/**
 * Load required js to make all image as slider.
 */
add_action('wp_enqueue_scripts', 'register_rtcamp_slider_scripts');
function register_rtcamp_slider_scripts()
{
    wp_register_script('rtcamp-owl-carousel',  RTCAMP_URL . 'assets/js/owl.carousel.js', array('jquery'), RTCAMP_VERSION);
    wp_register_style('rtcamp-owl-min-style',  RTCAMP_URL . 'assets/css/owl.carousel.min.css', array(), RTCAMP_VERSION);
    wp_register_style('rtcamp-owl-theme-style',  RTCAMP_URL . 'assets/css/owl.theme.default.min.css', array(), RTCAMP_VERSION, true);
    wp_register_script('rtcamp-fronted-script',  RTCAMP_URL . 'assets/js/rtcamp-fronted.js', array('jquery'), RTCAMP_VERSION, true);
}
