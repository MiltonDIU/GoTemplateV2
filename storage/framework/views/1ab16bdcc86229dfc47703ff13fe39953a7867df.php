<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3093,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload term-condition-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("text" => 3093)],
        "headline" => 3093
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="term">
                            
                            <div class="content">
                            <?php if($message = Session::get('success')): ?>
                            <div align="center"><h4><?php echo e($message); ?></h4></div>
                            <?php endif; ?>
                            <?php if($message = Session::get('error')): ?>
                            <div align="center"><h4><?php echo e($message); ?></h4></div>
                            <?php endif; ?>
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
    
    
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/newsletter.blade.php ENDPATH**/ ?>