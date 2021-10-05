@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
@endpush

<div class="col-lg-4 col-sm-12 col-md-6 col-xl-3 {{ isset($item_slider) && $item_slider ? 'w-100' : 'li-items' }}">
  <div class="item_box">
    <div class="item_view">
      <div class="item_view_overlay">
        <div class="item_details">
          @if($item->free_download)
            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="free_item">
              <i class="fa fa-gift"></i>
            </a>
          @else
            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="paid_item_top">
              <!-- <i class="fas fa-dollar-sign"></i> -->
              <span class="bd-taka">&#2547;</span>
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

      @if($item->item_thumbnail!='')
        <img class="item_view_img" src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}">
      @else
        <img class="item_view_img" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $item->item_name }}">
      @endif
    </div>

    <div class="item_bottom">
      <div class="author_details">
        <div class="item_author_img">

            @if($item->user_photo!=null or $item->user->user_photo!=null)
          <img src="{{ url('/') }}/public/storage/users/{{ $item->user_photo?$item->user_photo:$item->user->user_photo }}" alt="{{ $item->username}}">
            @else
                <img src="{{ url('public/img/no-user.png') }}" alt="{{ $item->username}}">
            @endif
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
