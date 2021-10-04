@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/reviews.css') }}">
@endpush

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/customer_reviews", "text" => "Reviews")],
    "headline" => "Customers Review"
  ])

  <section id="reviews" class="container pb-5">
    @php
      $reviews = $data['review'];
    @endphp

    <div class="row justify-content-center" id="listShow">
      @foreach($reviews as $review)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 li-item">
          <div class="card p-3">
            <div>
              <a href="{{ URL::to('/user') }}/{{ $review->username }}">
                @if($review->user_photo!='')
                  <img 
                    src="{{ url('/') }}/public/storage/users/{{ $review->user_photo }}" 
                    alt="{{ $review->username }}"
                    class="avatar"
                  >
                @else
                  <img 
                    src="{{ url('/') }}/public/img/no-user.png" 
                    alt="{{ $review->username }}"
                    class="avatar"
                  >
                @endif
              </a>
            </div>

            <div class="w-100 mt-2">
              <p class="w-100 text-center">{{ $review->rating_comment }}</p>
              <p class="w-100 text-end">
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
@endsection

@else
  @include('theme2.503')
@endif