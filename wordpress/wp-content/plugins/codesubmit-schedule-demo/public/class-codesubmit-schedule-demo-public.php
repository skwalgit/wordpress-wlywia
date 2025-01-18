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
class Codesubmit_Schedule_Demo_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codesubmit-schedule-demo-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codesubmit-schedule-demo-public.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Register the plugin shortcode.
	 *
	 * @since    1.0.0
	 */
    public function register_shortcode() {
        add_shortcode('schedule-demo', function ($atts) {
			$options = get_option( 'schedule_demo_options' );
			$phone = ( isset($options['schedule_demo_phone']) ? $options['schedule_demo_phone'] : ( '' ) );
			$schedules = ( isset($options['schedule_demo_schedules']) ? $options['schedule_demo_schedules'] : ( '' ) );

			$schedules = array(
				'monday' => ['start' => '', 'end' => ''],
				'tuesday' => ['start' => '', 'end' => ''],
				'wednesday' => ['start' => '', 'end' => ''],
				'thursday' => ['start' => '', 'end' => ''],
				'friday' => ['start' => '', 'end' => ''],
				'saturday' => ['start' => '', 'end' => ''],
				'sunday' => ['start' => '', 'end' => ''],
			);

			if ( isset( $options['schedule_demo_schedules'] ) ) {
				$schedules = wp_parse_args($options['schedule_demo_schedules'], $schedules);
			}

			$today = current_time( 'timestamp' );
			$current_day = strtolower( current_time('l') );
			$end = strtotime( $current_day . ' ' . $schedules[$current_day]['end'] );
			$active = ( ( $end > $today ) ? true : false);
			$next = '';

			if ( ! $active ) {
				$key = date( 'N', strtotime($current_day) );
				if ( $key > 0 ) {
					$upcomming = array_splice( $schedules, $key, 6 );
					$upnext = array_splice( $schedules, 0, $key );

					$schedules = array_merge( $upcomming, $upnext );
				}
			}

			foreach( $schedules as $day => $schedule ) {
				if (!$schedule['start']) continue;

				$next = date('F d, Y', strtotime($day . ' ' . $schedule['start'])) . ' / ' . ucfirst($day) . ' on ' . $schedule['start'] . ' - ' . $schedule['end'];
				break;
			}

			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/codesubmit-schedule-demo-public-display.php';
		});

    }

}
