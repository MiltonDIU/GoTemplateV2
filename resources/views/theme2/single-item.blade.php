@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/single-item.css') }}">
@endpush

@section('content')

@php 
  $item = $data['item']['item'];
  $images = $data['item_allimage'];
  $itemData = $data['itemData']['item'];
@endphp

<section id="single_item_top">
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
      <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6 vendor_details_sm">
        <div class="vendor_details">
          <div class="vendor_img">
            <img src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="author1">
          </div>
          <div class="vendor_text">
            <a href="{{ url('/user') }}/{{ $item->username }}" class="vendor_name">{{ $item->name }}</a>
            <p class="vendor_skill">{{ $item->profile_heading }}</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6 v_follow_sm">
        <div class="v_follow">
          @if(Auth::guest())
            <a href="javascript:void(0);" class="vendor_follow" onClick="alert('Login user only');">
              <i class="fas fa-plus"></i>{{ Helper::translation(3202,$translate) }}
            </a>
          @endif

          @if (Auth::check())
            @if($item->user_id != Auth::user()->id)
              @if($data['followcheck'] == 0)
                <a 
                  href="{{ url('/user') }}/{{ Auth::user()->id }}/{{ $item->user_id }}" 
                  class="vendor_follow"
                >
                  <i class="fas fa-plus"></i>{{ Helper::translation(3202,$translate) }}
                </a>
              @else
                <a 
                  href="{{ url('/user') }}/unfollow/{{ Auth::user()->id }}/{{ $item->user_id }}" 
                  class="vendor_follow"
                >
                  <i class="fas fa-plus"></i>{{ Helper::translation(3203,$translate) }}
                </a>
              @endif
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</section>


<section id="single_item_view">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-12 col-xl-8">
        <!-- slider start -->
        <div class="item_view_img">

          <!-- top slider start -->
          <div class="item_img_focus">
            @foreach($images as $image)
              <div class="img_focus">
                <img 
                  src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" 
                  alt="focus1" 
                  class="i_focus"
                >
              </div>
            @endforeach
          </div>
          <!-- top slider end -->

          <!-- bottom slider start -->
          <div class="item_img_bottom">
            @foreach($images as $image)
              <div class="img_bottom">
                <img 
                  src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" 
                  alt="focus1" 
                  class="i_bottom"
                >
              </div>
            @endforeach
          </div>
          <!-- bottom slider end -->

        </div>
        <!-- slider end -->
      </div>

      <div class="col-lg-4 col-sm-12 col-md-12 col-xl-4">
        @php
          if($item->item_flash == 1) {
            $item_price = round($item->regular_price/2);
            $extend_item_price = round($item->extended_price/2);
          }else {
            $item_price = $item->regular_price;
            $extend_item_price = $item->extended_price;
          }
        @endphp

        <!-- item details start -->
        <div class="item_view_details">
          <h1 class="item_name">{{ $item->item_name }}</h1>

          <form 
            action="{{ route('cart') }}" 
            class="setting_form" 
            method="post" 
            id="order_form" 
            enctype="multipart/form-data"
          >
            {{ csrf_field() }}
            <div class="my-2 price2">
              <h1 style="color: #333;">
                <span>
                  @if($item->free_download)
                    FREE
                  @else
                    <div class="item_view_price">
                      <i class="fas fa-dollar-sign"></i>
                      <h2 class="price">{{ $item_price }}</h2>
                    </div>
                  @endif
                </span>
              </h1>
            </div>


            <div class="item_features">
              <ul id="r_license">
                <li><i class="fas fa-check"></i>Quality checked by GoTemplate</li>

                @if($item->extended_licence)
                  @foreach(explode(",",$item->extended_licence) as $licence)
                    <li>
                      <i class="fas fa-check"></i>{{$licence}}
                    </li>
                  @endforeach
                @endif

                @if($item->future_update == 1)
                  <li><i class="fas fa-check"></i>{{ Helper::translation(3069,$translate) }}</li>
                @else
                  <li><i class="fas fa-check"></i>{{ Helper::translation(3069,$translate) }}</li>
                @endif

                @if($item->item_support == 1)
                  <li>
                    <i class="fas fa-check"></i>12 months support from
                    <a href="{{ URL::to('/user') }}/{{ $item->username }}">
                      {{ $item->name }}
                    </a>
                  </li>
                @else
                  <li>
                    <i class="fas fa-check"></i>{{ Helper::translation(3070,$translate) }}
                    <a href="{{ URL::to('/user') }}/{{ $item->username }}">
                      {{ $item->name }}
                    </a>
                  </li>
                @endif

              </ul>
            </div>

            <div class="item_license">
              <div class="custom-radio">
                <input 
                  type="radio" 
                  id="opt1" 
                  class="" 
                  value="{{ base64_encode($item_price) }}_regular" 
                  name="item_price" 
                  checked
                >
                <label 
                  for="opt1" 
                  data-price="{{ $item->free_download ? 'FREE' : $allsettings->site_currency.' '.$item_price }}"
                >
                  <span class="circle"></span>{{ Helper::translation(3072,$translate) }}
                </label>
              </div>

              @if($item->extended_price != 0)
                <div class="custom-radio">
                  <input 
                    type="radio" 
                    id="opt2" 
                    class="" 
                    value="{{ base64_encode($extend_item_price) }}_extended" 
                    name="item_price"
                  >
                  <label 
                    for="opt2" 
                    data-price="{{ $allsettings->site_currency.' '.$extend_item_price }}"
                  >
                    <span class="circle"></span>{{ Helper::translation(3073,$translate) }}
                  </label>
                </div>
              @endif
            </div>

            <div class="item_category_type">
              <h3>Category:<span>{{ $data['category_name'] }}</span></h3>
              <h3>Product Type:<span>{{ $item->item_type }}</span></h3>
            </div>

            @if($item->video_preview_type != '' && ($item->video_url != '' || $item->video_file != ''))
            <div class="video_preview">
              <!-- Button trigger modal -->
              <a href="#" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-play"></i>Video Preview
              </a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      @if($item->video_preview_type == 'youtube')
                        @php
                          $link = $item->video_url;
                          $video_id = explode("?v=", $link);
                          $video_id = $video_id[1];
                        @endphp

                        <iframe
                          width="100%"
                          height="360"
                          src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&loop=1&playlist={{ $video_id }}"
                          frameborder="0"
                          allow="autoplay"
                          scrolling="no"
                        ></iframe>
                      @endif

                      @if($item->video_preview_type == 'mp4')
                        @if($allsettings->site_s3_storage == 1)
                          @php $videofileurl = Storage::disk('s3')->url($item->video_file); @endphp

                          <video width="100%" height="360" controls loop>
                            <source src="{{ $videofileurl }}" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>
                        @else
                          <video width="100%" height="360" controls loop>
                            <source src="{{ url('/') }}/public/storage/items/{{ $item->video_file }}" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>
                        @endif
                      @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
            @endif

            <div class="btn_buy">
              @if(Auth::guest())
                <a href="javascript:void(0);" class="item_action_btn action_buy" onClick="alert('Login user only');">
                  <i class="fas fa-shopping-cart"></i> {{ Helper::translation(3074,$translate) }}
                </a>
                <a href="javascript:void(0);" class="item_action_btn btn_save_like" onClick="alert('Login user only');">
                  <i class="fas fa-folder-plus"></i>Save
                </a>
                <a href="javascript:void(0);" class="item_action_btn btn_save_like" onClick="alert('Login user only');">
                  <i class="fas fa-heart"></i>Like
                </a>
              @endif

              @if (Auth::check())
                @if($item->user_id == Auth::user()->id)
                  <a href="{{ URL::to('/edit-item') }}/{{ $item->item_token }}" class="item_action_btn action_buy">{{ Helper::translation(2935,$translate) }}</a>
                  <a href="javascript:void(0);" class="item_action_btn btn_save_like" onClick="alert(`You can't save your own item!`)">
                    <i class="fas fa-folder-plus"></i>Save
                  </a>
                  <a href="javascript:void(0);" class="item_action_btn btn_save_like" onClick="alert(`You can't like your own item!`)">
                    <i class="fas fa-heart"></i>Like
                  </a>
                @else
                  <input type="hidden" name="user_id"      value="{{ Auth::user()->id }}">
                  <input type="hidden" name="item_id"      value="{{ $item->item_id }}">
                  <input type="hidden" name="item_name"    value="{{ $item->item_name }}">
                  <input type="hidden" name="item_user_id" value="{{ $item->user_id }}">
                  <input type="hidden" name="item_token"   value="{{ $item->item_token }}">
                  @if($data['checkif_purchased'] == 0)
                    @if(Auth::user()->id != 1)
                      <button type="submit" class="item_action_btn action_buy"><i class="fas fa-shopping-cart"></i> {{ Helper::translation(3074,$translate) }}</button>
                    @endif
                  @endif

                  <a 
                    href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}" 
                    class="item_action_btn btn_save_like {{(\Feberr\Models\Items::getfavouriteCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''}}"
                  >
                    <i class="fas fa-folder-plus"></i>Save
                  </a>
                  <a 
                    href="{{ route('item.liked',[base64_encode($item->item_id),base64_encode($item->item_liked)]) }}" 
                    class="item_action_btn btn_save_like {{(\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''}}"
                  >
                    <i class="fas fa-heart"></i>Like
                  </a>
                @endif
              @endif
            </div>
          </form>
        </div>
        <!-- item details end -->
      </div>
    </div>
  </div>
</section>


<section id="single_item_details">
  <div class="container">
    <div class="row">
      <!-- overview and features start -->
      <div class="col-lg-8">
        <div class="item_product">
          <h4 class="product_title">Product Overview</h4>
          <p class="product_details">{!! html_entity_decode($item->item_desc) !!}</p>
        </div>

        <!-- <div class="item_features">
          <h4 class="product_title">Features</h4>
          <p class="product_details"></p>
        </div> -->
      </div>
      <!-- overview and features end -->

      <div class="col-lg-4">
        <!-- tags start -->
        <div class="product_tags">
          <h4 class="product_title">Tags</h4>
          @foreach($data['item_tags'] as $tag)
            <a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tag)) }}" class="p_tag">{{ $tag }}</a>
          @endforeach
        </div>
        <!-- tags end -->
      </div>
    </div>
  </div>
</section>


<section id="more_items">
  <div class="container">
    <div class="m_title">
      <div class="related_items">
        <h5>More Products by <a href="{{ url('/user') }}/{{ $item->username }}" class="m_link">
          {{ $item->name }}</a>
        </h5>
      </div>

      <div class="vendor_profile">
        <a href="{{ url('/user') }}/{{ $item->username }}" class="m_link">View profile</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      @if($itemData->all())
        @foreach($itemData as $item)
          @include('theme2.layout.item', [
            "item" => $item
          ])
        @endforeach
      @else
        <p class="text-center mt-5">This user has no other items to showcase!</p>
      @endif

    </div>
  </div>
</section>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    $("input[name$='item_price']").click(function() {
      var licence = $(this).val();
      const licence_type = licence.split('_');
  
      //console.log('licence=====', licence_type[1]); // extended, regular

      var price = licence_type[1] === 'extended' ? <?php echo $extend_item_price; ?> : <?php echo $item_price; ?>;

      $('.item_view_price .price').empty().append(`<h2 class="price">${price}</h2>`);
    });
  });
</script>

@endsection

@else
  @include('theme2.503')
@endif