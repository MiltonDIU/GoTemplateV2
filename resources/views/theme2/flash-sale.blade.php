@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/flash-sale.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
@endpush

@section('content')

@php
  $items = $data['itemData']['item'];
  $cats = $data['catData'];
@endphp

<!-- Flash banner start -->
<section id="flash_banner">
  <div class="container">
    <h1 class="page_banner_title">Flash Sale</h1>
    <h2 class="page_banner_description">Only for a short period of time you can grab these files with 50% discount</h2>

    <div class="row">
      <div class="col-lg-8 m-auto col-sm-12 col-md-12 col-xl-8">
        <!-- counter start -->
        <div id="getting-started" class="flash_counter">
          <div class="count_time">
            <p id="days" class="count_number"></p>
            <p class="count_text">Days</p>
          </div>
          <div class="count_time">
            <p id="hours" class="count_number"></p>
            <p class="count_text">Hours</p>
          </div>
          <div class="count_time">
            <p id="minutes" class="count_number"></p>
            <p class="count_text">Minutes</p>
          </div>
          <div class="count_time">
            <p id="seconds" class="count_number"></p>
            <p class="count_text">Seconds</p>
          </div>
        </div>
        <!-- counter end -->
      </div>
    </div>
  </div>
</section>
<!-- Flash banner end -->

@if($items->all())
  <!-- category start -->
  <section id="flash_category">
    <!-- container start -->
    <div class="container">
      <!-- category buttons start -->
      <ul class="controls main_category">
        <li class="control category_button" data-filter="all">All</li>

        @foreach($cats as $cat)
          <li class="control category_button" data-filter=".{{$cat->category_slug}}">{{ $cat->category_name }}</li>
        @endforeach
      </ul>
      <!-- category buttons end -->

      <!-- sort start -->
      <div class="controls sort_main">
        <div class="sort_group">
          <p class="sort_title">Sort by price:</p>
          <button type="button" class="control sort_btn" data-sort="price:asc">Low to High</button>
          <button type="button" class="control sort_btn" data-sort="price:desc">High to Low</button>
        </div>

        <div class="sort_group">
          <p class="sort_title">Sort by date:</p>
          <button type="button" class="control sort_btn" data-sort="published-date:desc">Latest First</button>
          <button type="button" class="control sort_btn" data-sort="published-date:asc">Oldest First</button>
        </div>
      </div>
      <!-- sort end -->
    </div>
    <!-- container end -->
  </section>
  <!-- category end -->


  <!-- product container start -->
  <section id="product_container">
    <!-- container start -->
    <div class="container">

      <!-- mix container start -->
      <div class="mix_container">

        <div class="row">
          @foreach($items->all() as $item)
                @include('theme2.layout.item_flash_sale',['item'=>$item])


          @endforeach
        </div>

      </div>
      <!-- mix container end -->
    </div>
    <!-- container end -->
  </section>
  <!-- product container end -->
@endif

<script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

<script type="text/javascript">
  var containerEl = document.querySelector('.mix_container');
  var mixer = mixitup(containerEl);
</script>

@endsection

@else
  @include('theme2.503')
@endif
