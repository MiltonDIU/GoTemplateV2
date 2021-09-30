@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
@if(Auth::user()->user_type == 'vendor')

  @include("theme2.layout.breadcrumb", [
    "list" => [array("path" => "/sales", "text" => 2930)]
  ])

  <section class="dashboard-area pt-0">

    <div class="dashboard_contents dashboard_statement_area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="statement_info_card">
              <div class="info_wrap">
                <span class="lnr lnr-tag icon mcolorbg1"></span>
                <div class="info">
                  <p>{{ $total_sale }} {{ $allsettings->site_currency }}</p>
                  <span>{{ Helper::translation(3039,$translate) }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="statement_info_card">
              <div class="info_wrap">
                <span class="lnr lnr-cart icon mcolorbg2"></span>
                <div class="info">
                  <p>{{ $purchase_sale }} {{ $allsettings->site_currency }}</p>
                  <span>{{ Helper::translation(3169,$translate) }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="statement_info_card">
              <div class="info_wrap">
                <span class="lnr lnr-dice icon mcolorbg3"></span>
                <div class="info">
                  <p>{{ $credit_amount }} {{ $allsettings->site_currency }}</p>
                  <span>{{ Helper::translation(3170,$translate) }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="statement_info_card">
              <div class="info_wrap">
                <span class="lnr lnr-briefcase icon mcolorbg4"></span>
                <div class="info">
                  <p>{{ $drawal_amount }} {{ $allsettings->site_currency }}</p>
                  <span>{{ Helper::translation(3171,$translate) }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="statement_table table-responsive p-5">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>{{ Helper::translation(3172,$translate) }}</th>
                    <th>{{ Helper::translation(3173,$translate) }}</th>
                    <th>{{ Helper::translation(3174,$translate) }}</th>
                    <th>{{ Helper::translation(3175,$translate) }}</th>
                    <th>{{ Helper::translation(2888,$translate) }}</th>
                    <th>{{ Helper::translation(3106,$translate) }}</th>
                    <th>{{ Helper::translation(2922,$translate) }}</th>
                  </tr>
                </thead>

                <tbody id="listShow">
                  @foreach($orderData['item'] as $item)
                    <tr class="li-item">
                      <td>{{ date("d F Y", strtotime($item->payment_date)) }}</td>

                      <td class="author">{{ $item->purchase_token }}</td>
                      <td class="detail">
                        {{ $item->payment_token }}
                      </td>
                      <td class="type">
                        {{ $item->payment_type }}
                      </td>
                      <td>{{ $item->total }} {{ $allsettings->site_currency }}</td>
                      <td class="earning theme-color">{{ $item->vendor_amount }} {{ $allsettings->site_currency }}</td>
                      <td>
                        <a href="{{ URL::to('/sales') }}/{{ $item->purchase_token }}" class="btn btn--sm theme-button">{{ Helper::translation(3177,$translate) }}</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="pagination-area">
                <div class="turn-page" id="pager"></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@else
  @include('theme2.not-found')
@endif
@endsection

@else
  @include('theme2.503')
@endif