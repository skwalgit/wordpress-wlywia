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

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codesubmit-schedule-demo-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'scheduleDemo', [ 'notification_url' => get_rest_url() . 'schedule-demo/v1/notification' ] );
		wp_enqueue_script( $this->plugin_name );

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

				$next_start_date = date('F d, Y', strtotime($day . ' ' . $schedule['start']));
				$next_start_time = $schedule['start'];
				$next_end_time = $schedule['end'];
				$next = $next_start_date . ' / ' . ucfirst($day) . ' on ' . $next_start_time . ' - ' . $next_end_time;

				break;
			}

			include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/codesubmit-schedule-demo-public-display.php';
		});

    }

	/**
	 * Register rest notification endpoint.
	 *
	 * @since    1.0.0
	 */
	public function register_notification_endpoint() {
		register_rest_route( 'schedule-demo/v1', '/notification', array(
			'methods' => 'POST',
			'callback' => array( $this, 'add_notification' ),
		) );

	}

	/**
	 * WP Reset notification endpoint callback.
	 *
	 * @since    1.0.0
	 */
	public function add_notification(\WP_REST_Request $request) {
		$date = sanitize_text_field( $request->get_param( 'schedule-demo-notification-schedule-date' ) );
		$start = sanitize_text_field( $request->get_param( 'schedule-demo-notification-schedule-start' ) );
		$end = sanitize_text_field( $request->get_param( 'schedule-demo-notification-schedule-end' ) );
		$email = sanitize_email( $request->get_param( 'schedule-demo-notification-email' ) );

		// Get notified one (1) hours before the schedule start time
		$notification_date = strtotime( '-1 hour', strtotime( $date . ' ' . $start ) );
		$notification_date = strtotime(get_gmt_from_date(date('F j, Y g:i A', $notification_date)));

		wp_schedule_single_event( $notification_date, 'schedule_demo_notification_event', array( $date, $start, $end, $email )  );

		return new WP_REST_Response(true, 200 );
	}

	/**
	 * Run a single event cron to send an email to the subscribed email address from the notification form
	 *
	 * @since    1.0.0
	 */
	public function schedule_demo_notification($date, $start, $end, $email) {
		$options = get_option( 'schedule_demo_options' );
		$phone = ( isset($options['schedule_demo_phone']) ? $options['schedule_demo_phone'] : ( '' ) );
		$subject = __( 'Schedule Demo Upcomming Schedule', 'codesubmit-schedule-demo' );

		ob_start();
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/codesubmit-schedule-demo-public-display-email.php';
		$body = ob_get_clean();

		wp_mail($email, $subject, $body, array( 'Content-Type: text/html; charset=UTF-8' ));

	}
}
