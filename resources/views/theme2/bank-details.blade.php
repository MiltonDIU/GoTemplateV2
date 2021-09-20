@extends('theme2.layout.master')

@section('content')
<section id="purchase">
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

    <div class="purchase_id">
      <p class="p_text_semi">{{ Helper::translation(4813,$translate) }}</p>
      <p class="p_text_semi">Your Purchase ID: <span class="p_text_bold">{{ $purchase_token }}</span></p>
    </div>

    <div class="purchase_main">
      <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12 col-xl-5">
          <div class="purchase_details">
            <p class="p_text_semi p_title">Your transaction details</p>

            <div class="transaction_details">
              <p class="p_text_bold">Bank information</p>

              <div class="t_details_box">
                <p class="p_text_regular">{!! nl2br($bank_details) !!}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="offset-lg-1 col-lg-5 col-sm-12 col-md-12 offset-xl-2 col-xl-5">
          <div class="back_home">
            <i class="fas fa-gifts p_icon"></i>
            <p class="p_thanks">Thank you for the payment!</p>
            <a href="index.html" class="back_btn">Go Back to Home Page</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection