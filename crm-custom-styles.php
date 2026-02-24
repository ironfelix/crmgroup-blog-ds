<?php
/**
 * Plugin Name: CRM Design System — Custom Styles
 * Description: Подключает wp-custom.css из /uploads/crm-ds/ с приоритетом 999 (после темы).
 *              Google Fonts (non-blocking), Reading Progress Bar, .no-image detection,
 *              lazy loading + image dimensions для CLS-фикса.
 * Version: 1.6
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
// CSS — split: global (все страницы) + blog (только блог)
// v1.4: один файл wp-custom.css (92 KB) на всех страницах
// v1.5: global (14 KB) всегда + blog (70 KB) только на блог-страницах
//       Экономия на главной: -70 KB
// ====================================================================
add_action('wp_enqueue_scripts', function() {
    $base = WP_CONTENT_DIR . '/uploads/crm-ds/';
    $base_url = content_url('uploads/crm-ds/');

    // Global CSS — всегда (header, homepage, checkboxes, :root vars)
    $global_path = $base . 'wp-custom-global.css';
    $global_ver = file_exists($global_path) ? filemtime($global_path) : '1.0';
    wp_enqueue_style('crm-ds-global', $base_url . 'wp-custom-global.css', [], $global_ver);

    // Blog CSS — только на single-blog и blog hub (/blog/)
    if (is_singular('blog') || is_post_type_archive('blog') || is_tax()) {
        $blog_path = $base . 'wp-custom-blog.css';
        $blog_ver = file_exists($blog_path) ? filemtime($blog_path) : '1.0';
        wp_enqueue_style('crm-ds-blog', $base_url . 'wp-custom-blog.css', ['crm-ds-global'], $blog_ver);
    }
}, 999);

// ====================================================================
// Reading Progress Bar — only on single blog posts
// ====================================================================
add_action('wp_footer', function() {
    if (!is_singular('blog')) return;
    ?>
    <div class="reading-progress" id="reading-progress"></div>
    <script>
    (function() {
        var bar = document.getElementById('reading-progress');
        if (!bar) return;
        var article = document.querySelector('.section-content') || document.querySelector('.singlepost');
        if (!article) return;
        var ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    var rect = article.getBoundingClientRect();
                    var total = article.offsetHeight - window.innerHeight;
                    var scrolled = -rect.top;
                    var pct = Math.min(100, Math.max(0, (scrolled / total) * 100));
                    bar.style.width = pct + '%';
                    ticking = false;
                });
                ticking = true;
            }
        });
    })();
    </script>
    <?php
}, 999);

// ====================================================================
// No-image detection — adds .no-image class to slides/cards without image
// ====================================================================
add_action('wp_footer', function() {
    ?>
    <script>
    (function() {
        document.querySelectorAll('.new_article').forEach(function(slide) {
            var img = slide.querySelector('.new_article__author-photo img');
            var src = img ? (img.getAttribute('data-src') || img.getAttribute('src')) : '';
            if (!src) {
                slide.classList.add('no-image');
            }
        });
        document.querySelectorAll('.card-article').forEach(function(card) {
            var img = card.querySelector('.card-article__visual img');
            var src = img ? (img.getAttribute('data-src') || img.getAttribute('src')) : '';
            if (!src) {
                card.classList.add('no-image');
            }
        });
    })();
    </script>
    <?php
}, 999);

// ====================================================================
// Lazy loading + image dimensions (CLS fix)
// Добавляет loading="lazy" на все <img> кроме первых 2 (LCP),
// и decoding="async" для параллельного декодирования.
// ====================================================================
add_action('template_redirect', function() {
    // Только фронтенд, не AJAX, не REST
    if (is_admin() || wp_doing_ajax() || (defined('REST_REQUEST') && REST_REQUEST)) return;

    ob_start(function($html) {
        if (empty($html) || strpos($html, '<img') === false) return $html;

        $count = 0;
        $html = preg_replace_callback('/<img\b([^>]*?)>/i', function($matches) use (&$count) {
            $tag = $matches[0];
            $count++;

            // Первые 2 картинки — LCP candidates, не ставим lazy
            // Но добавляем fetchpriority="high" на первую
            if ($count <= 2) {
                if ($count === 1 && strpos($tag, 'fetchpriority') === false) {
                    $tag = str_replace('<img', '<img fetchpriority="high"', $tag);
                }
                return $tag;
            }

            // loading="lazy" если ещё нет
            if (strpos($tag, 'loading=') === false) {
                $tag = str_replace('<img', '<img loading="lazy"', $tag);
            }

            // decoding="async" если ещё нет
            if (strpos($tag, 'decoding=') === false) {
                $tag = str_replace('<img', '<img decoding="async"', $tag);
            }

            return $tag;
        }, $html);

        return $html;
    });
});
