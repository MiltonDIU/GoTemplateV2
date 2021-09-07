<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(2862,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload home1 mutlti-vendor">

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- start hero section -->
<section class="hero-area bgimage">
    <div class="bg_image_holder">
        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>" alt="<?php echo e($allsettings->site_title); ?>">
    </div>
    <div class="bg-overlay"></div>

    <!-- start hero-content -->
    <div class="hero-content content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1><span class="bold"><?php echo e($allsettings->site_banner_heading); ?></span></h1>
                            <p class="tagline"><?php echo e($allsettings->site_banner_subheading); ?></p>
                        </div>

                        <!-- start .hero__btn-area-->
                        <div class="hero__btn-area">
                            <div class="col-md-9 search_align">
                                <div class="search_box">

                                    <form action="<?php echo e(route('shop')); ?>" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="text" class="text_field" name="product_item" placeholder="<?php echo e(Helper::translation(3030,$translate)); ?>">
                                        <div class="search__select select-wrap">
                                            <select name="category" class="select--field" id="blah">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                                                    <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                        <button type="submit" class="search-btn btn--lg"><?php echo e(Helper::translation(3031,$translate)); ?></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end .hero__btn-area-->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->
</section>
<!-- end hero section -->


<!-- start featured products section -->
<?php if($allsettings->site_layout == ''): ?>
    <section class="featured-products section--padding">
        <!-- start /.container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
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

                    <h3 class="text-uppercase"><?php echo e(Helper::translation(3033,$translate)); ?></h3>

                    <div class="row mt-3 justify-content-center">
                        <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make("./components/item_card", [
                                "item" => $item
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div align="center" class="margin-top-20">
                <a href="<?php echo e(URL::to('/shop/featured-items')); ?>" class="btn btn--sm theme-button">
                    <?php echo e(Helper::translation(3032,$translate)); ?>

                </a>
            </div>
            <!-- end /.row -->
        </div>
    </section>

    <!-- =Future: test when else condition fullfill -->
<?php else: ?>
    <section class="featured-products section--padding">
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div>
                    <h2><?php echo e(Helper::translation(3033,$translate)); ?> </h2>

                    <div class="row margin-top-30">
                        <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured">
                                <a
                                    class="tip_trigger"
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($items->item_slug); ?>/<?php echo e($items->item_id); ?>"
                                    title="<?php echo e($items->item_name); ?>"
                                >
                                    <?php if($items->item_thumbnail!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_thumbnail); ?>" alt="<?php echo e($items->item_name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($items->item_name); ?>">
                                    <?php endif; ?>

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">

                                                    <?php if($items->video_preview_type!=''): ?>
                                                        <?php if($items->video_preview_type == 'youtube'): ?>
                                                            <?php if($items->video_url != ''): ?>
                                                                <?php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                ?>

                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                >
                                                                </iframe>

                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if($items->video_preview_type == 'mp4'): ?>
                                                            <?php if($items->video_file != ''): ?>
                                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                                    <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>"
                                                                            type="video/mp4">Your browser does not support the video tag.</video>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png"
                                                                     alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>



                                                    <?php else: ?>
                                                        <?php if($items->item_preview!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 text-left">
                                                    <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                                    <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?><?php echo e($items->username); ?></span>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                    <div class="currrency">
                                                        <?php if($items->free_download == 1): ?>
                                                            <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                        <?php else: ?>
                                                            <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div align="center" class="margin-top-20">
                <a href="<?php echo e(URL::to('/shop/featured-items')); ?>" class="btn btn--sm theme-button">
                    <?php echo e(Helper::translation(3032,$translate)); ?>

                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- end featured products section -->


<!-- start newest files -->
<section class="products section--padding">
    <div class="container" id="demo">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase"><?php echo e(Helper::translation(3035,$translate)); ?> <span class="highlighted"><?php echo e(Helper::translation(3003,$translate)); ?></span></h3>
            </div>
        </div>
        <div id="demo" class="box jplist">
            <!-- panel -->
            <div class="jplist-panel box panel-top">

                <div class="jplist-group sorting"
                     data-control-type="button-text-filter-group"
                     data-control-action="filter"
                     data-control-name="button-text-filter-group-1" >

                    <ul>
                        <?php $__currentLoopData = $newest['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a
                                    href="javascript:void(0);"
                                    data-control-action="filter"
                                    data-control-name="<?php echo e($items->category_slug); ?>"
                                    data-path=".block"
                                    data-text="<?php echo e($items->category_slug); ?>"
                                    data-button="true"
                                >
                                    <?php echo e($items->category_name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>

            </div>



            <?php if($allsettings->site_layout == ''): ?>
                <div class="row list justify-content-center">



                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make("./components/item_card", [
                                 "item" => $item
                             ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            <?php else: ?>
                <div class="row list">
                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-item featured">
                            <a class="tip_trigger" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($items->item_slug); ?>/<?php echo e($items->item_id); ?>" title="<?php echo e($items->item_name); ?>" >
                                <?php if($items->item_thumbnail!=''): ?>
                                    <img  src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_thumbnail); ?>" alt="<?php echo e($items->item_name); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($items->item_name); ?>">
                                <?php endif; ?>
                                <span class="tip">
                                        <div class="row">
                                        <div class="col-md-12" align="center">
                                        <?php if($items->video_preview_type!=''): ?>

                                                <?php if($items->video_preview_type == 'youtube'): ?>
                                                    <?php if($items->video_url != ''): ?>
                                                        <?php
                                                            $link = $items->video_url;
                                                            $video_id = explode("?v=", $link);
                                                            $video_id = $video_id[1];
                                                        ?>
                                                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>" frameborder="0" allow="autoplay" scrolling="no"></iframe>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($items->video_preview_type == 'mp4'): ?>
                                                    <?php if($items->video_file != ''): ?>
                                                        <?php if($allsettings->site_s3_storage == 1): ?>
                                                            <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                            <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                            <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>



                                            <?php else: ?>
                                                <?php if($items->item_preview!=''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-8 text-left">
                                        <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                        <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?> <?php echo e($items->username); ?></span>
                                        </div>
                                         <div class="col-md-4 text-right">
                                        <div class="currrency">
                                        <?php if($items->free_download == 1): ?>
                                                <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        </div>
                                        </div>
                                        </span>

                            </a>
                            <div class="block">
                                <span class="<?php echo e($items->item_category); ?>_<?php echo e($items->item_category_type); ?> display-none"><?php echo e($items->item_category); ?>_<?php echo e($items->item_category_type); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        <?php endif; ?>

        <!--<div class="box jplist-no-results text-shadow align-center">
						<p>No results found</p>
					</div>-->

        </div>
        <div align="center" class="margin-top-20"><a href="<?php echo e(URL::to('/shop/recent-items')); ?>" class="btn btn--sm theme-button"><?php echo e(Helper::translation(3036,$translate)); ?></a></div>





    </div>
</section>
<!-- end newest files -->





















<!-- =Future: need to implement -->
<!-- start popular products section -->
<?php if($allsettings->site_layout == ''): ?>
    <section class="featured-products section--padding">
        <!-- start /.container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <!-- start col-md-12 -->
                <div class="col-md-12">
                    <h3 class="text-uppercase">Popular Products</h3>

                    <div class="row mt-3 justify-content-center">
                        <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make("./components/item_card", [
                                "item" => $item
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div align="center" class="margin-top-20">
                <a href="<?php echo e(URL::to('/shop/featured-items')); ?>" class="btn btn--sm theme-button">
                    <?php echo e(Helper::translation(3032,$translate)); ?>

                </a>
            </div>
            <!-- end /.row -->
        </div>
    </section>

    <!-- =Future: test when else condition fullfill -->
<?php else: ?>
    <section class="featured-products section--padding">
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div>
                    <h2><?php echo e(Helper::translation(3033,$translate)); ?> </h2>

                    <div class="row margin-top-30">
                        <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured">
                                <a
                                    class="tip_trigger"
                                    href="<?php echo e(URL::to('/item')); ?>/<?php echo e($items->item_slug); ?>/<?php echo e($items->item_id); ?>"
                                    title="<?php echo e($items->item_name); ?>"
                                >
                                    <?php if($items->item_thumbnail!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_thumbnail); ?>" alt="<?php echo e($items->item_name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($items->item_name); ?>">
                                    <?php endif; ?>

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">

                                                    <?php if($items->video_preview_type!=''): ?>
                                                        <?php if($items->video_preview_type == 'youtube'): ?>
                                                            <?php if($items->video_url != ''): ?>
                                                                <?php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                ?>

                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                >
                                                                </iframe>

                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if($items->video_preview_type == 'mp4'): ?>
                                                            <?php if($items->video_file != ''): ?>
                                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                                    <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source
                                                                            src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>"
                                                                            type="video/mp4">Your browser does not support the video tag.</video>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png"
                                                                     alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>



                                                    <?php else: ?>
                                                        <?php if($items->item_preview!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8 text-left">
                                                    <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                                    <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?><?php echo e($items->username); ?></span>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                    <div class="currrency">
                                                        <?php if($items->free_download == 1): ?>
                                                            <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                        <?php else: ?>
                                                            <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div align="center" class="margin-top-20">
                <a href="<?php echo e(URL::to('/shop/featured-items')); ?>" class="btn btn--sm theme-button">
                    <?php echo e(Helper::translation(3032,$translate)); ?>

                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- end popular products section -->


<!-- start at a glance -->
<section class="counter-up-area bgimage">
    <div class="bg_image_holder">
        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_count_bg); ?>" alt="">
    </div>

    <!-- start .container -->
    <div class="container content_above">
        <!-- start .col-md-12 -->
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count"><?php echo e($totalearning); ?></span> <span><?php echo e($allsettings->site_currency); ?></span>
                    <p><?php echo e(Helper::translation(3037,$translate)); ?></p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count"><?php echo e($totalfiles); ?></span>
                    <p><?php echo e(Helper::translation(3038,$translate)); ?></p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-cart"></span>
                    <span class="count"><?php echo e($totalsales); ?></span>
                    <p><?php echo e(Helper::translation(3039,$translate)); ?></p>
                </div>
                <div class="counter">
                    <span class="lnr lnr-users"></span>
                    <span class="count"><?php echo e($totalmembers); ?></span>
                    <p><?php echo e(Helper::translation(3002,$translate)); ?></p>
                </div>
            </div>
        </div>
        <!-- end /.col-md-12 -->
    </div>
    <!-- end /.container -->
</section>
<!-- end at a glance -->


<!-- =Future: need to implement -->
<!-- start flash sales -->
<section class="products section--padding">
    <div class="container" id="flash">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">Flash Sales</h3>
            </div>
        </div>

        <div id="flash" class="box jplist">
            <div class="jplist-panel box panel-top">
                <div class="jplist-group sorting"
                     data-control-type="button-text-filter-group"
                     data-control-action="filter"
                     data-control-name="button-text-filter-group-1">
                    <ul>
                        <?php $__currentLoopData = $newest['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a
                                    href="javascript:void(0);"

                                    data-control-action="filter"
                                    data-control-name="<?php echo e($items->category_slug); ?>"
                                    data-path=".block"
                                    data-text="<?php echo e($items->category_slug); ?>"
                                    data-button="true"
                                >
                                    <?php echo e($items->category_name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <?php if($allsettings->site_layout == ''): ?>
                <div class="row list justify-content-center">
                    <?php $__currentLoopData = $flashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make("./components/item_card", [
                            "item" => $item
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- =Future: need to check when else condition fullfill -->
            <?php else: ?>
                <div class="row list">
                    <?php $__currentLoopData = $flashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-item featured">
                            <a class="tip_trigger" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" title="<?php echo e($item->item_name); ?>">
                                <?php if($item->item_thumbnail!=''): ?>
                                    <img  src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_thumbnail); ?>" alt="<?php echo e($item->item_name); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($item->item_name); ?>">
                                <?php endif; ?>

                                <span class="tip">
                                        <div class="row">
                                            <div class="col-md-12" align="center">
                                                <?php if($item->video_preview_type!=''): ?>

                                                    <?php if($item->video_preview_type == 'youtube'): ?>
                                                        <?php if($item->video_url != ''): ?>
                                                            <?php
                                                                $link = $item->video_url;
                                                                $video_id = explode("?v=", $link);
                                                                $video_id = $video_id[1];
                                                            ?>

                                                            <iframe
                                                                width="100%"
                                                                height="200"
                                                                src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>"
                                                                frameborder="0"
                                                                allow="autoplay"
                                                                scrolling="no"
                                                            ></iframe>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if($item->video_preview_type == 'mp4'): ?>
                                                        <?php if($items->video_file != ''): ?>
                                                            <?php if($allsettings->site_s3_storage == 1): ?>
                                                                <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                                <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                            <?php else: ?>
                                                                <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <?php if($item->item_preview!=''): ?>
                                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 text-left">
                                                <div class="titleitem"><?php echo e($item->item_name); ?></div>
                                                <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?> <?php echo e($item->username); ?></span>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <div class="currrency">
                                                    <?php if($item->free_download == 1): ?>
                                                        <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                    <?php else: ?>
                                                        <span><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                            </a>

                            <div class="block">
                                    <span class="<?php echo e($item->item_category); ?>_<?php echo e($item->item_category_type); ?> display-none">
                                        <?php echo e($item->item_category); ?>_<?php echo e($item->item_category_type); ?>

                                    </span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        <?php endif; ?>

        <!--<div class="box jplist-no-results text-shadow align-center">
                    <p>No results found</p>
                </div>-->
        </div>

        <div align="center" class="margin-top-20">
            <a href="<?php echo e(URL::to('/shop/recent-items')); ?>" class="btn btn--sm theme-button">
                <?php echo e(Helper::translation(3036,$translate)); ?>

            </a>
        </div>
    </div>
</section>
<!-- end flash sales -->


<!-- start free files -->
<?php if($allsettings->site_layout == ''): ?>
    <section class="featured-products bgcolor section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase"><?php echo e(Helper::translation(3040,$translate)); ?></h3>

                    <div class="row mt-3 justify-content-center">
                        <?php $__currentLoopData = $free['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make("./components/item_card", [
                                "item" => $item
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <div align="center" class="mt-3">
                <a href="<?php echo e(URL::to('/free-items')); ?>" class="btn btn--sm theme-button"><?php echo e(Helper::translation(3041,$translate)); ?></a>
            </div>
        </div>
    </section>

<?php else: ?>
    <section class="featured-products bgcolor section--padding">
        <div class="container">
            <div class="row">
                <div>
                    <h2><?php echo e(Helper::translation(3040,$translate)); ?> </h2>

                    <div class="row margin-top-30">
                        <?php $__currentLoopData = $free['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured">
                                <a class="tip_trigger" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($items->item_slug); ?>/<?php echo e($items->item_id); ?>" title="<?php echo e($items->item_name); ?>" >
                                    <?php if($items->item_thumbnail!=''): ?>
                                        <img  src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_thumbnail); ?>" alt="<?php echo e($items->item_name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($items->item_name); ?>">
                                    <?php endif; ?>

                                    <span class="tip">
                                            <div class="row">
                                                <div class="col-md-12" align="center">
                                                    <?php if($items->video_preview_type!=''): ?>
                                                        <?php if($items->video_preview_type == 'youtube'): ?>
                                                            <?php if($items->video_url != ''): ?>
                                                                <?php
                                                                    $link = $items->video_url;
                                                                    $video_id = explode("?v=", $link);
                                                                    $video_id = $video_id[1];
                                                                ?>
                                                                <iframe
                                                                    width="100%"
                                                                    height="200"
                                                                    src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>"
                                                                    frameborder="0"
                                                                    allow="autoplay"
                                                                    scrolling="no"
                                                                ></iframe>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if($items->video_preview_type == 'mp4'): ?>
                                                            <?php if($items->video_file != ''): ?>
                                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                                    <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                                <?php else: ?>
                                                                    <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                                <?php endif; ?>

                                                            <?php else: ?>
                                                                <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    <?php else: ?>
                                                        <?php if($items->item_preview!=''): ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-8 text-left">
                                                <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                                <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?> <?php echo e($items->username); ?></span>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <div class="currrency">
                                                    <?php if($items->free_download == 1): ?>
                                                        <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                    <?php else: ?>
                                                        <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        </span>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <div align="center" class="mt-3">
                <a href="<?php echo e(URL::to('/free-items')); ?>" class="btn btn--sm theme-button">
                    <?php echo e(Helper::translation(3041,$translate)); ?>

                </a>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- end free files -->


<?php echo $__env->make("./components/testimonial", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- start blog section -->
<?php if($allsettings->site_blog_display == 1): ?>
    <?php if($allsettings->home_blog_display == 1): ?>
        <section class="latest-news section--padding">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Blog Articles</h3>
                        <div class="row mt-3 justify-content-center">
                            <?php $__currentLoopData = $blog['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6 mt-3">
                                    <div class="single_blog blog--card">
                                        <figure>
                                            <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>">
                                                <?php if($post->post_image!=''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>" class="tag-img">
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>" class="tag-img">
                                                <?php endif; ?>
                                            </a>

                                            <figcaption>
                                                <div class="blog__content">
                                                    <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="blog__title">
                                                        <h4><?php echo e($post->post_title); ?></h4>
                                                    </a>
                                                    <p><?php echo e(substr($post->post_short_desc,0,145).'...'); ?></p>
                                                </div>

                                                <div class="blog__meta">
                                                    <div class="date_time">
                                                        <i class="fa fa-calendar-check-o"></i>
                                                        <p><?php echo e(date('d F Y', strtotime($post->post_date))); ?></p>
                                                    </div>
                                                    <div class="comment_view">
                                                        <p class="comment">
                                                            <span class="lnr lnr-bubble"></span><?php echo e($comments->has($post->post_id) ? count($comments[$post->post_id]) : 0); ?>

                                                        </p>
                                                        <p class="view">
                                                            <span class="lnr lnr-eye"></span><?php echo e($post->post_view); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    <?php endif; ?>
<?php endif; ?>
<!-- end blog section -->


<!-- start why choose goTemplate -->
<section class="why-choose section--padding">
    <div class="container">
        <div class="custom-card why-choose-card">
            <div class="col-lg-7 col-md-7 col-sm-12 why-choose-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="why-choose-heading">
                            <h1>
                                <?php echo e(Helper::translation(3047,$translate)); ?>

                                <span class="highlighted"><?php echo e($allsettings->site_title); ?>?</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="<?php echo e($allsettings->site_icon1); ?> theme-color"></span>
                                <h3 class="feature2-title"><?php echo e($allsettings->site_text1); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="<?php echo e($allsettings->site_icon2); ?> theme-color"></span>
                                <h3 class="feature2-title"><?php echo e($allsettings->site_text2); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="<?php echo e($allsettings->site_icon3); ?> theme-color"></span>
                                <h3 class="feature2-title"><?php echo e($allsettings->site_text3); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="feature2">
                            <div class="feature2__content">
                                <span class="<?php echo e($allsettings->site_icon4); ?> theme-color"></span>
                                <h3 class="feature2-title"><?php echo e($allsettings->site_text4); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="why-choose-heading">
                            <h2>WHAT ARE YOU LOOKING FOR?</h2>
                            <a href="<?php echo e(url('/register')); ?>" class="btn btn-ss bg-red-primary mt-3">
                                <?php echo e(Helper::translation(3019,$translate)); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 why-choose-right sdevice-off">
                <img src="<?php echo e(url('/')); ?>/public/assets/images/why-choose.jpg" alt="Why Choose GoTemplate">
            </div>
        </div>
    </div>
</section>
<!-- end why choose goTemplate -->

<!-- sslcommerce payment chaneel section -->
<section class="section--padding">
    <div class="container">
        <img
            src="<?php echo e(url('/')); ?>/public/assets/images/ssl-commerce.png"
            alt="Pyament channels - SSLCOMMERZ"
        >
    </div>
</section>


<?php echo $__env->make('video_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
    <?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/gotemplate/public_html/resources/views/index.blade.php ENDPATH**/ ?>