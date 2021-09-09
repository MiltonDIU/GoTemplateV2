@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ Helper::translation(2910,$translate) }} - {{ $allsettings->site_title }}</title>
  @include('stylesheet')
  {!! NoCaptcha::renderJs() !!}
</head>

<body class="preload contact-page">

  @include('header')

  @include("./components/hero", [
      "list" => [array("path" => "/customer_reviews", "text" => "Reviews")],
      "headline" => "Customers Review"
  ])

  <section class="container pb-5">
    @php
      $reviews = $review['data'];
    @endphp

    <div class="row justify-content-center" id="listShow">
      @foreach($reviews as $review)
        <div class="testimonial col-lg-4 col-md-4 col-sm-12 col-xs-12 li-item" style="border: 1px solid #cff;">
          <div class="testimonial-wrapper">
            <div class="testimonial-avatar">
              <a href="{{ URL::to('/user') }}/{{ $review->username }}">
                @if($review->user_photo!='')
                <img src="{{ url('/') }}/public/storage/users/{{ $review->user_photo }}" alt="{{ $review->username }}">
                @else
                <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $review->username }}">
                @endif
              </a>
            </div>

            <div class="testimonial-description">
              <blockquote class="custom-blockquote">
                <p>{{ $review->rating_comment }}</p>
              </blockquote>
              <p class="name">
                <span>&ndash;</span>
                <a href="{{ URL::to('/user') }}/{{ $review->username }}">
                  {{ $review->username }}
                </a>
              </p>
            </div>
          </div>
        </div>
      @endforeach

      <div class="col-md-12 row" align="right">
        <div class="col-md-12">
          <div class="pagination-area">
            <div class="turn-page" id="pager"></div>
          </div>
        </div>
      </div> 
    </div>
  </section>


  @include('footer')
  @include('javascript')
</body>

</html>
@else
@include('503')
@endif