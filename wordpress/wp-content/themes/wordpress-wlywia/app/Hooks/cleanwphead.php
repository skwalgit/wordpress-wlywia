<?php

namespace App\Hooks;

/**
 * Cleanup wp_head
 */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version

// remove wpml version
if (function_exists('wpml_get_setup_instance')) {
    global $sitepress;

    remove_action('wp_head', array($sitepress, 'meta_generator_tag'));
}

remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

remove_action('wp_head', 'start_post_rel_link'); // remove random post link
remove_action('wp_head', 'parent_post_rel_link'); // remove parent post link
// remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('wp_head', 'wp_shortlink_wp_head'); // Remove shortlink

add_action('after_setup_theme', function () {
    remove_action('wp_head', 'wp_resource_hints', 2); // Remove dns-prefetch Link from WordPress Head (Frontend)

    remove_action('wp_head', 'rest_output_link_wp_head'); // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.

    // Filters for WP-API version 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // Filters for WP-API version 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');

    add_filter('show_recent_comments_widget_style', '__return_false'); // Remove recentcomments style on head

    add_filter('wpseo_debug_markers', '__return_false'); // Remove Yoast SEO debug markers
});
