<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3016,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload term-condition-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="hero-area bgimage d-flex flex-center">
        <div class="bg_image_holder">
            <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>" alt="<?php echo e($allsettings->site_title); ?>">
        </div>
        <div class="bg-overlay"></div>

        <div class="container content_above">
            <div class="row jplist-panel">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3><?php echo e(Helper::translation(3016,$translate)); ?></h3>
                            <h4 class="mt-3 pt-3 text--white"><?php echo e(Helper::translation(3017,$translate)); ?></h4>
                        </div>
                        <div class="countdown-timer">
                            <ul id="example">
                                <li class="pt-2 pb-1 mb-2"><span class="days">00</span><div><?php echo e(Helper::translation(2995,$translate)); ?></div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="hours">00</span><div><?php echo e(Helper::translation(2996,$translate)); ?></div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span><div><?php echo e(Helper::translation(2997,$translate)); ?></div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span><div><?php echo e(Helper::translation(2998,$translate)); ?></div></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row items">

                        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make("./components/item_card", [
                                "item" => $item,
                                "isFreeItem" => true
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>


    <?php echo $__env->make('video_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php if(!empty($allsettings->site_free_end_date)): ?>
	<script type="text/javascript">
            $('#example').countdown({
                date: '<?php echo e(date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date))); ?>',
                offset: -8,
                day: 'Day',
                days: 'Days'
            }, function () {

            });
    </script>
    <?php endif; ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/gotemplate/public_html/resources/views/free-items.blade.php ENDPATH**/ ?>