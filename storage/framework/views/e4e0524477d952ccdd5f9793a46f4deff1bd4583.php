<?php if($user['user']->user_type == 'vendor'): ?>
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-1 fa fa-bullhorn"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title"><?php echo e($getitemcount); ?></h3>
                <h5 class="card-subtitle"><?php echo e(Helper::translation(3195,$translate)); ?></h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-2 fa fa-briefcase"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title"><?php echo e($getsalecount); ?></h3>
                <h5 class="card-subtitle"><?php echo e(Helper::translation(3039,$translate)); ?></h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-3 fa fa-star"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title"><?php echo e($getreview); ?></h3>
                <h5 class="card-subtitle"><?php echo e(Helper::translation(3196,$translate)); ?></h5>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/user-box.blade.php ENDPATH**/ ?>