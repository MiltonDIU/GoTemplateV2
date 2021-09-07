<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e($item['item']->item_name); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload single_prduct2">

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- start hero section -->
<section class="hero-area bgimage hero-area--h300">
    <div class="bg_image_holder">
        <img src="<?php echo e(url('/')); ?>/public/assets/images/double-bubble-outline.png" alt="<?php echo e($allsettings->site_title); ?>">
    </div>
    <div class="bg-overlay--breadcrumb"></div>

    <!-- start hero content -->
    <div class="container content_above item-hero-content">
        <div class="col-sm-12 pl-0">
            <div class="breadcrumb">
                <ul class="item-hero-nav">
                    <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?></a></li>
                    <li class="text-truncate"><a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>"><?php echo e($item['item']->item_name); ?></a></li>
                </ul>
            </div>

            <h2 class="item-hero-title m-auto"><?php echo e($item['item']->item_name); ?></h2>
            <p class="text-truncate text-white"><?php echo e($item['item']->item_shortdesc); ?></p>

            <div>
                <span class="custom-tag mr-3">Best Seller</span>

                <div class="rating product--rating" align="center">
                    <ul>
                        <?php if($getreview == 0): ?>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                            <li><span class="fa fa-star-o"></span></li>
                        <?php else: ?>
                            <?php $notStar = 5 - $count_rating; ?>

                            <?php for($i = 0; $i < $count_rating; $i++): ?>
                                <li><span class="fa fa-star"></span></li>
                            <?php endfor; ?>

                            <?php for($j = 0; $j < $notStar; $j++): ?>
                                <li><span class="fa fa-star-o"></span></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                    <span class="rating__count text-white">( <?php echo e($getreview); ?> <?php echo e(Helper::translation(3080,$translate)); ?> )</span>
                </div>
            </div>

            <div class="d-flex my-3">
                <?php
                    $itemSold = $item['item']->item_sold;
                    $msg = 'Sales';
                    if($itemSold <= 0) $msg = 'Sale';
                ?>

                <div class="mr-3">
                    <span class="lnr lnr-cart text-white"></span>
                    <span class="text-white"><?php echo e($itemSold); ?></span>
                    <span class="text-white"><?php echo e($msg); ?></span>
                </div>

                <div class="mr-3">
                    <span class="lnr lnr-calendar-full text-white"></span>
                    <span class="text-white">Published on </span>
                    <span class="text-white"><?php echo e(date("d F Y", strtotime($item['item']->created_item))); ?></span>
                </div>

                <div>
                    <span class="lnr lnr-calendar-full text-white"></span>
                    <span class="text-white"><?php echo e(Helper::translation(3083,$translate)); ?></span>
                    <span class="text-white"><?php echo e(date("d F Y", strtotime($item['item']->updated_item))); ?></span>
                </div>
            </div>

            <div class="d-flex">
                <?php if(isset($item['item']->demo_url) && $item['item']->demo_url != ''): ?>
                    <a href="<?php echo e($item['item']->demo_url); ?>" class="text-white rounded-border-btn flex-center" target="_blank">
                        <span><?php echo e(Helper::translation(3049,$translate)); ?></span>
                        <span class="lnr lnr-link"></span>
                    </a>
                <?php endif; ?>

                <?php if(Auth::guest()): ?>
                    <a href="javascript:void(0);" class="text-white rounded-border-btn flex-center" onClick="alert('Login user only');">
                        </span><?php echo e(Helper::translation(3051,$translate)); ?>

                        <span class="lnr lnr-heart"></span>
                    </a>
                <?php endif; ?>

                <?php if(Auth::check()): ?>
                    <?php if($item['item']->user_id != Auth::user()->id): ?>
                        <a href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item['item']->item_id)); ?>/favorite/<?php echo e(base64_encode($item['item']->item_liked)); ?>" class="text-white rounded-border-btn flex-center">
                            <span><?php echo e(Helper::translation(3051,$translate)); ?></span>
                            <span class="lnr lnr-heart"></span>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>


                
                <?php if(Auth::check()): ?>
                    <?php if($item['item']->user_id != Auth::user()->id): ?>
                        <a href="<?php echo e(route('item.liked',[base64_encode($item['item']->item_id), base64_encode($item['item']->item_liked)])); ?>"class="text-white rounded-border-btn flex-center <?php echo e((\Feberr\Models\Items::getLikeCount($item['item']->item_id,  Auth::user()->id)>0)?'item-active-like':''); ?>">
                            Like <span class="lnr lnr-thumbs-up"></span>
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="javascript:void(0);" class="text-white rounded-border-btn flex-center" onClick="alert('Login user only');">
                        Like <span class="lnr lnr-thumbs-up"></span>
                    </a>
                <?php endif; ?>

                


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
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            <?php endif; ?>


            <?php if($message = Session::get('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <?php echo e($message); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if(!$errors->isEmpty()): ?>
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
            <?php endif; ?>
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
                                <?php $previewNo = 0; ?>
                                <?php $__currentLoopData = $item_allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="<?php echo e($previewNo == 0 ? 'carousel-item active' : 'carousel-item'); ?>">
                                        <?php if($image->item_image != ''): ?>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($image->item_image); ?>"
                                                alt="Product Images"
                                                class="item-preview__img"
                                            >
                                        <?php else: ?>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/img/no-user.png"
                                                alt="<?php echo e($review['name']); ?>"
                                                class="item-preview__img"
                                            >
                                        <?php endif; ?>
                                    </div>
                                    <?php $previewNo++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <ol class="carousel-indicators position-relative mb-0">
                                <?php $itemNo = 0; ?>
                                <?php $__currentLoopData = $item_allimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img
                                        data-slide-to="<?php echo e($itemNo); ?>"
                                        src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($image->item_image); ?>"
                                        alt="Item Image"
                                        class="<?php echo e($itemNo == 0 ? 'active' : ''); ?> indicator-img m-2"
                                        data-target="#item-preview__carousel"
                                    />
                                    <?php $itemNo++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>

                        </div>

                    </div>

                    <div class="item_social_share">
                        <p class="my-0"><?php echo e(Helper::translation(3052,$translate)); ?></p>

                        <div class="social social--color--filled my-3">
                            <ul>
                                <li>
                                    <a class="share-button single-item" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>" data-share-network="facebook" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->item_thumbnail); ?>" href="javascript:void(0)">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>" data-share-network="twitter" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->item_thumbnail); ?>" href="javascript:void(0)">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>" data-share-network="googleplus" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->item_thumbnail); ?>" href="javascript:void(0)">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="share-button single-item" data-share-url="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>" data-share-network="linkedin" data-share-text="<?php echo e($item['item']->item_shortdesc); ?>" data-share-title="<?php echo e($item['item']->item_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->item_thumbnail); ?>" href="javascript:void(0)">
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
                                src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item['item']->user_photo); ?>"
                                alt="<?php echo e($item['item']->name); ?>"
                                width="100"
                                alt="Reviewer Avatar"
                                class="rounded"
                            >
                            <h4 class="my-2">Md. Mahmudul Hasan Robin</h4>
                            <h6>Software Developer</h6>
                        </div>
                        <div class="rating">
                            <ul>
                                <?php $notStar = 5 - $count_rating; ?>
            <?php for($i = 0; $i < $count_rating; $i++): ?>
                <li><span class="fa fa-star"></span></li>
<?php endfor; ?>
            <?php for($j = 0; $j < $notStar; $j++): ?>
                <li><span class="fa fa-star-o"></span></li>
<?php endfor; ?>
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
                                    <?php echo e(Helper::translation(3053,$translate)); ?>

                                </a>
                            </li>

                            <li>
                                <a
                                    href="#product-comment"
                                    aria-controls="product-comment"
                                    role="tab"
                                    data-toggle="tab"
                                >
                                    <?php echo e(Helper::translation(3054,$translate)); ?>

                                    <span>(<?php echo e($comment_count); ?>)</span>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#product-review"
                                    aria-controls="product-review"
                                    role="tab"
                                    data-toggle="tab"
                                >
                                    <?php echo e(Helper::translation(3043,$translate)); ?>

                                    <span>(<?php echo e($getreview); ?>)</span>
                                </a>
                            </li>

                            <?php if(Auth::guest()): ?>
                                <li>
                                    <a
                                        href="#product-support"
                                        aria-controls="product-support"
                                        role="tab"
                                        data-toggle="tab"
                                    >
                                        <?php echo e(Helper::translation(3055,$translate)); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Auth::check()): ?>
                                <?php if($item['item']->user_id != Auth::user()->id): ?>
                                    <li>
                                        <a
                                            href="#product-support"
                                            aria-controls="product-support"
                                            role="tab"
                                            data-toggle="tab"
                                        >
                                            <?php echo e(Helper::translation(3055,$translate)); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show product-tab active" id="product-details">
                            <div class="tab-content-wrapper">
                                <?php echo html_entity_decode($item['item']->item_desc); ?>

                            </div>
                        </div>

                        <div class="fade tab-pane product-tab" id="product-comment">
                            <div class="thread">

                                <ul class="media-list thread-list" id="listShow">
                                    <?php $__currentLoopData = $comment['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="single-thread commli-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($parent->username); ?>">

                                                        <?php if($parent->user_photo!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($parent->user_photo); ?>" alt="<?php echo e($parent->username); ?>" class="media-object">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($parent->username); ?>" class="media-object">
                                                        <?php endif; ?>
                                                    </a>

                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($parent->username); ?>">
                                                                <h4><?php echo e($parent->username); ?></h4>
                                                            </a>
                                                            <span><?php echo e(date('d F Y, H:i:s', strtotime($parent->comm_date))); ?></span>
                                                        </div>

                                                        <?php if($parent->id == $item['item']->user_id): ?>
                                                            <span class="comment-tag buyer"><?php echo e(Helper::translation(3057,$translate)); ?></span>
                                                        <?php endif; ?>
                                                        <?php if(Auth::check()): ?>
                                                            <?php if($item['item']->user_id == Auth::user()->id): ?>
                                                                <a href="javascript:void(0);" class="reply-link theme-color"><?php echo e(Helper::translation(3056,$translate)); ?></a>
                                                            <?php endif; ?>
                                                            <?php if($parent->comm_user_id == Auth::user()->id): ?>
                                                                <a href="javascript:void(0);" class="reply-link theme-color"><?php echo e(Helper::translation(3056,$translate)); ?></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p><?php echo e($parent->comm_text); ?></p>
                                                </div>
                                            </div>


                                            <ul class="children">
                                                <?php $__currentLoopData = $parent->replycomment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="single-thread depth-2">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($child->username); ?>">

                                                                    <?php if($child->user_photo!=''): ?>
                                                                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($child->user_photo); ?>" alt="<?php echo e($child->username); ?>" class="media-object">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($child->username); ?>" class="media-object">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($child->username); ?>">
                                                                        <h4><?php echo e($child->username); ?></h4>
                                                                    </a>
                                                                    <span><?php echo e(date('d F Y, H:i:s', strtotime($child->comm_date))); ?></span>
                                                                </div>
                                                                <?php if($child->id == $item['item']->user_id): ?>
                                                                    <span class="comment-tag buyer"><?php echo e(Helper::translation(3057,$translate)); ?></span>
                                                            <?php endif; ?>
                                                            <!--<span class="comment-tag author">Author</span>-->
                                                                <p><?php echo e($child->comm_text); ?></p>
                                                            </div>
                                                        </div>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>

                                            <!-- comment reply -->
                                            <?php if(Auth::check()): ?>
                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">

                                                            <?php if(Auth::user()->user_photo!=''): ?>
                                                                <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->username); ?>" class="media-object">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->username); ?>" class="media-object">
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="<?php echo e(route('reply-post-comment')); ?>" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                            <?php echo e(csrf_field()); ?>

                                                            <textarea name="comm_text" placeholder="<?php echo e(Helper::translation(3059,$translate)); ?>" data-bvalidator="required"></textarea>
                                                            <input type="hidden" name="comm_user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                            <input type="hidden" name="comm_item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                                                            <input type="hidden" name="comm_item_id" value="<?php echo e($item['item']->item_id); ?>">
                                                            <input type="hidden" name="comm_id" value="<?php echo e($parent->comm_id); ?>">
                                                            <input type="hidden" name="comm_item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>">
                                                            <button class="btn btn--sm theme-button"><?php echo e(Helper::translation(3058,$translate)); ?></button>
                                                        </form>
                                                    </div>
                                                </div>
                                        <?php endif; ?>
                                        <!-- comment reply -->
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination" role="navigation">
                                        <div class="pagination-area">
                                            <div class="turn-page" id="commpager"></div>
                                        </div>
                                    </nav>
                                </div>

                                <?php if(Auth::check()): ?>
                                    <?php if($item['item']->user_id != Auth::user()->id): ?>
                                        <div class="comment-form-area">
                                            <h4>Leave a comment</h4>

                                            <div class="media comment-form">
                                                <div class="media-left">
                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">
                                                        <?php if(Auth::user()->user_photo!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->username); ?>" class="media-object">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->username); ?>" class="media-object">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <form action="<?php echo e(route('post-comment')); ?>" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                        <?php echo e(csrf_field()); ?>

                                                        <textarea name="comm_text" placeholder="<?php echo e(Helper::translation(3059,$translate)); ?>" data-bvalidator="required"></textarea>
                                                        <input type="hidden" name="comm_user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                        <input type="hidden" name="comm_item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                                                        <input type="hidden" name="comm_item_id" value="<?php echo e($item['item']->item_id); ?>">
                                                        <input type="hidden" name="comm_item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>">
                                                        <button class="btn btn--sm theme-button"><?php echo e(Helper::translation(3058,$translate)); ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="tab-pane fade product-tab" id="product-review">
                            <div class="thread thread_review">
                                <ul class="media-list thread-list" id="listShow">
                                    <?php $__currentLoopData = $getreviewdata['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="single-thread li-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($rating->username); ?>">
                                                        <?php if($rating->user_photo!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($rating->user_photo); ?>" alt="<?php echo e($rating->username); ?>" class="media-object">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($rating->username); ?>" class="media-object">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>

                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($rating->username); ?>">
                                                                    <h4><?php echo e($rating->username); ?></h4>
                                                                </a>
                                                                <span><?php echo e(date('d F Y H:i:s', strtotime($rating->rating_date))); ?></span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <?php $notStar = 5 - $rating->rating; ?>

                                                                    <?php for($i = 0; $i < $rating->rating; $i++): ?>
                                                                        <li><span class="fa fa-star"></span></li>
                                                                    <?php endfor; ?>

                                                                    <?php for($j = 0; $j < $notStar; $j++): ?>
                                                                        <li><span class="fa fa-star-o"></span></li>
                                                                    <?php endfor; ?>
                                                                </ul>
                                                            </div>
                                                            <span class="review_tag"><?php echo e($rating->rating_reason); ?></span>
                                                        </div>

                                                    </div>
                                                    <p><?php echo e($rating->rating_comment); ?></p>
                                                </div>
                                            </div>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <h3><?php echo e(Helper::translation(3060,$translate)); ?></h3>
                                </div>

                                <div class="support__form">
                                    <div class="usr-msg">
                                        <?php if(Auth::guest()): ?>
                                            <p><?php echo e(Helper::translation(3061,$translate)); ?>

                                                <a href="<?php echo e(URL::to('/login')); ?>" class="theme-color"><?php echo e(Helper::translation(3020,$translate)); ?></a> <?php echo e(Helper::translation(3062,$translate)); ?>

                                            </p>
                                        <?php endif; ?>

                                        <?php if(Auth::check()): ?>
                                            <form action="<?php echo e(route('support')); ?>" class="support_form" id="support_form" method="post" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="form-group">
                                                    <label for="subj"><?php echo e(Helper::translation(3063,$translate)); ?>:</label>
                                                    <input type="text" id="support_subject" name="support_subject" class="text_field" placeholder="Enter your subject" data-bvalidator="required">
                                                </div>

                                                <div class="form-group">
                                                    <label for="supmsg"><?php echo e(Helper::translation(2918,$translate)); ?>: </label>
                                                    <textarea class="text_field" id="support_msg" name="support_msg" placeholder="Enter your message" data-bvalidator="required"></textarea>
                                                </div>
                                                <input type="hidden" name="to_address" value="<?php echo e($item['item']->email); ?>">
                                                <input type="hidden" name="to_name" value="<?php echo e($item['item']->username); ?>">
                                                <input type="hidden" name="from_address" value="<?php echo e(Auth::user()->email); ?>">
                                                <input type="hidden" name="from_name" value="<?php echo e(Auth::user()->username); ?>">
                                                <input type="hidden" name="item_url" value="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>">
                                                <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3064,$translate)); ?></button>
                                            </form>
                                        <?php endif; ?>
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

                <?php
                    if($item['item']->item_flash == 1) {
                        $item_price = round($item['item']->regular_price/2);
                        $extend_item_price = round($item['item']->extended_price/2);
                    } else {
                        $item_price = $item['item']->regular_price;
                        $extend_item_price = $item['item']->extended_price;
                    }
                ?>

                <!-- strt sidebar cart -->
                    <div class="sidebar-card card-pricing card--pricing2">
                        <div class="video-container">
                            <?php if($item['item']->video_preview_type!=''): ?>
                                <?php if($item['item']->video_preview_type == 'youtube'): ?>
                                    <?php if($item['item']->video_url != ''): ?>
                                        <?php
                                            $link = $item['item']->video_url;
                                            $video_id = explode("?v=", $link);
                                            $video_id = $video_id[1];
                                        ?>

                                        <iframe
                                            width="100%"
                                            height="230"
                                            src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&loop=1&playlist=<?php echo e($video_id); ?>"
                                            frameborder="0"
                                            allow="autoplay"
                                            scrolling="no"
                                        ></iframe>
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($item['item']->item_name); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if($item['item']->video_preview_type == 'mp4'): ?>
                                    <?php if($item['item']->video_file != ''): ?>
                                        <?php if($allsettings->site_s3_storage == 1): ?>
                                            <?php $videofileurl = Storage::disk('s3')->url($item['item']->video_file); ?>
                                            <video width="100%" height="230" controls loop>
                                                <source src="<?php echo e($videofileurl); ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        <?php else: ?>
                                            <video width="100%" height="230" controls loop>
                                                <source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->video_file); ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($item['item']->item_name); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php else: ?>
                                <?php if($item['item']->item_preview!=''): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item['item']->item_preview); ?>" alt="<?php echo e($item['item']->item_name); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item['item']->item_name); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="px-3">
                            <form action="<?php echo e(route('cart')); ?>" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="my-2 price2">
                                    <h1 style="color: #333;">
                                        <span><?php echo e($item['item']->free_download ? "FREE" : $allsettings->site_currency." ".$item_price); ?></span>
                                    </h1>
                                </div>
                                <ul>
                                    <li>

                                        <div class="item-features" id="licence_regular">
                                            <ul>
                                                <li><span class="lnr lnr-checkmark-circle right"></span> <?php echo e(Helper::translation(3068,$translate)); ?> <?php echo e($allsettings->site_title); ?></li>
                                                <?php if($item['item']->regular_licence): ?>
                                                <?php $__currentLoopData = explode(",",$item['item']->regular_licence); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span>    <?php echo e($licence); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php if($item['item']->future_update == 1): ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> <?php echo e(Helper::translation(3069,$translate)); ?></li>
                                                <?php else: ?>
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> <?php echo e(Helper::translation(3069,$translate)); ?></li>
                                                <?php endif; ?>
                                                <?php if($item['item']->item_support == "1"): ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> <?php echo e(Helper::translation(3070,$translate)); ?>

                                                        <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item['item']->username); ?>">
                                                            <?php echo e($item['item']->username); ?>

                                                        </a>
                                                    </li>
                                                <?php else: ?>
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> <?php echo e(Helper::translation(3070,$translate)); ?>

                                                        <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item['item']->username); ?>">
                                                        <?php echo e($item['item']->username); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>


                                        </div>


                                        <div class="item-features" id="licence_extended" style="display: none">
                                            <ul>
                                                <li><span class="lnr lnr-checkmark-circle right"></span> <?php echo e(Helper::translation(3068,$translate)); ?> <?php echo e($allsettings->site_title); ?></li>
                                                <?php if($item['item']->extended_licence): ?>
                                                <?php $__currentLoopData = explode(",",$item['item']->extended_licence); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span>    <?php echo e($licence); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                                                <?php if($item['item']->future_update == 1): ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> <?php echo e(Helper::translation(3069,$translate)); ?></li>
                                                <?php else: ?>
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> <?php echo e(Helper::translation(3069,$translate)); ?></li>
                                                <?php endif; ?>

                                                <?php if($item['item']->item_support == 1): ?>
                                                    <li><span class="lnr lnr-checkmark-circle right"></span> 12 months support from
                                                        <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item['item']->username); ?>">
                                                            <?php echo e($item['item']->username); ?>

                                                        </a>
                                                    </li>
                                                <?php else: ?>
                                                    <li><span class="lnr lnr-cross-circle wrong"></span> <?php echo e(Helper::translation(3070,$translate)); ?>

                                                        <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item['item']->username); ?>">
                                                            <?php echo e($item['item']->username); ?>

                                                        </a>

                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" value="<?php echo e(base64_encode($item_price)); ?>_regular" name="item_price" checked>
                                            <label for="opt1" data-price="<?php echo e($item['item']->free_download ? 'FREE' : $allsettings->site_currency.' '.$item_price); ?>">
                                                <span class="circle"></span><?php echo e(Helper::translation(3072,$translate)); ?>

                                            </label>
                                        </div>
                                    </li>

                                    <?php if($item['item']->extended_price != 0): ?>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="opt2" class="" value="<?php echo e(base64_encode($extend_item_price)); ?>_extended" name="item_price">
                                                <label for="opt2" data-price="<?php echo e($allsettings->site_currency.' '.$extend_item_price); ?>">
                                                    <span class="circle"></span><?php echo e(Helper::translation(3073,$translate)); ?>

                                                </label>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>

                                <div class="purchase-button">
                                    <?php if(Auth::guest()): ?>
                                        <a href="javascript:void(0);" class="btn btn--md theme-button cart-btn btn-block" onClick="alert('Login user only');">
                                            <span class="lnr lnr-cart"></span> <?php echo e(Helper::translation(3074,$translate)); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if(Auth::check()): ?>
                                        <?php if($item['item']->user_id == Auth::user()->id): ?>
                                            <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($item['item']->item_token); ?>" class="btn btn--md theme-button btn-block"><?php echo e(Helper::translation(2935,$translate)); ?></a>
                                        <?php else: ?>
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <input type="hidden" name="item_id" value="<?php echo e($item['item']->item_id); ?>">
                                            <input type="hidden" name="item_name" value="<?php echo e($item['item']->item_name); ?>">
                                            <input type="hidden" name="item_user_id" value="<?php echo e($item['item']->user_id); ?>">
                                            <input type="hidden" name="item_token" value="<?php echo e($item['item']->item_token); ?>">
                                            <?php if($checkif_purchased == 0): ?>
                                                <?php if(Auth::user()->id != 1): ?>
                                                    <button type="submit" class="btn btn--md theme-button cart-btn btn-block"><span class="lnr lnr-cart"></span> <?php echo e(Helper::translation(3074,$translate)); ?></button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end sidebar card -->


                    <?php if($item['item']->free_download == 1): ?>
                        <div class="author-card sidebar-card freefile">
                            <p><?php echo e(Helper::translation(3065,$translate)); ?> <strong><?php echo e(Helper::translation(3040,$translate)); ?></strong>. <?php echo e(Helper::translation(3066,$translate)); ?></p>
                            <div align="center">
                                <?php if(Auth::guest()): ?>
                                    <a href="<?php echo e(URL::to('/login')); ?>" class="btn btn--md theme-button"> <i class="fa fa-download"></i> <?php echo e(Helper::translation(3067,$translate)); ?> (<?php echo e($item['item']->download_count); ?>)</a>
                                <?php else: ?>
                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e(base64_encode($item['item']->item_token)); ?>" class="btn btn--md theme-button" download> <i class="fa fa-download"></i> <?php echo e(Helper::translation(3067,$translate)); ?> (<?php echo e($item['item']->download_count); ?>)</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if($item['item']->item_featured == 'yes'): ?>
                        <div class="sidebar-card card--metadata flex-column-center">
                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>" border="0" class="single-badges mb-2" title="Featured Item">
                            <span><?php echo e(Helper::translation(3075,$translate)); ?> <?php echo e($allsettings->site_title); ?></span>
                        </div>
                    <?php endif; ?>


                    <div class="author-card sidebar-card ">
                        <div class="author-infos">
                            <div class="author-avatar-bg"></div>

                            <div class="author_avatar">
                                <?php if($item['item']->user_photo != ''): ?>
                                    <img
                                        src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item['item']->user_photo); ?>"
                                        alt="<?php echo e($item['item']->name); ?>"
                                        width="100"
                                        height="100"
                                    >
                                <?php else: ?>
                                    <img
                                        src="<?php echo e(url('/')); ?>/public/img/no-user.png"
                                        alt="<?php echo e($item['item']->name); ?>"
                                        width="100"
                                        height="100"
                                    >
                                <?php endif; ?>
                            </div>

                            <div class="author">
                                <h4><?php echo e($item['item']->username); ?></h4>
                                <?php echo e(Helper::translation(3077,$translate)); ?> <?php echo e(date("F Y", strtotime($item['item']->created_at))); ?>


                                <?php if($item['item']->user_type == 'vendor' || $item['item']->user_type == 'customer'): ?>
                                    <?php if($item['item']->country_badge == 1 || $item['item']->country != ''): ?>
                                        <div>From <?php echo e($country['view']->country_name); ?></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <!-- start badges section -->
                            <div class="social social--color--filled">
                                <ul>
                                    <?php if($item['item']->country_badge == 1): ?>
                                        <?php if($country['view']->country_badges != ""): ?>
                                            <li>
                                                <img
                                                    src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($country['view']->country_badges); ?>"
                                                    border="0"
                                                    class="profile-icon-badge"
                                                    title="Located in <?php echo e($country['view']->country_name); ?>"
                                                >
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($item['item']->exclusive_author == 1): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->exclusive_author_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Exclusive Author: Sells items exclusively on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($trends != 0): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->trends_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Trendsetter: Had an item that was trending"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($item['item']->item_featured == 'yes'): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Featured Item: Had an item featured on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($item['item']->free_download == 1): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->free_item_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Free Item : Contributed a free file of this item"
                                            >
                                        </li>
                                    <?php endif; ?>

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
                                            src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->$yearIcon); ?>"
                                            border="0"
                                            class="other-badges"
                                            title="<?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> years"
                                        >
                                    </li>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_one_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 1: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_one); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_two && $badges['setting']->author_sold_level_three > $sold_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_two_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 2: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_two); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_three && $badges['setting']->author_sold_level_four > $sold_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->	author_sold_level_three_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 3: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_three); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_four && $badges['setting']->author_sold_level_five > $sold_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_four_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Author Level 4: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_four); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_five && $badges['setting']->author_sold_level_six > $sold_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_five_icon); ?>"
                                                border="0" class="profile-icon-badge"
                                                title="Author Level 5: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_five); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_six_icon); ?>"
                                                border="0" class="profile-icon-badge"
                                                title="Author Level 6: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"
                                                border="0" class="profile-icon-badge"
                                                title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_one_icon); ?>"
                                                border="0" class="profile-icon-badge"
                                                title="Collector Level 1: Has collected <?php echo e($badges['setting']->author_collect_level_one); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_two_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 2: Has collected <?php echo e($badges['setting']->author_collect_level_two); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_three_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 3: Has collected <?php echo e($badges['setting']->author_collect_level_three); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_four_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 4: Has collected <?php echo e($badges['setting']->author_collect_level_four); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_five_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 5: Has collected <?php echo e($badges['setting']->author_collect_level_five); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($collect_amount >= $badges['setting']->author_collect_level_six): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_six_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Collector Level 6: Has collected <?php echo e($badges['setting']->author_collect_level_six); ?>+ items on <?php echo e($allsettings->site_title); ?>"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_one_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 1: Has referred <?php echo e($badges['setting']->author_referral_level_one); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_two_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 2: Has referred <?php echo e($badges['setting']->author_referral_level_two); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_three_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 3: Has referred <?php echo e($badges['setting']->author_referral_level_three); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_four_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 4: Has referred <?php echo e($badges['setting']->author_referral_level_four); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_five_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 5: Has referred <?php echo e($badges['setting']->author_referral_level_five); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                    <?php if($referral_count >= $badges['setting']->author_referral_level_six): ?>
                                        <li>
                                            <img
                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_six_icon); ?>"
                                                border="0"
                                                class="profile-icon-badge"
                                                title="Affiliate Level 6: Has referred <?php echo e($badges['setting']->author_referral_level_six); ?>+ members"
                                            >
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <!-- end badges section -->

                            <div class="author-btn col-sm-12">
                                <a href="<?php echo e(url('/user')); ?>/<?php echo e($item['item']->username); ?>" class="btn btn-block btn-md theme-button text-white">
                                    <?php echo e(Helper::translation(3078,$translate)); ?>

                                </a>
                            </div>
                        </div>
                    </div>


                    <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                        <div class="sidebar-card card--metadata flex-column-center">
                            <img
                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>"
                                border="0"
                                class="single-badges mb-3"
                                title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>"
                            >
                            <span><?php echo e($badges['setting']->author_sold_level_six_label); ?></span>
                        </div>
                    <?php endif; ?>


                    <?php echo $__env->make('./components/newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="sidebar-card">
                        <p class="data-label"><?php echo e(Helper::translation(2974,$translate)); ?></p>
                        <p class="info mb-0">
                            <?php $__currentLoopData = $item_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('/tag')); ?>/item/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>" class="item-tags item-custom-tags"><?php echo e($tags); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    </div>

                    <div class="sidebar-card card--product-infos">

                        <ul class="infos">

                            <li>
                                <p class="data-label"><?php echo e(Helper::translation(3084,$translate)); ?></p>
                                <p class="info"><?php echo e($category_name); ?></p>
                            </li>
                            <li>
                                <p class="data-label"><?php echo e(Helper::translation(2937,$translate)); ?></p>
                                <p class="info"><?php echo e(str_replace('-',' ',$item['item']->item_type)); ?></p>
                            </li>

                            <?php if(count($viewattribute['details']) != 0): ?>
                                <?php $__currentLoopData = $viewattribute['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <p class="data-label"><?php echo e($view_attribute->item_attribute_label); ?></p>
                                        <p class="info"><?php echo e($view_attribute->item_attribute_values); ?></p>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
                    <h1><?php echo e(Helper::translation(3087,$translate)); ?>

                        <span class="highlighted">by <?php echo e($item['item']->username); ?></span>
                    </h1>
                </div>
            </div>

            <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make("./components/item_card", [
                    "item" => $item
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<!-- end more products area -->

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php else: ?>
    <?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/gotemplate/public_html/resources/views/item.blade.php ENDPATH**/ ?>