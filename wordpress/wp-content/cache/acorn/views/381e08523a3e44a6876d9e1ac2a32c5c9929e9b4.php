<div class="footer-socialmedia col-md col-lg-4">
    <h3 class="mb-4"><?php echo e(__('Follow us', 'sage')); ?></h3>
    <ul class="socialmedia list-unstyled row g-3 pt-3">
        <?php if((is_preview() && $facebook = '#') || $facebook = get_field('facebook', 'option')): ?>
            <li class="col-auto"><a href="<?php echo e($facebook); ?>" class=""><i class="fab fa-square-facebook fs-3"></i></a></li>
        <?php endif; ?>

        <?php if((is_preview() && $twitter = '#') || $twitter = get_field('twitter', 'option')): ?>
            <li class="col-auto"><a href="#" class=""><i class="fab fa-square-twitter fs-3"></i></a></li>
        <?php endif; ?>

        <?php if((is_preview() && $linkedin = '#') || $linkedin = get_field('linkedin', 'option')): ?>
            <li class="col-auto"><a href="<?php echo e($linkedin); ?>" class=""><i class="fab fa-linkedin fs-3"></i></a></li>
        <?php endif; ?>

        <?php if((is_preview() && $instagram = '#') || $instagram = get_field('instagram', 'option')): ?>
            <li class="col-auto"><a href="<?php echo e($instagram); ?>" class=""><i class="fab fa-instagram fs-3"></i></a></li>
        <?php endif; ?>

        <?php if((is_preview() && $youtube = '#') || $youtube = get_field('youtube', 'option')): ?>
            <li class="col-auto"><a href="<?php echo e($youtube); ?>" class=""><i class="fab fa-youtube fs-3"></i></a></li>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/partials/common/socialmedia.blade.php ENDPATH**/ ?>