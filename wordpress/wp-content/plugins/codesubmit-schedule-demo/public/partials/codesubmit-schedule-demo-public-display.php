<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<button class="btn-schedule-demo btn btn-primary" type="button" data-sc-toggle="#schedule-a-call">Schedule a demo</button>

<div id="schedule-a-call" class="schedule-demo-modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="schedule-demo-modal-dialog">
        <div class="schedule-demo-modal-content">
            <button class="schedule-demo-modal-close"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path fill="#242942" fill-rule="evenodd" d="M17.778.808l1.414 1.414L11.414 10l7.778 7.778-1.414 1.414L10 11.414l-7.778 7.778-1.414-1.414L8.586 10 .808 2.222 2.222.808 10 8.586 17.778.808z"/></svg></button>
            <div class="schedule-demo-modal-body">
                <?php if ($active) : ?>
                    <h3>Please call to schedule a demo.</h3>
                    <p><a class="schedule-demo-phone" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"><?php echo $phone; ?></a></p>
                    <p>Thank You!</p>
                <?php else : ?>
                    <h3>Sorry no, active schedules today.</h3>
                    <p>Next schedule will be on:</p>
                    <p class="upnext"><?php echo $next; ?></p>
                    <p>Enter your email and get notified on the next schedule.</p>
                    <form class="schedule-demo-get-notified-form">
                        <div class="input-group mb-3">
                            <input type="hidden" name="schedule-demo-notification-schedule-date" value="<?php echo esc_attr($next_start_date); ?>" />
                            <input type="hidden" name="schedule-demo-notification-schedule-start" value="<?php echo esc_attr($next_start_time); ?>" />
                            <input type="hidden" name="schedule-demo-notification-schedule-end" value="<?php echo esc_attr($next_end_time); ?>" />
                            <input type="email" class="form-control schedule-demo-notification-email" name="schedule-demo-notification-email" placeholder="<?php _e('Enter your email', 'codesubmit-schedule-demo'); ?>" aria-describedby="schedule-demo-get-notified">
                            <button class="btn btn-primary schedule-demo-get-notified" type="submit" id="schedule-demo-get-notified"><?php _e('Submit', 'codesubmit-schedule-demo'); ?></button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>