<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin
 * @author     CodeSubmit <hello@codesubmit.io>
 */
class Codesubmit_Schedule_Demo_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codesubmit_Schedule_Demo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codesubmit_Schedule_Demo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codesubmit-schedule-demo-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codesubmit_Schedule_Demo_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codesubmit_Schedule_Demo_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codesubmit-schedule-demo-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register admin menu settings.
	 *
	 * @since    1.0.0
	 */
	public function register_menu_settings() {
		register_setting( 'schedule_demo', 'schedule_demo_options' );

		add_settings_section(
			'schedule_demo_section',
			__( 'Settings', 'codesubmit-schedule-demo' ),
			array( $this, 'section_callback' ),
			'schedule_demo'
		);

		add_settings_field(
			'schedule_demo_field_phone',
			__( 'Phone', 'codesubmit-schedule-demo' ),
			array( $this, 'phone_settings_callback' ),
			'schedule_demo',
			'schedule_demo_section',
			array( 'label_for' => 'schedule_demo_phone' )
		);

		add_settings_field(
			'schedule_demo_field_schedules',
			__( 'Schedules', 'codesubmit-schedule-demo' ),
			array( $this, 'schedules_settings_callback' ),
			'schedule_demo',
			'schedule_demo_section',
			array( 'label_for' => 'schedule_demo_schedules' )
		);
	}

	/**
	 * Placeholder callback for schedule_demo_section.
	 *
	 * @since    1.0.0
	 */
	public function section_callback($args) {}

	/**
	 * Callback for phone settings.
	 *
	 * @since    1.0.0
	 */
	public function phone_settings_callback($args) {
		$options = get_option( 'schedule_demo_options' );
		echo '<input id="' . esc_attr( $args['label_for'] ) . '" type="tel" name="schedule_demo_options[' . esc_attr( $args['label_for'] ) . ']" value="' . ( isset( $options[ $args['label_for'] ] ) ? esc_attr( $options[ $args['label_for'] ] ) : ( '' ) ) . '">';
	}

	/**
	 * Callback for schedule settings.
	 *
	 * @since    1.0.0
	 */
	public function schedules_settings_callback($args) {
		$options = get_option( 'schedule_demo_options' );
		
		$interval = '30 mins';
		$format = '12';
		$start = strtotime('12:00am');
		$end = strtotime('11:59pm');
		$current_time = current_time('timestamp');
		$add_time = strtotime('+'.$interval, $current_time);
		$time_diff = $add_time - $current_time;
		$times = array();
		$time_format = ($format == '12')?'g:i A':'G:i';

		while ($start < $end) {
			$times[] = date($time_format, $start);
			$start += $time_diff;
		}

		$schedules = array(
			'monday' => ['start' => '', 'end' => ''],
			'tuesday' => ['start' => '', 'end' => ''],
			'wednesday' => ['start' => '', 'end' => ''],
			'thursday' => ['start' => '', 'end' => ''],
			'friday' => ['start' => '', 'end' => ''],
			'saturday' => ['start' => '', 'end' => ''],
			'sunday' => ['start' => '', 'end' => ''],
		);
		
		if ( isset( $options[ $args['label_for'] ] ) ) {
			$schedules = wp_parse_args($options[ $args['label_for'] ], $schedules);
		}

		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/codesubmit-schedule-demo-admin-display-schedules.php';

	}

	/**
	 * Register admin menu.
	 *
	 * @since    1.0.0
	 */
	public function register_menu_page() {
		add_menu_page(
			__( 'Schedule Demo', 'codesubmit-schedule-demo' ),
			__( 'Set Schedule', 'codesubmit-schedule-demo' ),
			'manage_options',
			'schedule_demo',
			array( $this, 'admin_menu_display' ),
			'dashicons-schedule'
		);

	}

	public function admin_menu_display() {
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/codesubmit-schedule-demo-admin-display.php';

	}

}
