<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(Helper::translation(2932,$translate)); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload dashboard-edit">
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Auth::user()->user_type == 'vendor'): ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/manage-item", "text" => 2932)],
        "headline" => 2932
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="dashboard-area pt-0">
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="dashboard_contents">
            <div class="container">
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
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 text-right mb-3">
                        <button onClick="myFunction()" class="btn btn--sm theme-button dropbtn">
                            <i class="lnr lnr-plus-circle"></i> <?php echo e(Helper::translation(2931,$translate)); ?>

                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <?php $__currentLoopData = $viewitem['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $encrypted = $encrypter->encrypt($item_type->item_type_id); ?>
                            <a href="<?php echo e(URL::to('/upload-item')); ?>/<?php echo e($encrypted); ?>"><?php echo e($item_type->item_type_name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="row" id="listShow">

                    <!-- start .col-md-4 -->
                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 li-item">

                        <?php if($item->item_status == 0): ?>
                        <div class="ribbon">
                            <span><?php echo e(Helper::translation(3092,$translate)); ?></span>
                        </div>
                        <?php endif; ?>

                        <div class="product product--card">

                            <div class="product__thumbnail">

                                <?php if($item->item_preview!=''): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>" class="item-thumbnail">
                                <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>" class="item-thumbnail">
                                <?php endif; ?>

                                <div class="prod_option">
                                    <a href="javascript:void(0);" id="drop1" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="lnr lnr-cog setting-icon"></span>
                                    </a>

                                    <?php $encrypted = $encrypter->encrypt($item->item_token); ?>

                                    <div class="options dropdown-menu" aria-labelledby="drop1">
                                        <ul>
                                            <li>
                                                <a href="<?php echo e(URL::to('/edit-item')); ?>/<?php echo e($item->item_token); ?>">
                                                    <span class="lnr lnr-pencil"></span><?php echo e(Helper::translation(2923,$translate)); ?>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?php echo e(URL::to('/manage-item')); ?>/<?php echo e($encrypted); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate)); ?>');">
                                                    <span class="lnr lnr-trash"></span><?php echo e(Helper::translation(2924,$translate)); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="product-desc">
                                <?php if($item->item_status == 1): ?>
                                <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" class="product_title ellipsis">
                                <?php else: ?>
                                <span class="product_title ellipsis">
                                <?php endif; ?>

                                <h4><?php echo e($item->item_name); ?></h4>

                                <?php if($item->item_status == 1): ?></a><?php else: ?></span><?php endif; ?>
                                <ul class="titlebtm">
                                    <li>
                                        <?php if($item->user_photo!=''): ?>
                                        <img  src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item->user_photo); ?>" alt="<?php echo e($item->username); ?>" class="auth-img">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($item->username); ?>" class="auth-img">
                                        <?php endif; ?>

                                        <p>
                                            <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item->username); ?>"><?php echo e($item->username); ?></a>
                                        </p>
                                    </li>

                                    <li class="product_cat">
                                        <a href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>" class="theme-color">
                                            <span class="lnr lnr-book"></span><?php echo e(str_replace('-',' ',$item->item_type)); ?>

                                        </a>
                                    </li>
                                </ul>

                                <p><?php echo e(substr($item->item_shortdesc,0,120).'...'); ?></p>
                            </div>


                            <div class="product-purchase">
                                <div class="price_love">
                                    <?php if($item->free_download == 1): ?>
                                    <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                    <?php else: ?>
                                    <span><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                    <?php endif; ?>
                                    <p><span class="lnr lnr-heart"></span> <?php echo e($item->item_liked); ?></p>
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
                                        <span><?php echo e($item->item_sold); ?></span>
                                    </p>
                                </div>
                            </div>
                            <!-- end /.product-purchase -->
                        </div>
                        <!-- end /.single-product -->
                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php else: ?>
    <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/manage-item.blade.php ENDPATH**/ ?>