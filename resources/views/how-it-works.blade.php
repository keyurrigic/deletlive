@extends('main')
@section('content')
<!--- Banner -->
  <div class="inner-banner">
    <div class="container">
      <div class="inner-banner-container">
        <div class="banner-image"><img src="{{url('assets/images/banner-how-it-work.svg')}}" alt=""/></div>
        <h1>How it works</h1>
      </div>
    </div>
  </div>
  <!--- Banner --> 
  
  <!--- Middle -->
  <div id="middle">
    <section class="inner-top">
      <div class="container">
        <h2>{{ $site_setting->howitworktitle}}</h2>
        {!! $site_setting->howitworkcontent !!}
      </div>
    </section>
    <section class="how-it-section">
      <div class="container">
        <?php $counter=1; foreach($steps as $step) { ?>
        <div class="how-it-box-row <?php echo ($counter%2==1) ? 'right' : 'left';?>-image">
          <div class="how-it-info-box"> <span class="step-number">{{$step->stepnumber}}</span>
            <h2>{{$step->title}}</h2>
            {!! $step->content !!}
          </div>
          <div class="step-image"><img src="{{asset('uploads/'.$step->image)}}" alt=""/></div>
          <div class="line line-1"></div>
        </div>
        <?php $counter++; } ?>
      </div>
    </section>
    @include('template-parts.common')
    @include('template-parts.tryit')
  </div>
  <!--- /Middle --> 
@endsection