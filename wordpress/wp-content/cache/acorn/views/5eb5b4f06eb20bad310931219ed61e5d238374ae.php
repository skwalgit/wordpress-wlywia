<header id="site-header"  class="site-header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" aria-label="<?php echo e(wp_get_nav_menu_name('primary_navigation')); ?>">
        <div class="container">
            <div class="inner-wrapper">
                <?php echo $__env->make('partials.common.navbar-collapse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
        </div>
    </nav>
</header>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/partials/header.blade.php ENDPATH**/ ?>