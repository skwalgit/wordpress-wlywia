<a class="navbar-brand" href="{{ site_url() }}"><img src="@asset('images/logo.png')" alt="{{ get_bloginfo('name') }}" /></a>
<button class="navbar-toggler hamburger hamburger--elastic" type="button" data-bs-toggle="offcanvas" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>
<div class="offcanvas offcanvas-start navbar-collapse flex-column flex-lg-row align-items-start" id="primary-navigation">
    <div class="offcanvas-header w-100 justify-content-end">
        <button class="offcanvas-toggler hamburger hamburger--elastic is-static is-active" type="button" data-bs-toggle="offcanvas" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="true" aria-label="Toggle navigation">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
    </div>
    <div class="offcanvas-body w-100">
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class'     => 'navbar-nav w-100 navbar-nav-icon-desktop',
                'container' => 'ul',
                'walker' => new App\View\Navigations\Main(),
            ]) !!}
        @endif
        <div class="navbar-action d-grid gap-2 col-6 col-lg-auto mx-auto ms-lg-3 mb-3 mb-lg-0">
            <a class="btn btn-primary btn-wide" href="{{ site_url('/contactez-nous/') }}">{{ __('Contact', 'sage') }}</a>
        </div>
    </div>
</div>
