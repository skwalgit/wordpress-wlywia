<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <?php wp_head(); ?>
  </head>

  <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>

</html>
