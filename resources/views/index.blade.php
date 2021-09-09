@if($allsettings->maintenance_mode == 0)
@include('version')
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2862,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload home1 mutlti-vendor">

@include('header')

<!-- start hero section -->
<section class="hero-area bgimage">
    <div class="bg_image_holder">
        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}" alt="{{ $allsettings->site_title }}">
    </div>
    <div class="bg-overlay"></div>

    <!-- start hero-content -->
    <div class="hero-content content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1><span class="bold">{{ $allsettings->site_banner_heading }}</span></h1>
                            <p class="tagline">{{ $allsettings->site_banner_subheading }}</p>
                        </div>

                        <!-- start .hero__btn-area-->
                        <div class="hero__btn-area">
                            <div class="col-md-9 search_align">
                                <div class="search_box">

                                    <form action="{{ route('shop') }}" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
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
                                        <button type="submit" class="search-btn btn--lg">{{ Helper::translation(3031,$translate) }}</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end .hero__btn-area-->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->
</section>
<!-- end hero section -->


<!-- start featured products section -->
@if($allsettings->site_layout == '')
    <section class="featured-products section--padding">
        <!-- start /.container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif


                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif

                    <h3 class="text-uppercase">{{ Helper::translation(3033,$translate) }}</h3>

                    <div class="row mt-3 justify-content-center">
                        @foreach($featured['items'] as $item)
                            @include("./components/item_card", [
                                "item" => $item
                            ])
                        @endforeach
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div align="center" class="margin-top-20">
                <a href="{{ URL::to('/shop/featured-items') }}" class="btn btn--sm theme-button">
                    {{ Helper::translation(3032,$translate) }}
                </a>
            </div>
            <!-- end /.row -->
        </div>
    </section>

    <!-- =Future: test when else condition fullfill -->
@else
    <section class="featured-products section--padding">
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div>
                    <h2>{{ Helper::translation(3033,$translate) }} </h2>

                    <div class="row margin-top-30">
                        @foreach($featured['items'] as $items)
                            <div class="featured">
                                <a
                                    class="tip_trigger"
                                    href="{{ URL::to('/item') }}/{{ $items->item_slug }}/{{ $items->item_id }}"
                                    title="{{ $items->item_name }}"
                                >
                                    @if($items->item_thumbnail!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $items->item_thumbnail }}" alt="{{ $items->item_name }}">
                                    @else
                                        <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $items->item_name }}">
                                    @endif

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">

                                                    @if($items->video_preview_type!='')
                                                        @if($items->video_preview_type == 'youtube')
                                                            @if($items->video_url != '')
                                                                @php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                @endphp

                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                >
                                                                </iframe>

                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif

                                                        @if($items->video_preview_type == 'mp4')
                                                            @if($items->video_file != '')
                                                                @if($allsettings->site_s3_storage == 1)
                                                                    @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}"
                                                                            type="video/mp4">Your browser does not support the video tag.</video>
                                                                @endif
                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png"
                                                                     alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif



                                                    @else
                                                        @if($items->item_preview!='')
                                                            <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 text-left">
                                                    <div class="titleitem">{{ $items->item_name }}</div>
                                                    <span class="authorr">{{ Helper::translation(3034,$translate) }}{{ $items->username }}</span>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                    <div class="currrency">
                                                        @if($items->free_download == 1)
                                                            <span>{{ Helper::translation(2992,$translate) }}</span>
                                                        @else
                                                            <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div align="center" class="margin-top-20">
                <a href="{{ URL::to('/shop/featured-items') }}" class="btn btn--sm theme-button">
                    {{ Helper::translation(3032,$translate) }}
                </a>
            </div>
        </div>
    </section>
@endif
<!-- end featured products section -->


<!-- start newest files -->
<section class="products section--padding">
    <div class="container" id="demo">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">{{ Helper::translation(3035,$translate) }} <span class="highlighted">{{ Helper::translation(3003,$translate) }}</span></h3>
            </div>
        </div>
        <div id="demo" class="box jplist">
            <!-- panel -->
            <div class="jplist-panel box panel-top">

                <div class="jplist-group sorting"
                     data-control-type="button-text-filter-group"
                     data-control-action="filter"
                     data-control-name="button-text-filter-group-1" >

                    <ul>
                        @foreach($newest['items'] as $items)
                            <li>
                                <a
                                    href="javascript:void(0);"
                                    data-control-action="filter"
                                    data-control-name="{{ $items->category_slug }}"
                                    data-path=".block"
                                    data-text="{{ $items->category_slug }}"
                                    data-button="true"
                                >
                                    {{ $items->category_name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>



            @if($allsettings->site_layout == '')
                <div class="row list justify-content-center">



                    @foreach($itemData['item'] as $item)
                        @include("./components/item_card", [
                                 "item" => $item
                             ])
                    @endforeach

                </div>
            @else
                <div class="row list">
                    @foreach($itemData['item'] as $items)
                        <div class="list-item featured">
                            <a class="tip_trigger" href="{{ URL::to('/item') }}/{{ $items->item_slug }}/{{ $items->item_id }}" title="{{ $items->item_name }}" >
                                @if($items->item_thumbnail!='')
                                    <img  src="{{ url('/') }}/public/storage/items/{{ $items->item_thumbnail }}" alt="{{ $items->item_name }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $items->item_name }}">
                                @endif
                                <span class="tip">
                                        <div class="row">
                                        <div class="col-md-12" align="center">
                                        @if($items->video_preview_type!='')

                                                @if($items->video_preview_type == 'youtube')
                                                    @if($items->video_url != '')
                                                        @php
                                                            $link = $items->video_url;
                                                            $video_id = explode("?v=", $link);
                                                            $video_id = $video_id[1];
                                                        @endphp
                                                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}" frameborder="0" allow="autoplay" scrolling="no"></iframe>
                                                    @else
                                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                    @endif
                                                @endif

                                                @if($items->video_preview_type == 'mp4')
                                                    @if($items->video_file != '')
                                                        @if($allsettings->site_s3_storage == 1)
                                                            @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                            <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                            <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                        @endif
                                                    @else
                                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                    @endif
                                                @endif



                                            @else
                                                @if($items->item_preview!='')
                                                    <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                                @else
                                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                                @endif
                                            @endif
                                          </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-8 text-left">
                                        <div class="titleitem">{{ $items->item_name }}</div>
                                        <span class="authorr">{{ Helper::translation(3034,$translate) }} {{ $items->username }}</span>
                                        </div>
                                         <div class="col-md-4 text-right">
                                        <div class="currrency">
                                        @if($items->free_download == 1)
                                                <span>{{ Helper::translation(2992,$translate) }}</span>
                                            @else
                                                <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                            @endif
                                        </div>
                                        </div>
                                        </div>
                                        </span>

                            </a>
                            <div class="block">
                                <span class="{{ $items->item_category }}_{{ $items->item_category_type }} display-none">{{ $items->item_category }}_{{ $items->item_category_type }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
        @endif

        <!--<div class="box jplist-no-results text-shadow align-center">
						<p>No results found</p>
					</div>-->

        </div>
        <div align="center" class="margin-top-20"><a href="{{ URL::to('/shop/recent-items') }}" class="btn btn--sm theme-button">{{ Helper::translation(3036,$translate) }}</a></div>





    </div>
</section>
<!-- end newest files -->





















<!-- =Future: need to implement -->
<!-- start popular products section -->
@if($allsettings->site_layout == '')
    <section class="featured-products section--padding">
        <!-- start /.container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <h3 class="text-uppercase">Popular Products</h3>

                    <div class="row mt-3 justify-content-center">
                        @foreach($featured['items'] as $item)
                            @include("./components/item_card", [
                                "item" => $item
                            ])
                        @endforeach
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div align="center" class="margin-top-20">
                <a href="{{ URL::to('/shop/featured-items') }}" class="btn btn--sm theme-button">
                    {{ Helper::translation(3032,$translate) }}
                </a>
            </div>
            <!-- end /.row -->
        </div>
    </section>

    <!-- =Future: test when else condition fullfill -->
@else
    <section class="featured-products section--padding">
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div>
                    <h2>{{ Helper::translation(3033,$translate) }} </h2>

                    <div class="row margin-top-30">
                        @foreach($featured['items'] as $items)
                            <div class="featured">
                                <a
                                    class="tip_trigger"
                                    href="{{ URL::to('/item') }}/{{ $items->item_slug }}/{{ $items->item_id }}"
                                    title="{{ $items->item_name }}"
                                >
                                    @if($items->item_thumbnail!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $items->item_thumbnail }}" alt="{{ $items->item_name }}">
                                    @else
                                        <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $items->item_name }}">
                                    @endif

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">

                                                    @if($items->video_preview_type!='')
                                                        @if($items->video_preview_type == 'youtube')
                                                            @if($items->video_url != '')
                                                                @php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                @endphp

                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                >
                                                                </iframe>

                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif

                                                        @if($items->video_preview_type == 'mp4')
                                                            @if($items->video_file != '')
                                                                @if($allsettings->site_s3_storage == 1)
                                                                    @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}"
                                                                            type="video/mp4">Your browser does not support the video tag.</video>
                                                                @endif
                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png"
                                                                     alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif



                                                    @else
                                                        @if($items->item_preview!='')
                                                            <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 text-left">
                                                    <div class="titleitem">{{ $items->item_name }}</div>
                                                    <span class="authorr">{{ Helper::translation(3034,$translate) }}{{ $items->username }}</span>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                    <div class="currrency">
                                                        @if($items->free_download == 1)
                                                            <span>{{ Helper::translation(2992,$translate) }}</span>
                                                        @else
                                                            <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div align="center" class="margin-top-20">
                <a href="{{ URL::to('/shop/featured-items') }}" class="btn btn--sm theme-button">
                    {{ Helper::translation(3032,$translate) }}
                </a>
            </div>
        </div>
    </section>
@endif
<!-- end popular products section -->


<!-- start at a glance -->
<section class="counter-up-area bgimage">
    <div class="bg_image_holder">
        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_count_bg }}" alt="">
    </div>

    <!-- start .container -->
    <div class="container content_above">
        <!-- start .col-md-12 -->
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count">{{ $totalearning }}</span> <span>{{ $allsettings->site_currency }}</span>
                    <p>{{ Helper::translation(3037,$translate) }}</p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count">{{ $totalfiles }}</span>
                    <p>{{ Helper::translation(3038,$translate) }}</p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-cart"></span>
                    <span class="count">{{ $totalsales }}</span>
                    <p>{{ Helper::translation(3039,$translate) }}</p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-users"></span>
                    <span class="count">{{ $totalmembers }}</span>
                    <p>{{ Helper::translation(3002,$translate) }}</p>
                </div>
            </div>
        </div>
        <!-- end /.col-md-12 -->
    </div>
    <!-- end /.container -->
</section>
<!-- end at a glance -->


<!-- =Future: need to implement -->
<!-- start flash sales -->
<section class="products section--padding">
    <div class="container" id="flash">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">Flash Sales</h3>
            </div>
        </div>

        <div id="flash" class="box jplist">
            <div class="jplist-panel box panel-top">
                <div class="jplist-group sorting"
                     data-control-type="button-text-filter-group"
                     data-control-action="filter"
                     data-control-name="button-text-filter-group-1">
                    <ul>
                        @foreach($newest['items'] as $items)
                            <li>
                                <a
                                    href="javascript:void(0);"

                                    data-control-action="filter"
                                    data-control-name="{{ $items->category_slug }}"
                                    data-path=".block"
                                    data-text="{{ $items->category_slug }}"
                                    data-button="true"
                                >
                                    {{ $items->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if($allsettings->site_layout == '')
                <div class="row list justify-content-center">
                    @foreach($flashes as $item)
                        @include("./components/item_card", [
                            "item" => $item
                        ])
                    @endforeach
                </div>

                <!-- =Future: need to check when else condition fullfill -->
            @else
                <div class="row list">
                    @foreach($flashes as $item)
                        <div class="list-item featured">
                            <a class="tip_trigger" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" title="{{ $item->item_name }}">
                                @if($item->item_thumbnail!='')
                                    <img  src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $item->item_name }}">
                                @endif

                                <span class="tip">
                                        <div class="row">
                                            <div class="col-md-12" align="center">
                                                @if($item->video_preview_type!='')

                                                    @if($item->video_preview_type == 'youtube')
                                                        @if($item->video_url != '')
                                                            @php
                                                                $link = $item->video_url;
                                                                $video_id = explode("?v=", $link);
                                                                $video_id = $video_id[1];
                                                            @endphp

                                                            <iframe
                                                                width="100%"
                                                                height="200"
                                                                src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}"
                                                                frameborder="0"
                                                                allow="autoplay"
                                                                scrolling="no"
                                                            ></iframe>
                                                        @else
                                                            <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                        @endif
                                                    @endif

                                                    @if($item->video_preview_type == 'mp4')
                                                        @if($items->video_file != '')
                                                            @if($allsettings->site_s3_storage == 1)
                                                                @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                                <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                            @else
                                                                <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                            @endif
                                                        @else
                                                            <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                        @endif
                                                    @endif

                                                @else
                                                    @if($item->item_preview!='')
                                                        <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                                                    @else
                                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 text-left">
                                                <div class="titleitem">{{ $item->item_name }}</div>
                                                <span class="authorr">{{ Helper::translation(3034,$translate) }} {{ $item->username }}</span>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <div class="currrency">
                                                    @if($item->free_download == 1)
                                                        <span>{{ Helper::translation(2992,$translate) }}</span>
                                                    @else
                                                        <span>{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                            </a>

                            <div class="block">
                                    <span class="{{ $item->item_category }}_{{ $item->item_category_type }} display-none">
                                        {{ $item->item_category }}_{{ $item->item_category_type }}
                                    </span>
                            </div>
                        </div>
                    @endforeach
                </div>
        @endif

        <!--<div class="box jplist-no-results text-shadow align-center">
                    <p>No results found</p>
                </div>-->
        </div>

        <div align="center" class="margin-top-20">
            <a href="{{ URL::to('/shop/recent-items') }}" class="btn btn--sm theme-button">
                {{ Helper::translation(3036,$translate) }}
            </a>
        </div>
    </div>
</section>
<!-- end flash sales -->


<!-- start free files -->
@if($allsettings->site_layout == '')
    <section class="featured-products bgcolor section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase">{{ Helper::translation(3040,$translate) }}</h3>

                    <div class="row mt-3 justify-content-center">
                        @foreach($free['items'] as $item)
                            @include("./components/item_card", [
                                "item" => $item
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

            <div align="center" class="mt-3">
                <a href="{{ URL::to('/free-items') }}" class="btn btn--sm theme-button">{{ Helper::translation(3041,$translate) }}</a>
            </div>
        </div>
    </section>

@else
    <section class="featured-products bgcolor section--padding">
        <div class="container">
            <div class="row">
                <div>
                    <h2>{{ Helper::translation(3040,$translate) }} </h2>

                    <div class="row margin-top-30">
                        @foreach($free['items'] as $items)
                            <div class="featured">
                                <a class="tip_trigger" href="{{ URL::to('/item') }}/{{ $items->item_slug }}/{{ $items->item_id }}" title="{{ $items->item_name }}" >
                                    @if($items->item_thumbnail!='')
                                        <img  src="{{ url('/') }}/public/storage/items/{{ $items->item_thumbnail }}" alt="{{ $items->item_name }}">
                                    @else
                                        <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $items->item_name }}">
                                    @endif

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    @if($items->video_preview_type!='')
                                                        @if($items->video_preview_type == 'youtube')
                                                            @if($items->video_url != '')
                                                                @php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                @endphp
                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                ></iframe>
                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif

                                                        @if($items->video_preview_type == 'mp4')
                                                            @if($items->video_file != '')
                                                                @if($allsettings->site_s3_storage == 1)
                                                                    @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                                    <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                                @else
                                                                    <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                                @endif

                                                            @else
                                                                <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                            @endif
                                                        @endif

                                                    @else
                                                        @if($items->item_preview!='')
                                                            <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-8 text-left">
                                                <div class="titleitem">{{ $items->item_name }}</div>
                                                <span class="authorr">{{ Helper::translation(3034,$translate) }} {{ $items->username }}</span>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <div class="currrency">
                                                    @if($items->free_download == 1)
                                                        <span>{{ Helper::translation(2992,$translate) }}</span>
                                                    @else
                                                        <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div align="center" class="mt-3">
                <a href="{{ URL::to('/free-items') }}" class="btn btn--sm theme-button">
                    {{ Helper::translation(3041,$translate) }}
                </a>
            </div>
        </div>
    </section>
@endif
<!-- end free files -->


@include("./components/testimonial")


<!-- start blog section -->
@if($allsettings->site_blog_display == 1)
    @if($allsettings->home_blog_display == 1)
        <section class="latest-news section--padding">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Blog Articles</h3>
                        <div class="row mt-3 justify-content-center">
                            @foreach($blog['data'] as $post)
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="single_blog blog--card">
                                        <figure>
                                            <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                                                @if($post->post_image!='')
                                                    <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}" class="tag-img">
                                                @else
                                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}" class="tag-img">
                                                @endif
                                            </a>

                                            <figcaption>
                                                <div class="blog__content">
                                                    <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}" class="blog__title">
                                                        <h4>{{ $post->post_title }}</h4>
                                                    </a>
                                                    <p>{{ substr($post->post_short_desc,0,145).'...' }}</p>
                                                </div>

                                                <div class="blog__meta">
                                                    <div class="date_time">
                                                        <i class="fa fa-calendar-check-o"></i>
                                                        <p>{{ date('d F Y', strtotime($post->post_date)) }}</p>
                                                    </div>
                                                    <div class="comment_view">
                                                        <p class="comment">
                                                            <span class="lnr lnr-bubble"></span>{{ $comments->has($post->post_id) ? count($comments[$post->post_id]) : 0 }}
                                                        </p>
                                                        <p class="view">
                                                            <span class="lnr lnr-eye"></span>{{ $post->post_view }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </section>
    @endif
@endif
<!-- end blog section -->


<!-- start why choose goTemplate -->
<section class="why-choose section--padding">
    <div class="container">
        <div class="custom-card why-choose-card">
            <div class="col-lg-7 col-md-7 col-sm-12 why-choose-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="why-choose-heading">
                            <h1>
                                {{ Helper::translation(3047,$translate) }}
                                <span class="highlighted">{{ $allsettings->site_title }}?</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="{{ $allsettings->site_icon1 }} theme-color"></span>
                                <h3 class="feature2-title">{{ $allsettings->site_text1 }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="{{ $allsettings->site_icon2 }} theme-color"></span>
                                <h3 class="feature2-title">{{ $allsettings->site_text2 }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="{{ $allsettings->site_icon3 }} theme-color"></span>
                                <h3 class="feature2-title">{{ $allsettings->site_text3 }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="{{ $allsettings->site_icon4 }} theme-color"></span>
                                <h3 class="feature2-title">{{ $allsettings->site_text4 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="why-choose-heading">
                            <h2>WHAT ARE YOU LOOKING FOR?</h2>
                            <a href="{{ url('/register') }}" class="btn btn-ss bg-red-primary mt-3">
                                {{ Helper::translation(3019,$translate) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 why-choose-right sdevice-off">
                <img src="{{ url('/') }}/public/assets/images/why-choose.jpg" alt="Why Choose GoTemplate">
            </div>
        </div>
    </div>
</section>
<!-- end why choose goTemplate -->

<!-- sslcommerce payment chaneel section -->
<section class="section--padding">
    <div class="container">
        <img
            src="{{ url('/') }}/public/assets/images/ssl-commerce.png"
            alt="Pyament channels - SSLCOMMERZ"
        >
    </div>
</section>


@include('video_modal')
@include('footer')
@include('javascript')
</body>

</html>
@else
    @include('503')
@endif
