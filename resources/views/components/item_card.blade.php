<?php
/*
  $item -> product or item object
  $isLike -> true only when its used in likes.blade.php
  $isFavorite -> true only when its used in favourites.blade.php
  $isUser -> true only when its used in user.blade.php
  $isShop -> true only when its used in shop.blade.php
  $isShopList -> true only when its used in shop-list.blade.php
  $isFreeItem -> true only when its used in free-items.blade.php
*/
?>

<?php
// set class names for particular page
$classNames = "col-lg-3 col-md-4 col-sm-6";
$listItemClasses = "li-item list-item";

if(isset($isUser) && $isUser) {
    $classNames = "col-sm-6 col-xs-12";
}
if(isset($isShop) && $isShop) {
    $classNames = "col-md-4 col-sm-6";
}
if(isset($isShopList) && $isShopList) {
    $classNames = "col-sm-12";
}
if(isset($isFreeItem) && $isFreeItem) {
    $listItemClasses = "";
}

// custom style for shop-list product card
$flexColumnBetween = "flex-column-between";
$headerClasses = "";
$bodyClasses = "";
$footerInBody = false;
$imgStyle = "";
$tagStyle = "";
$cardStyle = "";
if(isset($isShopList) && $isShopList) {
    $flexColumnBetween = "";
    $headerClasses = "col-lg-6 col-md-6 col-sm-12 px-0 h-100";
    $bodyClasses = "col-lg-6 col-md-6 col-sm-12";
    $footerInBody = true;
    $imgStyle = "height: 205px; clip-path: unset;";
    $tagStyle = "bottom: 10px;";
    $cardStyle = "display: flex; flex-wrap: wrap; min-height: unset;";
}



?>

<div class="card {{$classNames?$classNames:""}}{{$listItemClasses?$listItemClasses:""}} my-3 border-none bg-transparent " data-price="{{ $item->regular_price }}">
    <div class="custom-card <?php echo $flexColumnBetween; ?>" style="<?php echo $cardStyle; ?>">
        <div class="custom-card__header <?php echo $headerClasses; ?>">
            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" title="{{ $item->item_name }}">
                @if($item->item_thumbnail!='')
                    <img style="<?php echo $imgStyle; ?>"  src="{{ url('/') }}/public/storage/items/{{ $item->item_thumbnail }}" alt="{{ $item->item_name }}">
                @else
                    <img style="<?php echo $imgStyle; ?>" src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $item->item_name }}">
                @endif
            </a>

            <a
                class="item-type"
                data-toggle="tooltip"
                data-placement="top"
                title="{{$item->item_type}}"
                href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}"
            >
                {{$item->item_type}}
            </a>

            @if(isset($isLike) && $isLike)
                <a
                    href="{{ route('item.liked.remove',[base64_encode($item->like_id),base64_encode($item->item_id)]) }}"
                    id="drop1"
                    class="dropdown-trigger like-item-remove"
                    onClick="return confirm('Are you sure you want to remove from likes?');"
                >
                    <span class="lnr lnr-trash setting-icon"></span>
                </a>
            @endif

            @if(isset($isFavorite) && $isFavorite)
                <a
                    href="{{ url('/favourites') }}/{{ base64_encode($item->fav_id) }}/{{ base64_encode($item->item_id) }}"
                    id="drop1"
                    class="dropdown-trigger favourite-item-remove"
                    onClick="return confirm('{{ Helper::translation(2991,$translate) }}');"
                >
                    <span class="lnr lnr-trash setting-icon"></span>
                </a>
            @endif

        <!-- =Future: need to implement tags like as popular, best seller -->
            <div style="<?php echo $tagStyle; ?>" class="custom-tag text-truncate">
                Best Seller
            </div>
            
            {{--start favourite custom code--}}
            @if (Auth::check())
                @if($item->user_id != Auth::user()->id)
                    <a
                        href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"
                        class="favourite flex-center {{(\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''}}"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Add to Favourite"
                    >
                        <i class="fa fa-heart-o"></i>
                    </a>
                @endif
            @else
                <a
                    href="javascript:void(0);"
                    class="favourite flex-center"
                    onClick="alert('Login user only');"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Add to Favourite"
                >
                    <i class="fa fa-heart-o"></i>
                </a>
            @endif
            {{--end favourite custom code--}}
        </div>

        <div class="custom-card__body <?php echo $bodyClasses; ?>">
            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" title="{{ $item->item_name }}">
                <p class="product-title">{{$item->item_name}}</p>
            </a>

            <p class="author-name">
                {{-- <img src="{{ url('/') }}/public/storage/users/{{ $item->user_photo?$item->user_photo:$item->user->user_photo }}" alt="{{ $item->username}}" /> --}}
                <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
            </p>

            <div class="details-info flex-row-between align-items-center">
                <div>
                    <!-- =Future: currency should show according to setting's currency -->
                    <p class="price">{{$item->free_download ? "FREE" : "BDT ".$item->regular_price}}</p>

                    @include('rating_star', ['ratings' => isset($item->ratings) ? $item->ratings : []])

                    <p class="sells-count">{{$item->item_sold}} Sales</p>
                </div>

                <div class="icons-container">

                    {{--like custom code--}}
                    @if (Auth::check())
                        @if($item->user_id != Auth::user()->id)
                            <a
                                href="{{ route('item.liked',[base64_encode($item->item_id),base64_encode($item->item_liked)]) }}"
                                class="icon-holder {{(\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like item-thumbs-up':''}}"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Like This Product"
                            >
                                <i class="fa fa-thumbs-o-up"></i>
                            </a>
                        @endif
                    @else
                        <a
                            href="javascript:void(0);"
                            class="icon-holder"
                            onClick="alert('Login user only');"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Like This Product"
                        >
                            <i class="fa fa-thumbs-o-up"></i>
                        </a>
                    @endif
                    {{--end like custom code--}}

                    <span
                        class="icon-holder"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Add to Cart"
                    >
                        <i class="fa fa-cart-plus"></i>
                    </span>

                    <span
                        class="icon-holder video-modal"
                        data-target="#videoModal"
                        data-toggle="modal"
                        data-placement="center"
                        data-preview-type="{{$item->video_preview_type}}"
                        data-video-url="{{$item->video_url}}"
                        data-video-file="{{$item->video_file}}"
                        data-item-preview="{{$item->item_preview}}"
                    >
                        <i
                            class="fa fa-video-camera"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Show Video"
                        ></i>
                    </span>
                </div>
            </div>

            @if($footerInBody)
                <a
                    class="custom-card__footer"
                    style="margin-top: 10px; border-radius: 3px; display: block;"
                    href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"
                    title="{{ $item->item_name }}"
                >
                    BUY NOW
                </a>
            @endif
        </div>

        {{-- shop-list --}}
        <span class="new-items display-none">{{ $item->item_id }}</span>
        <span class="popular-items display-none">{{ $item->item_liked }}</span>
        <span class="free-items display-none">{{ $item->free_download }}</span>


        <span class="{{ $item->item_type }}" style="display:none;">{{ $item->item_type }}</span>

        <div class="block">
            <span class="{{ $item->item_type }} display-none">{{ $item->item_type }}_{{ $item->item_category_type }}</span>
        </div>

        @if(!$footerInBody)
            <a
                class="custom-card__footer"
                href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"
                title="{{ $item->item_name }}"
            >
                BUY NOW
            </a>
        @endif
    </div>
</div>
