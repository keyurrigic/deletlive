@extends('main')
@section('content')
<!--- Banner -->
  <div class="inner-banner">
    <div class="container">
      <div class="inner-banner-container">
        <div class="banner-image"><img src="{{url('assets/images/banner-contact.svg')}}" alt=""/></div>
        <h1>Contact</h1>
      </div>
    </div>
  </div>
  <!--- Banner --> 
  
  <!--- Middle -->
  <div id="middle">
    <section class="contact-top">
      <div class="container">
        <!--div class="address">1120 S. Robertson Blvd, LA, CA 90035</div-->
        <div class="telephone">310-926-7313</div>
        <div class="email"><a href="mailto:info@delet.com">info@delet.com</a></div>
      </div>
    </section>
    <section class="contact-bottom">
      <div class="container">
        
        <div class="contact-form-box">
        @if (Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form name="frmrinquiries" action="{{ route('inquiries') }}" id="frmrinquiries" method="post"> 
            @csrf
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="inquiry_type" id="general" value="general" autocomplete="off" checked>
              <label class="btn btn-outline-primary" for="general"><span><i class="far fa-check"></i></span> general</label>
              <input type="radio" class="btn-check" name="inquiry_type" id="sales" value="sales" autocomplete="off">
              <label class="btn btn-outline-primary" for="sales"><span><i class="far fa-check"></i></span>sales</label>
              <input type="radio" class="btn-check" name="inquiry_type" id="consultation" value="consultation"  autocomplete="off">
              <label class="btn btn-outline-primary" for="consultation"><span><i class="far fa-check"></i></span>consultation</label>
            </div>
            <div class="form-group">
              <label>name</label>
              <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>phone</label>
              <input type="tel" id="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
              <label>message</label>
              <textarea id="message" name="message" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
              <button class="btn-blue">send message</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--section class="column-box-row">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4>500% more showings</h4>
            <p>Our current approximation when using the Delet software is 450%-550% more property showings. Delet’s system is here to ensure a quick and easy turnaround when it comes to apartment tours. Imagine your agency’s abilities if you no longer require travel to give a showing to a prospective client.</p>
          </div>
          <div class="col-md-6">
            <h4>Higher conversion rate</h4>
            <p>Prospective tenants tend to feel more comfortable in their decision to move forward with their lease when there is no agent present. Delet alleviates the pressure for your client and offers a more enjoyable and relaxed showing.</p>
          </div>
        </div>
      </div>
    </section-->
    <!--section class="inner-bottom-image"><img src="{{url('assets/images/bottom-image-how-it-work.svg')}}" alt=""/></section-->
    <!--section class="cta-section">
      <div class="container">
        <h3>Try it for free for 60 days</h3>
        <p>Schedule your free consultation today to learn more about how our services can help your agency.</p>
        <div class="btn-box"><a href="{{route('contactus')}}" class="btn-blue">free consultation</a></div>
      </div>
    </section-->
	  @include('template-parts.common')
    @include('template-parts.tryit')
  </div>
  <!--- /Middle --> 
@endsection