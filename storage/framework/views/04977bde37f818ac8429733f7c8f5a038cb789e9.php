<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if(Auth::user()->user_type == 'vendor'): ?> <?php echo e(Helper::translation(2865,$translate)); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<body class="preload dashboard-upload">
    
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Auth::user()->user_type == 'vendor'): ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/add-coupon", "text" => 2865)],
        "headline" => 2865
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    
    <section class="dashboard-area pt-0">
        
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end /.dashboard_menu_area -->

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
               
                <form action="<?php echo e(route('add-coupon')); ?>" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
                 <?php echo e(csrf_field()); ?>

                
                   <div class="upload_modules">
                    <div class="modules__content">
                    <div class="row">
                  <div class="col-md-12">
            
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname"><?php echo e(Helper::translation(2866,$translate)); ?> <sup>*</sup></label>
                        <input id="coupon_code" name="coupon_code" type="text" class="text_field" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname"><?php echo e(Helper::translation(2867,$translate)); ?> <sup>*</sup></label>
                        <input id="coupon_value" name="coupon_value" type="text" class="text_field" data-bvalidator="required,min[1]">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1"><?php echo e(Helper::translation(2868,$translate)); ?> <sup>*</sup></label>
                        <input id="coupon_start_date" name="coupon_start_date" type="text" class="text_field" autocomplete="off" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2"><?php echo e(Helper::translation(2869,$translate)); ?> <sup>*</sup></label>
                        <input id="coupon_end_date" name="coupon_end_date" type="text" class="text_field" autocomplete="off" data-bvalidator="required">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity"><?php echo e(Helper::translation(2870,$translate)); ?> <sup>*</sup></label>
                        <div class="select-wrap select-wrap2">
                        <select name="discount_type" class="text_field" data-bvalidator="required">
                         <option value=""></option>
                         <option value="percentage"><?php echo e(Helper::translation(2871,$translate)); ?></option>
                         <option value="fixed"><?php echo e(Helper::translation(2872,$translate)); ?></option>
                         </select>
                         <span class="lnr lnr-chevron-down"></span>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState"><?php echo e(Helper::translation(2873,$translate)); ?> <sup>*</sup></label>
                        <div class="select-wrap select-wrap2">
                        <select name="coupon_status" class="text_field" data-bvalidator="required">
                        <option value=""></option>
                         <option value="1"><?php echo e(Helper::translation(2874,$translate)); ?></option>
                         <option value="0"><?php echo e(Helper::translation(2875,$translate)); ?></option>
                         </select>
                         <span class="lnr lnr-chevron-down"></span>
                         </div>
                    </div>
                    
                </div>
                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                <button type="submit" class="btn btn--default theme-button"><?php echo e(Helper::translation(2876,$translate)); ?></button>
            
            </div>
          </div>
                                
                                <!-- end /.modules__content -->
                            </div>
                             
                        
                    </div>
                    
                    
               
                
                </form>
               
                <!-- end /.row -->
           </div>
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
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/add-coupon.blade.php ENDPATH**/ ?>