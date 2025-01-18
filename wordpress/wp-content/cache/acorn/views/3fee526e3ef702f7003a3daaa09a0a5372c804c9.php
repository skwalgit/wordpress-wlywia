<a class="navbar-brand" href="<?php echo e(site_url()); ?>"><img src="<?= \Roots\asset('images/logo.svg'); ?>" alt="<?php echo e(get_bloginfo('name')); ?>" /></a>
<button class="navbar-toggler hamburger hamburger--elastic" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="primary-navigation">
    <?php if(has_nav_menu('primary_navigation')): ?>
        <?php echo wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class'     => 'navbar-nav navbar-nav-icon-desktop',
            'container' => 'ul',
            'walker' => new App\View\Navigations\Main(),
        ]); ?>

    <?php endif; ?>
    <div class="navbar-action d-flex align-items-center">
        <a class="btn btn-link btn-link-header" href="#!"><?php echo e(__('Login', 'sage')); ?></a>
    </div>
</div>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/partials/common/navbar-collapse.blade.php ENDPATH**/ ?>