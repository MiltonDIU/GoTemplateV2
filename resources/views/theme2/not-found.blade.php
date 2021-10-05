@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @include("theme2.layout.breadcrumb", [
    "list" => [array("path" => "/404", "text" => 2860)]
  ])

  <section class="term_condition_area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cardify term_modules">
            <div class="term">
              <div class="content text-center">
                <div class="foru_heading">{{ Helper::translation(2863,$translate) }}</div>
                <h4>{{ Helper::translation(2864,$translate) }}</h4>
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