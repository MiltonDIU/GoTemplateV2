<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if($allsettings->site_blog_display == 1): ?> <?php echo e($edit['post']->post_title); ?> <?php else: ?> <?php echo e(Helper::translation(2860,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload single-blog-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($allsettings->site_blog_display == 1): ?>
        <?php echo $__env->make("./components/hero", [
            "list" => [array("path" => "/blog", "text" => 2877)],
            "headline" => $edit["post"]->post_title
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
    
        <section class="blog_area section--padding2">
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
            
                        
            <div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single_blog blog--default">
                            <article>
                                <figure>
                                    <?php if($edit['post']->post_image!=''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($edit['post']->post_image); ?>" alt="<?php echo e($edit['post']->post_title); ?>">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($edit['post']->post_title); ?>">
                                            <?php endif; ?>
                                </figure>
                                <div class="blog__content">
                                    <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($edit['post']->post_slug); ?>" class="blog__title">
                                        <h4><?php echo e($edit['post']->post_title); ?></h4>
                                    </a>

                                    <div class="blog__meta">
                                        
                                        <div class="date_time">
                                            <span class="lnr lnr-clock"></span>
                                            <p><?php echo e(date('d F Y', strtotime($edit['post']->post_date))); ?></p>
                                        </div>
                                        <div class="comment_view">
                                            <p class="comment">
                                                <span class="lnr lnr-bubble"></span><?php echo e($count); ?></p>
                                            <p class="view">
                                                <span class="lnr lnr-eye"></span><?php echo e($edit['post']->post_view); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="single_blog_content">
                                    <div>
                                    <?php echo html_entity_decode($edit['post']->post_desc); ?>

                                    </div>

                                    <div class="share_tags flex-center">
                                        <div class="share">
                                            <p>Share this post</p>
                                            <div class="social_share active">
                                                <ul class="social_icons">
                                                    <li>
                                                        <a class="share-button" data-share-url="<?php echo e(URL::to('/single')); ?>/<?php echo e($edit['post']->post_slug); ?>" data-share-network="facebook" data-share-text="<?php echo e($edit['post']->post_short_desc); ?>" data-share-title="<?php echo e($edit['post']->post_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($edit['post']->post_image); ?>" href="javascript:void(0)">
                                                            <span class="fa fa-facebook"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share-button" data-share-url="<?php echo e(URL::to('/single')); ?>/<?php echo e($edit['post']->post_slug); ?>" data-share-network="twitter" data-share-text="<?php echo e($edit['post']->post_short_desc); ?>" data-share-title="<?php echo e($edit['post']->post_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($edit['post']->post_image); ?>" href="javascript:void(0)">
                                                            <span class="fa fa-twitter"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share-button" data-share-url="<?php echo e(URL::to('/single')); ?>/<?php echo e($edit['post']->post_slug); ?>" data-share-network="googleplus" data-share-text="<?php echo e($edit['post']->post_short_desc); ?>" data-share-title="<?php echo e($edit['post']->post_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($edit['post']->post_image); ?>" href="javascript:void(0)">
                                                            <span class="fa fa-google-plus"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share-button" data-share-url="<?php echo e(URL::to('/single')); ?>/<?php echo e($edit['post']->post_slug); ?>" data-share-network="linkedin" data-share-text="<?php echo e($edit['post']->post_short_desc); ?>" data-share-title="<?php echo e($edit['post']->post_title); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($edit['post']->post_image); ?>" href="javascript:void(0)">
                                                            <span class="fa fa-linkedin"></span>
                                                        </a>
                                                    </li>
                                                                                                    
                                                </ul>
                                            </div>
                                            <!-- end social_share -->
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="comment_area">
                            <div class="comment__title">
                                <h4><?php echo e($count); ?> <?php echo e(Helper::translation(3054,$translate)); ?></h4>
                            </div>

                            <div class="comment___wrapper">
                                <ul class="media-list">
                                    
                                    <?php $__currentLoopData = $comment['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="depth-1">
                                        <div class="media">
                                            <div class="pull-left no-pull-xs">
                                            
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" class="media-object" alt="<?php echo e($comment->comment_name); ?>">
                                            
                                            </div>
                                            <div class="media-body">
                                                <div class="media_top">
                                                    <div class="heading_left pull-left">
                                                        
                                                            <h4 class="media-heading"><?php echo e($comment->comment_name); ?></h4>
                                                        
                                                        <span><?php echo e(date('d F Y', strtotime($comment->comment_date))); ?></span>
                                                    </div>
                                                    
                                                </div>
                                                <p><?php echo e($comment->comment_content); ?></p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                </ul>
                            </div>
                            <!-- end /.comment___wrapper -->
                        </div>

                        <div class="comment_area comment--form">
                            <!-- start reply_form -->
                            <div class="comment__title">
                                <h4><?php echo e(Helper::translation(3185,$translate)); ?></h4>
                            </div>
                            <div class="commnet_form_wrapper">
                                <div class="row">
                                    <!-- start form -->
                                    <form class="cmnt_reply_form" action="<?php echo e(route('single')); ?>" id="comment_form" method="post">
                                    <?php echo e(csrf_field()); ?>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="input_field" type="text" name="comment_name" placeholder="<?php echo e(Helper::translation(2917,$translate)); ?>" data-bvalidator="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="input_field" type="text" name="comment_email" placeholder="<?php echo e(Helper::translation(2915,$translate)); ?>" data-bvalidator="required,email">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="input_field" name="comment_content" placeholder="<?php echo e(Helper::translation(3186,$translate)); ?>" rows="10" cols="80" data-bvalidator="required"></textarea>
                                            </div>
                                            
                                            <input type="hidden" name="post_id" value="<?php echo e($edit['post']->post_id); ?>">

                                            <button type="submit" class="btn btn--default theme-button" name="btn"><?php echo e(Helper::translation(3064,$translate)); ?></button>
                                        </div>
                                    </form>
                                    <!-- end form -->
                                </div>
                            </div>
                            <!-- end /.commnet_form_wrapper -->
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
                            </div>

                            <div class="sidebar-card sidebar--post card--blog_sidebar">
                                <div class="card-title">
                                    <!-- Nav tabs -->
                                    <ul class="nav post-tab" role="tablist">
                                        <li>
                                            <a href="#popular" id="popular-tab" class="active" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true"><?php echo e(Helper::translation(2880,$translate)); ?></a>
                                        </li>
                                        <li>
                                            <a href="#latest" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false"><?php echo e(Helper::translation(2881,$translate)); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                

                                <div class="card_content">
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
                                        </div>
                                        

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
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="sidebar-card card--blog_sidebar card--tags">
                                <h4 class="card-title"><?php echo e(Helper::translation(2974,$translate)); ?></h4>

                                <ul class="tags p-4">
                                    <?php $__currentLoopData = $post_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('/tag')); ?>/blog/<?php echo e(strtolower(str_replace(' ','-',$tags))); ?>"><?php echo e($tags); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </ul>
                            </div>
                            

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
                    </div>
                    
                </div>
            </div>
            
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
<?php endif; ?><?php /**PATH /home/gotemplate/public_html/resources/views/single.blade.php ENDPATH**/ ?>