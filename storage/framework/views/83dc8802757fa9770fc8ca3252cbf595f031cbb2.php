<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(2926,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload">
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

        <div class="row">
            <?php echo $__env->make('user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-lg-8 col-md-12" style="margin-top: 30px;">
                <div class="row">
                    <?php echo $__env->make('user-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="col-md-12 col-sm-12">
                        <div class="author_module">
                            <?php if($user['user']->user_banner != ''): ?>
                                <img
                                    src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user['user']->user_banner); ?>"
                                    alt="<?php echo e($user['user']->username); ?>"
                                >
                            <?php else: ?>
                                <img
                                    src="<?php echo e(url('/')); ?>/public/img/no-image.jpg"
                                    alt="<?php echo e($user['user']->username); ?>"
                                >
                            <?php endif; ?>
                        </div>

                        <?php if($user['user']->profile_heading != ''): ?>
                            <div class="author_module about_author p-4">
                                <h2><?php echo e($user['user']->profile_heading); ?></h2>
                                <p><?php echo e($user['user']->about); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($user['user']->user_type == 'vendor'): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__title">
                                <h2><?php echo e(Helper::translation(2886,$translate)); ?></h2>
                            </div>
                        </div>

                        <div class="col-md-12 row pr-0" id="listShow">
                            <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make("./components/item_card", [
                                    "item" => $item,
                                    "isUser" => true
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="col-md-12 row" align="right">
                            <div class="col-md-12">
                                <div class="pagination-area">
                                    <div class="turn-page" id="pager"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/user.blade.php ENDPATH**/ ?>