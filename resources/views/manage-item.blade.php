@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2932,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload dashboard-edit">
    @include('header')
    @if(Auth::user()->user_type == 'vendor')

    @include("./components/hero", [
        "list" => [array("path" => "/manage-item", "text" => 2932)],
        "headline" => 2932
    ])

    <section class="dashboard-area pt-0">
        @include('dashboard-menu')

        <div class="dashboard_contents">
            <div class="container">
                <div>

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

        @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>

            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="lnr lnr-cross" aria-hidden="true"></span>
            </button>
        </div>
        @endif

                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 text-right mb-3">
                        <button onClick="myFunction()" class="btn btn--sm theme-button dropbtn">
                            <i class="lnr lnr-plus-circle"></i> {{ Helper::translation(2931,$translate) }}
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            @foreach($viewitem['type'] as $item_type)
                            @php $encrypted = $encrypter->encrypt($item_type->item_type_id); @endphp
                            <a href="{{ URL::to('/upload-item') }}/{{ $encrypted }}">{{ $item_type->item_type_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row" id="listShow">

                    <!-- start .col-md-4 -->
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
                                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}" class="item-thumbnail">
                                @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}" class="item-thumbnail">
                                @endif

                                <div class="prod_option">
                                    <a href="javascript:void(0);" id="drop1" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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

                                @if($item->item_status == 1)</a>@else</span>@endif
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

                                <div class="rating product--rating">
                                    <!--<ul>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-half-o"></span>
                                        </li>
                                    </ul>-->
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
                    <!-- end /.col-md-4 -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    @else
    @include('not-found')
    @endif

    @include('footer')
    @include('javascript')
</body>

</html>
@else
@include('503')
@endif