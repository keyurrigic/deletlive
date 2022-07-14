@extends('main')
@section('content')

<!--- Banner -->
<div class="inner-banner">
  <div class="container">
    <div class="inner-banner-container">
      <div class="banner-image"><img src="{{url('assets/images/banner-feature.svg')}}" alt="" /></div>
      <h1>Features</h1>
    </div>
  </div>
</div>
<!--- Banner -->

<!--- Middle -->
<div id="middle">
  <section class="features-top">
    <div class="container">
      <div class="row grid">
        <?php foreach ($features as $feature) { ?>
          <div class="col-md-6 col-lg-4 align-self-start grid-item">
            <div class="feature-box">
              <div class="feature-box-icon"><img src="{{asset('uploads/'.$feature->image)}}" alt="" /></div>
              <div class="box-title">{{$feature->title}}</div>
              {!! $feature->content !!}
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  @include('template-parts.common')
  @include('template-parts.tryit')

  <!-- Step 2: Then load imagesloaded. imagesloaded makes sure the images are not displayed until they are fully loaded -->
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

  <!-- Step 3: we load masonry -->
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

  <script>
    $(".grid").imagesLoaded(function() {
      $(".grid").masonry({
        itemSelector: ".grid-item"
      });
    });
  </script>
</div>
<!--- /Middle -->
@endsection