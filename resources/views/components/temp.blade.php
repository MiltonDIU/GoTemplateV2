<ul class="navbar-nav">

  <!-- start All Items section -->
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav--link" href="{{ url('/shop') }}" data-toggle="dropdown">
          {{ Helper::translation(3025,$translate) }}
          <i class="fa fa-angle-down ml-1"></i>
      </a>

      <ul class="dropdown-menu">
          <a class="dropdown-item" href="{{ url('/shop') }}/recent-items">{{ Helper::translation(3026,$translate) }}</a>
          <a class="dropdown-item" href="{{ url('/shop') }}/featured-items">{{ Helper::translation(3027,$translate) }}</a>
          <a class="dropdown-item" href="{{ url('/free-items') }}">{{ Helper::translation(3016,$translate) }}</a>
          <a class="dropdown-item" href="{{ url('/top-authors') }}">{{ Helper::translation(3028,$translate) }}</a>
      </ul>
  </li>
  <!-- end All Items section -->

  <!-- start all category product -->
  @foreach($categories['menu'] as $menu)
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav--link" href="{{ URL::to('/shop/category/') }}/{{$menu->cat_id}}/{{$menu->category_slug}}" data-toggle="dropdown">
              {{ $menu->category_name }}
              <i class="fa fa-angle-down ml-1"></i>
          </a>

          <ul class="dropdown-menu">
              @foreach($menu->subcategory as $subCategory)
                  <!--
                      Can be replaced this block of code with dynamic code,
                      now it supports 4 level deep sub category
                  -->
                  <!-- level 1 -->
                  <a class="dropdown-item sub-dropdown-item" href="{{ URL::to('/shop/subcategory/') }}/{{$subCategory->subcat_id}}/{{$subCategory->subcategory_slug}}">
                      {{ $subCategory->subcategory_name }}
                  </a>

                  @if(isset($subCategory->subChildren))
                      <div class="sub-children-container dropdown-menu">
                          @foreach($subCategory->subChildren as $subChildren)
                              <!-- level 2 -->
                              <a class="dropdown-item sub-category-link" href="{{ URL::to('/shop/subcategory/') }}/{{$subChildren->subcat_id}}/{{$subChildren->subcategory_slug}}">
                                  {{ $subChildren->subcategory_name }}
                              </a>

                              @if(isset($subChildren->subChildren))
                                  <div class="sub-children-container dropdown-menu">
                                      @foreach($subChildren->subChildren as $subChildren)
                                          <!-- level 3 -->
                                          <a class="dropdown-item sub-category-link" href="{{ URL::to('/shop/subcategory/') }}/{{$subChildren->subcat_id}}/{{$subChildren->subcategory_slug}}">
                                              {{ $subChildren->subcategory_name }}
                                          </a>

                                          @if(isset($subChildren->subChildren))
                                              <div class="sub-children-container dropdown-menu">
                                                  @foreach($subChildren->subChildren as $subChildren)
                                                      <!-- level 4 -->
                                                      <a class="dropdown-item sub-category-link" href="{{ URL::to('/shop/subcategory/') }}/{{$subChildren->subcat_id}}/{{$subChildren->subcategory_slug}}">
                                                          {{ $subChildren->subcategory_name }}
                                                      </a>
                                                  @endforeach
                                              </div>
                                          @endif
                                      @endforeach
                                  </div>
                              @endif
                          @endforeach
                      </div>
                  @endif
              @endforeach
          </ul>
      </li>
  @endforeach
  <!-- end all category product -->

  <!-- start pages -->
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle nav--link" href="javascript:void(0);" data-toggle="dropdown">
          {{ Helper::translation(3029,$translate) }}
          <i class="fa fa-angle-down ml-1"></i>
      </a>

      <ul class="dropdown-menu">
          @foreach($allpages['pages'] as $pages)
              <a class="dropdown-item" href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">
                  {{ $pages->page_title }}
              </a>
          @endforeach
      </ul>
  </li>
  <!-- end pages -->


  <!-- start flash sales -->
  <li>
      <a href="{{ URL::to('/flash-sale') }}" class="nav-link yellow-color">{{ Helper::translation(2993,$translate) }}</a>
  </li>
  <!-- end flash sales -->


  <!-- start topbar for mobile view only -->
  <div class="author__notification_area author__notification_area_mobile mdevice-on">
      <ul>
          <li><a href="{{ URL::to('/start-selling') }}" class="text-color-primary nav-link">{{ Helper::translation(3018,$translate) }}</a></li>
          <li><a href="{{ URL::to('/contact') }}" class="text-color-primary nav-link">{{ Helper::translation(2910,$translate) }}</a></li>

          @if($count_help != 0)
              @if($help['page']->page_status == 1 && $help['page']->main_menu == 1)
                  <li><a class="text-color-primary nav-link" href="{{ URL::to('/page/') }}/{{ $help['page']->page_id }}/{{ $help['page']->page_slug }}">{{ $help['page']->page_title }}</a></li>
              @endif
          @endif

          @if($allsettings->site_blog_display == 1)
              <li><a class="text-color-primary nav-link" href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate) }}</a></li>
          @endif

          <li class="has_dropdown my-3">
              <div class="icon_wrap">
                  <span class="lnr lnr-cart" style="color: #333333;"></span>
                  <span class="notification_count purch theme-button">0</span>
              </div>
              <div class="dropdowns dropdown--cart" style="top: 66px !important; right: 5px;">
                  <div class="cart_area">
                      <p align="center" class="emptycart">{{ Helper::translation(2898,$translate) }}</p>
                  </div>
              </div>
          </li>
      </ul>
  </div>
  <!-- end topbar for mobile view -->
</ul>

<!-- start flash sale item code -->

<div class="col-lg-4 col-md-4 col-sm-6">
    <!-- start .single-product -->
    <div class="product product--card product--card-small">

        <div class="product__thumbnail">
            @if($item->item_preview!='')
                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}" class="item-thumbnail">
                @else
                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}" class="item-thumbnail">
                @endif
            <div class="prod_btn">

                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="transparent btn--sm btn--round">{{ Helper::translation(2999,$translate) }}</a>
                <a href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="transparent btn--sm btn--round" target="_blank">{{ Helper::translation(3000,$translate) }}</a>
            </div>
            <!-- end /.prod_btn -->
        </div>
        <!-- end /.product__thumbnail -->

        <div class="product-desc">
            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="product_title">
            <h4 class="title">{{ substr($item->item_name,0,20).'...' }}</h4>
            </a>
            <ul class="titlebtm">
                <li>
                    @if($item->user_photo!='')
                <img  src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" class="auth-img">
                @else
                <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" class="auth-img">
                @endif
                    <p>
                        <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
                    </p>
                </li>
                <li class="out_of_class_name">
                    <div class="sell">
                        <p>
                            <span class="lnr lnr-cart"></span>
                            <span>{{ $item->item_sold }}</span>
                        </p>
                    </div>

                    @include('rating_star', ['ratings' => isset($item->ratings) ? $item->ratings : []])

                </li>
            </ul>

        </div>
        <!-- end /.product-desc -->
        <span class="new-items display-none">{{ $item->item_id }}</span>
        <span class="popular-items display-none">{{ $item->item_liked }}</span>
        <span class="free-items display-none">{{ $item->free_download }}</span>

        <div class="product-purchase">
            <div class="price_love like">
                @if($item->free_download == 1)
            <span>{{ Helper::translation(2992,$translate) }}</span>
            @else
            @if($item->item_flash == 1)
            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
            @endif
            <span><del>{{ $item->regular_price }} {{ $allsettings->site_currency }}</del></span>

            @endif
            </div>
            <a href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}" class="theme-color">
                    <span class="lnr lnr-book"></span>{{ str_replace('-',' ',$item->item_type) }}</a>
        </div>
        <span class="{{ $item->item_type }}" style="display:none;">{{ $item->item_type }}</span>
        <!-- end /.product-purchase -->
    </div>
    <!-- end /.single-product -->
</div>
<!-- end flash sale item code -->