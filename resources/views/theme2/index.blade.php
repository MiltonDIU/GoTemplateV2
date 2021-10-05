@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/banner.css') }}">
@endpush

@section('content')
  @include('theme2.layout.banner')

  <!-- start success and warning message sectiion -->
  <div class="container mt-5">
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
  </div>
  <!-- end success and warning message sectiion -->


  <!-- category start -->
  <section id="category">
    <div class="container">
      <ul class="main_category">
        <li><a href="{{ URL::to('/shop') }}" class="category_button">All items</a></li>
        @foreach($data['catData'] as $cat)
          <li><a href="{{ URL::to('/shop') }}" class="category_button">{{ $cat->category_name }}</a></li>
        @endforeach
      </ul>
    </div>
  </section>
  <!-- category end -->


  <!-- latest item start -->
  @if($data['newest']->all())
  <section id="latest_item">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Latest Items<span><a href="{{ URL::to('/shop/recent-items') }}">See All</a></span></h2>
      </div>

      <div class="row">
        @foreach( $data['newest'] as $item)

          @include('theme2.layout.item', [
            "item" => $item
          ])
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- latest item end -->


  <!-- start flash sale -->
  @if($data['flashes']->all())
    <section id="flash_sale">
      <div class="container">
        <div class="title">
          <h2 class="section_title">Flash Sale<span><a href="{{ URL::to('/flash-sale') }}">See All</a></span></h2>
        </div>

        <div class="item_slider_main">
          @foreach($data['flashes'] as $item)
            <div class="slider_item">


              @include('theme2.layout.item', [
                "item" => $item,
                "item_slider" => true
              ])
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif
  <!-- end flash sale -->


  <!-- featured item start -->
  @if($data['featured']['items']->all())
  <section id="featured_item">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Featured Items<span><a href="{{ URL::to('/shop/featured-items') }}">See All</a></span></h2>
      </div>

      <div class="item_slider_main">
        @foreach($data['featured']['items'] as $item)
          <div class="slider_item">
            @include('theme2.layout.item', [
              "item" => $item,
              "item_slider" => true
            ])
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- featured item end -->


  <!-- free item start -->
  @if($data['free']['items']->all())
  <section id="free_item">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Free Items<span><a href="{{ URL::to('/free-items') }}">See All</a></span></h2>
      </div>

      <div class="item_slider_main">
        @foreach($data['free']['items']->all() as $item)
          <div class="slider_item">
            @include('theme2.layout.item', [
              "item" => $item,
              "item_slider" => true
            ])
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- free item end -->


  @include('theme2.layout.insights', [
    "totalearning" => $data['totalearning'],
    "totalfiles"   => $data['totalfiles'],
    "totalsales"   => $data['totalsales'],
    "totalmembers" => $data['totalmembers']
  ])


  <!-- start popular category -->
  <section id="popular_category">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Popular Categories<span><a href="#">See All</a></span></h2>
      </div>

      <div class="row">
        @include('theme2.layout.why_choose')
        @include('theme2.layout.popular_category')
      </div>
    </div>
  </section>
  <!-- end popular category -->


  <!-- popular item start -->
  @if($data['populars']->all())
  <section id="popular_item">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Popular Items<span><a href="{{ URL::to('/shop/popular-items') }}">See All</a></span></h2>
      </div>

      <div class="item_slider_main">
        @foreach($data['populars']->all() as $item)
          <div class="slider_item">
            @include('theme2.layout.item', [
              "item" => $item,
              "item_slider" => true
            ])
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- popular item end -->
@endsection

@else
  @include('theme2.503')
@endif
