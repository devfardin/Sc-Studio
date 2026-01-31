<?php
/**
 * Threshold Wellness Theme Functions
 */

// Security Constants
define('SC_STUDIO_VERSION', '1.0.0');
define('SC_STUDIO_DIR', __DIR__ . '/includes/');
define('SC_STUDIO_SHORTCODE_DIR', __DIR__ . '/includes/shortcodes/');

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class ThresholdWellnessFunctions
{
    public function __construct()
    {
        $this->load_dependencies();
        $this->init();
    }

    public function load_dependencies()
    {
        require_once(SC_STUDIO_DIR . 'enqueue.php');
        require_once(SC_STUDIO_SHORTCODE_DIR . 'service-slider.php');
        require_once(SC_STUDIO_SHORTCODE_DIR . 'single-service-hero.php');
        require_once(SC_STUDIO_SHORTCODE_DIR . 'single-service.php');
    }

    public function init()
    {
        new ThresholdWellnessAssets();
        new Service_slider();
        new Single_service_hero();
        new Single_service();
    }
}

new ThresholdWellnessFunctions();