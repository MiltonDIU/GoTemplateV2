<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e($item['item']->item_name); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('public/preview/css/bootstrap.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('public/preview/css/app.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('public/preview/css/style.css')); ?>" type="text/css" />
</head>

<body>
<div id="header-bar">
<header id="header" class="navbar navbar-fixed-top bg-white-only box-shadow"  data-spy="affix" data-offset-top="1">
<div class="navbar-header text-center">
         <?php if($allsettings->site_logo != ''): ?>
         <a href="<?php echo e(URL::to('/')); ?>" class="navbar-brand m-r-lg">
         <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>"  class="img-fluid">
         </a>
         <?php endif; ?>
</div>
<ul class="nav navbar-nav text-center deskonly">
<li>
     <div class="">
       <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item['item']->item_slug); ?>/<?php echo e($item['item']->item_id); ?>" class="btn btn-md w-sm btn-success m-r-sm m-t-xxs"><strong><?php echo e(Helper::translation(3074,$translate)); ?></strong></a>
       <a href="<?php echo e($item['item']->demo_url); ?>" class="btn btn-link btn-md"><i class="fa fa-remove m-r-xs m-t-xxs"></i><?php echo e(Helper::translation(3108,$translate)); ?></a>
     </div>
</li>
</ul>  
</div>
</header>
<iframe id="preview-frame" class="w-full h-full" src="<?php echo e($item['item']->demo_url); ?>" name="preview-frame" frameborder="0" noresize="noresize">
</iframe>
<!-- / footer -->
<script src="<?php echo e(asset('public/preview/js/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('public/preview/js/bootstrap.js')); ?>"></script>
</body>
</html><?php /**PATH /home/gotemplate/public_html/resources/views/preview.blade.php ENDPATH**/ ?>