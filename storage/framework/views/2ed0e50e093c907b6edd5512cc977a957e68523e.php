<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Vendor</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">

                </div>
            </div>
        </div>

        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <?php echo e($error); ?>


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                       <form action="<?php echo e(route('admin.edit-vendor')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="card">



                           <div class="col-md-6">

                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">



                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name <span class="require">*</span></label>
                                                <input id="name" name="name" type="text" class="form-control" value="<?php echo e($edit['userdata']->name); ?>" required>
                                            </div>

                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">Username <span class="require">*</span></label>
                                                <input id="username" name="username" type="text" class="form-control" value="<?php echo e($edit['userdata']->username); ?>" required>
                                            </div>


                                                <div class="form-group">
                                                    <label for="email" class="control-label mb-1">Email <span class="require">*</span></label>
                                                    <input id="email" name="email" type="email" class="form-control" value="<?php echo e($edit['userdata']->email); ?>" required>

                                                </div>

                                                <input type="hidden" name="user_type" value="vendor">

                                                <div class="form-group">
                                                    <label for="password" class="control-label mb-1">Password</label>
                                                    <input id="password" name="password" type="text" class="form-control">

                                                </div>

                                                 <div class="form-group">
                                                    <label for="earnings" class="control-label mb-1">Earnings (<?php echo e($allsettings->site_currency); ?>)</label>
                                                    <input id="earnings" name="earnings" type="text" class="form-control" value="<?php echo e($edit['userdata']->earnings); ?>">

                                                </div>

                                        <div class="form-group">
                                            <label class="required">Manual Vendor Verification</label>
                                            <?php $__currentLoopData = Feberr\User::IS_MANUAL_VENDOR_RADIO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check <?php echo e($errors->has('verified') ? 'is-invalid' : ''); ?>">
                                                    <input class="form-check-input" type="radio" id="verified<?php echo e($key); ?>" name="verified" value="<?php echo e($key); ?>" <?php echo e($edit['userdata']->verified==(string) $key ? 'checked' : ''); ?> required>
                                                    <label class="form-check-label" for="verified<?php echo e($key); ?>"><?php echo e($label); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($errors->has('verified')): ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($errors->first('verified')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="required">Exclusive Author</label>
                                            <?php $__currentLoopData = Feberr\User::IS_ACTIVE_RADIO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check <?php echo e($errors->has('exclusive_author') ? 'is-invalid' : ''); ?>">
                                                    <input class="form-check-input" type="radio" id="exclusive_author<?php echo e($key); ?>" name="exclusive_author" value="<?php echo e($key); ?>" <?php echo e($edit['userdata']->exclusive_author==(string) $key ? 'checked' : ''); ?> required>
                                                    <label class="form-check-label" for="exclusive_author<?php echo e($key); ?>"><?php echo e($label); ?></label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($errors->has('exclusive_author')): ?>
                                                <div class="invalid-feedback">
                                                    <?php echo e($errors->first('exclusive_author')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>


                                        <div class="form-group">
                                                                    <label for="customer_earnings" class="control-label mb-1">Upload Photo</label>
                                                                    <input type="file" id="user_photo" name="user_photo" class="form-control-file">
                                                                </div>
                                                <?php if($edit['userdata']->user_photo != ''): ?>
                                                <img height="50" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($edit['userdata']->user_photo); ?>"  class="userphoto"/><?php else: ?> <img height="50" src="<?php echo e(url('/')); ?>/public/img/no-user.png"  class="userphoto"/>  <?php endif; ?>

                                                <input type="hidden" name="save_photo" value="<?php echo e($edit['userdata']->user_photo); ?>">

                                                <input type="hidden" name="save_password" value="<?php echo e($edit['userdata']->password); ?>">

                                                <input type="hidden" name="edit_id" value="<?php echo e($token); ?>">



                                    </div>
                                </div>

                            </div>
                            </div>



                             <div class="col-md-6">




                             </div>


                            <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>




                        </div>


                    </form>

                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH /home/gotemplate/public_html/resources/views/admin/edit-vendor.blade.php ENDPATH**/ ?>