@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @if($cart_count != 0)
    <section id="checkout">
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

        <form action="{{ route('checkout') }}" class="setting_form" id="checkout_form" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="order_firstname" value="{{ Auth::user()->name }}">
          <input type="hidden" name="order_email" value="{{ Auth::user()->email }}">
          
          <div class="row">
            <div class="col-lg-5 col-sm-12 col-md-6 col-xl-5">
              <div class="order_summary">
                <div class="checkout_title">
                  <p>Order Summary</p>
                </div>

                <div class="order_details_main">
                  <ul>
                    @php
                      $subtotal = 0;
                      $order_id = '';
                      $item_price = '';
                      $item_userid = '';
                      $item_user_type = '';
                      $commission = 0;
                      $vendor_amount = 0;
                      $single_price = 0;
                      $coupon_code = "";
                      $new_price = 0;
                    @endphp

                    @foreach($cart['item'] as $cart)
                      <li class="order_info">
                        <a href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}" class="order_item_text order_item_name">
                          {{ $cart->item_name }}
                        </a>
                        <p class="order_item_text order_item_price">
                          {{ $cart->item_price }} {{ $allsettings->site_currency }}
                        </p>
                      </li>

                      @php
                        $subtotal       += $cart->item_price;
                        $order_id       .= $cart->ord_id.',';
                        $item_price     .= $cart->item_price.',';
                        $item_userid    .= $cart->item_user_id.',';
                        $item_user_type .= $cart->exclusive_author;
                        $amount_price    = $subtotal;
                        $single_price    = $cart->item_price;

                        if($cart->discount_price != 0) {
                          $price = $cart->discount_price;
                          $new_price += $cart->discount_price;
                          $coupon_code = $cart->coupon_code;
                        }else {
                          $price = $cart->item_price;
                          $new_price += $cart->item_price;
                          $coupon_code = "";
                        }

                        if($item_user_type == 1) {
                          $commission +=($price * $allsettings->site_exclusive_commission) / 100;
                        }else {
                          $commission +=($price * $allsettings->site_non_exclusive_commission) / 100;
                        }
                      @endphp

                    @endforeach

                    @if($allsettings->site_extra_fee != 0)
                      <li class="order_info">
                        <p class="order_item_text order_item_name">{{ Helper::translation(2901,$translate) }}:</p>
                        <span>{{ $allsettings->site_extra_fee }} {{ $allsettings->site_currency }}</span>
                      </li>
                    @endif

                    @if($coupon_code != "")
                      @php
                        $coupon_discount = $subtotal - $new_price;
                        $final = $new_price + $allsettings->site_extra_fee;
                        $last_price = $new_price;
                        $priceamount = $new_price;
                      @endphp

                      <li class="order_info">
                        <p class="order_item_text order_item_name">{{ Helper::translation(2895,$translate) }}:<br /><span class="green">{{ Helper::translation(2866,$translate) }}</span></p>
                        <span class="green"> - {{ $coupon_discount }} {{ $allsettings->site_currency }}</span>
                      </li>
                    @else

                      @php
                        $final = $subtotal+$allsettings->site_extra_fee;
                        $last_price = $subtotal;
                        $priceamount = $subtotal;
                      @endphp
                    @endif

                    <li class="order_info order_total">
                      <p class="order_item_text total_text">Cart Total</p>
                      <p class="order_item_text total_text">{{ $final }} {{ $allsettings->site_currency }}</p>
                    </li>
                  </ul>
                </div>

                @php
                  $vendor_amount = $priceamount - $commission;
                @endphp
              </div>

              <input type="hidden" name="order_id"       value="{{ rtrim($order_id,',') }}">
              <input type="hidden" name="item_prices"    value="{{ base64_encode(rtrim($item_price,',')) }}">
              <input type="hidden" name="item_user_id"   value="{{ rtrim($item_userid,',') }}">
              <input type="hidden" name="amount"         value="{{ base64_encode($last_price) }}">
              <input type="hidden" name="processing_fee" value="{{ base64_encode($allsettings->site_extra_fee) }}">
              <input type="hidden" name="website_url"    value="{{ url('/') }}">
              <input type="hidden" name="admin_amount"   value="{{ base64_encode($commission) }}">
              <input type="hidden" name="vendor_amount"  value="{{ base64_encode($vendor_amount) }}">
              <input type="hidden" name="token" class="token">
              <input type="hidden" name="reference"      value="{{ Paystack::genTranxRef() }}">
            </div>

            <div class="offset-lg-2 col-lg-5 col-sm-12 offset-md-1 col-md-5 offset-xl-2 col-xl-5">
              <div class="payment_method">
                <div class="checkout_title">
                  <p>Select Payment Method</p>
                </div>

                <div class="payment_method_main">
                  @php $no = 1; @endphp

                  <ul>
                    @foreach($get_payment as $payment)
                      <li class="d-flex align-items-center justify-content-between" @if($payment=='paystack' ) @if($allsettings->site_currency != 'NGN') style="display:none;" @endif @endif>
                        <div class="method_select custom-radio capital">
                          <input type="radio" id="opt1-{{ $payment }}" value="{{ $payment }}" @if($no==1) checked @endif name="payment_method" data-bvalidator="required">
                          <label for="opt1-{{ $payment }}" @if($payment=='paystack' ) @if($allsettings->site_currency != 'NGN')
                            style="display:none;"
                            @endif
                            @endif
                            >
                            <span class="circle"></span>{{ $payment }} @if($payment == 'wallet') ({{ $allsettings->site_currency }} {{ Auth::user()->earnings }}) @endif</label>
                        </div>

                        @if($payment == 'paypal')
                          <img src="{{ url('/') }}/public/img/paypal.jpg" alt="{{ $payment }}">
                        @endif

                        @if($payment == 'stripe')
                          <img src="{{ url('/') }}/public/img/stripe.jpg" alt="{{ $payment }}">
                        @endif

                        @if($payment == 'wallet')
                          <img src="{{ url('/') }}/public/img/wallet.png" alt="{{ $payment }}" height="50">
                        @endif

                        @if($payment == '2checkout')
                          <img src="{{ url('/') }}/public/img/2checkout.png" alt="{{ $payment }}">
                        @endif

                        @if($payment == 'paystack')
                          @if($allsettings->site_currency == 'NGN')
                            <img src="{{ url('/') }}/public/img/paystack.png" alt="{{ $payment }}">
                          @endif
                        @endif

                        @if($payment == 'localbank')
                          <img src="{{ url('/') }}/public/img/localbank.png" alt="{{ $payment }}">
                        @endif

                        @if($payment == 'stripe')
                          <div class="stripebox" id="ifYes" style="display:none;">
                            <label for="card-element">{{ Helper::translation(2903,$translate) }}</label>
                            <div id="card-element">

                            </div>
                            <div id="card-errors" role="alert"></div>
                          </div>
                        @endif
                      </li>

                      @php $no++; @endphp
                    @endforeach
                  </ul>
                </div>


                <div class="payment_info modules__content">
                  <div class="row">
                    @if($cart_count != 0)
                      <div class="col-md-6">
                        <button type="submit" class="btn btn--default theme-button">
                          {{ Helper::translation(2904,$translate) }}
                        </button>
                      </div>
                    @else
                      <div class="col-md-6">
                        <a href="javascript:void(0);" class="btn btn--default theme-button" onClick="alert('{{ Helper::translation(2898,$translate) }}');">
                          {{ Helper::translation(2904,$translate) }}
                        </a>
                      </div>
                    @endif
                  </div>
                </div>

              </div>
            </div>

          </div>
        </form>

      </div>
    </section>
  @else
    <section class="dashboard-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="cardify term_modules mb-5">
              <div class="term">
                <div class="text-center noresult">
                  <div class="pt-5">{{ Helper::translation(2898,$translate) }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif
@endsection

@else
  @include('theme2.503')
@endif