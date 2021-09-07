<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3197,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload author-followers">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/user-followers", "text" => 3197)],
        "headline" => 3197
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="author-profile-area">
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
                <?php echo $__env->make('user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <?php echo $__env->make('user-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- end /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>
                                        <span class="bold">
                                            <?php echo e($followercount); ?>

                                        </span>

                                        <?php if($followercount <= 1): ?> 
                                            <?php echo e(Helper::translation(3198,$translate)); ?> 
                                        <?php else: ?> 
                                            <?php echo e(Helper::translation(3197,$translate)); ?> 
                                        <?php endif; ?>
                                    </h2>
                                </div>
                            </div>

                            <div class="user_area">
                                <ul id="listShow" class="mb-0">
                                    <?php $__currentLoopData = $viewfollowing['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="li-item">
                                            <div class="col-12 user_single d-flex px-3">
                                                <div class="col-sm-2 d-flex justify-content-center">
                                                    <div class="user_avatar">
                                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($follower->username); ?>">
                                                            <?php if($follower->user_photo != ''): ?>
                                                                <img 
                                                                    src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($follower->user_photo); ?>" 
                                                                    alt="<?php echo e($follower->username); ?>" 
                                                                    width="70" 
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            <?php else: ?>
                                                                <img 
                                                                    src="<?php echo e(url('/')); ?>/public/img/no-user.png" 
                                                                    alt="<?php echo e($follower->username); ?>" 
                                                                    width="70" 
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-10 d-flex row justify-content-between">
                                                    <div class="user_info">
                                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($follower->username); ?>">
                                                            <?php echo e($follower->name); ?>

                                                        </a>
                                                        <p class="mb-0"><?php echo e(Helper::translation(3077,$translate)); ?>: <?php echo e(date("F Y", strtotime($follower->created_at))); ?> </p>
                                                        <p class="mb-0"><?php echo e(Helper::translation(3199,$translate)); ?> : <?php if($follower->country !=''): ?> <?php echo e($follower->country_name); ?> <?php else: ?> - <?php endif; ?></p>
                                                    </div>

                                                    <div><a href="<?php echo e(url('/user')); ?>/<?php echo e($follower->username); ?>" class="btn btn--md theme-button"><?php echo e(Helper::translation(3078,$translate)); ?></a></div>
                                                </div>

                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                        <div class="turn-page" id="pager"></div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/user-followers.blade.php ENDPATH**/ ?>