<html>
    <h1><?php _e('Upcomming schedule for demo', 'codesubmit-schedule-demo'); ?></h1>
    <p><strong><?php _e('Date', 'codesubmit-schedule-demo'); ?>:</strong> <?php echo $date; ?></p>
    <p><strong><?php _e('From', 'codesubmit-schedule-demo'); ?>:</strong> <?php echo $start; ?> <?php _e('to', 'codesubmit-schedule-demo'); ?> <?php echo $end; ?></p>
    <p><?php _e('If you are interested to schedule a demo please call us at', 'codesubmit-schedule-demo'); ?> <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"><?php echo $phone; ?></a>.</p>
</html>