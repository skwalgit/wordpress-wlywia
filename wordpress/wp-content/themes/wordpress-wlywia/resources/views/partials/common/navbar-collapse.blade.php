<a class="navbar-brand" href="{{ site_url() }}"><img src="@asset('images/logo.svg')" alt="{{ get_bloginfo('name') }}" /></a>
<button class="navbar-toggler hamburger hamburger--elastic" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="primary-navigation">
    @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class'     => 'navbar-nav navbar-nav-icon-desktop',
            'container' => 'ul',
            'walker' => new App\View\Navigations\Main(),
        ]) !!}
    @endif
    <div class="navbar-action d-flex align-items-center">
        <a class="btn btn-link btn-link-header" href="#!">{{ __('Login', 'sage') }}</a>
    </div>
</div>
