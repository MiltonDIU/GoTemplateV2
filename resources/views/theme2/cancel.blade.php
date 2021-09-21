@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
@include("./components/hero", [
  "list" => [array("path" => "/cancel", "text" => 2882)],
  "headline" => 2883
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
                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
              </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-secondary" role="alert">
              <span class="alert_icon lnr lnr-checkmark-circle"></span>
              {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="lnr lnr-cross" aria-hidden="true"></span>
              </button>
            </div>
            @endif

            <div class="content">
              <h4>{{ Helper::translation(2884,$translate) }}</h4>
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