<header id="site-header"  class="site-header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        <div class="container">
            <div class="inner-wrapper">
                @include('partials.common.navbar-collapse')
            </div>
            {{-- @include('partials.common.navbar-offcanvas') --}}
        </div>
    </nav>
</header>
