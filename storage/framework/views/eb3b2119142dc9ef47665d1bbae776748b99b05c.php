<?php
/*
Script Name: Feberr - Multivendor Digital Products Marketplace
Author: codecanor
Version: 11.0
*/
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo e($allsettings->site_desc); ?>">
<meta name="keywords" content="<?php echo e($allsettings->site_keywords); ?>">
<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/animate.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/linear-icon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/fonts.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/slick-slider.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/editor.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/bootstrap/bootstrap.min.css')); ?>">


<!-- views styles -->
<link rel="stylesheet" href="<?php echo e(asset('resources/views/static-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('resources/views/css/item-card.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('resources/views/css/item.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/owl.carousel.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/pagination/pagination.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/filter/jplist.core.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/filter/jplist.jquery-ui-bundle.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/filter/jquery-ui.css')); ?>" />
<link rel="stylesheet" media="screen" href="<?php echo e(asset('public/lightbox/topbox.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/video/video.popup.css')); ?>">
<link type="text/css" href="<?php echo e(URL::to('public/countdown/jquery.countdown.css?v=1.0.0.0')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(URL::to('resources/views/admin/template/datepicker/picker.css')); ?>"> 
<link href="<?php echo e(asset('resources/views/admin/template/dragdrop/css/jquery.filer.css')); ?>" rel="stylesheet">
<?php if($translate == 'ar'): ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/rtl.css')); ?>" />
<?php endif; ?>




<?php /**PATH /home/gotemplate/public_html/resources/views/stylesheet.blade.php ENDPATH**/ ?>