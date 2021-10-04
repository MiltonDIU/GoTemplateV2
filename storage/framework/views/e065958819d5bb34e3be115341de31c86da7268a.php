<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3207,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/user-reviews", "text" => 3207)],
        "headline" => 3207
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

                <div class="col-lg-8 col-md-12" style="margin-top: 30px;">
                    <div class="row">
                        <?php echo $__env->make('user-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>
                                        <span class="bold"><?php echo e($countreview); ?></span> <?php echo e(Helper::translation(3207,$translate)); ?>

                                    </h2>
                                </div>
                            </div>

                            <?php $__currentLoopData = $ratingview['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 d-flex p-0 mb-4 row ml-0 mr-0 li-item">
                                    <div class="col-lg-4 col-md-4 col-sm-12 review-left">
                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($review->username); ?>">
                                            <?php if($review->user_photo != ''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($review->user_photo); ?>" alt="<?php echo e($review->username); ?>" class="media-object rounded">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($review->username); ?>" class="media-object rounded">
                                            <?php endif; ?>
                                        </a>

                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($review->username); ?>" class="mt-1">
                                            <h6><?php echo e($review->name); ?></h6>
                                        </a>

                                        <p class="text-truncate width-full text-center mb-0"><?php echo e($review->profile_heading); ?></p>
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-12 review-right py-3">
                                        <div class="d-flex mb-2 justify-content-between align-items-center">
                                            <div class="rating">
                                                <ul>
                                                    <?php $notStar = 5 - $review->rating; ?>
                            
                                                    <?php for($i = 0; $i < $review->rating; $i++): ?>
                                                        <li><span class="fa fa-star"></span></li>
                                                    <?php endfor; ?>
                            
                                                    <?php for($j = 0; $j < $notStar; $j++): ?>
                                                        <li><span class="fa fa-star-o"></span></li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </div>

                                            <p class="review-reason mb-0"><?php echo e($review->rating_reason); ?></p>
                                        </div>

                                        <p><?php echo e($review->rating_comment); ?></p>

                                        <p class="mb-0">
                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                            <?php echo e(date('F d Y, h:i:s', strtotime($review->rating_date))); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">
                                    <div class="pagination-area">
                                        <div class="turn-page" id="pager"></div>
                                    </div>
                                </nav>
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
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/user-reviews.blade.php ENDPATH**/ ?>