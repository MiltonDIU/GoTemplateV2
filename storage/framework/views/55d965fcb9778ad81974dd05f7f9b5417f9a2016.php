<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3225,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload home1 mutlti-vendor">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/login", "text" => 3225)],
        "headline" => 3225
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="login_area section--padding2">
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

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="<?php echo e(route('login')); ?>" method="POST" id="item_form">
                        <?php echo csrf_field(); ?>
                        <div class="cardify login">
                            <div class="login--header">
                                <h3><?php echo e(Helper::translation(3226,$translate)); ?></h3>
                                <p><?php echo e(Helper::translation(3227,$translate)); ?></p>
                            </div>

                            <!-- start .login--form -->
                            <div class="login--form">
                                <div class="form-group">
                                    <label for="user_name"><?php echo e(Helper::translation(3228,$translate)); ?></label>

                                    <input
                                        id="user_name"
                                        type="text"
                                        class="text_field text-field__modify <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="email"
                                        value="<?php echo e(old('email')); ?>"
                                        data-bvalidator="required"
                                        autofocus
                                    >

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label for="pass"><?php echo e(Helper::translation(3113,$translate)); ?></label>

                                    <input
                                        id="pass"
                                        type="password"
                                        class="text_field text-field__modify <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="password"
                                        data-bvalidator="required"
                                        autocomplete="current-password"
                                    >

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="ch2" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                        >

                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text"><?php echo e(Helper::translation(3229,$translate)); ?></span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md theme-button login-btn__full" type="submit">
                                    <?php echo e(Helper::translation(3225,$translate)); ?>

                                </button>

                                <div class="login_assist">
                                    <?php if(Route::has('password.request')): ?>
                                    <p class="recover">
                                        <a href="<?php echo e(URL::to('/forgot')); ?>" class="theme-color">
                                            <?php echo e(Helper::translation(3009,$translate)); ?>?
                                        </a>
                                    </p>
                                    <?php endif; ?>

                                    <p class="signup">
                                        <?php echo e(Helper::translation(3230,$translate)); ?>

                                        <a href="<?php echo e(URL::to('/register')); ?>" class="theme-color">
                                            <?php echo e(Helper::translation(3231,$translate)); ?>?
                                        </a>
                                    </p>
                                </div>

                                <?php if($allsettings->display_social_login == 1): ?>
                                <div class="row form-group mt-4 social-media-login">
                                    <div class="col-md-12 text-center">
                                        <label class="font-weight-bold" for="fullname">
                                            <?php echo e(Helper::translation(3232,$translate)); ?>

                                        </label>
                                    </div>

                                    <div>
                                        <a href="<?php echo e(url('/login/facebook')); ?>">
                                            <img src="<?php echo e(url('/')); ?>/public/img/fb.png" alt="" />
                                        </a>
                                        <a href="<?php echo e(url('/login/google')); ?>">
                                            <img src="<?php echo e(url('/')); ?>/public/img/gp.png" alt="" />
                                        </a>
                                    </div>

                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>



   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH /home/gotemplate/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>