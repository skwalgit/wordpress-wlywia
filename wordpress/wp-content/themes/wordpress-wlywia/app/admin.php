<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;

/**
 * Register the `.brand` selector to the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js')->uri(), ['customize-preview'], null, true);
});

add_action('enqueue_block_editor_assets', function () {
    $script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
    wp_add_inline_script('wp-blocks', $script);
});