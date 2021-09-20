@extends('theme2.layout.master')

@section('content')
<section id="cart">
  <!-- container start -->
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


    <div class="cart_top">
      <h1 class="cart_top_title">Cart</h1>
      <p class="cart_top_title">{{ $data['cart_count'] }} Products</p>
    </div>


    <form action="{{ route('coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">

          @if($data['cart_count'] != 0)
            <div class="cart_main">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col" class="col-lg-4 col-sm-4 col-md-5 col-xl-3 cart_table_heading">Product</th>
                    <th scope="col" class="col-lg-3 col-sm-3 col-md-3 col-xl-4 cart_table_heading cart_item_name">Name</th>
                    <th scope="col" class="col-lg-2 col-sm-2 col-md-2 col-xl-2 cart_table_heading">License</th>
                    <th scope="col" class="col-lg-2 col-sm-2 col-md-2 col-xl-2 cart_table_heading">Price</th>
                    <th scope="col" class="col-lg-1 col-sm-1 col-md-1 col-xl-1 cart_table_heading">Remove</th>
                  </tr>
                </thead>

                <tbody>
                  @php
                    $subtotal = 0;
                    $coupon_code = "";
                    $new_price = 0;
                  @endphp

                  @foreach($data['cart']['item'] as $cart)
                    <tr>
                      <th scope="row">
                        <div class="cart_item">
                          @include('theme2.layout.item', [
                            "item" => $cart,
                            "item_slider" => true
                          ])
                        </div>
                      </th>

                      <td class="cart_item_details cart_item_name">
                        {{ $cart->item_name }}
                      </td>

                      <td class="cart_item_details">
                        {{ $cart->license }}
                        @if($cart->license == 'regular')
                          ({{ Helper::translation(2890,$translate) }})
                        @elseif($cart->license == 'extended')
                          ({{ Helper::translation(2891,$translate) }})
                        @endif
                      </td>

                      <td class="cart_item_details">
                        @php
                          if($cart->discount_price != 0) {
                            $price = $cart->discount_price;
                            $new_price += $cart->discount_price;
                            $coupon_code = $cart->coupon_code;
                          }else {
                            $price = $cart->item_price;
                            $new_price += $cart->item_price;
                          }
                        @endphp

                        @if($cart->discount_price != 0)
                          <span>{{ $price }} {{ $allsettings->site_currency }}</span>
                        @endif

                        <span @if($cart->discount_price != 0) class="cross-line" @endif>
                          {{ $cart->item_price }} {{ $allsettings->site_currency }}
                        </span>
                      </td>

                      <td class="cart_item_details remove_icon">
                        <a 
                          href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" 
                          onClick="return confirm('{{ Helper::translation(2892,$translate) }}');"
                        >
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>

                    @php $subtotal += $cart->item_price; @endphp
                  @endforeach

                </tbody>
              </table>
            </div>

            <div class="cart_coupon">
              <div class="coupon_field">
                <input type="text" placeholder="Add coupon here" id="coupon" name="coupon" value="">
              </div>
              <div class="coupon_button">
                <button type="submit" class="c_btn">Apply Coupon</button>
              </div>
            </div>

            <div class="cart_count">
              <div class="row">
                <div class="offset-lg-4 col-lg-3 col-sm-3 col-md-3">
                  <div class="cart_sub_total">
                    <p class="cart_count_title">Cart Subtotal</p>
                    <p class="cart_count_value">{{ $subtotal }} {{ $allsettings->site_currency }}</p>
                  </div>
                </div>

                @if($coupon_code != "")
                  @php
                    $coupon_discount = $subtotal - $new_price;
                    $final = $new_price;
                  @endphp

                  <div class="cart--subtotal">
                    <p>
                      <span>{{ Helper::translation(2895,$translate) }}</span>
                      <span class="fs14 green">
                        ( {{ Helper::translation(2866,$translate) }} : <strong>{{ $coupon_code }}</strong> )
                        <a 
                          href="{{ URL::to('/cart/') }}/remove/{{ $coupon_code }}" 
                          class="red fs14" 
                          onClick="return confirm('{{ Helper::translation(2892,$translate) }}');" 
                          title="Remove"
                        >
                          <i class="fa fa-remove"></i>
                        </a>
                      </span>
                      {{ $coupon_discount }} {{ $allsettings->site_currency }}
                    </p>
                  </div>
                @else
                  @php $final = $subtotal; @endphp
                @endif

                <div class="col-lg-2 col-sm-3 col-md-3">
                  <div class="cart_sub_total">
                    <p class="cart_count_title">Cart Total</p>
                    <p class="cart_count_value">{{ $final }} {{ $allsettings->site_currency }}</p>
                  </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                  <div class="checkout_btn">
                    <a href="{{ url('/checkout') }}" class="c_btn check_btn">Procced to Checkout</a>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if($data['cart_count'] == 0)
            <div class="row">
              <div class="col-md-12 offset-md-12 noresult" align="center">
                {{ Helper::translation(2898,$translate) }}
              </div>
            </div>
          @endif

        </div>
      </div>
    </form>
  </div>
  <!-- container end -->
</section>
@endsection