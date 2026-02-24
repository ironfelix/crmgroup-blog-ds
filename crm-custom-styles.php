<?php
/**
 * Plugin Name: CRM Design System — Custom Styles
 * Description: Подключает wp-custom.css из /uploads/crm-ds/ с приоритетом 999 (после темы).
 *              Google Fonts (non-blocking), Reading Progress Bar, .no-image detection.
 * Version: 1.7
 */

if (!defined('ABSPATH')) exit;

// ====================================================================
// Google Fonts — Inter (NON-BLOCKING: preload + onload swap)
// v1.3: был render-blocking <link rel="stylesheet">
// v1.4: preload + onload="this.rel='stylesheet'" — не блокирует FCP (-200ms)
// ====================================================================
add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    // Non-blocking: preload as style, swap to stylesheet on load
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    // Fallback for no-JS
    echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"></noscript>' . "\n";
}, 5);

// ====================================================================
// CSS + JS enqueue
// v1.5: global (14 KB) всегда + blog (70 KB) только на блог-страницах
// v1.7: JS вынесен в отдельные файлы (reading-progress.js, no-image.js)
// ====================================================================
add_action('wp_enqueue_scripts', function() {
    $base     = WP_CONTENT_DIR . '/uploads/crm-ds/';
    $base_url = content_url('uploads/crm-ds/');

    // Global CSS — всегда (header, homepage, checkboxes, :root vars)
    $global_path = $base . 'wp-custom-global.css';
    $global_ver  = file_exists($global_path) ? filemtime($global_path) : '1.0';
    wp_enqueue_style('crm-ds-global', $base_url . 'wp-custom-global.css', [], $global_ver);

    // Blog CSS + JS — только на single-blog и blog hub (/blog/)
    if (is_singular('blog') || is_post_type_archive('blog') || is_tax()) {
        $blog_path = $base . 'wp-custom-blog.css';
        $blog_ver  = file_exists($blog_path) ? filemtime($blog_path) : '1.0';
        wp_enqueue_style('crm-ds-blog', $base_url . 'wp-custom-blog.css', ['crm-ds-global'], $blog_ver);

        $no_image_ver = file_exists($base . 'no-image.js') ? filemtime($base . 'no-image.js') : '1.0';
        wp_enqueue_script('crm-no-image', $base_url . 'no-image.js', [], $no_image_ver, true);
    }

    // Reading progress JS — только на отдельных постах блога
    if (is_singular('blog')) {
        $rp_ver = file_exists($base . 'reading-progress.js') ? filemtime($base . 'reading-progress.js') : '1.0';
        wp_enqueue_script('crm-reading-progress', $base_url . 'reading-progress.js', [], $rp_ver, true);
    }
}, 999);

// ====================================================================
// Reading Progress Bar HTML — only on single blog posts
// ====================================================================
add_action('wp_footer', function() {
    if (!is_singular('blog')) return;
    echo '<div class="reading-progress" id="reading-progress"></div>';
}, 1);
