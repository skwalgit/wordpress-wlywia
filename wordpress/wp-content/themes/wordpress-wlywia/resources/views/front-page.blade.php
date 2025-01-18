@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <section class="hero">
      <div class="container">
        <div class="inner-wrapper">
          <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
              <p class="pre-heading"><span class="badge bg-dark me-2">New</span> Monograph Dashboard</a>
              <h1>Powerful Insights Into Your Team</h1>
              <p>Project planning and time tracking for agile teams</p>
              <div class="actions d-flex">
                <button class="btn btn-primary" type="button">Schedule a demo</button>
                <button class="btn btn-link">To see a preview</button>
              </div>
            </div>
            <div class="col-lg-6 col-media">
              <figure class="mb-0">@svg('images.media')</figure>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- @includeFirst(['partials.content-page', 'partials.content']) --}}
  @endwhile
@endsection
