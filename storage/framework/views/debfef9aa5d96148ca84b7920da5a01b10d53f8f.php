<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(Helper::translation(2930,$translate)); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload dashboard-statement">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Auth::user()->user_type == 'vendor'): ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/sales", "text" => 2930)],
        "headline" => 2930
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="dashboard-area pt-0">
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end /.dashboard_menu_area :) -->

        <div class="dashboard_contents dashboard_statement_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-tag icon mcolorbg1"></span>
                                <div class="info">
                                    <p><?php echo e($total_sale); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    <span><?php echo e(Helper::translation(3039,$translate)); ?></span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-cart icon mcolorbg2"></span>
                                <div class="info">
                                    <p><?php echo e($purchase_sale); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    <span><?php echo e(Helper::translation(3169,$translate)); ?></span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-dice icon mcolorbg3"></span>
                                <div class="info">
                                    <p><?php echo e($credit_amount); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    <span><?php echo e(Helper::translation(3170,$translate)); ?></span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-briefcase icon mcolorbg4"></span>
                                <div class="info">
                                    <p><?php echo e($drawal_amount); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    <span><?php echo e(Helper::translation(3171,$translate)); ?></span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->
                </div>
                <!-- end /.row -->

                <!--<span class="sale">Sale</span>
                <span class="purchase">Purchase</span>
                <span class="credited">Credited</span>
                <span class="withdrawal">Withdraw</span>-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(Helper::translation(3172,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(3173,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(3174,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(3175,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2888,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(3106,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2922,$translate)); ?></th>
                                    </tr>
                                </thead>

                                <tbody id="listShow">
                                <?php $__currentLoopData = $orderData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="li-item">
                                        <td><?php echo e(date("d F Y", strtotime($item->payment_date))); ?></td>

                                        <td class="author"><?php echo e($item->purchase_token); ?></td>
                                        <td class="detail">
                                            <?php echo e($item->payment_token); ?>

                                        </td>
                                        <td class="type">
                                            <?php echo e($item->payment_type); ?>

                                        </td>
                                        <td><?php echo e($item->total); ?> <?php echo e($allsettings->site_currency); ?></td>
                                        <td class="earning theme-color"><?php echo e($item->vendor_amount); ?> <?php echo e($allsettings->site_currency); ?></td>
                                        <td>
                                            <a href="<?php echo e(URL::to('/sales')); ?>/<?php echo e($item->purchase_token); ?>" class="btn btn--sm theme-button"><?php echo e(Helper::translation(3177,$translate)); ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </tbody>
                            </table>

                           <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>

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
    <!--================================
            END DASHBOARD AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/sales.blade.php ENDPATH**/ ?>