@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/top-authors.css') }}">
@endpush

@php
  $users = $data['user']['user']

@endphp

@section('content')
<section id="top_authors">
  <div class="container">
    <h1 class="a_title">Top Vendors</h1>

    <div class="row">

      @foreach($users as $user)

        @if($data['count_sale']->has($user->id) != 0)
          <div class="li-item card col-lg-4 col-sm-6 col-md-6 col-xl-3">
            <div class="author_box h-100">

              <div class="author_overlay">
                <a href="{{ url('/user') }}/{{ $user->username }}">Visit Profile</a>
              </div>

              <div class="author_top">
                <div class="author_img">
                  @if($user->user_photo != '')
                    <img 
                      src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" 
                      alt="{{ $user->username }}"
                    >
                  @else
                    <img 
                      src="{{ url('/') }}/public/img/no-user.png" 
                      alt="{{ $user->name }}"
                    >
                  @endif
                </div>

                <div class="author_title">
                  <h2 class="author_name">{{ $user->name }}</h2>
                  <h3 class="author_skill">{{ $user->profile_heading }}</h3>
                </div>
              </div>

              <div class="author_details">
                <div class="author_count">
                  <div class="product_count">
                    <i class="fas fa-briefcase count_icon"></i>
                    <h6 class="v_count">{{ $data['count_items']->has($user->id) ? count($data['count_items'][$user->id]) : 0 }} Products</h6>
                  </div>
                  <div class="product_sale">
                    <!--<i class="fas fa-dollar-sign count_icon"></i>-->
                     <span class="iconify" data-icon="tabler:currency-taka" data-width="20"></span>
                    <h6 class="v_count">{{ $user->earnings }} Sales</h6>
                  </div>
                </div>

                <div class="author_ratings">
                  <p>Ratings</p>
                  @include('theme2.layout.rating_star', ['ratings' => isset($user->ratings) ? $user->ratings : []])
                </div>

                <div class="f_count">
                  <div class="follow_details">
                    <!-- TODO -->
                  
                    <h3 class="total_follow">{{ \Feberr\Models\Items::getfollowerCount($user->id) }} Followers</h3>
                    <h3 class="total_follow">{{ \Feberr\Models\Items::getfollowingCount($user->id) }} Following</h3>
                   

                  </div>
                  <p class="v_sub_details">{{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($user->created_at)) }}</p>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>

    <div class="pagination-area">
      <div class="turn-page" id="pager"></div>
    </div>
  </div>
</section>
@endsection

@else
  @include('theme2.503')
@endif