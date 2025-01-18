@if (!in_array(true, [
    has_block('acf/page-header'),
    has_block('acf/hero-header'),
]))
<header class="page-header page-header-default">
  <div class="container">
      <h1>{!! $title !!}</h1>
  </div>
</header>

@endif
