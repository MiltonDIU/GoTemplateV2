@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
<section class="cart_area section--padding2 bgcolor">
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
      <div class="col-md-12">
        <div class="product_archive added_to__cart padding-top-70">

          <div align="center">
            <h4>{{ Helper::translation(3189,$translate) }}</h4><br />
            @if(!empty($payment_token))<h4> {{ Helper::translation(3190,$translate) }} : {{ $payment_token }}</h4>@endif
          </div>

        </div>

      </div>
    </div>

  </div>
  <!-- end .container -->
</section>
@endsection

@else
  @include('theme2.503')
@endif