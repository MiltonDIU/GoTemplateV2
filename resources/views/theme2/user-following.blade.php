@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/top-authors.css') }}">
@endpush

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/user-following", "text" => 3200)],
    "headline" => 3200
  ])

  @php
    $followers = $data['viewfollowing']['view'];
  @endphp

  <div id="top_authors" class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="product-title-area">
          <div class="product__title">
            <h2>
              <span class="bold">{{ $data['followingcount'] }}</span> 
              @if($data['followingcount'] <= 1) 
                {{ Helper::translation(3200,$translate) }} 
              @else 
                {{ Helper::translation(3201,$translate) }} 
              @endif
            </h2>
          </div>
        </div>
  
        <div class="user_area">
          <ul id="listShow" class="mb-0">
            @foreach($followers as $follower)

              <div class="li-item card col-lg-4 col-sm-6 col-md-6 col-xl-3">
                <div class="author_box h-100">

                  <div class="author_overlay">
                    <a href="{{ url('/user') }}/{{ $follower->username }}">Visit Profile</a>
                  </div>

                  <div class="author_top">
                    <div class="author_img">
                      @if($follower->user_photo != '')
                        <img 
                          src="{{ url('/') }}/public/storage/users/{{ $follower->user_photo }}" 
                          alt="{{ $follower->username }}"
                        >
                      @else
                        <img 
                          src="{{ url('/') }}/public/img/no-user.png" 
                          alt="{{ $follower->name }}"
                        >
                      @endif
                    </div>

                    <div class="author_title">
                      <h2 class="author_name">{{ $follower->name }}</h2>
                      <h3 class="author_skill">{{ $follower->profile_heading }}</h3>
                    </div>
                  </div>

                  <div class="author_details">
                    <div class="author_count">
                      <div class="product_count">
                        <i class="fas fa-briefcase count_icon"></i>
                        <!-- TODO -->
                        <h6 class="v_count">50 Products</h6>
                      </div>
                      <div class="product_sale">
                        <i class="fas fa-dollar-sign count_icon"></i>
                        <h6 class="v_count">{{ $follower->earnings }} Sales</h6>
                      </div>
                    </div>

                    <div class="author_ratings">
                      <!-- TODO -->
                      <p>Ratings</p>
                      @include('theme2.layout.rating_star', ['ratings' => isset($follower->ratings) ? $follower->ratings : []])
                    </div>

                    <div class="f_count">
                      <div class="follow_details">
                        <!-- TODO -->
                        <h3 class="total_follow">100 Followers</h3>
                        <h3 class="total_follow">100 Following</h3>
                      </div>
                      <p class="v_sub_details">{{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($follower->created_at)) }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </ul>
  
          <div class="pagination-area pagination-area2">
            <nav class="navigation pagination " role="navigation">
              <div class="turn-page" id="pager"></div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection