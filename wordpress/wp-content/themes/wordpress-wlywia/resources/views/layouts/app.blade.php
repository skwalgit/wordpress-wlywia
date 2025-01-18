<body @php(body_class())>
  @php(wp_body_open())
  @php(do_action('get_header'))

  @include('partials.header')

    <main id="main" class="main">
      @yield('content')
    </main>

  @include('partials.footer')

  @php(do_action('get_footer'))
  @php(wp_footer())
  @yield('footer.scripts')
  @stack('footer.modal')
</body>
