@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/manage-item.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
@endpush

@section('content')

@php
  $viewitem  = $data['viewitem'];
  $encrypter = $data['encrypter'];
  $itemData  = $data['itemData'];
@endphp

<section class="pt-0" id="manage_item">
  <div class="container">
    @include("theme2.layout.breadcrumb", [
      "list" => [array("path" => "/manage-item", "text" => "Manage Item")]
    ])

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

        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-3 li-item">
          <div class="item_box">
            <div class="item_view">
              <div class="item_view_overlay">
                <div class="item_details">
                  @if($item->free_download)
                    <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="free_item">
                      <!-- <i class="fa fa-gift"></i> -->
                      <p class="price">FREE</p>
                    </a>
                  @else
                    <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="paid_item_top">
                      <!-- <i class="fas fa-dollar-sign"></i> -->
                      <p class="price">{{ $item->regular_price }}</p>
                    </a>
                  @endif

                  <div class="item_title">
                    <a 
                      href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" 
                      class="item_name"
                    >
                      {{$item->item_name}}
                    </a>
                  </div>
                </div>

                <div class="icon_container">
                  <a 
                    href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="left" 
                    title="Product details" 
                    class="item_icons"
                  >
                    <i class="fas fa-external-link-alt"></i>
                  </a>

                  @if (Auth::check())
                    @if($item->id != Auth::user()->id)
                      <a 
                        href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}" 
                        class="item_icons {{(\Feberr\Models\Items::getfavouriteCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''}}"
                        data-bs-toggle="tooltip" 
                        data-bs-placement="left" 
                        title="Save"
                      >
                        <i class="fas fa-folder-plus"></i>
                      </a>
                      <a 
                        href="{{ route('item.liked',[base64_encode($item->item_id),base64_encode($item->item_liked)]) }}" 
                        data-bs-toggle="tooltip" 
                        data-bs-placement="left" 
                        title="Like" 
                        class="item_icons {{(\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''}}"
                      >
                        <i class="fas fa-heart"></i>
                      </a>
                    @else
                      <a 
                        href="javascript:void(0);" 
                        data-bs-toggle="tooltip" 
                        data-bs-placement="left" 
                        title="Save" 
                        class="item_icons"
                        onClick="alert(`You can't save your own item!`)"
                      >
                        <i class="fas fa-folder-plus"></i>
                      </a>
                      <a 
                        href="javascript:void(0);" 
                        data-bs-toggle="tooltip" 
                        data-bs-placement="left" 
                        title="Like" 
                        class="item_icons"
                        onClick="alert(`You can't like your own item!`)"
                      >
                        <i class="fas fa-heart"></i>
                      </a>
                    @endif
                  @else
                    <a 
                      href="javascript:void(0);" 
                      data-bs-toggle="tooltip" 
                      data-bs-placement="left" 
                      title="Save" 
                      class="item_icons"
                      onClick="alert('Login user only');"
                    >
                      <i class="fas fa-folder-plus"></i>
                    </a>
                    <a 
                      href="javascript:void(0);" 
                      data-bs-toggle="tooltip" 
                      data-bs-placement="left" 
                      title="Like" 
                      class="item_icons"
                      onClick="alert('Login user only');"
                    >
                      <i class="fas fa-heart"></i>
                    </a>
                  @endif

                </div>

              </div>

              @php $encrypted = $encrypter->encrypt($item->item_token); @endphp

              <!-- Manage button start -->
              <div class="manage_item_btn">
                <a href="#" class="manage_item_top dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-cog"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ URL::to('/edit-item') }}/{{ $item->item_token }}">Edit</a></li>
                  <li><a class="dropdown-item" href="{{ URL::to('/manage-item') }}/{{ $encrypted }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');">Delete</a></li>
                </ul>
              </div>
              <!-- Manage button end -->

              @if($item->item_thumbnail!='')
                <img class="item_view_img" src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}">
              @else
                <img class="item_view_img" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $item->item_name }}">
              @endif
            </div>

            <div class="item_bottom">
              <div class="author_details">
                <div class="item_author_img">
                  <img src="{{ url('/') }}/public/storage/users/{{ $item->user_photo?$item->user_photo:$item->user->user_photo }}" alt="{{ $item->username}}">
                </div>
                <a 
                  class="text-truncate" 
                  style="max-width: 85px;" 
                  href="{{ URL::to('/user') }}/{{ $item->username }}"
                  data-bs-toggle="tooltip" 
                  data-bs-placement="bottom" 
                  title="{{ $item->username }}"
                >
                  {{ $item->username }}
                </a>
              </div>
              <div class="item_bottom_icons">
                <a 
                  href="#" 
                  data-bs-toggle="tooltip" 
                  data-bs-placement="bottom" 
                  title="Add to Cart" 
                  class="item_bottom_cart"
                >
                  <i class="fa fa-cart-plus"></i>
                </a>
                <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Downloads">
                  <i class="fa fa-download"></i>{{ $item->item_sold }}
                </a>
                <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Likes">
                  <i class="fa fa-heart"></i>{{ $item->liked }}
                </a>
              </div>
            </div>
          </div>
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
</section>
@endsection

@else
  @include('theme2.503')
@endif