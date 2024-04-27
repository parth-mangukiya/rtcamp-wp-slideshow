<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


/**
 * Create a admin menu for rtCamp slideshow settings and slides. 
 */
add_action('admin_menu', 'rtcamp_slideshow_admin_page');
function rtcamp_slideshow_admin_page()
{
    $rtcamp_slideshow_page = add_menu_page(
        __('rtCamp slideshow settings', 'rtcamp-slideshow'),  // Page title
        __('rtCamp slideshow', 'rtcamp-slideshow'),          // Menu title
        'manage_options',            // Capability
        'rtcamp-slideshow-settings', // Menu slug
        'rtcamp_settings_display',  // Callback function
        'dashicons-slides',          // Icon URL (optional)
        6                            // Position (optional)
    );

    // Load required CSS and JS 
    add_action('load-' . $rtcamp_slideshow_page, 'rtcamp_slideshow_admin_scripts');
}

/**
 * Slideshow settings page callback.
 */
function rtcamp_settings_display()
{
    $rtcamp_slideshow_images = get_option('rtcamp_slideshow_images');

    // Load settings template.
    include_once RTCAMP_PATH . '/templates/rtcamp-slideshow.php';
}

/**
 * Load css and js for admin css settings.
 */
function rtcamp_slideshow_admin_scripts()
{
    // Load wp media.
    wp_enqueue_media();

    // Enqueue CSS
    wp_enqueue_style(
        'rtcamp-admin-style',
        RTCAMP_URL . '/assets/css/rtcamp-admin.css',
        array(),
        RTCAMP_VERSION
    );

    // Enqueue JavaScript
    wp_enqueue_script(
        'rtcamp-jquery-ui-min',
        RTCAMP_URL . '/assets/js/jquery-ui.min.js',
        array('jquery'),
        RTCAMP_VERSION,
        true
    );

    wp_enqueue_script(
        'rtcamp-admin-slideshow-script',
        RTCAMP_URL . '/assets/js/rtcamp-admin.js',
        array('jquery'),
        RTCAMP_VERSION,
        true
    );

    wp_localize_script('rtcamp-admin-slideshow-script', 'rtcamp_ajax_obj', array('ajax_url' => admin_url('admin-ajax.php')));
}

/**
 * Store Slideshow data in wp-option table
 */

add_action('wp_ajax_update_rtcamp_slideshow', 'handle_update_rtcamp_slideshow');
add_action('wp_ajax_nopriv_update_rtcamp_slideshow', 'handle_update_rtcamp_slideshow');

function handle_update_rtcamp_slideshow()
{
    if (empty($_POST['rtcamp_slideshow_form']) || !wp_verify_nonce($_POST['rtcamp_slideshow_form'], 'rtcamp_slideshow_form_action')) {
        wp_send_json_error('Invalid request.');
        exit;
    }

    $images_URL = $_POST['image-url'] ?? '';

    $sanitized_urls = [];
    if (!empty($images_URL)) {
        // Sanitize URLs
        $sanitized_urls = array_map('esc_url_raw', array_filter($images_URL));
    }

    // Store the sanitized array in the wp_options table
    update_option('rtcamp_slideshow_images', $sanitized_urls);

    wp_send_json_success('List updated Successfully.');
    exit;
}
