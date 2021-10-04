<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "103895901969576");
chatbox.setAttribute("attribution", "biz_inbox");

window.fbAsyncInit = function() {
FB.init({
xfbml : true,
version : 'v11.0'
});
};

(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="menu-area">
    <!-- start top menu -->
    <div class="top-menu-area">
        <div class="container height-full">
            <div class="top-menu__wrapper row height-full pl-15 d-flex justify-content-between">

                <!-- start query section -->
                <div class="height-full query-section">
                    <span class="query">Have any question?</span>
                    <span class="query-mobile d-flex align-items-center mx-3">
                        <i class="fa fa-phone mr-1"></i> 
                        <a class="text-white" href="tel:+8801811458897">+8801811458897</a>
                    </span>
                    <span class="query-email d-flex align-items-center">
                        <i class="fa fa-envelope mr-1"></i> 
                        <a class="text-white" href="mailto:gotemplate@emediaglobal.biz">gotemplate@emediaglobal.biz</a>
                    </span>
                </div>
                <!-- end query section -->

                <div class="d-flex align-items-center height-full">
                    <!-- start guest user section -->
                    <?php if(Auth::guest()): ?>
                        <?php if(!Auth::check()): ?>
                        <div class="d-flex mobile-auth__section">
                            <li class="mx-3"><a href="<?php echo e(url('/register')); ?>" class="md-login">Register</a></li>
                            <li><a href="<?php echo e(url('/login')); ?>" class="md-login">Login</a></li>
                        </div>
                        <?php endif; ?>

                        <div class="v_middle height-full top-guest-section">
                            <div class="author-area">
                                <div class="author__notification_area">
                                    <ul class="topmenu">
                                        <li><a href="<?php echo e(URL::to('/start-selling')); ?>"><?php echo e(Helper::translation(3018,$translate)); ?></a></li>
                                        
                                        <!--
                                        <li><a href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(2910,$translate)); ?></a></li>
                                        -->
                                        <!-- start flash sales -->
                                        <li>
                                            <a href="<?php echo e(URL::to('/flash-sale')); ?>" class="fly top-category yellow-color">
                                                <?php echo e(Helper::translation(2993,$translate)); ?>

                                            </a>
                                        </li>
                                        <!-- end flash sales -->

                                        <?php if(!Auth::check()): ?>
                                        <li><a href="<?php echo e(url('/register')); ?>" class="md-login">Register</a></li>
                                        <li><a href="<?php echo e(url('/login')); ?>" class="md-login">Login</a></li>
                                        <?php endif; ?>

                                        <?php if($count_help != 0): ?>
                                            <?php if($help['page']->page_status == 1 && $help['page']->main_menu == 1): ?>
                                                <li><a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($help['page']->page_id); ?>/<?php echo e($help['page']->page_slug); ?>"><?php echo e($help['page']->page_title); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <!--
                                        <?php if($allsettings->site_blog_display == 1): ?>
                                            <li><a href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(2877,$translate)); ?></a></li>
                                        <?php endif; ?>
                                        -->

                                        <li class="has_dropdown" style="margin-right: 10px;">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-cart"></span>
                                                <span class="notification_count purch theme-button">0</span>
                                            </div>
                                            <div class="dropdowns dropdown--cart" style="top: 66px !important; right: 5px; z-index: 77;">
                                                <div class="cart_area">
                                                    <p align="center" class="emptycart"><?php echo e(Helper::translation(2898,$translate)); ?></p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <?php if($allsettings->multi_language == 1): ?>
                                    <div class="inline mover-top10 has_dropdown">
                                        <div class="autor__info">
                                            <p class="name language-title">
                                                <?php echo e($language_title); ?>

                                            </p>
                                        </div>
                                        <div class="dropdowns dropdown--author dropdown--language" style="z-index: 77;">
                                            <ul>
                                                <?php $__currentLoopData = $languages['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(URL::to('/translate')); ?>/<?php echo e($language->language_code); ?>">
                                                            <?php echo e($language->language_name); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>                    
                    <?php endif; ?>
                    <!-- end guest user section -->

                    <!-- start checked user section -->
                    <?php if(Auth::check()): ?>
                        <div class="v_middle height-full d-flex">
                            <div class="author-area">
                                <div class="author__notification_area mr-3">
                                    <ul class="topmenu">
                                        <li>
                                            <a href="<?php echo e(URL::to('/start-selling')); ?>"><?php echo e(Helper::translation(3018,$translate)); ?></a>
                                        </li>

                                        <!-- start flash sales -->
                                        <li>
                                            <a href="<?php echo e(URL::to('/flash-sale')); ?>" class="fly top-category yellow-color">
                                                <?php echo e(Helper::translation(2993,$translate)); ?>

                                            </a>
                                        </li>
                                        <!-- end flash sales -->

                                        <!--
                                        <?php if($allsettings->site_blog_display == 1): ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(2877,$translate)); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        -->
                                        <!--
                                        <li>
                                            <a href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(2910,$translate)); ?></a>
                                        </li>
                                        -->

                                        <?php if($count_help != 0): ?>
                                            <?php if($help['page']->page_status == 1 && $help['page']->main_menu == 1): ?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($help['page']->page_id); ?>/<?php echo e($help['page']->page_slug); ?>"><?php echo e($help['page']->page_title); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <!-- if id == 1, its admin, otherwise its customer or vendor -->
                                        <?php if(Auth::user()->id != 1): ?>
                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <a href="<?php echo e(url('/cart')); ?>"><span class="lnr lnr-cart"></span></a>
                                                    <span class="notification_count purch theme-button"><?php echo e($cartcount); ?></span>
                                                </div>

                                                <?php if($cartcount != 0): ?>
                                                    <div class="dropdowns dropdown--cart" style="top: 66px !important; right: 5px; z-index: 77;">
                                                        <div class="cart_area">
                                                            <?php $subtotal = 0; ?>

                                                            <?php $__currentLoopData = $cartitem['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row col-12 mx-0 py-3">
                                                                    <div class="col-3 px-0">
                                                                        <a class="p-0" href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>/<?php echo e($cart->item_id); ?>">
                                                                            <?php if($cart->item_thumbnail!=''): ?>
                                                                                <img
                                                                                    class="cart-thumb-small p-0"
                                                                                    src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($cart->item_thumbnail); ?>"
                                                                                    alt="<?php echo e($cart->item_name); ?>"
                                                                                >
                                                                            <?php else: ?>
                                                                                <img
                                                                                    class="cart-thumb-small p-0"
                                                                                    src="<?php echo e(url('/')); ?>/public/img/no-image.png"
                                                                                    alt="<?php echo e($cart->item_name); ?>"
                                                                                >
                                                                            <?php endif; ?>
                                                                        </a>
                                                                    </div>

                                                                    <div class="col-7">
                                                                        <a
                                                                            class="title text-truncate p-0"
                                                                            style="width: 100%;"
                                                                            href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>/<?php echo e($cart->item_id); ?>"
                                                                        >
                                                                            <?php echo e($cart->item_name); ?>

                                                                        </a>
                                                                        <p><?php echo e($allsettings->site_currency); ?> <?php echo e($cart->item_price); ?></p>
                                                                    </div>

                                                                    <div class="col-2 flex-center px-0">
                                                                        <a class="remove_cart" href="<?php echo e(url('/cart')); ?>/<?php echo e(base64_encode($cart->ord_id)); ?>" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate)); ?>');">
                                                                            <span class="lnr lnr-trash"></span>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <?php $subtotal += $cart->item_price; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            <div class="total px-4">
                                                                <p>
                                                                    <span><?php echo e(Helper::translation(2896,$translate)); ?> :</span>
                                                                    <?php echo e($subtotal); ?> <?php echo e($allsettings->site_currency); ?>

                                                                </p>
                                                            </div>

                                                            <div class="cart_action">
                                                                <a class="go_cart" href="<?php echo e(url('/cart')); ?>"><?php echo e(Helper::translation(3021,$translate)); ?></a>
                                                                <a class="go_checkout" href="<?php echo e(url('/checkout')); ?>"><?php echo e(Helper::translation(2899,$translate)); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($cartcount == 0): ?>
                                                    <div class="dropdowns dropdown--cart" style="top: 66px !important; right: 5px; z-index: 77;">
                                                        <div class="cart_area">
                                                            <p align="center" class="emptycart"><?php echo e(Helper::translation(2898,$translate)); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <?php if($allsettings->multi_language == 1): ?>
                                    <div class="inline mover15 mover-top10 has_dropdown">
                                        <div class="autor__info">
                                            <p class="name language-title">
                                                <?php echo e($language_title); ?>

                                            </p>
                                        </div>
                                        <div class="dropdowns dropdown--author dropdown--language" style="z-index: 77;">
                                            <ul>
                                                <?php $__currentLoopData = $languages['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="<?php echo e(URL::to('/translate')); ?>/<?php echo e($language->language_code); ?>">
                                                            <?php echo e($language->language_name); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <!-- start /.mobile_content -->
                            <div class="mobile_content ">
                                <span class="lnr lnr-user menu_icon" onclick="showBackdrop()"></span>

                                <!-- offcanvas menu -->
                                <div class="offcanvas-menu closed">
                                    <span class="lnr lnr-cross close_menu" onclick="closeAllDrawer()"></span>
                                    <div class="author-author__info">
                                        <div class="author__avatar v_middle">
                                            <?php if(Auth::user()->user_photo != ''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->name); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="autor__info author_info--m10 v_middle">
                                            <p class="name"><?php echo e(Auth::user()->username); ?></p>
                                            <p class="ammount"><?php echo e(Auth::user()->earnings); ?> <?php echo e($allsettings->site_currency); ?></p>
                                        </div>
                                    </div>
                                    <div class="author__notification_area">
                                        <ul>
                                            <li>
                                                <a href="<?php echo e(url('/cart')); ?>">
                                                    <div class="icon_wrap">
                                                        <span class="lnr lnr-cart" style="color: #333;"></span>
                                                        <span class="notification_count purch"><?php echo e($cartcount); ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--start .author__notification_area -->
                                    <div class="dropdowns dropdown--author dropdown--user">
                                        <ul>
                                            <?php if(Auth::user()->user_type == 'admin'): ?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/admin')); ?>" target="_blank">
                                                        <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(3022,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(url('/logout')); ?>">
                                                        <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if(Auth::user()->user_type == 'vendor'): ?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">
                                                        <span class="lnr lnr-user"></span><?php echo e(Helper::translation(2926,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/profile-settings')); ?>">
                                                        <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(2927,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/purchases')); ?>">
                                                        <span class="lnr lnr-cart"></span><?php echo e(Helper::translation(3024,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/favourites')); ?>">
                                                        <span class="lnr lnr-heart"></span><?php echo e(Helper::translation(2929,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/coupon')); ?>">
                                                        <span class="lnr lnr-location"></span><?php echo e(Helper::translation(2919,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/sales')); ?>">
                                                        <span class="lnr lnr-chart-bars"></span><?php echo e(Helper::translation(2930,$translate)); ?>

                                                    </a>
                                                </li>
                                                <?php /*?><li>
                                                <a href="{{ URL::to('/upload-item') }}">
                                                    <span class="lnr lnr-upload"></span>{{ Helper::translation(2931,$translate) }}</a>
                                            </li><?php */?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/manage-item')); ?>">
                                                        <span class="lnr lnr-book"></span><?php echo e(Helper::translation(2932,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/withdrawal')); ?>">
                                                        <span class="lnr lnr-briefcase"></span><?php echo e(Helper::translation(2933,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(url('/logout')); ?>">
                                                        <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if(Auth::user()->user_type == 'customer'): ?>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">
                                                        <span class="lnr lnr-user"></span><?php echo e(Helper::translation(2926,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/profile-settings')); ?>">
                                                        <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(2927,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/purchases')); ?>">
                                                        <span class="lnr lnr-cart"></span><?php echo e(Helper::translation(3024,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/favourites')); ?>">
                                                        <span class="lnr lnr-heart"></span><?php echo e(Helper::translation(2929,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(URL::to('/withdrawal')); ?>">
                                                        <span class="lnr lnr-briefcase"></span><?php echo e(Helper::translation(2933,$translate)); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(url('/logout')); ?>">
                                                        <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                            <!-- end /.mobile_content -->
                        </div>
                    <?php endif; ?>
                    <!-- end checked user section -->

                    <!-- start search -->
                    <div class="mainmenu__search top-search">
                        <form action="<?php echo e(route('shop')); ?>" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="searc-wrap">
                                <input
                                    type="text" name="product_item"
                                    placeholder="<?php echo e(Helper::translation(3030,$translate)); ?>"
                                    class="rounded"
                                >
                                <button type="submit" class="search-wrap__btn">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end search -->
                </div>

            </div>
        </div>
    </div>
    <!-- end top menu -->

    <!-- start mainmenu -->
    <div class="mainmenu justify-content-center">
        <!-- start .container -->
        <div class="container main-menu__container row pr-0">

            <div class="col-md-12 pr-0 pl-0">

                <!-- start NAVBAR -->
                <nav class="navbar navbar-expand-lg navbar-light pr-0 pl-0 flex-important">
                    
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        id="toggler-btn"
                        onclick="showSidebar()"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    

                    <!-- start mainmenu_search for mobile view -->
                    <div class="mainmenu__search mdevice-on">
                        <form action="<?php echo e(route('shop')); ?>" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="searc-wrap">
                                <input
                                    type="text" name="product_item"
                                    placeholder="<?php echo e(Helper::translation(3030,$translate)); ?>"
                                    class="rounded"
                                >
                                <button type="submit" class="search-wrap__btn">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end mainmenu__search for mobile view -->


                    <div class="d-flex justify-content-between w-100 mainmenu-nav">

                        <div class="v_middle height-full pl-0">
                            <div class="logo">
                                <?php if($allsettings->site_logo != ''): ?>
                                    <a href="<?php echo e(URL::to('/')); ?>">
                                        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" width="180" class="img-fluid">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="d-flex">
                            <ul id="nav" class="d-flex align-items-center">
                                <li>
                                    <a class="fly top-category" href="#" tabindex="1">
                                        <?php echo e(Helper::translation(3025,$translate)); ?>

                                        <i class="fa fa-angle-down ml-1"></i>
                                    </a>
                                    <ul class="dd">
                                        <li><a href="<?php echo e(url('/shop')); ?>/recent-items"><?php echo e(Helper::translation(3026,$translate)); ?></a></li>
                                        <li><a href="<?php echo e(url('/shop')); ?>/featured-items"><?php echo e(Helper::translation(3027,$translate)); ?></a></li>
                                        <li><a href="<?php echo e(url('/free-items')); ?>"><?php echo e(Helper::translation(3016,$translate)); ?></a></li>
                                        <li><a href="<?php echo e(url('/top-authors')); ?>"><?php echo e(Helper::translation(3028,$translate)); ?></a></li>
                                    </ul>
                                </li>

                                <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <!-- main menu: All Items, Themes, Plugins e.t.c -->
                                        <a class="fly top-category" tabindex="1" href="#">
                                            <?php echo e($menu->category_name); ?>

                                            <i class="fa fa-angle-down ml-1"></i>
                                        </a>

                                        <ul class="dd">
                                            <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <!-- Level 1 subcategory -->
                                                    <a href="<?php echo e(URL::to('/shop/subcategory/')); ?>/<?php echo e($subCategory->subcat_id); ?>/<?php echo e($subCategory->subcategory_slug); ?>">
                                                        <?php echo e($subCategory->subcategory_name); ?>

                                                        <?php if($subCategory->subChildren->isNotEmpty()): ?>
                                                            <i class="fa fa-angle-right ml-1 md-hide-element"></i>
                                                            <i class="fa fa-angle-down ml-1 md-show-element"></i>
                                                        <?php endif; ?>
                                                    </a>

                                                    <?php if($subCategory->subChildren->isNotEmpty()): ?>
                                                        <?php echo $__env->make('sub-menu', [
                                                            'childs' => $subCategory->subChildren
                                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endif; ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- start pages -->
                                <!--
                                <li>
                                    <a class="fly top-category" href="#" tabindex="1">
                                        <?php echo e(Helper::translation(3029,$translate)); ?>

                                        <i class="fa fa-angle-down ml-1"></i>
                                    </a>
                                    <ul class="dd">
                                        <?php $__currentLoopData = $allpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_id); ?>/<?php echo e($pages->page_slug); ?>">
                                                <?php echo e($pages->page_title); ?>

                                            </a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                -->
                                <!-- end pages -->
                            
                            </ul>

                            <!-- if checked in - show profile -->
                            <?php if(Auth::check()): ?>
                            <div class="author-author__info inline has_dropdown ml-3">
                                <div class="author__avatar">
                                    <?php if(Auth::user()->user_photo != ''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e(Auth::user()->user_photo); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e(Auth::user()->name); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="autor__info author_info--m10">
                                    <p class="name text-truncate"><?php echo e(Auth::user()->username); ?></p>
                                    <p class="ammount"><?php echo e(Auth::user()->earnings); ?> <?php echo e($allsettings->site_currency); ?></p>
                                </div>

                                <div class="dropdowns dropdown--author dropdown--user">
                                    <ul>
                                        <?php if(Auth::user()->user_type == 'admin'): ?>
                                            <li>
                                                <a href="<?php echo e(URL::to('/admin')); ?>" target="_blank">
                                                    <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(3022,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(url('/logout')); ?>">
                                                    <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(Auth::user()->user_type == 'vendor'): ?>
                                            <li>
                                                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">
                                                    <span class="lnr lnr-user"></span><?php echo e(Helper::translation(2926,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/profile-settings')); ?>">
                                                    <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(2927,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/purchases')); ?>">
                                                    <span class="lnr lnr-cart"></span><?php echo e(Helper::translation(3024,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/favourites')); ?>">
                                                    <span class="lnr lnr-heart"></span><?php echo e(Helper::translation(2929,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/likes')); ?>">
                                                    <span class="lnr lnr-thumbs-up"></span><?php echo e("Likes"); ?>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?php echo e(URL::to('/coupon')); ?>">
                                                    <span class="lnr lnr-location"></span><?php echo e(Helper::translation(2919,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/sales')); ?>">
                                                    <span class="lnr lnr-chart-bars"></span><?php echo e(Helper::translation(2930,$translate)); ?>

                                                </a>
                                            </li>
                                            <?php /*?><li>
                                        <a href="{{ URL::to('/upload-item') }}">
                                            <span class="lnr lnr-upload"></span>{{ Helper::translation(2931,$translate) }}</a>
                                    </li><?php */?>
                                            <li>
                                                <a href="<?php echo e(URL::to('/manage-item')); ?>">
                                                    <span class="lnr lnr-book"></span><?php echo e(Helper::translation(2932,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/withdrawal')); ?>">
                                                    <span class="lnr lnr-briefcase"></span><?php echo e(Helper::translation(2933,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(url('/logout')); ?>">
                                                    <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(Auth::user()->user_type == 'customer'): ?>
                                            <li>
                                                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e(Auth::user()->username); ?>">
                                                    <span class="lnr lnr-user"></span><?php echo e(Helper::translation(2926,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/profile-settings')); ?>">
                                                    <span class="lnr lnr-cog"></span><?php echo e(Helper::translation(2927,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/purchases')); ?>">
                                                    <span class="lnr lnr-cart"></span><?php echo e(Helper::translation(3024,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/favourites')); ?>">
                                                    <span class="lnr lnr-heart"></span><?php echo e(Helper::translation(2929,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(URL::to('/likes')); ?>">
                                                    <span class="lnr lnr-thumbs-up"></span><?php echo e("Likes"); ?>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="<?php echo e(URL::to('/withdrawal')); ?>">
                                                    <span class="lnr lnr-briefcase"></span><?php echo e(Helper::translation(2933,$translate)); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(url('/logout')); ?>">
                                                    <span class="lnr lnr-exit"></span><?php echo e(Helper::translation(3023,$translate)); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    
                    </div>
                </nav>
                <!-- end NAVBAR -->

            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- start .container -->
    </div>
    <!-- end mainmenu -->


    <!-- start mobile sidebar -->
    <div class="mb-sidebar">
        <span class="lnr lnr-cross mb-sidebar__close" onclick="closeAllDrawer()"></span>

        <div class="px-4" style="padding-top: 26px; padding-bottom: 20px;">
            <?php if($allsettings->site_logo != ''): ?>
                <a href="<?php echo e(URL::to('/')); ?>">
                    <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>" width="180" class="img-fluid">
                </a>
            <?php endif; ?>
        </div>

        <ul id="nav" class="d-flex flex-column px-4 scroll-auto">
            <li>
                <a class="fly top-category" href="#" tabindex="1">
                    <?php echo e(Helper::translation(3025,$translate)); ?>

                    <i class="fa fa-angle-down ml-1"></i>
                </a>
                <ul class="dd">
                    <li><a href="<?php echo e(url('/shop')); ?>/recent-items"><?php echo e(Helper::translation(3026,$translate)); ?></a></li>
                    <li><a href="<?php echo e(url('/shop')); ?>/featured-items"><?php echo e(Helper::translation(3027,$translate)); ?></a></li>
                    <li><a href="<?php echo e(url('/free-items')); ?>"><?php echo e(Helper::translation(3016,$translate)); ?></a></li>
                    <li><a href="<?php echo e(url('/top-authors')); ?>"><?php echo e(Helper::translation(3028,$translate)); ?></a></li>
                </ul>
            </li>

            <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <!-- main menu: All Items, Themes, Plugins e.t.c -->
                    <a class="fly top-category" tabindex="1" href="#">
                        <?php echo e($menu->category_name); ?>

                        <i class="fa fa-angle-down ml-1"></i>
                    </a>

                    <ul class="dd">
                        <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <!-- Level 1 subcategory -->
                                <a href="<?php echo e(URL::to('/shop/subcategory/')); ?>/<?php echo e($subCategory->subcat_id); ?>/<?php echo e($subCategory->subcategory_slug); ?>">
                                    <?php echo e($subCategory->subcategory_name); ?>

                                    <?php if($subCategory->subChildren->isNotEmpty()): ?>
                                        <i class="fa fa-angle-right ml-1 md-hide-element"></i>
                                        <i class="fa fa-angle-down ml-1 md-show-element"></i>
                                    <?php endif; ?>
                                </a>

                                <?php if($subCategory->subChildren->isNotEmpty()): ?>
                                    <?php echo $__env->make('sub-menu', [
                                        'childs' => $subCategory->subChildren
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li>
                <a href="<?php echo e(URL::to('/start-selling')); ?>" class="top-category">
                    <?php echo e(Helper::translation(3018,$translate)); ?>

                </a>
            </li>
            <li>
                <a href="<?php echo e(URL::to('/flash-sale')); ?>" class="fly top-category yellow-color">
                    <?php echo e(Helper::translation(2993,$translate)); ?>

                </a>
            </li>
        </ul>
    </div>
    <!-- end mobile sidebar -->

    <!-- start mobile backdrop -->
    <div class="mb-backdrop" onclick="closeAllDrawer()"></div>
    <!-- end mobile backdrop -->
</div>

<script>
    // sidedrawer
    function showSidebar() {
        document.querySelector('.menu-area .mb-sidebar').classList.add('show-sidebar');
        showBackdrop();
    }

    // backdrop
    function showBackdrop() {
        document.querySelector('.menu-area .mb-backdrop').classList.add('show-backdrop');
    }
    function hideBackdrop() {
        document.querySelector('.menu-area .mb-backdrop').classList.remove('show-backdrop');
    }

    // will trigger when you click close icon on drawer and backdrop
    function closeAllDrawer() {
        if(document.querySelector('.menu-area .mb-sidebar')) {
            document.querySelector('.menu-area .mb-sidebar').classList.remove('show-sidebar');
        }
        if(document.querySelector('.menu-area .offcanvas-menu')) {
            document.querySelector('.menu-area .offcanvas-menu').classList.add('closed');
        }

        hideBackdrop();
    }
</script>
<?php /**PATH /home/gotemplate/public_html/resources/views/header.blade.php ENDPATH**/ ?>