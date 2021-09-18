@extends('theme2.layout.master')

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/user-following", "text" => 3200)],
    "headline" => 3200
  ])

  @php
    $followers = $data['viewfollowing']['view'];
  @endphp

  <div class="container">
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
            <li class="li-item">
              <div class="col-12 user_single d-flex px-3">
                <div class="col-sm-2 d-flex justify-content-center">
                  <div class="user_avatar">
                    <a href="{{ url('/user') }}/{{ $follower->username }}">
                      @if($follower->user_photo != '')
                        <img src="{{ url('/') }}/public/storage/users/{{ $follower->user_photo }}" alt="{{ $follower->username }}" width="70" height="70" class="rounded">
                      @else
                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $follower->username }}" width="70" height="70" class="rounded">
                      @endif
                    </a>
                  </div>
                </div>
  
                <div class="col-sm-10 d-flex row justify-content-between">
                  <div class="user_info">
                    <a href="{{ url('/user') }}/{{ $follower->username }}">
                      {{ $follower->name }}
                    </a>
                    <p class="mb-0">{{ Helper::translation(3077,$translate) }}: {{ date("F Y", strtotime($follower->created_at))}} </p>
                    <p class="mb-0">{{ Helper::translation(3199,$translate) }} : @if($follower->country !='') {{ $follower->country_name }} @else - @endif</p>
                  </div>
  
                  <div><a href="{{ url('/user') }}/{{ $follower->username }}" class="btn btn--md theme-button">{{ Helper::translation(3078,$translate) }}</a></div>
                </div>
  
              </div>
            </li>
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