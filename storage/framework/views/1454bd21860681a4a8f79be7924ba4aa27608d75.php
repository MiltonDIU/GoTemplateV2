<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(2899,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload checkout-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/checkout", "text" => 2899)],
        "headline" => 2899
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($cart_count != 0): ?>
        <section class="dashboard-area">
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

            <form action="<?php echo e(route('checkout')); ?>" class="setting_form" id="checkout_form" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="order_firstname" value="<?php echo e(Auth::user()->name); ?>">
                    <input type="hidden" name="order_email" value="<?php echo e(Auth::user()->email); ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="information_module order_summary">
                            <div class="toggle_title">
                                <h4><?php echo e(Helper::translation(2900,$translate)); ?></h4>
                            </div>
                            <?php if($cart_count != 0): ?>
                            <ul>
                                <?php
                                $subtotal = 0;
                                $order_id = '';
                                $item_price = '';
                                $item_userid = '';
                                $item_user_type = '';
                                $commission = 0;
                                $vendor_amount = 0;
                                $single_price = 0;
                                $coupon_code = "";
                                $new_price = 0;
                                ?>
                                <?php $__currentLoopData = $cart['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item">
                                    <a href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>/<?php echo e($cart->item_id); ?>" class="theme-color"><?php echo e($cart->item_name); ?></a>
                                    <span><?php echo e($cart->item_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                </li>

                                <?php
                                $subtotal += $cart->item_price;
                                $order_id .= $cart->ord_id.',';
                                $item_price .= $cart->item_price.',';
                                $item_userid .= $cart->item_user_id.',';
                                $item_user_type .= $cart->exclusive_author;
                                $amount_price = $subtotal;
                                $single_price = $cart->item_price;
                                if($cart->discount_price != 0)
                                    {
                                    $price = $cart->discount_price;
                                    $new_price += $cart->discount_price;
                                    $coupon_code = $cart->coupon_code;

                                    }
                                    else
                                    {
                                    $price = $cart->item_price;
                                    $new_price += $cart->item_price;
                                    $coupon_code = "";

                                    }

                                if($item_user_type == 1)
                                {
                                    $commission +=($price * $allsettings->site_exclusive_commission) / 100;

                                }
                                else
                                {
                                    $commission +=($price * $allsettings->site_non_exclusive_commission) / 100;

                                }

                                ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($allsettings->site_extra_fee != 0): ?>
                                <li>
                                    <p><?php echo e(Helper::translation(2901,$translate)); ?>:</p>
                                    <span><?php echo e($allsettings->site_extra_fee); ?> <?php echo e($allsettings->site_currency); ?></span>
                                </li>
                                <?php endif; ?>
                                <?php if($coupon_code != ""): ?>
                                <?php
                                $coupon_discount = $subtotal - $new_price;
                                $final = $new_price + $allsettings->site_extra_fee;
                                $last_price =  $new_price;
                                $priceamount = $new_price;
                                ?>
                                <li>
                                    <p><?php echo e(Helper::translation(2895,$translate)); ?>:<br/><span class="green"><?php echo e(Helper::translation(2866,$translate)); ?></span></p>
                                    <span class="green"> - <?php echo e($coupon_discount); ?> <?php echo e($allsettings->site_currency); ?></span>
                                </li>
                                <?php else: ?>
                                <?php
                                $final = $subtotal+$allsettings->site_extra_fee;
                                $last_price =  $subtotal;
                                $priceamount = $subtotal;
                                ?>
                                <?php endif; ?>
                                <li class="total_ammount">
                                    <p><?php echo e(Helper::translation(2896,$translate)); ?></p>
                                    <span><?php echo e($final); ?> <?php echo e($allsettings->site_currency); ?></span>
                                </li>
                            </ul>

                            <?php endif; ?>

                            <?php

                            $vendor_amount = $priceamount - $commission;
                            ?>

                        </div>
                        <input type="hidden" name="order_id" value="<?php echo e(rtrim($order_id,',')); ?>">
                        <input type="hidden" name="item_prices" value="<?php echo e(base64_encode(rtrim($item_price,','))); ?>">
                        <input type="hidden" name="item_user_id" value="<?php echo e(rtrim($item_userid,',')); ?>">
                        <input type="hidden" name="amount" value="<?php echo e(base64_encode($last_price)); ?>">
                        <input type="hidden" name="processing_fee" value="<?php echo e(base64_encode($allsettings->site_extra_fee)); ?>">
                        <input type="hidden" name="website_url" value="<?php echo e(url('/')); ?>">
                        <input type="hidden" name="admin_amount" value="<?php echo e(base64_encode($commission)); ?>">
                        <input type="hidden" name="vendor_amount" value="<?php echo e(base64_encode($vendor_amount)); ?>">
                        <input type="hidden" name="token" class="token">
                        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>">
                        <!-- end /.information_module-->


                        <!-- end /.information_module-->
                    </div>

                    <div class="col-lg-6">
                    <div class="information_module payment_options">
                            <div class="toggle_title">
                                <h4><?php echo e(Helper::translation(2902,$translate)); ?></h4>
                            </div>

                            <ul>
                                <?php $no = 1; ?>
                                <?php $__currentLoopData = $get_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li <?php if($payment == 'paystack'): ?> <?php if($allsettings->site_currency != 'NGN'): ?> style="display:none;" <?php endif; ?> <?php endif; ?>>
                                    <div class="custom-radio capital">
                                        <input type="radio" id="opt1-<?php echo e($payment); ?>"  value="<?php echo e($payment); ?>" <?php if($no == 1): ?> checked <?php endif; ?> name="payment_method" data-bvalidator="required">
                                        <label
                                            for="opt1-<?php echo e($payment); ?>"
                                                <?php if($payment == 'paystack'): ?>
                                                    <?php if($allsettings->site_currency != 'NGN'): ?>
                                                    style="display:none;"
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                        >
                                            <span class="circle"></span><?php echo e($payment); ?> <?php if($payment == 'wallet'): ?> (<?php echo e($allsettings->site_currency); ?> <?php echo e(Auth::user()->earnings); ?>) <?php endif; ?></label>
                                    </div>
                                    <?php if($payment == 'paypal'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/paypal.jpg" alt="<?php echo e($payment); ?>">
                                    <?php endif; ?>
                                    <?php if($payment == 'stripe'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/stripe.jpg" alt="<?php echo e($payment); ?>">
                                    <?php endif; ?>
                                    <?php if($payment == 'wallet'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/wallet.png" alt="<?php echo e($payment); ?>" height="50">
                                    <?php endif; ?>
                                    <?php if($payment == '2checkout'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/2checkout.png" alt="<?php echo e($payment); ?>" >
                                    <?php endif; ?>
                                    <?php if($payment == 'paystack'): ?>
                                    <?php if($allsettings->site_currency == 'NGN'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/paystack.png" alt="<?php echo e($payment); ?>" >
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($payment == 'localbank'): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/localbank.png" alt="<?php echo e($payment); ?>" >
                                    <?php endif; ?>
                                    <?php if($payment == 'stripe'): ?>
                                    <div class="stripebox" id="ifYes" style="display:none;">
                                    <label for="card-element"><?php echo e(Helper::translation(2903,$translate)); ?></label>
                                    <div id="card-element">

                                    </div>


                                    <div id="card-errors" role="alert"></div>
                                    </div>
                                    <?php endif; ?>
                                </li>
                                <?php $no++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>




                            <div class="payment_info modules__content">

                                <div class="row">
                                    <?php if($cart_count != 0): ?>
                                    <div class="col-md-6">
                                            <button type="submit" class="btn btn--default theme-button"><?php echo e(Helper::translation(2904,$translate)); ?></button>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-md-6">
                                            <a href="javascript:void(0);" class="btn btn--default theme-button" onClick="alert('<?php echo e(Helper::translation(2898,$translate)); ?>');"><?php echo e(Helper::translation(2904,$translate)); ?></a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end /.col-md-6 -->
                </div>
                <!-- end /.row -->
            </form>

                </div>
                <!-- end /.container -->
            </div>
            <!-- end /.dashboard_menu_area -->
        </section>
    <?php else: ?>
        <section class="dashboard-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cardify term_modules mb-5">
                            <div class="term">

                                <div class="text-center noresult">
                                <div class="pt-5"><?php echo e(Helper::translation(2898,$translate)); ?></div>
                                </div>
                            </div>

                            <!-- end /.term -->
                        </div>
                        <!-- end /.term_modules -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>
    <?php endif; ?>

  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/gotemplate/public_html/resources/views/checkout.blade.php ENDPATH**/ ?>