<?php

/**
 * Theme filters.
 */

namespace App;
/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});
/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

//add SVG to allowed file uploads
define('ALLOW_UNFILTERED_UPLOADS', true );
add_filter('upload_mimes', function ($t) {
    $t['svg'] = 'image/svg+xml';
    $t['svgz'] = 'image/svg+xml';
    return $t;
});

add_filter('nav_menu_css_class', function ($classes) {
    if (!in_array('current-menu-item', $classes)) return $classes;
    $classes[] = 'active';
    return $classes;
}, 110);
