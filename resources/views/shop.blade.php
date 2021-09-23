@if($allsettings->maintenance_mode == 0)

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3178,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload home3">

    @include('header')

    <div id="demo">
        <section class="hero-area bgimage">
            <div class="bg_image_holder">
                <img
                    src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}"
                    alt="{{ $allsettings->site_title }}"
                >
            </div>
            <div class="bg-overlay"></div>


            <div class="hero-content content_above">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="hero__content__title">
                                    <h1><span class="bold">{{ $allsettings->site_banner_heading }}</span></h1>
                                    <p class="tagline">{{ $allsettings->site_banner_subheading }}</p>
                                </div>

                                <div class="hero__btn-area">
                                    <div class="col-md-9 search_align">

                                        <div class="search_box">
                                            <form
                                                action="{{ route('shop') }}"
                                                class="setting_form"
                                                method="post"
                                                id="profile_form"
                                                enctype="multipart/form-data"
                                            >
                                                {{ csrf_field() }}
                                                <input type="text" class="text_field" name="product_item" placeholder="{{ Helper::translation(3030,$translate) }}">

                                                <div class="search__select select-wrap">
                                                    <select name="category" class="select--field" id="blah">
                                                        <option value=""></option>
                                                        @foreach($categories['menu'] as $menu)
                                                            <option value="category_{{ $menu->cat_id }}">{{ $menu->category_name }}</option>
                                                            @foreach($menu->subcategory as $sub_category)
                                                                <option value="subcategory_{{$sub_category->subcat_id}}"> - {{ $sub_category->subcategory_name }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>

                                                    <span class="lnr lnr-chevron-down"></span>
                                                </div>

                                                <button type="submit" class="search-btn btn--lg">
                                                    {{ Helper::translation(3031,$translate) }}
                                                </button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="filter-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="filter-bar filter--bar2 jplist-panel">
                            <div class="pull-right">
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select
                                           data-control-type="sort-select"
                                           data-control-name="sort"
                                           data-control-action="sort"
                                        >
                                            <option data-path=".like" data-order="asc" data-type="number">{{ Helper::translation(3179,$translate) }}</option>
                                            <option data-path=".like" data-order="desc" data-type="number">{{ Helper::translation(3180,$translate) }}</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select
                                            data-control-type="sort-select"
                                            data-control-name="sort"
                                            data-control-action="sort"
                                        >
                                            <option data-path=".popular-items" data-order="desc" data-type="number">{{ Helper::translation(3181,$translate) }}</option>
                                            <option data-path=".new-items" data-order="desc" data-type="number">{{ Helper::translation(3182,$translate) }}</option>
                                            <option data-path=".free-items" data-order="desc" data-type="number">{{ Helper::translation(3016,$translate) }}</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="filter__option filter--layout">
                                    <a href="{{ URL::to('/shop') }}">
                                        <div class="svg-icon">
                                            <img class="svg" src="{{ url('/') }}/public/assets/images/svg/grid.svg" alt="Grid View">
                                        </div>
                                    </a>
                                    <a href="{{ URL::to('/shop-list') }}">
                                        <div class="svg-icon">
                                            <img class="svg" src="{{ url('/') }}/public/assets/images/svg/list.svg" alt="List View">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section class="products section--padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 pt-3">
                        <aside class="sidebar product--sidebar">
                            <div class="sidebar-card card--category">
                                <a class="card-title" href="#collapse1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>{{ Helper::translation(2937,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="collapse show collapsible-content" id="collapse1">
                                    <div class="jplist-panel">
                                        <div
                                            class="jplist-group"
                                            data-control-type="button-text-filter-group"
                                            data-control-action="filter"
                                            data-control-name="button-text-filter-group-1"
                                        >
                                            <ul class="card-content">
                                                @foreach($getWell['type'] as $value)
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <span
                                                                data-path=".{{ $value->item_type_slug }}"
                                                                data-text="{{ $value->item_type_slug }}"
                                                                data-button="true"
                                                            >
                                                                <span class="lnr lnr-chevron-right"></span>{{ $value->item_type_name }}
                                                                <span class="item-count"></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="sidebar-card card--slider">
                                <a class="card-title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse3">
                                    <h4>
                                        {{ Helper::translation(3183,$translate) }}
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="collapse show collapsible-content jplist-panel" id="collapse3">
                                    <div class="card-content">
                                        <div class="demo">
                                            <input type="text" id="amount" class="range-price" />
                                            <div id="slider-range"></div>
                                        </div>

                                        <!--<div class="range-slider price-range"></div>

                                        <div class="price-ranges">
                                            <span class="from rounded">$30</span>
                                            <span class="to rounded">$300</span>
                                        </div>-->

                                        <div id="slider-range-min"></div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-9">
                        @if(count($itemData['item']) != 0)
                            <div class="row list items justify-content-center" id="listShow">
                                @foreach($itemData['item'] as $item)
                                    @include("./components/item_card", [
                                        "item" => $item,
                                        "isShop" => true
                                    ])
                                @endforeach

                                <div class="box jplist-no-results text-shadow align-center">
                                    <p>{{ Helper::translation(3184,$translate) }}</p>
                                </div>
                            </div>
                        @else
                            <p>{{ Helper::translation(3184,$translate) }}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="jplist-panel box panel-top">
                            <div
                                class="jplist-label customlable"
                                data-type="Page {current} of {pages}"
                                data-control-type="pagination-info"
                                data-control-name="paging"
                                data-control-action="paging"
                            >
                            </div>

                            <div
                                class="jplist-pagination"
                                data-control-type="pagination"
                                data-control-name="paging"
                                data-control-action="paging"
                                data-items-per-page="{{ $allsettings->site_item_per_page }}"
                            >
                            </div>
                        </div>

                        <!-- <div class="pagination-area">
                               <div class="turn-page" id="pager"></div>
                        </div> -->

                    </div>
                </div>
            </div>
        </section>




        <!--
        <div class="box jplist-no-results text-shadow align-center">
            <p>No results found</p>
        </div>
        -->
    </div>

   @include('video_modal')
   @include('footer')
   @include('javascript')

</body>

</html>
@else
@include('503')
@endif
