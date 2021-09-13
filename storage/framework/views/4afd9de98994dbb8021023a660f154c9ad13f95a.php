

<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="public/assets/theme2/css/signin.css">
  <link rel="stylesheet" href="public/assets/theme2/css/signup.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section id="signin">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
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

            <div class="offset-lg-1 col-lg-5">
                <div class="sign_form">

                    <h2>Sign in</h2>

                    <form action="">
                        <div class="form_group">
                            <p>Username/ Email</p>
                            <input type="text" placeholder="Your username or email" class="f_input" required>
                        </div>

                        <div class="form_group">
                            <p>Password</p>
                            <input type="password" placeholder="Your password" class="f_input" required>
                        </div>

                        <div class="form_group f_check">
                            <input type="checkbox" id="form_checkbox">
                            <label for="form_checkbox" class="l_checkbox">Remember Me</label>
                        </div>

                        <button type="submit" class="s_btn">Sign in</button>
                    </form>

                    <div class="form_bottom">
                        <div class="forgot_pass">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="c_account">
                            <p>Don't have an <a href="sign-up.html">account?</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme2.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views/auth/login.blade.php ENDPATH**/ ?>