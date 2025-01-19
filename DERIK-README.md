### WordPress
- I updated the WordPress core to the latest because the included WordPress core have issues on the db source code when I run it locally.
- I have added sa custom sage/roots theme framework to use as a theme.
- I used bootstrap 5 framework to make the design a little bit faster.
- This theme uses laravel/mix for sass and js compiler.
- The theme uses laravel's blade template engine for wp templates.
- I have included the database for the WordPress in the root folder filename `wordpress-wlywia-2025-01-19-866d5d5.sql`.
- The code for the frontend was only static and can be found at `resources/views/partials/content-page.blade.php` of the theme.
- The WordPress username is: `admin`
- The WordPress password is: `)Yq3A!h3C%LtVqX$Ff`
- The local url for the wordpress is: `https://wordpress-wlywia.test` but can be changed on the DB.

### Plugin
- I followed the demo plugin structure.
- Everything added is from scratch.
- I have added a notification feature if there is no schedule on the current day.

### Plugin notification feature
- An email form was added in the modal if there is no schedule on the current day.
- Custom WP Rest endpoint was added for handling the notification process.
- Custom WP Cron was added to run a single WP Cron event. By doing  this approach I no longer need to create a database list of emails to notify.
- The cron trigger will be one (1) hour before the next schedule start.
- The notification will be in a form of email.
- I have added the plugin 'WP Crontrol' to test and force run the cron.
- A mail catcher is required if the feature will be tested locally.