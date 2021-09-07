<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3097,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload invoice-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/sales", "text" => 2930)],
        "headline" => 3097
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <section class="dashboard-area pt-0">
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3><?php echo e(Helper::translation(3097,$translate)); ?></h3>
                                </div>
                            </div>

                            <div class="pull-right">
                                
                                <a href="javascript:void(0);" class="btn btn--round btn--sm theme-button" onClick="window.print()"><?php echo e(Helper::translation(3098,$translate)); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="invoice__head">
                                <div class="invoice_logo">
                                    <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="">
                                </div>

                                <div class="info">
                                    <h4><?php echo e(Helper::translation(3099,$translate)); ?></h4>
                                    <p><?php echo e(Helper::translation(3100,$translate)); ?> #<?php echo e($checkout['view']->purchase_token); ?></p>
                                </div>
                            </div>
                            <!-- end /.invoice__head -->

                            <div class="invoice__meta">
                                <div class="address">
                                    <h5 class="bold"><?php echo e($checkout['view']->order_firstname); ?> <?php echo e($checkout['view']->order_lastname); ?></h5>
                                    <p><?php echo e($checkout['view']->order_address); ?></p>
                                    <p><?php echo e($checkout['view']->order_city); ?>, <?php echo e($checkout['view']->order_zipcode); ?></p>
                                    <p><?php echo e($checkout['view']->order_country); ?></p>
                                </div>

                                <div class="date_info">
                                    <p>
                                        <span><?php echo e(Helper::translation(3101,$translate)); ?></span><?php echo e(date("d F Y", strtotime($checkout['view']->payment_date))); ?></p>
                                    
                                    <p class="status">
                                        <span><?php echo e(Helper::translation(2873,$translate)); ?></span><?php echo e($checkout['view']->payment_status); ?></p>
                                </div>
                            </div>
                            <!-- end /.invoice__meta -->

                            <div class="invoice__detail">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(Helper::translation(3102,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(3103,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(3042,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(3104,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(3105,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(2888,$translate)); ?></th>
                                                <th><?php echo e(Helper::translation(3106,$translate)); ?></th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                        <?php $earn = 0; ?>
                                        <?php $__currentLoopData = $order['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(date("d F Y", strtotime($order->start_date))); ?></td>
                                                <td><?php echo e(date("d F Y", strtotime($order->end_date))); ?></td>
                                                <td><a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($order->username); ?>" class="theme-color"><?php echo e($order->username); ?></a></td>
                                                <td class="detail">
                                                    <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($order->item_slug); ?>/<?php echo e($order->item_id); ?>" class="theme-color"><?php echo e($order->item_name); ?></a>
                                                </td>
                                                <td><?php echo e($order->payment_type); ?></td>
                                                <td><?php echo e($order->item_price); ?> <?php echo e($allsettings->site_currency); ?></td>
                                                <td><?php echo e($order->vendor_amount); ?> <?php echo e($allsettings->site_currency); ?></td>
                                            </tr>
                                            <?php $earn += $order->vendor_amount; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                            
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pricing_info">
                                    <p><?php echo e(Helper::translation(3107,$translate)); ?> : <?php echo e($earn); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    <p class="bold"><?php echo e(Helper::translation(2896,$translate)); ?> : <?php echo e($earn); ?> <?php echo e($allsettings->site_currency); ?></p>
                                </div>
                            </div>
                            <!-- end /.invoice_detail -->
                        </div>
                        <!-- end /.invoice -->


                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/order-details.blade.php ENDPATH**/ ?>