<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e($page['page']->page_title); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload term-condition-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [
            array(
                "path" => "/page/".$page['page']->page_id."/".$page['page']->page_slug, 
                "text" => $page['page']->page_title
            )
        ],
        "headline" => $page["page"]->page_title
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cardify term_modules">
                        <div class="term">
                            <div class="term__title">
                                <h4><?php echo e($page['page']->page_title); ?></h4>
                            </div>
                            <div class="content">
                            <?php echo html_entity_decode($page['page']->page_desc); ?>

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
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/page.blade.php ENDPATH**/ ?>