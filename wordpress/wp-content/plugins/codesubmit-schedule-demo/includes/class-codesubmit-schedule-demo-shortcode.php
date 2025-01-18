<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/public
 * @author     CodeSubmit <hello@codesubmit.io>
 */
class Codesubmit_Schedule_Demo_Shortcode {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the plugin shortcode.
	 *
	 * @since    1.0.0
	 */
    public function register_shortcode() {
        add_shortcode('schedule-demo', array( $this, 'shortcode') );

    }

	/**
	 * Define the shortcode callback
	 *
	 * @since    1.0.0
	 */
    public function shortcode($atts) {
        return '<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#schedule-a-call">Schedule a demo</button>';
    }

}
