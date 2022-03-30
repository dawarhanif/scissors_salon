@extends('front.layout.app')
@section('beforeHeadClose')

<link href="{{asset('front/css/owl.carousel.css')}}" rel="stylesheet">
<title>{{$title}}</title>
@endsection

@section('content')

<!-- Revolution slider start -->
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
      @foreach($banners as $banner)
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="{{asset('back/uploads/$banner->image')}}" data-lazyload="{{asset('front/images/slider.jpg')}}">
        <div class="caption lfb large-title tp-resizeme slidertext1" data-x="left" data-y="240" data-speed="600" data-start="1600"> {!!$banner->text_1!!}</div>
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="left" data-y="270" data-speed="600" data-start="2200"><span>{!!$banner->text_2!!} </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="left" data-y="400" data-speed="600" data-start="2800"> {!!$banner->text_3!!} 
          </div>
        <div class="caption lfb large-title tp-resizeme slidertext4" data-x="left" data-y="470" data-speed="600" data-start="3400"> <a href="#">Contact Us</a> </div>
      </li>
      
      @endforeach
    </ul>
  </div>
</div>
<!-- Revolution slider end --> 

<!-- About Start -->
<div class="about-wrap" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about_box">
          <div class="title">
            <p>About Us</p>
            <h1>{!!$about->title!!}</h1>
          </div>
          <p>{!!$about->description!!}</p>
          <div class="readmore"><a href="#">Read More</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="aboutImg"><img alt="" src="{{asset('back/images/uploads/').'/'.$about->img}}"></div>
      </div>
    </div>
  </div>
</div>
<!-- About End --> 

<!-- Service Start -->
<div class="service-wrap">
  <div class="container">
    <div class="title">
      <h1>Our Services</h1>
    </div>
    <div class="service_box">
      <div class="row">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-4">
          <div class="serviceImg"><img alt="" src="{{asset('back/images/uploads/'.$service->img)}}"></div>
          <h3><a href="services_details.html">{{$service->title}}</a></h3>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>
</div>
<!-- Service End --> 

<!-- Gallery Start -->
<div class="gallery-wrap">
  <div class="container-fluid">
    <div class="title title_center">
      <h1>Our Gallery</h1>
    </div>
    <div class="row">
    @foreach($image_galleries as $image)

      <div class="col-lg-3 col-md-6">
        <div class="galleryImg"><img src="{{asset('back/images/uploads/'.$image->image)}}" alt="">
          <div class="portfolio-overley">
            <div class="content"> <a href="{{asset('back/images/uploads/'.$image->image)}}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
          </div>
        </div>
      </div>
      @endforeach
      
      
    </div>
  </div>
</div>
<!-- Gallery End --> 

<!-- Expert Start -->
<div class="expert-wrap">
  <div class="container">
    <div class="title title_center">
      <h1>Our Experts</h1>
    </div>
    <div class="row">
      @foreach($experts as $expert)
      <div class="col-lg-3 col-md-6">
        <div class="experts">
          <div class="teamImg"><img src="{{ asset('back/images/uploads/experts/'. $expert->image) }}" alt="{{$expert->image}}">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="{{$expert->facebook_url}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="{{$expert->twitter_url}}"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="{{$expert->linkedin_url}}"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="{{$expert->instagram_url}}"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="team_content">
            <h5><a href="#">Jill Cortez</a></h5>
            <p class="category">{{$expert->expertise}}</p>
            <!-- category --> 
          </div>
        </div>
      </div>
      @endforeach
     
    </div>
  </div>
</div>
<!-- Expert End --> 

<!-- Appointment Start -->
<div class="appointment-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h3>Donec egestas auctor arcu tincidunt.</h3>
      </div>
      <div class="col-lg-4">
        <div class="readmore"><a href="contact.html">Book An Appointment</a></div>
      </div>
    </div>
  </div>
</div>
<!-- Appointment Start --> 

<!-- Blog Start -->
<div class="blog-wrap">
  <div class="container">
    <div class="title title_center">
      <h1>Our Blog</h1>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="blogImg"><img alt="" src="images/blog01.png"></div>
        <div class="blog_sec">
          <h3><a href="blog_details.html">Praesent consequat justo ut sollicitudin molestie.</a></h3>
          <div class="blog_date">May 05, 2020</div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="blogImg"><img alt="" src="images/blog02.png"></div>
        <div class="blog_sec">
          <h3><a href="blog_details.html">Praesent consequat justo ut sollicitudin molestie.</a></h3>
          <div class="blog_date">May 05, 2020</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog Start --> 

<!-- Testimonials Start -->
<div class="testimonials-wrap">
  <div class="container">
    <div class="title">
      <p>Testimoinials</p>
      <h1> What Our Clients Say </h1>
    </div>
    <ul class="owl-carousel testimonials_list unorderList">
      <li class="item">
        <div class="testimonials_sec">
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/client1.jpg"></div>
            <h3>Wanda Bates</h3>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/client2.jpg"></div>
            <h3>Wanda Bates</h3>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/client1.jpg"></div>
            <h3>Wanda Bates</h3>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/client2.jpg"></div>
            <h3>Wanda Bates</h3>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Testimonials End --> 

<!-- Contact Start -->
<div class="contact-wrap" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="contact_form">
          <div class="title">
            <h1>Make an Appointment</h1>
          </div>
          <p>Donec scelerisque libero eget mauris fermentum, vitae maximus mauris egestas. Sed eleifend placerat nulla vehicula odio in rhoncus.</p>
          <form class="form" action="mail/mail.php">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input name="name" type="text" class="form-control" placeholder="First Name">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input name="name" type="text" class="form-control" placeholder="Last Name">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input name="email" type="text" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input name="phone" type="text" class="form-control" placeholder="Phone">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <textarea name="message" class="form-control" placeholder="Message"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="button">
                    <button type="submit" class="btn primary">Book Now</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="contact_info">
          <div class="title">
            <h1>Contact <span>Information</span></h1>
          </div>
          <ul class="contact-list unorderList">
            <li>
              <div class="contact_box">
                <div class="icon"> <img alt="" src="images/adress.png"> </div>
                <p>Main Office <span>123 Lorem Ipsum, 32 sit Atlanta</span></p>
              </div>
            </li>
            <li>
              <div class="contact_box">
                <div class="icon"> <img alt="" src="images/email.png"> </div>
                <p>E-mail<span> <a href="mailto:info@example.com">info@example.com</a></span></p>
              </div>
            </li>
            <li>
              <div class="contact_box">
                <div class="icon"> <img alt="" src="images/phone.png"> </div>
                <p>Phone<span> <a href="tel:7701234567">(770) 123 4567</a></span></p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Contact End --> 
@endsection