<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title><?php echo e(Helper::translation(3109,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload dashboard-setting">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/profile-settings", "text" => 3109)],
        "headline" => 3109
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="dashboard-area pt-0">
        <?php if(Auth::user()->id != 1): ?>
        <?php echo $__env->make('dashboard-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
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

               <form action="<?php echo e(route('profile-settings')); ?>" class="setting_form" method="post" id="item_form" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4><?php echo e(Helper::translation(3110,$translate)); ?>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="acname"><?php echo e(Helper::translation(2917,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="name" name="name" class="text_field" placeholder="Name" value="<?php echo e(Auth::user()->name); ?>" data-bvalidator="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="usrname"><?php echo e(Helper::translation(3111,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="username" name="username" class="text_field" placeholder="Username" value="<?php echo e(Auth::user()->username); ?>" data-bvalidator="required">
                                            <p><?php echo e(Helper::translation(3112,$translate)); ?>: <?php echo e(URL::to('/')); ?>/user/<span><?php echo e(Auth::user()->username); ?></span>
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <label for="emailad"><?php echo e(Helper::translation(3011,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email" name="email" class="text_field" placeholder="Email address" value="<?php echo e(Auth::user()->email); ?>" data-bvalidator="required,email">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password"><?php echo e(Helper::translation(3113,$translate)); ?>


                                                    </label>
                                                    <input type="password" id="password" name="password" class="text_field" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conpassword"><?php echo e(Helper::translation(3114,$translate)); ?>


                                                    </label>
                                                    <input type="password" name="password_confirmation" id="password-confirm" class="text_field" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="website"><?php echo e(Helper::translation(3115,$translate)); ?></label>
                                            <input type="text" id="website" name="website" class="text_field" placeholder="" value="<?php echo e(Auth::user()->website); ?>">
                                        </div>
                                        <?php if(Auth::user()->user_type == 'customer'): ?>
                                        <div class="form-group">
                                            <label for="website"><?php echo e(Helper::translation(4833,$translate)); ?></label>
                                            <div class="custom_checkbox no-margin">
                                            <input class="form-check-input" type="checkbox" name="become-vendor" id="ch2" value="1">
                                            <label for="ch2">
                                                    <span class="shadow_checkbox"></span>
                                                    <span class="become_vendor">(<?php echo e(Helper::translation(4836,$translate)); ?>)</span>
                                                </label>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="country"><?php echo e(Helper::translation(3116,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country" id="country" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $country['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->country_id); ?>" <?php if(Auth::user()->country == $country->country_id ): ?> selected="selected" <?php endif; ?>><?php echo e($country->country_name); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>

                                        <?php if(Auth::user()->user_type == 'vendor'): ?>
                                        <div class="form-group">
                                            <label for="country"><?php echo e(Helper::translation(3117,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="user_freelance" id="user_freelance" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>

                                                    <option value="1" <?php if(Auth::user()->user_freelance == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                   <option value="0" <?php if(Auth::user()->user_freelance == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="country"><?php echo e(Helper::translation(3118,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country_badge" id="country_badge" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>

                                                    <option value="1" <?php if(Auth::user()->country_badge == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                   <option value="0" <?php if(Auth::user()->country_badge == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="country"><?php echo e(Helper::translation(3119,$translate)); ?>

                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="exclusive_author" id="exclusive_author" class="text_field" data-bvalidator="required">
                                                    <option value=""></option>

                                                    <option value="1" <?php if(Auth::user()->exclusive_author == 1 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2970,$translate)); ?></option>
                                                   <option value="0" <?php if(Auth::user()->exclusive_author == 0 ): ?> selected="selected" <?php endif; ?>><?php echo e(Helper::translation(2971,$translate)); ?></option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                                <small>(<?php echo e(Helper::translation(3120,$translate)); ?> <strong>"<?php echo e(Helper::translation(2970,$translate)); ?>"</strong> <?php echo e(Helper::translation(3121,$translate)); ?>)</small>
                                            </div>
                                        </div>
                                        <?php endif; ?>




                                        <div class="form-group">
                                            <label for="prohead"><?php echo e(Helper::translation(3122,$translate)); ?> <sup>*</sup></label>
                                            <input type="text" id="profile_heading" class="text_field" name="profile_heading" placeholder="<?php echo e(Helper::translation(3123,$translate)); ?>" value="<?php echo e(Auth::user()->profile_heading); ?>" data-bvalidator="required">
                                        </div>

                                        <div class="form-group">
                                            <label for="authbio"><?php echo e(Helper::translation(3124,$translate)); ?> <sup>*</sup></label>
                                            <textarea name="about" id="about" class="text_field" placeholder="<?php echo e(Helper::translation(3125,$translate)); ?>" data-bvalidator="required"><?php echo e(Auth::user()->about); ?></textarea>
                                        </div>
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->






                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">

                            <div class="information_module">
                                <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4><?php echo e(Helper::translation(3126,$translate)); ?>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse3">
                                    <div class="information_wrapper">
                                        <div class="form-group">

                                            <div class="img_info">

                                                <label for="authbio"><?php echo e(Helper::translation(3127,$translate)); ?></label>
                                                <p class="subtitle">JPG, GIF or PNG 100x100 px</p>
                                            </div>

                                            <label>
                                                <input type="file" id="user_photo" name="user_photo">
                                            </label><br/>
                                            <?php if(Auth::user()->user_photo != ''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->name); ?>" width="50">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->name); ?>" width="50">
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">

                                             <label for="authbio"><?php echo e(Helper::translation(3128,$translate)); ?></label>

                                            <div class="upload_title">
                                                <p>JPG, GIF or PNG 750x370 px</p>
                                                <label for="dp">
                                                    <input type="file" id="user_banner" name="user_banner">

                                                </label><br/>
                                                <?php if(Auth::user()->user_banner != ''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_banner); ?>" alt="<?php echo e(Auth::user()->name); ?>" width="100">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e(Auth::user()->name); ?>" width="100">
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="information_module">
                                <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4><?php echo e(Helper::translation(3129,$translate)); ?>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set social_profile toggle_module collapse " id="collapse5">
                                    <div class="information_wrapper">
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-facebook"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="facebook_url" value="<?php echo e(Auth::user()->facebook_url); ?>" placeholder="ex: https://www.facebook.com">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-twitter"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="twitter_url" value="<?php echo e(Auth::user()->twitter_url); ?>" placeholder="ex: https://www.twitter.com">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-google-plus"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" name="gplus_url" value="<?php echo e(Auth::user()->gplus_url); ?>" placeholder="ex: https://www.google.com">
                                            </div>
                                        </div>


                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.social_profile -->
                            </div>





                            <?php if(Auth::user()->user_type == 'vendor'): ?>
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4><?php echo e(Helper::translation(3130,$translate)); ?>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set mail_setting toggle_module collapse" id="collapse4">
                                    <div class="information_wrapper">


                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt2" class="" name="item_update_email" value="1" <?php if(Auth::user()->item_update_email == 1): ?> checked <?php endif; ?>>
                                            <label for="opt2">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title"><?php echo e(Helper::translation(3088,$translate)); ?></span>
                                                <span class="desc"><?php echo e(Helper::translation(3131,$translate)); ?></span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt3" class="" name="item_comment_email" value="1" <?php if(Auth::user()->item_comment_email == 1): ?> checked <?php endif; ?>>
                                            <label for="opt3">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title"><?php echo e(Helper::translation(3132,$translate)); ?></span>
                                                <span class="desc"><?php echo e(Helper::translation(3133,$translate)); ?></span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt4" class="" name="item_review_email" value="1" <?php if(Auth::user()->item_review_email == 1): ?> checked <?php endif; ?>>
                                            <label for="opt4">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title"><?php echo e(Helper::translation(3134,$translate)); ?></span>
                                                <span class="desc"><?php echo e(Helper::translation(3135,$translate)); ?></span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt5" class="" name="buyer_review_email" value="1" <?php if(Auth::user()->buyer_review_email == 1): ?> checked <?php endif; ?>>
                                            <label for="opt5">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title"><?php echo e(Helper::translation(3136,$translate)); ?></span>
                                                <span class="desc"><?php echo e(Helper::translation(3137,$translate)); ?></span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->


                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information_module -->
                            </div>
                            <?php endif; ?>
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->
                        <input type="hidden" name="user_token" value="<?php echo e(Auth::user()->user_token); ?>">
                        <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
                        <input type="hidden" name="save_earnings" value="<?php echo e(Auth::user()->earnings); ?>">
                        <input type="hidden" name="save_photo" value="<?php echo e(Auth::user()->user_photo); ?>">
                        <input type="hidden" name="save_banner" value="<?php echo e(Auth::user()->user_banner); ?>">
                        <input type="hidden" name="save_password" value="<?php echo e(Auth::user()->password); ?>">
                        <div class="col-md-12">
                            <div align="left">
                                <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3138,$translate)); ?></button>
                            </div>
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </form>
                <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>


    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/profile-settings.blade.php ENDPATH**/ ?>