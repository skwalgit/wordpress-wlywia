{{-- @php the_content() @endphp --}}

<section class="hero">
    <div class="container">
      <div class="inner-wrapper">
        <div class="row align-items-center">
          <div class="col-lg-6 order-last order-lg-first">
            <p class="pre-heading"><span class="badge bg-dark me-2">New</span> Monograph Dashboard</a>
            <h1>Powerful Insights Into Your Team</h1>
            <p>Project planning and time tracking for agile teams</p>
            <div class="actions d-flex">
              @php echo do_shortcode('[schedule-demo]') @endphp
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