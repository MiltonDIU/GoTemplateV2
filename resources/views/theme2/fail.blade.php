@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @include("theme2.layout.breadcrumb", [
    "list" => [
      array("path" => "/cancel", "text" => 5645)
    ]
  ])

  <section class="term_condition_area">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="text-center">
            <div class="term">

              @if ($message = Session::get('success'))
              <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
                <span>
                  <span class="alert_icon lnr lnr-checkmark-circle"></span>
                  <span>{{ $message }}</span>
                </span>
                <i 
                  type="button" 
                  class="fas fa-times close" 
                  data-bs-dismiss="alert" 
                  aria-label="Close"
                ></i>
              </div>
              @endif

              <div class="content">
                <h4>{{ Helper::translation(5647,$translate) }}</h4>
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