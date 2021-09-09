@extends('theme2.layout.master')

@section('content')
  @include('theme2.layout.banner')


  <!------------- category start ----------->
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
  <!------------- category end ------------>


  <!----------------- latest item start ------------->
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
  <!----------------- latest item end ------------->


@endsection