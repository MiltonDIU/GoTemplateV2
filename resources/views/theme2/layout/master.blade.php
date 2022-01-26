<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTemplate</title>
    <link rel="icon" href="{{ asset('public/assets/theme2/images/fav.png') }}" type="image/fav" sizes="16x16">

    <!-- Google Fonts start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Google Fonts end -->

    @include('theme2/stylesheet')

    @stack('styles')
    @stack('others')

    <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/responsive.css') }}">
       <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/custom.css') }}">
    

</head>

<body>
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
<!-- ------------------------------ header & Nav start ------------------------------ -->

<div class="header_nav sticky-top">

    <!--  header start  -->
    <div class="top_header">
        <!-- conatiner start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="top_menu_left">
                        <div class="left_box">
                            <p>Have any question?</p>
                        </div>

                        <!--<div class="left_box">-->
                        <!--    <i class="fas fa-phone-alt"></i>-->
                        <!--    <p>+88 01847334879</p>-->
                        <!--</div>-->

                        <div class="left_box">
                            <i class="fas fa-envelope"></i>
                            <p>operation@gotemplate.net</p>
                        </div>
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-4">

                    <ul class="top_menu">

                        <li>
                            <a href="{{url('user-guideline')}}">User Guideline</a>
                        </li>
                        <li class="top_flash_sale">
                            <a class="link" href="{{ URL::to('/flash-sale') }}">
                                <!-- <i class="fas fa-dollar-sign"></i> -->

                                <span class="iconify" data-icon="tabler:currency-taka" data-width="20"></span>
                                {{ Helper::translation(2993,$translate) }}
                            </a>


                        </li>
         
                      
                        @if(Auth::check())
                        <!-- customer/vendor, if id == 1 its admin and then doesn't show cart -->
                            @if(Auth::user()->id != 1)
                                <li class="h_cart">
                                    <a href="{{ url('/cart') }}" class="header_cart"><i class="fas fa-shopping-cart"></i></a>
                                    <span class = "header_cart_notification">{{ $cartcount }}</span>
                                    @if($cartcount != 0)
                                        <div class="cart_dropdown">

                                            @php $subtotal = 0; @endphp
                                            @foreach($cartitem['item'] as $cart)
                                                <div class="cart_item_box">
                                                    <div class="cart_item_img">
                                                        <a href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                                                            @if($cart->item_thumbnail!='')
                                                                <img src="{{ url('/') }}/public/storage/items/{{ $cart->item_thumbnail }}" alt="{{ $cart->item_name }}">
                                                            @else
                                                                <img  src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->item_name }}">
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <div class="cart_item_details">
                                                        <a class="cart_item_name" href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                                                            {{ $cart->item_name }}
                                                        </a>

                                                        <p class="cart_item_price">
                                                            @if($cart->free_download==1 and ($allsettings->site_free_end_date)>date('Y-m-d'))
                                                                Free
                                                            @else
                                                                {{ $allsettings->site_currency }}
                                                                {{ $cart->item_price }}
                                                            @endif
                                                        </p>
                                                    </div>

                                                    <div class="cart_item_delete">
                                                        <a href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                @php
                                                    if($cart->free_download==1 and ($allsettings->site_free_end_date)>date('Y-m-d')){
                                                        $subtotal += 0;
                                                    }else{
                                                        $subtotal += $cart->item_price;
                                                    }
                                                @endphp
                                            @endforeach


                                            <div class="cart_amount">
                                                <p>{{ Helper::translation(2896,$translate) }} :</p>
                                                <p class="c_price">{{ $subtotal }} {{ $allsettings->site_currency }}</p>
                                            </div>

                                            <div class="cart_button">
                                                <a href="{{ url('/cart') }}">{{ Helper::translation(3021,$translate) }}</a>
                                                <a href="{{ url('/checkout') }}">{{ Helper::translation(2899,$translate) }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="cart_dropdown">
                                            <p>{{ Helper::translation(2898,$translate) }}</p>
                                        </div>
                                    @endif

                                </li>
                            @endif
                        @else
                                <li class="h_cart">
                                    <a href="#" class="header_cart"><i class="fas fa-shopping-cart"></i></a>
                                    <span class = "header_cart_notification">0</span>

                                    <div class="cart_dropdown">
                                        <p>{{ Helper::translation(2898,$translate) }}</p>
                                    </div>
                                </li>
                        @endif


                    </ul>



                </div>
            </div>
        </div>
        <!-- conatiner end -->
    </div>
    <!--  header end  -->

    <!--  navbar start  -->
    <nav class="navbar">
        <!-- container start -->
        <div class="container">
            @if($allsettings->site_logo != '')
                <a class="navbar-brand" href="{{ URL::to('/') }}">
                    <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}">
                </a>
            @endif
                <ul class="navbar-nav nav_sign nav_after">
                    <li>
                        <a  href="{{ URL::to('/start-selling') }}" class="sign_in nav_selling">{{ Helper::translation(3018,$translate) }}</a>
                    </li>
                    @if(!Auth::check())
                        <li>
                            <a href="{{ url('/login') }}" class="sign_in">Sign in</a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}" class="sign_up">Sign up</a>
                        </li>
                    @endif
                    @if(Auth::check())
                        <div style="padding-left: 20px;" class="author-author__info inline has_dropdown ml-3">
                            <div class="author__avatar">
                                @if(Auth::user()->user_photo != '')
                                    <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->name }}">
                                @endif
                            </div>

                            <div class="autor__info author_info--m10">
                                <p class="name text-truncate">{{ Auth::user()->username }}</p>
                                <p class="ammount">{{ Auth::user()->earnings }} {{ $allsettings->site_currency }}</p>
                            </div>

                            <div class="dropdowns dropdown--author dropdown--user">
                                <ul>
                                    @if(Auth::user()->user_type == 'admin')
                                        <li>
                                            <a href="{{ URL::to('/admin') }}" target="_blank">
                                                <span class="lnr lnr-cog"></span>{{ Helper::translation(3022,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">
                                                <span class="lnr lnr-exit"></span>{{ Helper::translation(3023,$translate) }}
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->user_type == 'vendor')
                                        <li>
                                            <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                                <i class="fas fa-user"></i>{{ Helper::translation(2926,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/profile-settings') }}">
                                                <i class="fas fa-cog"></i>{{ Helper::translation(2927,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/purchases') }}">
                                                <i class="fas fa-shopping-cart"></i>{{ Helper::translation(3024,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/favourites') }}">
                                                <i class="fas fa-heart"></i>{{ Helper::translation(2929,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/likes') }}">
                                                <i class="fas fa-thumbs-up"></i>{{ "Likes" }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ URL::to('/coupon') }}">
                                                <i class="fas fa-ticket-alt"></i>{{ Helper::translation(2919,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/sales') }}">
                                                <i class="fas fa-dollar-sign"></i>{{ Helper::translation(2930,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/manage-item') }}">
                                                <i class="fas fa-stream"></i>{{ Helper::translation(2932,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/withdrawal') }}">
                                                <i class="fas fa-briefcase"></i>{{ Helper::translation(2933,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">
                                                <i class="fas fa-sign-out-alt"></i>{{ Helper::translation(3023,$translate) }}
                                            </a>
                                        </li>
                                    @endif


                                    @if(Auth::user()->user_type == 'customer')
                                        <li>
                                            <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                                <i class="fas fa-user"></i>{{ Helper::translation(2926,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/profile-settings') }}">
                                                <i class="fas fa-cog"></i>{{ Helper::translation(2927,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/purchases') }}">
                                                <i class="fas fa-shopping-cart"></i>{{ Helper::translation(3024,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/favourites') }}">
                                                <i class="fas fa-heart"></i>{{ Helper::translation(2929,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::to('/likes') }}">
                                                <i class="fas fa-thumbs-up"></i>{{ "Likes" }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ URL::to('/withdrawal') }}">
                                                <i class="fas fa-briefcase"></i>{{ Helper::translation(2933,$translate) }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">
                                                <i class="fas fa-sign-out-alt"></i>{{ Helper::translation(3023,$translate) }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                </li>

            </ul>
        </div>
        <!-- container start -->
    </nav>
    <!--  navbar end  -->
</div>

<!-- ------------------------------ header & Nav start ------------------------------ -->




@yield('content')

<!-- ------------------------------ SSL Commerez start ------------------------------ -->
<section id="ssl_commerez">
    <div class="container">
        <div class="ssl_img_box">
            <img src="{{url('public/assets/theme2/images/SSLCOMMERZ-Pay-With-logo-All-Size_Aug-21-01.png')}}" alt="SSL Commerez payment">
        </div>
    </div>
</section>
<!-- ------------------------------ SSL Commerez end ------------------------------ -->

<footer id="footer">
    <!-------------- Return to Top ---------------->
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

    <!-------------- Messenger start ------------->
    <!--<a href="#" id="messenger"><i class="fab fa-facebook-messenger"></i></a>-->

    <div class="container">
        <div class="footer_main">
            <div class="row">

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="footer_follow">
                        <div class="follow_us">
                            <p class="footer_title">Follow <span class="r_title">Us</span></p>
                            <div class="follow_icons">
                                <a target="_blank" href="{{ $allsettings->facebook_url }}"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="{{ $allsettings->twitter_url }}"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="{{ $allsettings->instagram_url }}"><i class="fab fa-instagram"></i></a>
                                <a target="_blank" href="{{ $allsettings->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>

                        <div class="contact_us">
                            <p class="footer_title">Contact <span class="r_title">Us</span></p>
                            <div class="contact_main">
                                <!--<div class="contact_details">-->
                                <!--    <i class="fa fa-phone"></i>-->
                                <!--    <a href="tel:+8801847334879">+88 01847334879</a>-->
                                <!--</div>-->

                                <div class="contact_details">
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:operation@gotemplate.net">operation@gotemplate.net</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="footer_link">
                        <p class="footer_title">POPULAR <span class="r_title">CATEGORIES</span></p>
                        <div class="all_links">
                            <ul>
                                @foreach($maincategory['view'] as $maincategory)
                                    <li>
                                        <a href="{{ URL::to('/shop/category/') }}/{{$maincategory->cat_id}}/{{$maincategory->category_slug}}">{{ $maincategory->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="footer_link">
                        <p class="footer_title">Help &  <span class="r_title">Support</span></p>
                        <div class="all_links">
                            <ul>
                                @if($allsettings->site_blog_display == 1)
                                    <li><a href="{{ URL::to('/blog') }}">Blog</a></li>
                                @endif
                                <li><a href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate) }}</a></li>
                                <li><a href="{{url('user-guideline')}}">{{ "User Guideline" }}</a></li>

                            </ul>
                        </div>
                        <p class="footer_title help_support">More <span class="r_title">Info</span></p>
                        <div class="all_links">
                            @foreach($footerpages['pages'] as $pages)
                                <a href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a>
                            @endforeach
                                <a href="{{ URL::to('/top-authors') }}">{{ Helper::translation(3028,$translate) }}</a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">

                    <div class="newsletter">
                        <p class="footer_title">{{ Helper::translation(3005,$translate) }}</p>
                        <p class="newsletter_details">{{ $allsettings->site_newsletter }}</p>

                        <div>
                            @if ($message = Session::get('news-success'))
                                <div class="alert alert-success" role="alert">
                                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif

                            @if ($message = Session::get('news-error'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="alert_icon lnr lnr-warning"></span>
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif

                            @if (!$errors->isEmpty())
                                <div class="alert alert-danger" role="alert">
                                    <span class="alert_icon lnr lnr-warning"></span>

                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <form action="{{ route('newsletter') }}" id="footer_form" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input
                                type="email"
                                class="footer_subscribe"
                                placeholder="{{ Helper::translation(3006,$translate) }}"
                                data-bvalidator="required"
                                name="news_email"
                            >
                            <button type="submit" class="subscribe_button">
                                {{ Helper::translation(3007,$translate) }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="footer_copyright">
        <!-- container start -->
        <div class="container">
            <div class="f_copy_main">
                <div class="f_copy">
                    <p>&copy; {{ date('Y') }} <a href="#" class="c_link">GoTemplate</a> | Digital Product & Template Marketplace in Bangladesh. All rights reserved.</p>
                </div>

                <div class="footer_policy">
                    @foreach($copyRightMenuData['pages'] as $pages)
                        <a class="copy_link" href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- container end -->
    </div>







</footer>

<script src="{{ asset('public/assets/theme2/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/popper.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/slick.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/waypoints.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/jquery.countdown.js') }}"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>


<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 200) { // If page is scrolled more than 200px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });

    $('#return-to-top').click(function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });
</script>

<script src="{{ asset('public/assets/theme2/js/script.js') }}"></script>
@include('theme2.javascript')
@stack('script')


    <style>
        .Locale_en_GB div{
            background: red!important;
            color:green;
        }
    </style>
</body>

</html>
