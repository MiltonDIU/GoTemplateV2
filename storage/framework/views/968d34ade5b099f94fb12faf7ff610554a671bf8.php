<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(Helper::translation(2919,$translate)); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="preload dashboard-statement">
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Auth::user()->user_type == 'vendor'): ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/coupon", "text" => 2919)],
        "headline" => 2919
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="dashboard-area">
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end /.dashboard_menu_area :) -->

        <div class="dashboard_contents dashboard_statement_area">
            <div class="container">
                 <div class="row">
                 <div class="col-lg-12 col-md-12 text-right">
                 <a href="<?php echo e(URL::to('/add-coupon')); ?>" class="btn btn--sm theme-button"><?php echo e(Helper::translation(2865,$translate)); ?></a>
                 </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(Helper::translation(2920,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2866,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2921,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2867,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2873,$translate)); ?></th>
                                        <th><?php echo e(Helper::translation(2922,$translate)); ?></th>
                                    </tr>
                                </thead>

                                <tbody id="listShow">
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $couponData['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="li-item">
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($coupon->coupon_code); ?> </td>
                                            <td><?php echo e($coupon->discount_type); ?></td>
                                            <td><?php if($coupon->discount_type == 'fixed'): ?><?php echo e($allsettings->site_currency); ?> <?php endif; ?><?php echo e($coupon->coupon_value); ?><?php if($coupon->discount_type == 'percentage'): ?>%<?php endif; ?> </td>
                                            <td><?php if($coupon->coupon_status == 1): ?> <span class="active-class"><?php echo e(Helper::translation(2874,$translate)); ?></span> <?php else: ?> <span class="inactive-class"><?php echo e(Helper::translation(2875,$translate)); ?></span> <?php endif; ?></td>
                                            <td>
                                            <a href="<?php echo e(URL::to('/edit-coupon')); ?>/<?php echo e(base64_encode($coupon->coupon_id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(Helper::translation(2923,$translate)); ?></a>
                                            <?php if($demo_mode == 'on'): ?>
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate)); ?></a>
                                            <?php else: ?>
                                            <a href="<?php echo e(URL::to('/coupon')); ?>/<?php echo e(base64_encode($coupon->coupon_id)); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(Helper::translation(2925,$translate)); ?>');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(Helper::translation(2924,$translate)); ?></a>
                                             <?php endif; ?>
                                             </td>
                                        </tr>
                                        <?php $no++; ?>
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
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/coupon.blade.php ENDPATH**/ ?>