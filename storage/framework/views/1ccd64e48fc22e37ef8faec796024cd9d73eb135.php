<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3024,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload dashboard-purchase">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/purchases", "text" => 3024)],
        "headline" => 3024
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

                <div class="product_archive">
                    <div class="title_area">
                        <div class="row">
                            <div class="col-md-5">
                                <h4><?php echo e(Helper::translation(3053,$translate)); ?></h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="add_info"><?php echo e(Helper::translation(3139,$translate)); ?></h4>
                            </div>
                            <div class="col-md-2">
                                <h4><?php echo e(Helper::translation(2888,$translate)); ?></h4>
                            </div>
                            <div class="col-md-2">
                                <h4><?php echo e(Helper::translation(3140,$translate)); ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    <?php $__currentLoopData = $orderData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12">
                            <div class="single_product clearfix">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="product__description">
                                            <a href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>">
                                            <?php if($item->item_thumbnail!=''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_thumbnail); ?>" alt="<?php echo e($item->item_name); ?>" class="cart-thumb">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>" class="cart-thumb">
                                            <?php endif; ?>
                                            </a>
                                            <div class="short_desc">
                                            <a href="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>">
                                                <h4><?php echo e($item->item_name); ?></h4>
                                              </a>
                                            </div>
                                        </div>
                                        <!-- end /.product__description -->
                                    </div>
                                    <!-- end /.col-md-5 -->

                                    <div class="col-lg-3 col-md-3 col-6 xs-fullwidth">
                                        <div class="product__additional_info">
                                            <ul>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(__('Order Id :')); ?> </span> #<?php echo e($item->ord_id); ?></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(__('Purchase Id :')); ?> </span> <?php echo e($item->purchase_token); ?></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(Helper::translation(3102,$translate)); ?>: </span> <?php echo e(date("d F Y", strtotime($item->start_date))); ?></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(Helper::translation(3103,$translate)); ?>: </span> <?php echo e(date("d F Y", strtotime($item->end_date))); ?></p>
                                                </li>
                                                <li class="license theme-color">
                                                    <p>
                                                        <span><?php echo e(Helper::translation(3105,$translate)); ?>:</span> <?php echo e($item->license); ?></p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(Helper::translation(3142,$translate)); ?>:</span> <?php echo e($item->username); ?></p>
                                                </li>
                                                <?php if($item->approval_status != 'payment released to buyer'): ?>
                                                <li>
                                                    <p>
                                                        <span><?php echo e(Helper::translation(3143,$translate)); ?>:</span> <a href="javascript:void(0);" data-toggle="modal" data-target="#refund_<?php echo e($item->ord_id); ?>"> Send Request</a></p>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <!-- end /.product__additional_info -->
                                    </div>
                                    <!-- end /.col-md-3 -->

                                    <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle">
                                                <span><?php echo e($item->item_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                            </div>
                                            <div class="item_action v_middle">
                                            <?php if($item->approval_status != 'payment released to buyer'): ?>
                                            <?php if($item->approval_status == 'payment released to vendor'): ?>
                                                <a href="<?php echo e(url('/purchases')); ?>/<?php echo e($item->item_token); ?>" class="btn btn--md theme-button"><?php echo e(Helper::translation(3144,$translate)); ?></a><a href="<?php echo e(url('/invoice')); ?>/<?php echo e($item->item_token); ?>/<?php echo e($item->ord_id); ?>" class="btn btn-danger btn--md"><i class="dwg-download mr-1"></i><?php echo e(__('Invoice')); ?></a>

                                                <?php if($item->rating != 0): ?>
                                                <a href="javascript:void(0);" class="btn btn--md btn--round btn--white rating--btn" data-toggle="modal" data-target="#myModal_<?php echo e($item->ord_id); ?>">
                                                    <div class="rating product--rating">
                                                        <ul>
                                                            <?php if($item->rating == 1): ?>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if($item->rating == 2): ?>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if($item->rating == 3): ?>
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
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if($item->rating == 4): ?>
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
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <?php endif; ?>
                                                             <?php if($item->rating == 5): ?>
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
                                                                <span class="fa fa-star"></span>
                                                            </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </a>
                                                <?php else: ?>
                                                <a href="javascript:void(0);" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal_<?php echo e($item->ord_id); ?>">
                                                    <P class="rate_it"><?php echo e(Helper::translation(3145,$translate)); ?></P>
                                                    <div class="rating product--rating">
                                                        <ul>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <span id="card-errors"><?php echo e(Helper::translation(4812,$translate)); ?></span>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <span id="card-errors"><?php echo e($item->approval_status); ?></span>
                                                <?php endif; ?>

                                                <!-- end /.rating_btn -->
                                            </div>
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    <!-- end /.col-md-4 -->
                                </div>
                            </div>
                            <!-- end /.single_product -->
                        </div>

       <div class="modal fade rating_modal" id="refund_<?php echo e($item->ord_id); ?>" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal"><?php echo e(Helper::translation(3143,$translate)); ?></h3>
                    <h4><?php echo e($item->item_name); ?></h4>

                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <form action="<?php echo e(route('refund')); ?>" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="item_id" value="<?php echo e($item->item_id); ?>">
                    <input type="hidden" name="ord_id" value="<?php echo e($item->ord_id); ?>">
                    <input type="hidden" name="purchased_token" value="<?php echo e($item->purchase_token); ?>">
                    <input type="hidden" name="item_token" value="<?php echo e($item->item_token); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" name="item_user_id" value="<?php echo e($item->item_user_id); ?>">
                    <input type="hidden" name="item_url" value="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>">
                        <ul>

                            <li>
                                <p><?php echo e(Helper::translation(3146,$translate)); ?></p>
                                <div class="right_content">
                                    <div class="select-wrap">
                                        <select name="refund_reason">
                                            <option value="<?php echo e(Helper::translation(3147,$translate)); ?>"><?php echo e(Helper::translation(3147,$translate)); ?></option>
                                            <option value="<?php echo e(Helper::translation(3148,$translate)); ?>"><?php echo e(Helper::translation(3148,$translate)); ?></option>
                                            <option value="<?php echo e(Helper::translation(3149,$translate)); ?>"><?php echo e(Helper::translation(3149,$translate)); ?></option>
                                            <option value="<?php echo e(Helper::translation(3150,$translate)); ?>"><?php echo e(Helper::translation(3150,$translate)); ?></option>
                                            <option value="<?php echo e(Helper::translation(3151,$translate)); ?>"><?php echo e(Helper::translation(3151,$translate)); ?></option>
                                        </select>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="rating_field">
                            <label for="rating_field"><?php echo e(Helper::translation(3054,$translate)); ?></label>
                            <textarea name="refund_comment" id="refund_comment" class="text_field" required="required"></textarea>

                        </div>
                        <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3152,$translate)); ?></button>

                    </form>
                    <!-- end /.form -->
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>



       <div class="modal fade rating_modal" id="myModal_<?php echo e($item->ord_id); ?>" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal"><?php echo e(Helper::translation(3153,$translate)); ?></h3>
                    <h4><?php echo e($item->item_name); ?></h4>
                    <p>by
                        <?php echo e($item->username); ?>

                    </p>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <form action="<?php echo e(route('purchases')); ?>" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="item_id" value="<?php echo e($item->item_id); ?>">
                    <input type="hidden" name="ord_id" value="<?php echo e($item->ord_id); ?>">
                    <input type="hidden" name="item_token" value="<?php echo e($item->item_token); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($item->user_id); ?>">
                    <input type="hidden" name="item_user_id" value="<?php echo e($item->item_user_id); ?>">
                    <input type="hidden" name="item_url" value="<?php echo e(url('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>">
                        <ul>
                            <li>
                                <p><?php echo e(Helper::translation(3154,$translate)); ?></p>
                                <div class="right_content btn btn--round btn--white btn--md">
                                    <select name="rating" class="give_rating">
                                        <option value="1" <?php if($item->rating == 1): ?> selected <?php endif; ?>>1</option>
                                        <option value="2" <?php if($item->rating == 2): ?> selected <?php endif; ?>>2</option>
                                        <option value="3" <?php if($item->rating == 3): ?> selected <?php endif; ?>>3</option>
                                        <option value="4" <?php if($item->rating == 4): ?> selected <?php endif; ?>>4</option>
                                        <option value="5" <?php if($item->rating == 5): ?> selected <?php endif; ?>>5</option>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <p><?php echo e(Helper::translation(3155,$translate)); ?></p>
                                <div class="right_content">
                                    <div class="select-wrap">
                                        <select name="rating_reason">
                                            <option value="design" <?php if($item->rating_reason == 'design'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3156,$translate)); ?></option>
                                            <option value="customization" <?php if($item->rating_reason == 'customization'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3157,$translate)); ?></option>
                                            <option value="support" <?php if($item->rating_reason == 'support'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3055,$translate)); ?></option>
                                            <option value="performance" <?php if($item->rating_reason == 'performance'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3158,$translate)); ?></option>
                                            <option value="documentation" <?php if($item->rating_reason == 'documentation'): ?> selected <?php endif; ?>><?php echo e(Helper::translation(3159,$translate)); ?></option>
                                        </select>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="rating_field">
                            <label for="rating_field"><?php echo e(Helper::translation(3054,$translate)); ?></label>
                            <textarea name="rating_comment" id="rating_comment" class="text_field" required="required"><?php echo e($item->rating_comment); ?></textarea>
                            <p class="notice"><?php echo e(Helper::translation(3160,$translate)); ?> </p>
                        </div>
                        <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3161,$translate)); ?></button>

                    </form>
                    <!-- end /.form -->
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>


                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                        <div class="col-md-12">
                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">

                                </nav>
                            </div>
                            <!-- end /.pagination-area -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.product_archive2 -->
            </div>
            <!-- end /.container -->
        </div>

        </div>
        <!-- end /.dashboard_menu_area -->
    </section>

   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/purchases.blade.php ENDPATH**/ ?>