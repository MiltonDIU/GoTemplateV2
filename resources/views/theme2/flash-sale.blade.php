@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/flash-sale.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
@endpush

@section('content')

<!-- Flash banner start -->
<section id="flash_banner">
  <div class="container">
    <h1 class="page_banner_title">Flash Sale</h1>
    <h2 class="page_banner_description">Only for a short period of time you can grab these files with 50% discount</h2>

    <div class="row">
      <div class="col-lg-8 m-auto col-sm-12 col-md-12 col-xl-8">
        <!-- counter start -->
        <div id="getting-started" class="flash_counter">
          <div class="count_time">
            <p id="days" class="count_number"></p>
            <p class="count_text">Days</p>
          </div>
          <div class="count_time">
            <p id="hours" class="count_number"></p>
            <p class="count_text">Hours</p>
          </div>
          <div class="count_time">
            <p id="minutes" class="count_number"></p>
            <p class="count_text">Minutes</p>
          </div>
          <div class="count_time">
            <p id="seconds" class="count_number"></p>
            <p class="count_text">Seconds</p>
          </div>
        </div>
        <!-- counter end -->
      </div>
    </div>
  </div>
</section>
<!-- Flash banner end -->


@if($data['item']->all())
  <!-- category start -->
  <section id="flash_category">
    <!-- container start -->
    <div class="container">
      <!-- category buttons start -->
      <div class="controls main_category">
        <button type="button" class="control category_button" data-filter="all">All</button>
        <button type="button" class="control category_button" data-filter=".scripts">Scripts</button>
        <button type="button" class="control category_button" data-filter=".apps">apps</button>
        <button type="button" class="control category_button" data-filter=".themes">Themes</button>
        <button type="button" class="control category_button" data-filter=".plugins">Plugins</button>
        <button type="button" class="control category_button" data-filter=".graphics">Graphics</button>
        <button type="button" class="control category_button" data-filter=".business">Business</button>
        <button type="button" class="control category_button" data-filter=".education">Education</button>
      </div>
      <!-- category buttons end -->

      <!-- sort start -->
      <div class="controls sort_main">
        <div class="sort_group">
          <p class="sort_title">Sort by price:</p>
          <button type="button" class="control sort_btn" data-sort="price:asc">Low to High</button>
          <button type="button" class="control sort_btn" data-sort="price:desc">High to Low</button>
        </div>

        <div class="sort_group">
          <p class="sort_title">Sort by date:</p>
          <button type="button" class="control sort_btn" data-sort="published-date:desc">Latest First</button>
          <button type="button" class="control sort_btn" data-sort="published-date:asc">Oldest First</button>
        </div>
      </div>
      <!-- sort end -->
    </div>
    <!-- container end -->
  </section>
  <!-- category end -->


  <!-- product container start -->
  <section id="product_container">
    <!-- container start -->
    <div class="container">

      <!-- mix container start -->
      <div class="mix_container">

        <div class="row">
          @foreach($data['item']->all() as $item)
            <div 
              class="mix scripts item_box" 
              data-price="{{ $item->regular_price }}" 
              data-published-date="{{ $item->created_at }}"
            >
              <div class="item_view">
                <div class="item_view_overlay">
                  <div class="item_details">
                    <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="paid_item_top">
                      <i class="fas fa-dollar-sign"></i>
                      <p class="price">{{ $item->regular_price }}</p>
                    </a>
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
      <!-- mix container end -->
    </div>
    <!-- container end -->
  </section>
  <!-- product container end -->


  <!-- Pagination start -->
  <section id="pagination_main">
    <div class="container">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#"><i class="fas fa-ellipsis-h"></i></a></li>
          <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
        </ul>
      </nav>
    </div>
  </section>
  <!-- Pagination end -->
@endif

<script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

<script type="text/javascript">
  var containerEl = document.querySelector('.mix_container');
  var mixer = mixitup(containerEl);
</script>

@endsection

@else
  @include('theme2.503')
@endif