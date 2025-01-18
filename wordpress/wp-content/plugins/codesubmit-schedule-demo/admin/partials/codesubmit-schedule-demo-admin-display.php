<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin/partials
 */

// check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

// add error/update messages

// check if the user have submitted the settings
// WordPress will add the "settings-updated" $_GET parameter to the url
if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'schedule_demo_messages', 'schedule_demo_message', __( 'Settings Saved', 'wporg' ), 'updated' );
}

// show error/update messages
settings_errors( 'schedule_demo_messages' );
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        <?php
        settings_fields( 'schedule_demo' );
        do_settings_sections( 'schedule_demo' );
        submit_button( 'Save Settings' );
        ?>
    </form>
</div>