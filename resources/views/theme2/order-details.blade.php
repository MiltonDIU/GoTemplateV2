@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')

  @include("theme2.layout.breadcrumb", [
    "list" => [array("path" => "/sales", "text" => 2930)]
  ])

  <section class="dashboard-area pt-0">

    <div class="dashboard_contents">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <div class="dashboard_title_area">
              <div class="pull-left">
                <div class="dashboard__title">
                  <h3>{{ Helper::translation(3097,$translate) }}</h3>
                </div>
              </div>

              <div class="pull-right">
                <a href="javascript:void(0);" class="btn btn--round btn--sm theme-button" onClick="window.print()">
                  {{ Helper::translation(3098,$translate) }}
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="invoice">

              <div class="invoice__head">
                <div class="invoice_logo">
                  <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="">
                </div>

                <div class="info">
                  <h4>{{ Helper::translation(3099,$translate) }}</h4>
                  <p>{{ Helper::translation(3100,$translate) }} #{{ $checkout['view']->purchase_token }}</p>
                </div>
              </div>

              <div class="invoice__meta">
                <div class="address">
                  <h5 class="bold">{{ $checkout['view']->order_firstname }} {{ $checkout['view']->order_lastname }}</h5>
                  <p>{{ $checkout['view']->order_address }}</p>
                  <p>{{ $checkout['view']->order_city }}, {{ $checkout['view']->order_zipcode }}</p>
                  <p>{{ $checkout['view']->order_country }}</p>
                </div>

                <div class="date_info">
                  <p>
                    <span>{{ Helper::translation(3101,$translate) }}</span>{{ date("d F Y", strtotime($checkout['view']->payment_date)) }}
                  </p>

                  <p class="status">
                    <span>{{ Helper::translation(2873,$translate) }}</span>{{ $checkout['view']->payment_status }}
                  </p>
                </div>
              </div>

              <div class="invoice__detail">
                <div class="table-responsive">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th>{{ Helper::translation(3102,$translate) }}</th>
                        <th>{{ Helper::translation(3103,$translate) }}</th>
                        <th>{{ Helper::translation(3042,$translate) }}</th>
                        <th>{{ Helper::translation(3104,$translate) }}</th>
                        <th>{{ Helper::translation(3105,$translate) }}</th>
                        <th>{{ Helper::translation(2888,$translate) }}</th>
                        <th>{{ Helper::translation(3106,$translate) }}</th>
                      </tr>
                    </thead>


                    <tbody>
                      @php $earn = 0; @endphp
                      @foreach($order['view'] as $order)
                      <tr>
                        <td>{{ date("d F Y", strtotime($order->start_date)) }}</td>
                        <td>{{ date("d F Y", strtotime($order->end_date)) }}</td>
                        <td><a href="{{ URL::to('/user') }}/{{ $order->username }}" class="theme-color">{{ $order->username }}</a></td>
                        <td class="detail">
                          <a href="{{ URL::to('/item') }}/{{ $order->item_slug }}/{{ $order->item_id }}" class="theme-color">{{ $order->item_name }}</a>
                        </td>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $order->item_price }} {{ $allsettings->site_currency }}</td>
                        <td>{{ $order->vendor_amount }} {{ $allsettings->site_currency }}</td>
                      </tr>
                      @php $earn += $order->vendor_amount; @endphp
                      @endforeach

                    </tbody>
                  </table>
                </div>

                <div class="pricing_info">
                  <p>{{ Helper::translation(3107,$translate) }} : {{ $earn }} {{ $allsettings->site_currency }}</p>
                  <p class="bold">{{ Helper::translation(2896,$translate) }} : {{ $earn }} {{ $allsettings->site_currency }}</p>
                </div>
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