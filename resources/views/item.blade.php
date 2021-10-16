@if($allsettings->maintenance_mode == 0)

    <!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $item['item']->item_name }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload single_prduct2">

@include('header')

<!-- start hero section -->
<section class="hero-area bgimage hero-area--h300">
    <div class="bg_image_holder">
        <img src="{{ url('/') }}/public/assets/images/double-bubble-outline.png" alt="{{ $allsettings->site_title }}">
    </div>
    <div class="bg-overlay--breadcrumb"></div>

    <!-- start hero content -->
    <div class="container content_above item-hero-content">
        <div class="col-sm-12 pl-0">
            <div class="breadcrumb">
                <ul class="item-hero-nav">
                    <li><a href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }}</a></li>
                    <li class="text-truncate"><a href="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">{{ $item['item']->item_name }}</a></li>
                </ul>
            </div>

            <h2 class="item-hero-title m-auto">{{ $item['item']->item_name }}</h2>
            <p class="text-truncate text-white">{{ $item['item']->item_shortdesc }}</p>

            <div>
                <span class="custom-tag mr-3">Best Seller</span>

                <div class="rating product--rating" align="center">
                    <ul>
                        @if($getreview == 0)
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                        @else
                            @php $notStar = 5 - $count_rating; @endphp

                            @for($i = 0; $i < $count_rating; $i++)
                                <li><span class="fa fa-star"></span></li>
                            @endfor

                            @for($j = 0; $j < $notStar; $j++)
                                <li><span class="fa fa-star-o"></span></li>
                            @endfor
                        @endif
                    </ul>
                    <span class="rating__count text-white">( {{ $getreview }} {{ Helper::translation(3080,$translate) }} )</span>
                </div>
            </div>

            <div class="d-flex my-3">
                @php
                    $itemSold = $item['item']->item_sold;
                    $msg = 'Sales';
                    if($itemSold <= 0) $msg = 'Sale';
                @endphp

                <div class="mr-3">
                    <span class="lnr lnr-cart text-white"></span>
                    <span class="text-white">{{ $itemSold}}</span>
                    <span class="text-white">{{ $msg }}</span>
                </div>

                <div class="mr-3">
                    <span class="lnr lnr-calendar-full text-white"></span>
                    <span class="text-white">Published on </span>
                    <span class="text-white">{{ date("d F Y", strtotime($item['item']->created_item)) }}</span>
                </div>

                <div>
                    <span class="lnr lnr-calendar-full text-white"></span>
                    <span class="text-white">{{ Helper::translation(3083,$translate) }}</span>
                    <span class="text-white">{{ date("d F Y", strtotime($item['item']->updated_item)) }}</span>
                </div>
            </div>

            <div class="d-flex">
                @if(isset($item['item']->demo_url) && $item['item']->demo_url != '')
                    <a href="{{ $item['item']->demo_url }}" class="text-white rounded-border-btn flex-center" target="_blank">
                        <span>{{ Helper::translation(3049,$translate) }}</span>
                        <span class="lnr lnr-link"></span>
                    </a>
                @endif

                @if(Auth::guest())
                    <a href="javascript:void(0);" class="text-white rounded-border-btn flex-center" onClick="alert('Login user only');">
                        </span>{{ Helper::translation(3051,$translate) }}
                        <span class="lnr lnr-heart"></span>
                    </a>
                @endif

                @if (Auth::check())
                    @if($item['item']->user_id != Auth::user()->id)
                        <a href="{{ url('/item') }}/{{ base64_encode($item['item']->item_id) }}/favorite/{{ base64_encode($item['item']->item_liked) }}" class="text-white rounded-border-btn flex-center">
                            <span>{{ Helper::translation(3051,$translate) }}</span>
                            <span class="lnr lnr-heart"></span>
                        </a>
                    @endif
                @endif


                {{--like custom code--}}
                @if (Auth::check())
                    @if($item['item']->user_id != Auth::user()->id)
                        <a href="{{ route('item.liked',[base64_encode($item['item']->item_id), base64_encode($item['item']->item_liked)]) }}"class="text-white rounded-border-btn flex-center {{(\Feberr\Models\Items::getLikeCount($item['item']->item_id,  Auth::user()->id)>0)?'item-active-like':''}}">
                            Like <span class="lnr lnr-thumbs-up"></span>
                        </a>
                    @endif
                @else
                    <a href="javascript:void(0);" class="text-white rounded-border-btn flex-center" onClick="alert('Login user only');">
                        Like <span class="lnr lnr-thumbs-up"></span>
                    </a>
                @endif

                {{--end like custom code--}}


            </div>
        </div>
    </div>
    <!-- end hero content -->

</section>
<!-- end hero section -->


<!-- start single product description -->
<section class="single-product-desc">
    <div class="container">
        <!-- start warning -->
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
        <!-- end warning -->

        <div class="row">
            <div class="col-lg-8">
                <div class="item-preview item-preview2">
                    <div class="item-photo-gallery flex-column-center">


                        <div
                            class="col-12 my-3 carousel slide d-flex flex-column-center justify-content-around position-relative"
                            id="item-preview__carousel"
                            data-ride="carousel"
                        >
                            <div class="carousel-inner">
                                @php $previewNo = 0; @endphp
                                @foreach($item_allimage as $image)
                                    <div class="{{$previewNo == 0 ? 'carousel-item active' : 'carousel-item'}}">
                                        @if($image->item_image != '')
                                            <img
                                                src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}"
                                                alt="Product Images"
                                                class="item-preview__img"
                                            >
                                        @else
                                            <img
                                                src="{{ url('/') }}/public/img/no-user.png"
                                                alt="{{ $review['name'] }}"
                                                class="item-preview__img"
                                            >
                                        @endif
                                    </div>
                                    @php $previewNo++; @endphp
                                @endforeach
                            </div>

                            <ol class="carousel-indicators position-relative mb-0">
                                @php $itemNo = 0; @endphp
                                @foreach($item_allimage as $image)
                                    <img
                                        data-slide-to="{{$itemNo}}"
                                        src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}"
                                        alt="Item Image"
                                        class="{{$itemNo == 0 ? 'active' : ''}} indicator-img m-2"
                                        data-target="#item-preview__carousel"
                                    />
                                    @php $itemNo++; @endphp
                                @endforeach
                            </ol>

                        </div>

                    </div>

                    <div class="item_social_share">
                        <p class="my-0">{{ Helper::translation(3052,$translate) }}</p>

                        <div class="social social--color--filled my-3">
                            <ul>
                                <li>
                                    <a class="share-button single-item" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="facebook" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="twitter" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="googleplus" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="linkedin" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)">
                                        <span class="fa fa-linkedin"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- start featured review -->
                <!-- ===Future: everything need to implement -->
            <!--
                    <div class="item-info" style="margin-bottom: 30px; padding: 30px;">
                        <h3>Featured Review</h3>
                        <div class="flex-column-center my-3">
                            <img
                                src="{{ url('/') }}/public/storage/users/{{ $item['item']->user_photo }}"
                                alt="{{ $item['item']->name }}"
                                width="100"
                                alt="Reviewer Avatar"
                                class="rounded"
                            >
                            <h4 class="my-2">Md. Mahmudul Hasan Robin</h4>
                            <h6>Software Developer</h6>
                        </div>
                        <div class="rating">
                            <ul>
                                @php $notStar = 5 - $count_rating; @endphp
            @for($i = 0; $i < $count_rating; $i++)
                <li><span class="fa fa-star"></span></li>
@endfor
            @for($j = 0; $j < $notStar; $j++)
                <li><span class="fa fa-star-o"></span></li>
@endfor
                </ul>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <div class="mr-3">
                <span class="lnr lnr-calendar-full"></span>
                <span>21st February, 2021</span>
            </div>
        </div>
-->
                <!-- end featured review -->


                <div class="item-info">
                    <div class="item-navigation">
                        <ul class="nav nav-tabs">
                            <li>
                                <a
                                    href="#product-details"
                                    class="active"
                                    aria-controls="product-details"
                                    role="tab"
                                    data-toggle="tab"
                                >
                                    {{ Helper::translation(3053,$translate) }}
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#product-comment"
                                    aria-controls="product-comment"
                                    role="tab"
                                    data-toggle="tab"
                                >
                                    {{ Helper::translation(3054,$translate) }}
                                    <span>({{ $comment_count }})</span>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#product-review"
                                    aria-controls="product-review"
                                    role="tab"
                                    data-toggle="tab"
                                >
                                    {{ Helper::translation(3043,$translate) }}
                                    <span>({{ $getreview }})</span>
                                </a>
                            </li>

                            @if(Auth::guest())
                                <li>
                                    <a
                                        href="#product-support"
                                        aria-controls="product-support"
                                        role="tab"
                                        data-toggle="tab"
                                    >
                                        {{ Helper::translation(3055,$translate) }}
                                    </a>
                                </li>
                            @endif

                            @if (Auth::check())
                                @if($item['item']->user_id != Auth::user()->id)
                                    <li>
                                        <a
                                            href="#product-support"
                                            aria-controls="product-support"
                                            role="tab"
                                            data-toggle="tab"
                                        >
                                            {{ Helper::translation(3055,$translate) }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show product-tab active" id="product-details">
                            <div class="tab-content-wrapper">
                                {!! html_entity_decode($item['item']->item_desc) !!}
                            </div>
                        </div>

                        <div class="fade tab-pane product-tab" id="product-comment">
                            <div class="thread">

                                <ul class="media-list thread-list" id="listShow">
                                    @foreach ($comment['view'] as $parent)
                                        <li class="single-thread commli-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="{{ URL::to('/user') }}/{{ $parent->username }}">

                                                        @if($parent->user_photo!='')
                                                            <img src="{{ url('/') }}/public/storage/users/{{ $parent->user_photo }}" alt="{{ $parent->username }}" class="media-object">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $parent->username }}" class="media-object">
                                                        @endif
                                                    </a>

                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="{{ URL::to('/user') }}/{{ $parent->username }}">
                                                                <h4>{{ $parent->username }}</h4>
                                                            </a>
                                                            <span>{{ date('d F Y, H:i:s', strtotime($parent->comm_date)) }}</span>
                                                        </div>

                                                        @if($parent->id == $item['item']->user_id)
                                                            <span class="comment-tag buyer">{{ Helper::translation(3057,$translate) }}</span>
                                                        @endif
                                                        @if (Auth::check())
                                                            @if($item['item']->user_id == Auth::user()->id)
                                                                <a href="javascript:void(0);" class="reply-link theme-color">{{ Helper::translation(3056,$translate) }}</a>
                                                            @endif
                                                            @if($parent->comm_user_id == Auth::user()->id)
                                                                <a href="javascript:void(0);" class="reply-link theme-color">{{ Helper::translation(3056,$translate) }}</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <p>{{ $parent->comm_text }}</p>
                                                </div>
                                            </div>


                                            <ul class="children">
                                                @foreach ($parent->replycomment as $child)
                                                    <li class="single-thread depth-2">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="{{ URL::to('/user') }}/{{ $child->username }}">

                                                                    @if($child->user_photo!='')
                                                                        <img src="{{ url('/') }}/public/storage/users/{{ $child->user_photo }}" alt="{{ $child->username }}" class="media-object">
                                                                    @else
                                                                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $child->username }}" class="media-object">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="{{ URL::to('/user') }}/{{ $child->username }}">
                                                                        <h4>{{ $child->username }}</h4>
                                                                    </a>
                                                                    <span>{{ date('d F Y, H:i:s', strtotime($child->comm_date)) }}</span>
                                                                </div>
                                                                @if($child->id == $item['item']->user_id)
                                                                    <span class="comment-tag buyer">{{ Helper::translation(3057,$translate) }}</span>
                                                            @endif
                                                            <!--<span class="comment-tag author">Author</span>-->
                                                                <p>{{ $child->comm_text }}</p>
                                                            </div>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>

                                            <!-- comment reply -->
                                            @if (Auth::check())
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">

                                                            @if(Auth::user()->user_photo!='')
                                                                <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->username }}" class="media-object">
                                                            @else
                                                                <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->username }}" class="media-object">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="{{ route('reply-post-comment') }}" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <textarea name="comm_text" placeholder="{{ Helper::translation(3059,$translate) }}" data-bvalidator="required"></textarea>
                                                            <input type="hidden" name="comm_user_id" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="comm_item_user_id" value="{{ $item['item']->user_id }}">
                                                            <input type="hidden" name="comm_item_id" value="{{ $item['item']->item_id }}">
                                                            <input type="hidden" name="comm_id" value="{{ $parent->comm_id }}">
                                                            <input type="hidden" name="comm_item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                            <button class="btn btn--sm theme-button">{{ Helper::translation(3058,$translate) }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                        @endif
                                        <!-- comment reply -->
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination" role="navigation">
                                        <div class="pagination-area">
                                            <div class="turn-page" id="commpager"></div>
                                        </div>
                                    </nav>
                                </div>

                                @if (Auth::check())
                                    @if($item['item']->user_id != Auth::user()->id)
                                        <div class="comment-form-area">
                                            <h4>Leave a comment</h4>

                                            <div class="media comment-form">
                                                <div class="media-left">
                                                    <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                                        @if(Auth::user()->user_photo!='')
                                                            <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->username }}" class="media-object">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->username }}" class="media-object">
                                                        @endif
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <form action="{{ route('post-comment') }}" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <textarea name="comm_text" placeholder="{{ Helper::translation(3059,$translate) }}" data-bvalidator="required"></textarea>
                                                        <input type="hidden" name="comm_user_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="comm_item_user_id" value="{{ $item['item']->user_id }}">
                                                        <input type="hidden" name="comm_item_id" value="{{ $item['item']->item_id }}">
                                                        <input type="hidden" name="comm_item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                        <button class="btn btn--sm theme-button">{{ Helper::translation(3058,$translate) }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>

                        <div class="tab-pane fade product-tab" id="product-review">
                            <div class="thread thread_review">
                                <ul class="media-list thread-list" id="listShow">
                                    @foreach($getreviewdata['view'] as $rating)
                                        <li class="single-thread li-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="{{ URL::to('/user') }}/{{ $rating->username }}">
                                                        @if($rating->user_photo!='')
                                                            <img src="{{ url('/') }}/public/storage/users/{{ $rating->user_photo }}" alt="{{ $rating->username }}" class="media-object">
                                                        @else
                                                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $rating->username }}" class="media-object">
                                                        @endif
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="{{ URL::to('/user') }}/{{ $rating->username }}">
                                                                    <h4>{{ $rating->username }}</h4>
                                                                </a>
                                                                <span>{{ date('d F Y H:i:s', strtotime($rating->rating_date)) }}</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    @php $notStar = 5 - $rating->rating; @endphp

                                                                    @for($i = 0; $i < $rating->rating; $i++)
                                                                        <li><span class="fa fa-star"></span></li>
                                                                    @endfor

                                                                    @for($j = 0; $j < $notStar; $j++)
                                                                        <li><span class="fa fa-star-o"></span></li>
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag">{{ $rating->rating_reason }}</span>
                                                        </div>

                                                    </div>
                                                    <p>{{ $rating->rating_comment }}</p>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                        <div class="pagination-area">
                                            <div class="turn-page" id="pager"></div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade product-tab" id="product-support">
                            <div class="support">
                                <div class="support__title">
                                    <h3>{{ Helper::translation(3060,$translate) }}</h3>
                                </div>

                                <div class="support__form">
                                    <div class="usr-msg">
                                        @if(Auth::guest())
                                            <p>{{ Helper::translation(3061,$translate) }}
                                                <a href="{{ URL::to('/login') }}" class="theme-color">{{ Helper::translation(3020,$translate) }}</a> {{ Helper::translation(3062,$translate) }}
                                            </p>
                                        @endif

                                        @if (Auth::check())
                                            <form action="{{ route('support') }}" class="support_form" id="support_form" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="subj">{{ Helper::translation(3063,$translate) }}:</label>
                                                    <input type="text" id="support_subject" name="support_subject" class="text_field" placeholder="Enter your subject" data-bvalidator="required">
                                                </div>

                                                <div class="form-group">
                                                    <label for="supmsg">{{ Helper::translation(2918,$translate) }}: </label>
                                                    <textarea class="text_field" id="support_msg" name="support_msg" placeholder="Enter your message" data-bvalidator="required"></textarea>
                                                </div>
                                                <input type="hidden" name="to_address" value="{{ $item['item']->email }}">
                                                <input type="hidden" name="to_name" value="{{ $item['item']->username }}">
                                                <input type="hidden" name="from_address" value="{{ Auth::user()->email }}">
                                                <input type="hidden" name="from_name" value="{{ Auth::user()->username }}">
                                                <input type="hidden" name="item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                <button type="submit" class="btn btn--md theme-button">{{ Helper::translation(3064,$translate) }}</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end /.tab-content -->
                </div>
                <!-- end /.item-info -->
            </div>


            <div class="col-lg-4">
                <aside class="sidebar sidebar--single-product">

                @php
                    if($item['item']->item_flash == 1) {
                        $item_price = round($item['item']->regular_price/2);
                        $extend_item_price = round($item['item']->extended_price/2);
                    } else {
                        $item_price = $item['item']->regular_price;
                        $extend_item_price = $item['item']->extended_price;
                    }
                @endphp

                <!-- strt sidebar cart -->
                    <div class="sidebar-card card-pricing card--pricing2">
                        <div class="video-container">
                            @if($item['item']->video_preview_type!='')
                                @if($item['item']->video_preview_type == 'youtube')
                                    @if($item['item']->video_url != '')
                                        @php
                                            $link = $item['item']->video_url;
                                            $video_id = explode("?v=", $link);
                                            $video_id = $video_id[1];
                                        @endphp

                                        <iframe
                                            width="100%"
                                            height="230"
                                            src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&loop=1&playlist={{ $video_id }}"
                                            frameborder="0"
                                            allow="autoplay"
                                            scrolling="no"
                                        ></iframe>
                                    @else
                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}">
                                    @endif
                                @endif

                                @if($item['item']->video_preview_type == 'mp4')
                                    @if($item['item']->video_file != '')
                                        @if($allsettings->site_s3_storage == 1)
                                            @php $videofileurl = Storage::disk('s3')->url($item['item']->video_file); @endphp
                                            <video width="100%" height="230" controls loop>
                                                <source src="{{ $videofileurl }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <video width="100%" height="230" controls loop>
                                                <source src="{{ url('/') }}/public/storage/items/{{ $item['item']->video_file }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    @else
                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}">
                                    @endif
                                @endif

                            @else
                                @if($item['item']->item_preview!='')
                                    <img src="{{ url('/') }}/public/storage/items/{{ $item['item']->item_preview }}" alt="{{ $item['item']->item_name }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item['item']->item_name }}">
                                @endif
                            @endif
                        </div>

                        <div class="px-3">
                            <form action="{{ route('cart') }}" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="my-2 price2">
                                    <h1 style="color: #333;">
                                        <span>{{$item['item']->free_download ? "FREE" : $allsettings->site_currency." ".$item_price}}</span>
                                    </h1>
                                </div>
                                <ul>
                                    <li>

                                        <div class="item-features" id="licence_regular">
                                            <ul>
                                                <li><span class="lnr lnr-checkmark-circle right"></span> {{ Helper::translation(3068,$translate) }} {{ $allsettings->site_title }}</li>
                                                @if($item['item']->regular_licence)
                                                @foreach(explode(",",$item['item']->regular_licence) as $licence)
                                                    <li><span class="lnr lnr-checkmark-circle right"></span>    {{$licence}}</li>
                                                @endforeach
                                                @endif
                                                @if($item['item']->future_update == 1)
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> {{ Helper::translation(3069,$translate) }}</li>
                                                @else
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> {{ Helper::translation(3069,$translate) }}</li>
                                                @endif
                                                @if($item['item']->item_support == "1")
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> {{ Helper::translation(3070,$translate) }}
                                                        <a href="{{ URL::to('/user') }}/{{ $item['item']->username }}">
                                                            {{ $item['item']->username }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> {{ Helper::translation(3070,$translate) }}
                                                        <a href="{{ URL::to('/user') }}/{{ $item['item']->username }}">
                                                        {{ $item['item']->username }}
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>


                                        </div>


                                        <div class="item-features" id="licence_extended" style="display: none">
                                            <ul>
                                                <li><span class="lnr lnr-checkmark-circle right"></span> {{ Helper::translation(3068,$translate) }} {{ $allsettings->site_title }}</li>
                                                @if($item['item']->extended_licence)
                                                @foreach(explode(",",$item['item']->extended_licence) as $licence)
                                                    <li><span class="lnr lnr-checkmark-circle right"></span>    {{$licence}}</li>
                                                @endforeach
                                                @endif

                                                @if($item['item']->future_update == 1)
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> {{ Helper::translation(3069,$translate) }}</li>
                                                @else
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> {{ Helper::translation(3069,$translate) }}</li>
                                                @endif

                                                @if($item['item']->item_support == 1)
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> 12 months support from
                                                        <a href="{{ URL::to('/user') }}/{{ $item['item']->username }}">
                                                            {{ $item['item']->username }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> {{ Helper::translation(3070,$translate) }}
                                                        <a href="{{ URL::to('/user') }}/{{ $item['item']->username }}">
                                                            {{ $item['item']->username }}
                                                        </a>

                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" value="{{ base64_encode($item_price) }}_regular" name="item_price" checked>
                                            <label for="opt1" data-price="{{ $item['item']->free_download ? 'FREE' : $allsettings->site_currency.' '.$item_price }}">
                                                <span class="circle"></span>{{ Helper::translation(3072,$translate) }}
                                            </label>
                                        </div>
                                    </li>

                                    @if($item['item']->extended_price != 0)
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt2" class="" value="{{ base64_encode($extend_item_price) }}_extended" name="item_price">
                                                <label for="opt2" data-price="{{ $allsettings->site_currency.' '.$extend_item_price }}">
                                                    <span class="circle"></span>{{ Helper::translation(3073,$translate) }}
                                                </label>
                                            </div>
                                        </li>
                                    @endif
                                </ul>

                                <div class="purchase-button">
                                    @if(Auth::guest())
                                        <a href="javascript:void(0);" class="btn btn--md theme-button cart-btn btn-block" onClick="alert('Login user only');">
                                            <span class="lnr lnr-cart"></span> {{ Helper::translation(3074,$translate) }}
                                        </a>
                                    @endif

                                    @if (Auth::check())
                                        @if($item['item']->user_id == Auth::user()->id)
                                            <a href="{{ URL::to('/edit-item') }}/{{ $item['item']->item_token }}" class="btn btn--md theme-button btn-block">{{ Helper::translation(2935,$translate) }}</a>
                                        @else
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="item_id" value="{{ $item['item']->item_id }}">
                                            <input type="hidden" name="item_name" value="{{ $item['item']->item_name }}">
                                            <input type="hidden" name="item_user_id" value="{{ $item['item']->user_id }}">
                                            <input type="hidden" name="item_token" value="{{ $item['item']->item_token }}">
                                            @if($checkif_purchased == 0)
                                                @if(Auth::user()->id != 1)
                                                    <button type="submit" class="btn btn--md theme-button cart-btn btn-block"><span class="lnr lnr-cart"></span> {{ Helper::translation(3074,$translate) }}</button>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end sidebar card -->


                    @if($item['item']->free_download == 1)
                        <div class="author-card sidebar-card freefile">
                            <p>{{ Helper::translation(3065,$translate) }} <strong>{{ Helper::translation(3040,$translate) }}</strong>. {{ Helper::translation(3066,$translate) }}</p>
                            <div align="center">
                                @if(Auth::guest())
                                    <a href="{{ URL::to('/login') }}" class="btn btn--md theme-button"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate) }} ({{ $item['item']->download_count }})</a>
                                @else
                                    <a href="{{ URL::to('/item') }}/{{ base64_encode($item['item']->item_token) }}" class="btn btn--md theme-button" download> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate) }} ({{ $item['item']->download_count }})</a>
                                @endif
                            </div>
                        </div>
                    @endif


                    @if($item['item']->item_featured == 'yes')
                        <div class="sidebar-card card--metadata flex-column-center">
                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" class="single-badges mb-2" title="Featured Item">
                            <span>{{ Helper::translation(3075,$translate) }} {{ $allsettings->site_title }}</span>
                        </div>
                    @endif


                    <div class="author-card sidebar-card ">
                        <div class="author-infos">
                            <div class="author-avatar-bg"></div>

                            <div class="author_avatar">
                                @if($item['item']->user_photo != '')
                                    <img
                                        src="{{ url('/') }}/public/storage/users/{{ $item['item']->user_photo }}"
                                        alt="{{ $item['item']->name }}"
                                        width="100"
                                        height="100"
                                    >
                                @else
                                    <img
                                        src="{{ url('/') }}/public/img/no-user.png"
                                        alt="{{ $item['item']->name }}"
                                        width="100"
                                        height="100"
                                    >
                                @endif
                            </div>

                            <div class="author">
                                <h4>{{ $item['item']->username }}</h4>
                                {{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($item['item']->created_at)) }}

                                @if($item['item']->user_type == 'vendor' || $item['item']->user_type == 'customer')
                                    @if($item['item']->country_badge == 1 || $item['item']->country != '')
                                        <div>From {{ $country['view']->country_name }}</div>
                                    @endif
                                @endif
                            </div>

                            <!-- start badges section -->
                            <div class="social social--color--filled">
                                <ul>
                                    @if($item['item']->country_badge == 1)
                                        @if($country['view']->country_badges != "")
                                            <li>
                                                <img
                                                    src="{{ url('/') }}/public/storage/flag/{{ $country['view']->country_badges }}"
                                                    border="0"
                                                    class="profile-icon-badge"
                                                    title="Located in {{ $country['view']->country_name }}"
                                                >
                                            </li>
                                        @endif
                                    @endif

                                    @if($item['item']->exclusive_author == 1)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->exclusive_author_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Exclusive Author: Sells items exclusively on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($trends != 0)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->trends_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Trendsetter: Had an item that was trending"
                                            >
                                        </li>
                                    @endif

                                    @if($item['item']->item_featured == 'yes')
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Featured Item: Had an item featured on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($item['item']->free_download == 1)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->free_item_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Free Item : Contributed a free file of this item"
                                            >
                                        </li>
                                    @endif

                                    <?php
                                    $yearIcon = '';
                                    switch($year) {
                                        case 1:
                                            $yearIcon = 'one_year_icon';
                                            break;
                                        case 2:
                                            $yearIcon = 'two_year_icon';
                                            break;
                                        case 3:
                                            $yearIcon = 'three_year_icon';
                                            break;
                                        case 4:
                                            $yearIcon = 'four_year_icon';
                                            break;
                                        case 5:
                                            $yearIcon = 'five_year_icon';
                                            break;
                                        case 6:
                                            $yearIcon = 'six_year_icon';
                                            break;
                                        case 7:
                                            $yearIcon = 'seven_year_icon';
                                            break;
                                        case 8:
                                            $yearIcon = 'eight_year_icon';
                                            break;
                                        case 9:
                                            $yearIcon = 'nine_year_icon';
                                            break;
                                        case $year >= 10:
                                            $yearIcon = 'ten_year_icon';
                                            break;
                                    }
                                    ?>

                                    <li>
                                        <img
                                            src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->$yearIcon }}"
                                            border="0"
                                            class="other-badges"
                                            title="@if($year >= 10) 10+ @else {{ $year }} @endif Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over @if($year >= 10) 10+ @else {{ $year }} @endif years"
                                        >
                                    </li>

                                    @if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_one_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 1: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_one }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_two && $badges['setting']->author_sold_level_three > $sold_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_two_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 2: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_two }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_three && $badges['setting']->author_sold_level_four > $sold_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->	author_sold_level_three_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 3: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_three }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_four && $badges['setting']->author_sold_level_five > $sold_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_four_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 4: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_four }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_five && $badges['setting']->author_sold_level_six > $sold_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_five_icon }}"
                                                border="0" class="profile-icon-badge"
                                                title="Author Level 5: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_five }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_six_icon }}"
                                                border="0" class="profile-icon-badge"
                                                title="Author Level 6: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}"
                                                border="0" class="profile-icon-badge"
                                                title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_one_icon }}"
                                                border="0" class="profile-icon-badge"
                                                title="Collector Level 1: Has collected {{ $badges['setting']->author_collect_level_one }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_two_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 2: Has collected {{ $badges['setting']->author_collect_level_two }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_three_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 3: Has collected {{ $badges['setting']->author_collect_level_three }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_four_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 4: Has collected {{ $badges['setting']->author_collect_level_four }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_five_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 5: Has collected {{ $badges['setting']->author_collect_level_five }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($collect_amount >= $badges['setting']->author_collect_level_six)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_six_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 6: Has collected {{ $badges['setting']->author_collect_level_six }}+ items on {{ $allsettings->site_title }}"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_one_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 1: Has referred {{ $badges['setting']->author_referral_level_one }}+ members"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_two_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 2: Has referred {{ $badges['setting']->author_referral_level_two }}+ members"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_three_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 3: Has referred {{ $badges['setting']->author_referral_level_three }}+ members"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_four_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 4: Has referred {{ $badges['setting']->author_referral_level_four }}+ members"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_five_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 5: Has referred {{ $badges['setting']->author_referral_level_five }}+ members"
                                            >
                                        </li>
                                    @endif

                                    @if($referral_count >= $badges['setting']->author_referral_level_six)
                                        <li>
                                            <img
                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_six_icon }}"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 6: Has referred {{ $badges['setting']->author_referral_level_six }}+ members"
                                            >
                                        </li>
                                    @endif

                                </ul>
                            </div>
                            <!-- end badges section -->

                            <div class="author-btn col-sm-12">
                                <a href="{{ url('/user') }}/{{ $item['item']->username }}" class="btn btn-block btn-md theme-button text-white">
                                    {{ Helper::translation(3078,$translate) }}
                                </a>
                            </div>
                        </div>
                    </div>


                    @if($sold_amount >= $badges['setting']->author_sold_level_six)
                        <div class="sidebar-card card--metadata flex-column-center">
                            <img
                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}"
                                border="0"
                                class="single-badges mb-3"
                                title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}"
                            >
                            <span>{{ $badges['setting']->author_sold_level_six_label }}</span>
                        </div>
                    @endif


                    @include('./components/newsletter')

                    <div class="sidebar-card">
                        <p class="data-label">{{ Helper::translation(2974,$translate) }}</p>
                        <p class="info mb-0">
                            @foreach($item_tags as $tags)
                                <a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tags)) }}" class="item-tags item-custom-tags">{{ $tags }}</a>
                            @endforeach
                        </p>
                    </div>

                    <div class="sidebar-card card--product-infos">

                        <ul class="infos">

                            <li>
                                <p class="data-label">{{ Helper::translation(3084,$translate) }}</p>
                                <p class="info">{{ $category_name }}</p>
                            </li>
                            <li>
                                <p class="data-label">{{ Helper::translation(2937,$translate) }}</p>
                                <p class="info">{{ str_replace('-',' ',$item['item']->item_type) }}</p>
                            </li>

                            @if(count($viewattribute['details']) != 0)
                                @foreach($viewattribute['details'] as $view_attribute)
                                    <li>
                                        <p class="data-label">{{ $view_attribute->item_attribute_label }}</p>
                                        <p class="info">{{ $view_attribute->item_attribute_values }}</p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                </aside>
            </div>

        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!-- end single product description -->

<!-- start more products area -->
<section class="more_product_area section--padding">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>{{ Helper::translation(3087,$translate) }}
                        <span class="highlighted">by {{ $item['item']->username }}</span>
                    </h1>
                </div>
            </div>

            @foreach($itemData['item'] as $item)
                @include("./components/item_card", [
                    "item" => $item
                ])
            @endforeach
        </div>

    </div>
</section>
<!-- end more products area -->

@include('footer')
@include('javascript')

<script>
    $(document).ready(function() {
        $("input[name$='item_price']").click(function() {
            var licence = $(this).val();
            const licence_type = licence.split('_');
            //console.log(licence_type[1]);
            $("div.item-features").hide();
            $("#licence_" + licence_type[1]).show();
        });
    });
</script>
</body>

</html>
@else
    @include('503')
@endif
