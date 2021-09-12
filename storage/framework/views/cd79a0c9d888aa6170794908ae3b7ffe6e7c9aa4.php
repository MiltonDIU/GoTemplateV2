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

<div class="card <?php echo e($classNames?$classNames:""); ?><?php echo e($listItemClasses?$listItemClasses:""); ?> my-3 border-none bg-transparent " data-price="<?php echo e($item->regular_price); ?>">
    <div class="custom-card <?php echo $flexColumnBetween; ?>" style="<?php echo $cardStyle; ?>">
        <div class="custom-card__header <?php echo $headerClasses; ?>">
            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" title="<?php echo e($item->item_name); ?>">
                <?php if($item->item_thumbnail!=''): ?>
                    <img style="<?php echo $imgStyle; ?>"  src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_thumbnail); ?>" alt="<?php echo e($item->item_name); ?>">
                <?php else: ?>
                    <img style="<?php echo $imgStyle; ?>" src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($item->item_name); ?>">
                <?php endif; ?>
            </a>

            <a
                class="item-type"
                data-toggle="tooltip"
                data-placement="top"
                title="<?php echo e($item->item_type); ?>"
                href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"
            >
                <?php echo e($item->item_type); ?>

            </a>

            <?php if(isset($isLike) && $isLike): ?>
                <a
                    href="<?php echo e(route('item.liked.remove',[base64_encode($item->like_id),base64_encode($item->item_id)])); ?>"
                    id="drop1"
                    class="dropdown-trigger like-item-remove"
                    onClick="return confirm('Are you sure you want to remove from likes?');"
                >
                    <span class="lnr lnr-trash setting-icon"></span>
                </a>
            <?php endif; ?>

            <?php if(isset($isFavorite) && $isFavorite): ?>
                <a
                    href="<?php echo e(url('/favourites')); ?>/<?php echo e(base64_encode($item->fav_id)); ?>/<?php echo e(base64_encode($item->item_id)); ?>"
                    id="drop1"
                    class="dropdown-trigger favourite-item-remove"
                    onClick="return confirm('<?php echo e(Helper::translation(2991,$translate)); ?>');"
                >
                    <span class="lnr lnr-trash setting-icon"></span>
                </a>
            <?php endif; ?>

        <!-- =Future: need to implement tags like as popular, best seller -->
            <div style="<?php echo $tagStyle; ?>" class="custom-tag text-truncate">
                Best Seller
            </div>
            
            
            <?php if(Auth::check()): ?>
                <?php if($item->user_id != Auth::user()->id): ?>
                    <a
                        href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"
                        class="favourite flex-center <?php echo e((\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like':''); ?>"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Add to Favourite"
                    >
                        <i class="fa fa-heart-o"></i>
                    </a>
                <?php endif; ?>
            <?php else: ?>
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
            <?php endif; ?>
            
        </div>

        <div class="custom-card__body <?php echo $bodyClasses; ?>">
            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" title="<?php echo e($item->item_name); ?>">
                <p class="product-title"><?php echo e($item->item_name); ?></p>
            </a>

            <p class="author-name">
                
                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item->username); ?>"><?php echo e($item->username); ?></a>
            </p>

            <div class="details-info flex-row-between align-items-center">
                <div>
                    <!-- =Future: currency should show according to setting's currency -->
                    <p class="price"><?php echo e($item->free_download ? "FREE" : "BDT ".$item->regular_price); ?></p>

                    <?php echo $__env->make('rating_star', ['ratings' => isset($item->ratings) ? $item->ratings : []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <p class="sells-count"><?php echo e($item->item_sold); ?> Sales</p>
                </div>

                <div class="icons-container">

                    
                    <?php if(Auth::check()): ?>
                        <?php if($item->user_id != Auth::user()->id): ?>
                            <a
                                href="<?php echo e(route('item.liked',[base64_encode($item->item_id),base64_encode($item->item_liked)])); ?>"
                                class="icon-holder <?php echo e((\Feberr\Models\Items::getLikeCount($item->item_id,  Auth::user()->id)>0)?'item-active-like item-thumbs-up':''); ?>"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Like This Product"
                            >
                                <i class="fa fa-thumbs-o-up"></i>
                            </a>
                        <?php endif; ?>
                    <?php else: ?>
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
                    <?php endif; ?>
                    

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
                        data-preview-type="<?php echo e($item->video_preview_type); ?>"
                        data-video-url="<?php echo e($item->video_url); ?>"
                        data-video-file="<?php echo e($item->video_file); ?>"
                        data-item-preview="<?php echo e($item->item_preview); ?>"
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

            <?php if($footerInBody): ?>
                <a
                    class="custom-card__footer"
                    style="margin-top: 10px; border-radius: 3px; display: block;"
                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"
                    title="<?php echo e($item->item_name); ?>"
                >
                    BUY NOW
                </a>
            <?php endif; ?>
        </div>

        
        <span class="new-items display-none"><?php echo e($item->item_id); ?></span>
        <span class="popular-items display-none"><?php echo e($item->item_liked); ?></span>
        <span class="free-items display-none"><?php echo e($item->free_download); ?></span>


        <span class="<?php echo e($item->item_type); ?>" style="display:none;"><?php echo e($item->item_type); ?></span>

        <div class="block">
            <span class="<?php echo e($item->item_type); ?> display-none"><?php echo e($item->item_type); ?>_<?php echo e($item->item_category_type); ?></span>
        </div>

        <?php if(!$footerInBody): ?>
            <a
                class="custom-card__footer"
                href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"
                title="<?php echo e($item->item_name); ?>"
            >
                BUY NOW
            </a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views///components/item_card.blade.php ENDPATH**/ ?>