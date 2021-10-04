<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if($allsettings->site_blog_display == 1): ?> <?php echo e($slug); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload blog-page2">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($allsettings->site_blog_display == 1): ?>
        <?php echo $__env->make("./components/hero", [
            "list" => [array("path" => "/blog", "text" => 2877)],
            "headline" => $slug
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="blog_area section--padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" id="listShow">

                        <?php $__currentLoopData = $blogData['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single_blog blog--default li-items">
                            <figure>
                                <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>">
                                <?php if($post->post_image!=''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>">
                                            <?php endif; ?>
                                            </a>
                                <figcaption>
                                    <div class="blog__content">
                                        <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="blog__title">
                                            <h4><?php echo e($post->post_title); ?></h4>
                                        </a>

                                        <div class="blog__meta">

                                            <div class="date_time">
                                                <span class="lnr lnr-clock"></span>
                                                <p><?php echo e(date('d F Y', strtotime($post->post_date))); ?></p>
                                            </div>
                                            <div class="comment_view">
                                                <p class="comment">
                                                    <span class="lnr lnr-bubble"></span><?php echo e($comments->has($post->post_id) ? count($comments[$post->post_id]) : 0); ?></p>
                                                <p class="view">
                                                    <span class="lnr lnr-eye"></span><?php echo e($post->post_view); ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn_text">
                                        <div><?php echo e(substr($post->post_short_desc,0,300).'...'); ?></div>
                                        <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="btn btn--md theme-button"><?php echo e(Helper::translation(2878,$translate)); ?></a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="pagination-area">
                            <div class="turn-page" id="blogpager"></div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <aside class="sidebar sidebar--blog">

                            <div class="sidebar-card card--blog_sidebar card--category">
                                <div class="card-title">
                                    <h4><?php echo e(Helper::translation(2879,$translate)); ?></h4>
                                </div>
                                <div class="collapsible-content">
                                    <ul class="card-content">
                                    <?php $__currentLoopData = $catData['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('/blog')); ?>/category/<?php echo e($post->blog_cat_id); ?>/<?php echo e($post->blog_category_slug); ?>">
                                                <span class="lnr lnr-chevron-right"></span><?php echo e($post->blog_category_name); ?>

                                                <span class="item-count"><?php echo e($category_count->has($post->blog_cat_id) ? count($category_count[$post->blog_cat_id]) : 0); ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <!-- end /.collapsible_content -->
                            </div>

                            <div class="sidebar-card sidebar--post card--blog_sidebar">
                                <div class="card-title">
                                    <!-- Nav tabs -->
                                    <ul class="nav post-tab" role="tablist">
                                        <li>
                                            <a href="#popular" class="active" id="popular-tab" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true"><?php echo e(Helper::translation(2880,$translate)); ?></a>
                                        </li>
                                        <li>
                                            <a href="#latest" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false"><?php echo e(Helper::translation(2881,$translate)); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.card-title -->

                                <div class="card_content">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade show" id="popular" aria-labelledby="popular-tab">
                                            <ul class="post-list">

                                                <?php $__currentLoopData = $blog['popular']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="thumbnail_img">
                                                    <?php if($post->post_image!=''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>">
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="title_area">
                                                        <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>">
                                                            <h4><?php echo e($post->post_title); ?></h4>
                                                        </a>
                                                        <div class="date_time">
                                                            <span class="lnr lnr-clock"></span>
                                                            <p><?php echo e(date('d F Y', strtotime($post->post_date))); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </ul>
                                            <!-- end /.post-list -->
                                        </div>
                                        <!-- end /.tabpanel -->

                                        <div role="tabpanel" class="tab-pane fade" id="latest" aria-labelledby="latest-tab">
                                            <ul class="post-list">

                                            <?php $__currentLoopData = $blogPost['latest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="thumbnail_img">
                                                    <?php if($post->post_image!=''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>">
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="title_area">
                                                        <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>">
                                                            <h4><?php echo e($post->post_title); ?></h4>
                                                        </a>
                                                        <div class="date_time">
                                                            <span class="lnr lnr-clock"></span>
                                                            <p><?php echo e(date('d F Y', strtotime($post->post_date))); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </ul>
                                            <!-- end /.post-list -->
                                        </div>
                                        <!-- end /.tabpanel -->
                                    </div>
                                    <!-- end /.tab-content -->
                                </div>
                                <!-- end /.card_content -->
                            </div>

                            <?php echo $__env->make('./components/newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="banner">
                                <?php if($allsettings->site_blog_adbanner_link !="" ): ?> 
                                    <a href="<?php echo e($allsettings->site_blog_adbanner_link); ?>" target="_blank"> 
                                <?php endif; ?>

                                <?php if($allsettings->site_blog_adbanner!=''): ?>
                                    <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_blog_adbanner); ?>" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="">
                                <?php endif; ?>

                                <?php if($allsettings->site_blog_adbanner_link !="" ): ?> 
                                    </a> 
                                <?php endif; ?>
                            </div>

                        </aside>
                        <!-- end /.aside -->
                    </div>
                    <!-- end /.col-md-4 -->

                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>
    <?php else: ?>
        <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/gotemplate/public_html/resources/views/blog.blade.php ENDPATH**/ ?>