<footer class="footer-area">
        <div class="footer-big section--padding">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-footer">
                        <h4 class="footer-widget-title text--white"><?php echo e(Helper::translation(3001,$translate)); ?></h4>
                            
                            <ul class="info-contact">
                                
                                <li>
                                    <span class="info-count"><?php echo e($member_count); ?></span>
                                    <span><?php echo e(Helper::translation(3002,$translate)); ?></span>
                                </li>
                                
                                
                                <li>
                                    <span class="info-count"><?php echo e($total_sale); ?></span>
                                    <span><?php echo e(Helper::translation(2930,$translate)); ?></span>
                                </li>
                                
                                
                                <li>
                                    <span class="info-count"><?php echo e($total_files); ?></span>
                                    <span><?php echo e(Helper::translation(3003,$translate)); ?></span>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- end /.info-footer -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white"><?php echo e(Helper::translation(3004,$translate)); ?></h4>
                            <ul>
                                <?php $__currentLoopData = $maincategory['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maincategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(URL::to('/shop/category/')); ?>/<?php echo e($maincategory->cat_id); ?>/<?php echo e($maincategory->category_slug); ?>"><?php echo e($maincategory->category_name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->

                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white"><?php echo e(Helper::translation(2999,$translate)); ?></h4>
                            <ul>
                                <?php if($allsettings->site_blog_display == 1): ?>
                                <li>
                                    <a href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(2877,$translate)); ?></a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(2910,$translate)); ?></a>
                                </li>
                                 <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_id); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a>
                                                </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- end /.col-md-5 -->

                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter">
                           <div class="content">
                            <h4 class="footer-widget-title text--white"><?php echo e(Helper::translation(3005,$translate)); ?></h4>
                            <p><?php echo e($allsettings->site_newsletter); ?></p>
                            <div>
                   
                            <?php if($message = Session::get('news-success')): ?>
                                   <div class="alert alert-success" role="alert">
                                                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                                    <?php echo e($message); ?>

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                            <?php endif; ?>
                            
                            
                            <?php if($message = Session::get('news-error')): ?>
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
                          
                            <form action="<?php echo e(route('newsletter')); ?>" id="footer_form" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                            <div class="input-group">
                              
                                 <input type="email" class="form-control" placeholder="<?php echo e(Helper::translation(3006,$translate)); ?>" data-bvalidator="required" name="news_email">
                                 <span class="input-group-btn">
                                 <button class="btn btn--sm theme-button" type="submit"><?php echo e(Helper::translation(3007,$translate)); ?></button>
                                 </span>
                               
                                  </div>
                                  </form>  
                            </div>
                            </div>
                           
                            
                            <!-- end /.social -->
                        </div>
                        <!-- end /.newsletter -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-left">
                            <p>&copy; <?php echo e(date('Y')); ?>

                                <a href="<?php echo e(URL::to('/')); ?>"><?php echo e($allsettings->site_title); ?></a>. <?php echo e(Helper::translation(3008,$translate)); ?>

                            </p>
                        </div>

                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="text-right">
                            <div class="social social--color--filled">
                                <ul>
                                    <?php if($allsettings->facebook_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->facebook_url); ?>" target="_blank">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($allsettings->twitter_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->twitter_url); ?>" target="_blank">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($allsettings->gplus_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->gplus_url); ?>" target="_blank">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($allsettings->pinterest_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->pinterest_url); ?>" target="_blank">
                                            <span class="fa fa-pinterest"></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($allsettings->linkedin_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->linkedin_url); ?>" target="_blank">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                   <?php endif; ?> 
                                   <?php if($allsettings->instagram_url != ''): ?>
                                    <li>
                                        <a href="<?php echo e($allsettings->instagram_url); ?>" target="_blank">
                                            <span class="fa fa-instagram"></span>
                                        </a>
                                    </li>
                                   <?php endif; ?>
                                   
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                    <div class="go_top">
                            <span class="lnr lnr-chevron-up"></span>
                        </div>
                </div>
            </div>
        </div>
    </footer><?php /**PATH /home/gotemplate/public_html/resources/views/footer.blade.php ENDPATH**/ ?>