<?php if(has_nav_menu('footer_links')): ?>
    <div class="col-md col-lg-auto footer-links">
        <h3>Menu</h3>
        <?php echo wp_nav_menu([
            'theme_location' => 'footer_links',
            'menu_class'     => 'nav flex-column nav-light',
            'container' => 'ul',
            'walker' => new App\View\Navigations\Main(),
        ]); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/partials/common/footer-links.blade.php ENDPATH**/ ?>