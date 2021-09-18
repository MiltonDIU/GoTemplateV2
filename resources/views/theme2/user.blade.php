@extends('theme2.layout.master')

@section('content')

<div class="container">
  @if ($message = Session::get('success'))
    <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
      <span>
        <span class="alert_icon lnr lnr-checkmark-circle"></span>
        <span>{{ $message }}</span>
      </span>
      <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
      <span>
        <span class="alert_icon lnr lnr-warning"></span>
        <span>{{ $message }}</span>
      </span>
      <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
  @endif

  @if (!$errors->isEmpty())
    <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
      <span>
        <span class="alert_icon lnr lnr-warning"></span>
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
      </span>

      <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
  @endif
</div>

@php
  $user = $data['user']['user'];
  $items = $data['itemData']['item'];
@endphp

<!-- vendor main start -->
<section id="vendor_main">
  <!-- container start -->
  <div class="container">
    <div class="v_box">
      <div class="row">

        <div class="col-lg-2 col-sm-12 col-md-3 col-xl-2">
          <div class="v_image">
            @if($user->user_photo != '')
              <img 
                src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" 
                alt="{{ $user->name }}"
              >
            @else
              <img 
                src="{{ url('/') }}/public/img/no-user.png" 
                alt="{{ $user->username }}"
              >
            @endif
          </div>
        </div>

        <div class="col-lg-5 col-sm-12 col-md-4 col-xl-5">
          <div class="v_details">
            <div class="v_name">
              <h1>{{ $user->name }}</h1>
            </div>

            <div class="v_skill">
              <h2 class="vendor_skill">{{ $user->profile_heading }}</h2>
              <p class="v_sub_details">{{ $user->about }}</p>

              @if($user->user_type == 'vendor' || $user->user_type == 'customer')
                @if($user->country_badge == 1 || $user->country != '')
                  <p class="v_location"><i class="fas fa-map-marker-alt"></i>{{ $data['country']['view']->country_name }}</p>
                @endif
              @endif
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-sm-12 col-md-5 col-xl-5">
          <div class="v_follow">
            @if(Auth::guest())
              <a href="javascript:void(0);" class="vendor_follow" onClick="alert('Login user only');">
                <i class="fas fa-plus"></i>{{ Helper::translation(3202,$translate) }}
              </a>
            @endif

            @if (Auth::check())
              @if($user->id != Auth::user()->id)

                @php $followcheck = $data['followcheck']; @endphp

                @if($followcheck == 0)
                  <a 
                    href="{{ url('/user') }}/{{ Auth::user()->id }}/{{ $user->id }}" 
                    class="vendor_follow"
                  >
                    <i class="fas fa-plus"></i>{{ Helper::translation(3202,$translate) }}
                  </a>
                @else
                  <a 
                    href="{{ url('/user') }}/unfollow/{{ Auth::user()->id }}/{{ $user->id }}" 
                    class="vendor_follow"
                  >
                    <i class="fas fa-plus"></i>{{ Helper::translation(3203,$translate) }}
                  </a>
                @endif
              @endif
            @endif
          </div>

          <div class="f_count">
            <div class="follow_details">
              <h3 class="total_follow">
                <a href="{{ url('/user-followers') }}/{{ $user->username }}">
                  {{ $data['followercount'] }} Followers
                </a>
              </h3>
              <h3 class="total_follow">
                <a href="{{ url('/user-following') }}/{{ $user->username }}">
                  {{ $data['followingcount'] }} Following
                </a>
              </h3>
            </div>
            <p class="v_sub_details">{{ Helper::translation(3077,$translate) }} {{ $data['since'] }}</p>
            <div class="v_ratings">
              <p>Ratings</p>
              <ul>
                @php $notStar = 5 - $data['count_rating']; @endphp

                @for($i = 0; $i < $data['count_rating']; $i++) 
                  <li><i class="fas fa-star"></i></li>
                @endfor

                @for($j = 0; $j < $notStar; $j++) 
                  <li><i class="far fa-star"></i></li>
                @endfor
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
          <div class="v_connect">
            <ul>
              <li><a href="mailto:{{ $user->email }}"><i class="fas fa-envelope"></i></a></li>
              <li><a href="{{ $user->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{ $user->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{ $user->gplus_url }}"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 vendor_count_xs">
          <div class="vendor_count">
            <div class="product_count">
              <i class="fas fa-briefcase"></i>
              <h6 class="v_count">{{ $data['getitemcount'] }} Products</h6>
            </div>
            <div class="vendor_sale">
              <i class="fas fa-dollar-sign"></i>
              <h6 class="v_count">{{ $data['getsalecount'] }} Sales</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container start -->
</section>
<!-- vendor main end -->


@if($user->user_type == 'vendor')
  <section id="product_by">
    <div class="container">
      <div class="p_by">
        <h5>Products by <span class="v_name">{{ $user->name }}</span></h5>
      </div>
    </div>


    <div class="container">
      <div class="row">
        @foreach($items as $item)
          @include('theme2.layout.item', [
            "item" => $item
          ])
        @endforeach
      </div>
    </div>
  </section>
@endif
@endsection