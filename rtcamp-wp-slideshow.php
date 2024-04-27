<?php
/*
Plugin Name: rtCamp WP SlideShow
Plugin URI: https://github.com/parth-mangukiya/rtcamp-wp-slideshow
Description: This plugin helps you show slideshows anywhere via a simple shortcode.
Version: 1.0
Author: Parth Mangukiya
Author URI: https://github.com/parth-mangukiya
License: GPLv2 or later
Text Domain: rtcamp-slideshow
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('RTCAMP_VERSION', '1.0.0');

if (!defined('RTCAMP_PATH'))
    define('RTCAMP_PATH', plugin_dir_path(__FILE__));

if (!defined('RTCAMP_URL'))
    define('RTCAMP_URL', plugin_dir_url(__FILE__));


// Load global functions.
require_once RTCAMP_PATH . '/inc/functions.php';

// Load admin functionality.
require_once RTCAMP_PATH . '/inc/admin.php';

// Load fronted functionality.
require_once RTCAMP_PATH . '/inc/fronted.php';
