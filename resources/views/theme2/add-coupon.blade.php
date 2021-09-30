@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
@if(Auth::user()->user_type == 'vendor')

@include("theme2.layout.breadcrumb", [
  "list" => [
    array("path" => "/add-coupon", "text" => 2865)
  ]
])

<section class="dashboard-area pt-0">

  <div class="dashboard_contents">
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

      <form action="{{ route('add-coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="upload_modules">
          <div class="modules__content">
            <div class="row">
              <div class="col-md-12">

                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="inputFirstname">{{ Helper::translation(2866,$translate) }} <sup>*</sup></label>
                    <input id="coupon_code" name="coupon_code" type="text" class="text_field" data-bvalidator="required">
                  </div>
                  <div class="col-sm-6">
                    <label for="inputLastname">{{ Helper::translation(2867,$translate) }} <sup>*</sup></label>
                    <input id="coupon_value" name="coupon_value" type="text" class="text_field" data-bvalidator="required,min[1]">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="inputAddressLine1">{{ Helper::translation(2868,$translate) }} <sup>*</sup></label>
                    <input id="coupon_start_date" name="coupon_start_date" type="text" class="text_field" autocomplete="off" data-bvalidator="required">
                  </div>
                  <div class="col-sm-6">
                    <label for="inputAddressLine2">{{ Helper::translation(2869,$translate) }} <sup>*</sup></label>
                    <input id="coupon_end_date" name="coupon_end_date" type="text" class="text_field" autocomplete="off" data-bvalidator="required">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="inputCity">{{ Helper::translation(2870,$translate) }} <sup>*</sup></label>
                    <div class="select-wrap select-wrap2">
                      <select name="discount_type" class="text_field" data-bvalidator="required">
                        <option value=""></option>
                        <option value="percentage">{{ Helper::translation(2871,$translate) }}</option>
                        <option value="fixed">{{ Helper::translation(2872,$translate) }}</option>
                      </select>
                      <span class="lnr lnr-chevron-down"></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="inputState">{{ Helper::translation(2873,$translate) }} <sup>*</sup></label>
                    <div class="select-wrap select-wrap2">
                      <select name="coupon_status" class="text_field" data-bvalidator="required">
                        <option value=""></option>
                        <option value="1">{{ Helper::translation(2874,$translate) }}</option>
                        <option value="0">{{ Helper::translation(2875,$translate) }}</option>
                      </select>
                      <span class="lnr lnr-chevron-down"></span>
                    </div>
                  </div>

                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn--default theme-button">{{ Helper::translation(2876,$translate) }}</button>

              </div>
            </div>

            <!-- end /.modules__content -->
          </div>

        </div>

      </form>

      <!-- end /.row -->
    </div>
  </div>
  <!-- end /.container -->
  </div>
</section>
@else
@include('theme2.not-found')
@endif
@endsection

@else
  @include('theme2.503')
@endif