@extends('main')
@section('content')

<!--- Banner -->
<div id="banner">
    <div class="banner-image"><img src="{{url('assets/images/banner-image.png')}}" alt="" class="d-none d-md-block" />
        <img src="{{url('assets/images/banner-image-mobile.png')}}" alt="" class="d-block d-md-none" />
    </div>
    <div class="container">
        <div class="banner-left">
            <!--banner Text Goes Here -->
            {!! $homepage->bannertext !!}
        </div>
    </div>
</div>
<!--- Banner -->

<!--- Middle -->
<div id="middle">
    <section class="spend-earn-section">
        <div class="container">
            <h3>{{$homepage->videotitle}}</h3>
            <div class="clearfix"></div>
        </div>
        <div class="spend-earn">
            <div class="container">
                <div class="video-iframe">
                    <div class="video-iframe-inner">
                        <iframe src="https://player.vimeo.com/video/774478557?h=58eb326bd5" width="640" height="360"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <!--video width="100%" height="546" controls>
                        <source src="{{$homepage->videourl}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video-->
                </div>
            </div>
        </div>
    </section>
    <section class="amount-homes">
        <div class="container">
            <h3>{{$homepage->title1text}}</h3>
            <div class="clearfix"></div>
        </div>
        <div class="amount-homes-inner">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($boxes as $box) { ?>
                    <div class="col-md-4">
                        <div class="amount-of-homes-card position-relative">
                            <span class="amount-of-homes-card-digit">{{$box->number}}</span>
                            <h4>{!! $box->title !!}</h4>
                            <p>{!! $box->text !!}</p>
                            <div class="clearfix"></div>
                            {!! $box->content !!}
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>

    <section class="the-flow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="the-flow-inner position-relative d-flex w-100">
                        {!! $homepage->flowcontent !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="some-of-benifit">
        <div class="container">
            <h3>{{$homepage->benefittitle}}</h3>
            <div class="clearfix"></div>
        </div>

        <div class="some-of-benifit-inner">
            <span class="some-of-benifit-bg"></span>
            <div class="container">
                <div class="row">
                    <?php foreach ($benefits as $benefit) { ?>
                    <div class="col-md-4">
                        <div class="some-of-benifit-card">
                            <p>{{$benefit->title}}</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="feature-section-bottom">
                <div class="btn-box"><a href="{{route('features')}}" class="btn-blue">view all features</a></div>
                <div class="curly-arrow"><img src="{{url('assets/images/curly-arrow.svg')}}" alt="" /></div>
            </div>
        </div>

    </section>

    <section class="testimonial-section">
        <div class="container">
            <h3>{{$homepage->testimonialstitle}}</h3>
            <div class="testimonial-row">
                <div class="owl-carousel testimonial-slider">
                    <?php foreach ($testimonials as $testimonial) { ?>
                    <div class="testimonial-box">
                        <div class="box-top">{{$testimonial->content}}</div>
                        <div class="box-bottom"><img src="{{asset('uploads/'.$testimonial->image)}}" alt="" />
                            <div class="client-name">{{$testimonial->title}}</div>
                            <div class="designation">{{$testimonial->position}}</div>
                            <div class="company-name">{{$testimonial->company}}</div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="company-logo-section clearfix">
        <div class="container">
            <div class="company-logo-row">
                <div class="owl-carousel company-logo-slider">
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/1-480w.png.webp')}}" alt="" width="300" height="197">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/1581378613691.jpeg')}}" alt="" width="200" height="200">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/Afton-Logo.webp')}}" alt="" width="450" height="109">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/bfpmlogo.png')}}" alt="" width="450" height="109">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/Corp_Logo.png')}}" alt="" width="260" height="296">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/moss_company_footerlogo_default.webp')}}" alt="" width="262"
                                height="115">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/relogo-removebg-preview-1.png')}}" alt="" width="381"
                                height="128">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/ceda.jpeg')}}" alt="" width="278" height="182">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/foresight.png')}}" alt="" width="225" height="225">
                        </div>
                    </div>
                    <div class="company-logo-box">
                        <div class="company-logo--wrap">
                            <img src="{{url('assets/images/canfield.png')}}" alt="" width="482" height="104">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('template-parts.tryit')
</div>
<!--- /Middle -->
@endsection