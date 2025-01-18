<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\asset;

/**
 * Removed wp 5.9 svg on after body open
 */
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

/**
 * Theme fonts
 */
add_action('wp_head', function () {
    print('<link rel="preconnect" href="https://fonts.googleapis.com">');
    print('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
    print('<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;1,400&family=Barlow+Condensed:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">');
}, 1);

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    // Removed wp 5.9 global styles
    wp_dequeue_style('global-styles');

    // Removed default styles from frontend
    if ( ! is_admin() ) {
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');
    }

    wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_register_script('sage/main.js', asset('scripts/main.js')->uri(), ['sage/vendor.js'], null, true);
    wp_localize_script('sage/main.js', 'sage', ['site_url' => site_url('/'), 'rest_url' => get_rest_url()]);
    wp_enqueue_script('sage/main.js');

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    // if (is_single() && comments_open() && get_option('thread_comments')) {
    //     wp_enqueue_script('comment-reply');
    // }

    wp_enqueue_style('sage/main.css', asset('styles/main.css')->uri(), false, null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->load()) {
        wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ...array_values($manifest));
        wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), ['sage/vendor.js'], null, true);

        wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    load_theme_textdomain('sage', get_template_directory() . '/resources/lang');

    remove_theme_support('block-templates');
    remove_theme_support('editor-color-palette');
    remove_theme_support('editor-font-sizes');
    remove_theme_support('core-block-patterns');
    remove_theme_support('align-wide');

    add_theme_support('disable-custom-colors');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_links'       => __('Footer Navigation', 'sage'),
    ]);

}, 20);

/**
 * Move jQuery to footer
 */
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true);
    wp_enqueue_script('jquery');
}, 0);