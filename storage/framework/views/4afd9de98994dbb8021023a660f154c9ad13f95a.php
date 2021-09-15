

<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="public/assets/theme2/css/signin.css">
  <link rel="stylesheet" href="public/assets/theme2/css/signup.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section id="signin">
    <div class="container">
        <div>
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    <span><?php echo e($message); ?></span>
                </span>
                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            <?php endif; ?>

            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-warning"></span>
                    <span><?php echo e($message); ?></span>
                </span>
                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            <?php endif; ?>

            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-warning"></span>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>

                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            <?php endif; ?>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="sign_text">
                    <h1>Great to have you back!</h1>
                    <h3>GoTemplate - Digital product & template marketplace in Bangladesh.</h3>
                    <div class="text_point_main">

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>5000+ Products</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>200+ Sales</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>100+ Professionals</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>New products upload every week</h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="sign_form">

                    <h2>Sign in</h2>

                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form_group">
                            <label>Username/ Email</label>
                            <input 
                                id="user_name"
                                type="text" 
                                placeholder="Your username or email" 
                                class="f_input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="email"
                                value="<?php echo e(old('email')); ?>" 
                                required
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

                        <div class="form_group">
                            <label for="pass">Password</label>

                            <input 
                                id="pass"
                                type="password" 
                                placeholder="Your password" 
                                class="f_input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                name="password"
                                autocomplete="current-password"
                                required
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

                        <div class="form_group f_check">
                            <input 
                                type="checkbox" 
                                id="form_checkbox"
                                name="remember"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>

                            >

                            <label for="form_checkbox" class="l_checkbox">Remember Me</label>
                        </div>

                        <button type="submit" class="s_btn">Sign in</button>
                    </form>

                    <div class="form_bottom">
                        <?php if(Route::has('password.request')): ?>
                        <div class="forgot_pass">
                            <a href="<?php echo e(URL::to('/forgot')); ?>">Forgot password?</a>
                        </div>
                        <?php endif; ?>

                        <div class="c_account">
                            <p>Don't have an <a href="<?php echo e(URL::to('/register')); ?>">account?</a></p>
                        </div>
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
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views/auth/login.blade.php ENDPATH**/ ?>