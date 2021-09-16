@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/manage-item.css') }}">
@endpush

@section('content')

@php
  $viewitem  = $data['viewitem'];
  $encrypter = $data['encrypter'];
  $itemData  = $data['itemData'];
@endphp

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


      <div class="row">
        <div class="col-lg-12 col-md-12 mb-3 d-flex flex-row-reverse" style="position: relative;">
          <button onClick="myFunction()" class="btn btn--sm theme-button dropbtn">
            <i class="lnr lnr-plus-circle"></i> {{ Helper::translation(2931,$translate) }}
          </button>

          <div id="myDropdown" class="dropdown-content">
            @foreach($viewitem['type'] as $item_type)
              @php $encrypted = $encrypter->encrypt($item_type->item_type_id); @endphp
              <a href="{{ URL::to('/upload-item') }}/{{ $encrypted }}">
                {{ $item_type->item_type_name }}
              </a>
            @endforeach
          </div>
        </div>
      </div>


      <div class="row" id="listShow">
        @foreach($itemData['item'] as $item)

          <div class="col-lg-4 col-md-4 col-sm-6 li-item">

            @if($item->item_status == 0)
              <div class="ribbon">
                <span>{{ Helper::translation(3092,$translate) }}</span>
              </div>
            @endif

            <div class="product product--card">

              <div class="product__thumbnail">
                @if($item->item_preview!='')
                  <img 
                    src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" 
                    alt="{{ $item->item_name }}" 
                    class="item-thumbnail"
                  >
                @else
                  <img 
                    src="{{ url('/') }}/public/img/no-image.png" 
                    alt="{{ $item->item_name }}" 
                    class="item-thumbnail"
                  >
                @endif

                <div class="prod_option">
                  <a 
                    href="javascript:void(0);" 
                    id="drop1" 
                    class="dropdown-trigger" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="true"
                  >
                    <span class="lnr lnr-cog setting-icon"></span>
                  </a>

                  @php $encrypted = $encrypter->encrypt($item->item_token); @endphp

                  <div class="options dropdown-menu" aria-labelledby="drop1">
                    <ul>
                      <li>
                        <a href="{{ URL::to('/edit-item') }}/{{ $item->item_token }}">
                          <span class="lnr lnr-pencil"></span>{{ Helper::translation(2923,$translate) }}
                        </a>
                      </li>

                      <li>
                        <a href="{{ URL::to('/manage-item') }}/{{ $encrypted }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');">
                          <span class="lnr lnr-trash"></span>{{ Helper::translation(2924,$translate) }}
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="product-desc">
                @if($item->item_status == 1)
                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="product_title ellipsis">
                  @else
                  <span class="product_title ellipsis">
                    @endif

                    <h4>{{ $item->item_name }}</h4>

                    @if($item->item_status == 1)
                </a>@else</span>@endif
                <ul class="titlebtm">
                  <li>
                    @if($item->user_photo!='')
                      <img src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" class="auth-img">
                    @else
                      <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" class="auth-img">
                    @endif

                    <p>
                      <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
                    </p>
                  </li>

                  <li class="product_cat">
                    <a href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}" class="theme-color">
                      <span class="lnr lnr-book"></span>{{ str_replace('-',' ',$item->item_type) }}
                    </a>
                  </li>
                </ul>

                <p>{{ substr($item->item_shortdesc,0,120).'...' }}</p>
              </div>


              <div class="product-purchase">
                <div class="price_love">
                  @if($item->free_download == 1)
                    <span>{{ Helper::translation(2992,$translate) }}</span>
                  @else
                    <span>{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                  @endif

                  <p><span class="lnr lnr-heart"></span> {{ $item->item_liked }}</p>
                </div>

                <div class="sell">
                  <p>
                    <span class="lnr lnr-cart"></span>
                    <span>{{ $item->item_sold }}</span>
                  </p>
                </div>
              </div>
              <!-- end /.product-purchase -->
            </div>
            <!-- end /.single-product -->
          </div>

        @endforeach
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="pagination-area">
            <div class="turn-page" id="pager"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection