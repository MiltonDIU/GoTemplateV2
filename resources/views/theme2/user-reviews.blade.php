@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/user-reviews", "text" => 3207)],
    "headline" => 3207
  ])

  <section class="author-profile-area">
    <div class="container">
      <div>
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

      <div class="row">
        <!-- TODO -->
        {{-- @include('user-menu') --}}

        <div class="col-lg-12 col-md-12" style="margin-top: 30px;">
          <div class="row">
            <!-- TODO -->
            {{-- @include('user-box') --}}
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="product-title-area">
                <div class="product__title">
                  <h2>
                    <span class="bold">{{ $data['countreview'] }}</span> {{ Helper::translation(3207,$translate) }}
                  </h2>
                </div>
              </div>

              @foreach($data['ratingview']['list'] as $review)
              <div class="col-12 d-flex p-0 mb-4 row ml-0 mr-0 li-item">
                <div class="col-lg-4 col-md-4 col-sm-12 review-left">
                  <a href="{{ url('/user') }}/{{ $review->username }}">
                    @if($review->user_photo != '')
                    <img src="{{ url('/') }}/public/storage/users/{{ $review->user_photo }}" alt="{{ $review->username }}" class="media-object rounded">
                    @else
                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $review->username }}" class="media-object rounded">
                    @endif
                  </a>

                  <a href="{{ url('/user') }}/{{ $review->username }}" class="mt-1">
                    <h6>{{ $review->name }}</h6>
                  </a>

                  <p class="text-truncate width-full text-center mb-0">{{ $review->profile_heading }}</p>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 review-right py-3">
                  <div class="d-flex mb-2 justify-content-between align-items-center">
                    <div class="rating">
                      <ul>
                        @php $notStar = 5 - $review->rating; @endphp

                        @for($i = 0; $i < $review->rating; $i++)
                          <li><span class="fa fa-star"></span></li>
                          @endfor

                          @for($j = 0; $j < $notStar; $j++) <li><span class="fa fa-star-o"></span></li>
                            @endfor
                      </ul>
                    </div>

                    <p class="review-reason mb-0">{{ $review->rating_reason }}</p>
                  </div>

                  <p>{{ $review->rating_comment }}</p>

                  <p class="mb-0">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    {{ date('F d Y, h:i:s', strtotime($review->rating_date)) }}
                  </p>
                </div>
              </div>
              @endforeach

              <div class="pagination-area pagination-area2">
                <nav class="navigation pagination " role="navigation">
                  <div class="pagination-area">
                    <div class="turn-page" id="pager"></div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@else
  @include('theme2.503')
@endif