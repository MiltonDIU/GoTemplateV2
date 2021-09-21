@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="public/assets/theme2/css/item.css">
@endpush

@section('content')
@php
  $items = $data['itemData']['item'];
  $cats = $data['catData']['item']; 
@endphp

<section id="all_category">
  <div class="container">
    <ul class="controls main_category">
      <li class="control category_button" data-filter="all">All</li>

      @foreach($cats as $cat)
        <li class="control category_button" data-filter=".{{$cat->category_slug}}">{{ $cat->category_name }}</li>
      @endforeach
    </ul>


    <!-- start Filter -->
    <div class="filter_field">
      <div class="row">
        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_s">Tags</label>
            <div class="f_s_box">
              <input type="text" id="filter_s" data-ref="input-search">
              <i class="fas fa-search"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_p">Price</label>
            <select name="" id="filter_p" class="f_o_select">
              <option value="" disabled selected>Sort by Price</option>
              <option value="price:asc">Low to High</option>
              <option value="price:desc">High to Low</option>
            </select>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_t">Type</label>
            <select name="" id="filter_t" class="f_o_select">
              <option value="" disabled selected>Choose by Type</option>
              <option value=".popular">Popular</option>
              <option value=".recent">Recent</option>
            </select>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_l">License</label>
            <select name="" id="filter_l" class="f_o_select">
              <option value="" disabled selected>Choose by License</option>
              <!-- <option value=".mix">All</option> -->
              <option value=".free">Free</option>
              <option value=".premium">Premium</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- end Filter -->


    <div class="mix_container" id="mix-container" data-ref="mix_container">

      @foreach($items as $item)
        <div 
          class="mix item_box {{ $item->item_type }}" 
          data-price="{{ $item->regular_price }}" 
          data-published-date="{{ $item->created_at }}"
        >
          <div class="item_view">
            <div class="item_view_overlay">
              <div class="item_details">

                @if($item->free_download)
                  <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="free_item">
                    <i class="fa fa-gift"></i>
                  </a>
                @else
                  <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="paid_item_top">
                    <i class="fas fa-dollar-sign"></i>
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
                  @if($item->user_id != Auth::user()->id)
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

            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="paid_item_top">
              <i class="fas fa-dollar-sign"></i>
            </a>

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
              <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to Cart" class="item_bottom_cart">
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
      @endforeach

    </div>


  </div>
</section>

<script src="{{ asset('public/assets/theme2/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

<script type="text/javascript">
  const mixContainerEl        = $('#mix-container');
  const filterPriceSelectEl   = $('#filter_p');
  const filterTypeSelectEl    = $('#filter_t');
  const filterLicenceSelectEl = $('#filter_l');
  const inputSearchEl         = $('#filter_s');

  let keyupTimeout;

  const mixer = mixitup(mixContainerEl, {
    animation: {
      duration: 350
    },
    callbacks: {
      onMixClick: function() {
        // Reset the search if a filter is clicked
        if (this.matches('[data-filter]')) {
          inputSearchEl.val('');
        }
      }
    }
  });

  inputSearchEl.on('keyup', function() {
    let searchValue;

    if ($(this).val().length < 3) {
      // If the input value is less than 3 characters, don't send
      searchValue = '';
    } else {
      searchValue = $(this).val().toLowerCase().trim();
    }

    // Very basic throttling to prevent mixer thrashing. Only search
    // once 350ms has passed since the last keyup event

    clearTimeout(keyupTimeout);

    keyupTimeout = setTimeout(function() {
      filterByString(searchValue);
    }, 350);
  });

  /**
    * Filters the mixer using a provided search string, which is matched against
    * the contents of each target's "class" attribute. Any custom data-attribute(s)
    * could also be used.
    *
    * @param  {string} searchValue
    * @return {void}
    */

  function filterByString(searchValue) {
    if (searchValue) {
      // Use an attribute wildcard selector to check for matches

      mixer.filter('[class*="' + searchValue + '"]');
    } else {
      // If no searchValue, treat as filter('all')

      mixer.filter('all');
    }
  }

  filterPriceSelectEl.on('change', function() {
    mixer.sort(this.value);
  });

  filterTypeSelectEl.on('change', function() {
    mixer.filter(this.value);
  });

  filterLicenceSelectEl.on('change', function() {
    mixer.filter(this.value);
  });

  // var containerEl = document.querySelector('.mix_container');
  // var mixer = mixitup(containerEl);
</script>

@endsection