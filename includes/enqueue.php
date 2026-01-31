<?php
/**
 * Threshold Wellness Assets Enqueue
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SC_STUDIO_STYLE_URI', get_stylesheet_directory_uri() . '/assets/css/');
define('SC_STUDIO_SCRIPT_URI', get_stylesheet_directory_uri() . '/assets/js/');

class ThresholdWellnessAssets {
    
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }
    
    public function enqueue_styles() {
        // Main CSS with optimization
        wp_enqueue_style(
            'sc-studio-main',
            SC_STUDIO_STYLE_URI . 'main.css',
            [],
            SC_STUDIO_VERSION,
            'all'
        );
        wp_enqueue_style(
            'swiper-bundle',
            '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css',
            [],
            SC_STUDIO_VERSION,
            'all'
        );
        wp_enqueue_style(
            'sc-studio-service-slider',
            SC_STUDIO_STYLE_URI . 'service-slider.css',
            ['swiper-bundle'],
            SC_STUDIO_VERSION,
            'all'
        );
        
        
    }
    
    public function enqueue_scripts() {
        wp_enqueue_script(
            'sc-studio-main',
            SC_STUDIO_SCRIPT_URI . 'main.js',
            ['jquery'],
            SC_STUDIO_VERSION,
            true
        );
        wp_enqueue_script(
            'sc-studio-service-slider-main',
            '//cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
            ['jquery'],
            SC_STUDIO_VERSION,
            true
        );
        
        wp_enqueue_script(
            'sc-studio-service-slider',
            SC_STUDIO_SCRIPT_URI . 'service-slider.js',
            ['sc-studio-service-slider-main'],
            SC_STUDIO_VERSION,
            true
        );
    }
}