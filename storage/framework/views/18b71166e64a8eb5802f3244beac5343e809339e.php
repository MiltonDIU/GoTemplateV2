<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3028,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload term-condition-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make("./components/hero", [
        "list" => [array("path" => "/top-authors", "text" => 3028)],
        "headline" => 3028
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="demo">

        <section class="term_condition_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="user_area">
                            <ul>
                                <?php $__currentLoopData = $user['user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($count_sale->has($user->id) != 0): ?>
                                        <?php
                                            $membership = date('m/d/Y',strtotime($user->created_at));
                                            $membership_date = explode("/", $membership);
                                            $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
                                            ? ((date("Y") - $membership_date[2]) - 1)
                                            : (date("Y") - $membership_date[2]));

                                            $referral_count = $user->referral_count;
                                        ?>

                                        <li class="li-item">
                                            <div class="user_single">
                                                <div class="user__short_desc own-user">
                                                    <div class="user_avatar">
                                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($user->username); ?>">
                                                            <?php if($user->user_photo != ''): ?>
                                                                <img 
                                                                    src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>" 
                                                                    alt="<?php echo e($user->username); ?>" 
                                                                    width="70"
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            <?php else: ?>
                                                                <img 
                                                                    src="<?php echo e(url('/')); ?>/public/img/no-user.png" 
                                                                    alt="<?php echo e($user->name); ?>" 
                                                                    width="70"
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>

                                                    <div class="user_info">
                                                        <a href="<?php echo e(url('/user')); ?>/<?php echo e($user->username); ?>"><?php echo e($user->name); ?></a><br />
                                                        
                                                        <?php if($user->country_badge == 1): ?>
                                                            <div class="social social--color--filled">
                                                                <ul>
                                                                    <?php if($user->country_badges != ""): ?>
                                                                        <li>
                                                                            <img 
                                                                                src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($user->country_badges); ?>" 
                                                                                border="0" 
                                                                                class="icon-badges" 
                                                                                title="Located in <?php echo e($user->country_name); ?>"
                                                                            >
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php if($user->exclusive_author == 1): ?>
                                                                        <li>
                                                                            <img 
                                                                                src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->exclusive_author_icon); ?>" 
                                                                                border="0" 
                                                                                class="other-badges" 
                                                                                title="Exclusive Author: Sells items exclusively on <?php echo e($allsettings->site_title); ?>"
                                                                            >
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php
                                                                        $yearIcon = '';

                                                                        switch($year) {
                                                                            case 1:
                                                                                $yearIcon = 'one_year_icon';
                                                                                break;
                                                                            case 2:
                                                                                $yearIcon = 'two_year_icon';
                                                                                break;
                                                                            case 3:
                                                                                $yearIcon = 'three_year_icon';
                                                                                break;
                                                                            case 4:
                                                                                $yearIcon = 'four_year_icon';
                                                                                break;
                                                                            case 5:
                                                                                $yearIcon = 'five_year_icon';
                                                                                break;
                                                                            case 6:
                                                                                $yearIcon = 'six_year_icon';
                                                                                break;
                                                                            case 7:
                                                                                $yearIcon = 'seven_year_icon';
                                                                                break;
                                                                            case 8:
                                                                                $yearIcon = 'eight_year_icon';
                                                                                break;
                                                                            case 9:
                                                                                $yearIcon = 'nine_year_icon';
                                                                                break;
                                                                            case $year >= 10:
                                                                                $yearIcon = 'ten_year_icon';
                                                                                break;
                                                                        }
                                                                    ?>

                                                                    <li>
                                                                        <img 
                                                                            src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->$yearIcon); ?>" 
                                                                            border="0" 
                                                                            class="other-badges" 
                                                                            title="<?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> years"
                                                                        >
                                                                    </li>


                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_one_icon); ?>" border="0" class="other-badges" title="Affiliate Level 1: Has referred <?php echo e($badges['setting']->author_referral_level_one); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_two_icon); ?>" border="0" class="other-badges" title="Affiliate Level 2: Has referred <?php echo e($badges['setting']->author_referral_level_two); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_three_icon); ?>" border="0" class="other-badges" title="Affiliate Level 3: Has referred <?php echo e($badges['setting']->author_referral_level_three); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_four_icon); ?>" border="0" class="other-badges" title="Affiliate Level 4: Has referred <?php echo e($badges['setting']->author_referral_level_four); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_five_icon); ?>" border="0" class="other-badges" title="Affiliate Level 5: Has referred <?php echo e($badges['setting']->author_referral_level_five); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>


                                                                    <?php if($referral_count >= $badges['setting']->author_referral_level_six): ?>
                                                                        <li>
                                                                            <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_six_icon); ?>" border="0" class="other-badges" title="Affiliate Level 6: Has referred <?php echo e($badges['setting']->author_referral_level_six); ?>+ members">
                                                                        </li>
                                                                    <?php endif; ?>

                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="user__meta own-next">
                                                    <p><?php echo e($count_items->has($user->id) ? count($count_items[$user->id]) : 0); ?> Items</p>
                                                    <p><?php echo e(Helper::translation(3077,$translate)); ?> <?php echo e(date("F Y", strtotime($user->created_at))); ?></p>
                                                    <p><?php if($user->country_badge == 1): ?><?php echo e($user->country_name); ?><?php endif; ?></p>
                                                </div>

                                                <div class="user__status user--following text-center last-next">
                                                    <p><span class="sale-count"><?php echo e($count_sale->has($user->id) ? count($count_sale[$user->id]) : 0); ?></span><br /><?php echo e(Helper::translation(2930,$translate)); ?></p>
                                                    
                                                    <?php echo $__env->make('rating_star', ['ratings' => isset($user->ratings) ? $user->ratings : []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                            <!-- end /.user_single -->
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="pagination-area">
                                <div class="turn-page" id="pager"></div>
                            </div>
                        </div>

                    </div>



                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>
    </div>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/top-authors.blade.php ENDPATH**/ ?>