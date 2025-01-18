<body <?php (body_class()); ?>>
  <?php (wp_body_open()); ?>
  <?php (do_action('get_header')); ?>

  <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main" class="main">
      <?php echo $__env->yieldContent('content'); ?>
    </main>

  <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php (do_action('get_footer')); ?>
  <?php (wp_footer()); ?>
  <?php echo $__env->yieldContent('footer.scripts'); ?>
  <?php echo $__env->yieldPushContent('footer.modal'); ?>
</body>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/layouts/app.blade.php ENDPATH**/ ?>