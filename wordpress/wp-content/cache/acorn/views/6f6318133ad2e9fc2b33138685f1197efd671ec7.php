<?php if(!in_array(true, [
    has_block('acf/page-header'),
    has_block('acf/hero-header'),
])): ?>
<header class="page-header page-header-default">
  <div class="container">
      <h1><?php echo $title; ?></h1>
  </div>
</header>

<?php endif; ?>
<?php /**PATH C:\laragon\www\wordpress-wlywia\wordpress\wp-content\themes\wordpress-wlywia\resources\views/partials/page-header.blade.php ENDPATH**/ ?>