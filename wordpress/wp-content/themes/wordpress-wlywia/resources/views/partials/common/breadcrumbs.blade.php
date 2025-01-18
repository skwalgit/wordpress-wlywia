@if (!is_front_page() && $breadcrumbs)
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          @foreach($breadcrumbs as $breadcrumb)
              @if ($loop->last)
                  <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['text'] }}</li>
              @else
                  <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['text'] }}</a></li>
              @endif
          @endforeach
      </ol>
  </nav>
@endif
