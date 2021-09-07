@php
  $reviews = [
    array(
      "name"=> "Mr. Shah Al Mamun",
      "designation"=>"HR & CORPORATE MANAGER",
      "comment"=> "As a local platform, GoTemplate is an excellent opportunity. Finally, a platform that gives local experts the flexibility to easily monetize their skills and help others in the process.",
      "avatar"=> "sa_mamun.jpg",
      "id"=> 0
    ),
    array(
      "name"=> "Siddiqur Rahman",
      "designation"=>"WEB & APP DEVELOPER",
      "comment"=> "I am glad that I have found GoTemplate to be the right platform to share my product as they believe in skills and success.",
      "avatar"=> "siddiqur_rahman.jpg",
      "id"=>1
    ),
    array(
      "name"=> "Md. Mirazul Islam",
      "designation"=>"CORPORATE EXECUTIVE",
      "comment"=> "GoTemplate is a platform where I’ve got an opportunity to get lots of things beyond the conventional curriculum. The contents and products are very trendy and useful for professional life. I wish all the best to GoTemplate.",
      "avatar"=> "mirazul_islam.jpg",
      "id"=>2
    ),
    array(
      "name"=> "Sultan Mahmud Sujon",
      "designation"=>"SOCIAL MEDIA EXPERT",
      "comment"=> "GoTemplate did a great job! I bought a web theme from here and developed my website. My new website is so much more professional, good looking and easier to work with than my old site.",
      "avatar"=> "sultan_mahmud.jpg",
      "id"=>3
    ),
  ];
@endphp

<section 
  id="testimonial-carousel" 
  class="carousel slide testimonial-area section--padding"
>
  <div class="container position-relative">

    <h3 class="heading">We Care What Our Customers Say</h3>

    <div class="d-flex justify-content-around">
      <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <div class="carousel-inner col-md-6">
        @foreach($reviews as $review)
          <div class="carousel-item {{$review["id"] == 0 ? 'active' : ''}}">
            <div class="carousel-item__wrapper">
              @if($review["avatar"]!='')
                <img  
                  src="{{ url('/') }}/public/assets/images/testimonial/{{ $review['avatar'] }}" 
                  alt="{{$review['avatar']}}"
                  class="testimonial-avatar"
                >
              @else
                <img 
                  src="{{ url('/') }}/public/img/no-user.png" 
                  alt="{{ $review['name'] }}"
                  class="testimonial-avatar"
                >
              @endif
              <h4 class="name">{{$review["name"]}}</h4>
              <h6 class="designation">{{$review["designation"]}}</h6>
                
              <blockquote class="custom-blockquote comment my-3">
                <p class="text-center">{{$review["comment"]}}</p>
              </blockquote>
            </div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <ol class="carousel-indicators">
      @foreach($reviews as $review)
        <li 
          data-target="#testimonial-carousel" 
          data-slide-to="{{$review['id']}}" 
          class="{{$review["id"] == 0 ? 'active' : ''}}"
        ></li>
      @endforeach
    </ol>
  </div>
</section>

<!-- start testimonial/customer review -->
<!--
<section class="testimonial-area bgimage">
  <div class="bg_image_holder">
    <img src="public/assets/images/review.jpg" alt="Testimonial Background Image" />
  </div>

  <div class="container content_above d-flex flex-column-center">
    <h1 class="heading">WE CARE WHAT OUR CUSTOMERS SAY</h1>

    <div class="row justify-content-center col-md-12">
      @foreach($reviews as $review)
        <div class="testimonial col-lg-5 col-md-10 col-sm-10 col-xs-10">
          <div class="testimonial-wrapper">
            @if($review["avatar"]!='')
              <img  
                src="{{ url('/') }}/public/assets/images/testimonial/{{ $review['avatar'] }}" 
                alt="{{$review['avatar']}}"
                class="testimonial-avatar"
              >
            @else
              <img 
                src="{{ url('/') }}/public/img/no-user.png" 
                alt="{{ $review['name'] }}"
                class="testimonial-avatar"
              >
            @endif

            <div class="testimonial-description">
              <blockquote class="custom-blockquote"> <p>{{ $review["comment"] }}</p> </blockquote>
              <p class="name mb-0">
                <span>&ndash;</span>
                {{ $review["name"] }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
-->
<!-- end testimonial/customer review -->