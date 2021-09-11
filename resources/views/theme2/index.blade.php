@extends('theme2.layout.master')

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
        <li><a href="#" class="category_button">Scripts</a></li>
        <li><a href="#" class="category_button">Apps</a></li>
        <li><a href="#" class="category_button">Themes</a></li>
        <li><a href="#" class="category_button">Plugins</a></li>
        <li><a href="#" class="category_button">Graphics</a></li>
        <li><a href="#" class="category_button">Business</a></li>
        <li><a href="#" class="category_button">Education</a></li>
      </ul>
    </div>
  </section>
  <!-- category end -->


  <!-- latest item start -->
  <section id="latest_item">
    <div class="container">
      <div class="title">
        <h2 class="section_title">Latest Items<span><a href="#">See All</a></span></h2>
      </div>

      <div class="row">
        @foreach( $data['itemData']['item'] as $item)
          @include('theme2.layout.item', [
            "item" => $item
          ])
        @endforeach
      </div>
    </div>
  </section>
  <!-- latest item end -->


  @include('theme2.layout.insights', [
    "totalearning" => $data['totalearning'],
    "totalfiles"   => $data['totalfiles'],
    "totalsales"   => $data['totalsales'],
    "totalmembers" => $data['totalmembers']
  ])
@endsection