<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTemplate</title>
    <link rel="icon" href="images/fav.png" type="image/fav" sizes="16x16">

    <!-- Google Fonts start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Google Fonts end -->

    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/slick.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/theme2/css/custom.css') }}">

    @stack('styles')
    @stack('others')
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

<!-- ------------------------------ header start ------------------------------ -->
<header>
    <!-- conatiner start -->
    <div class="container">
        <div class="row">
            <div class="offset-lg-7 col-lg-5 offset-sm-3 col-sm-9 offset-md-4 col-md-8 offset-xl-8 col-xl-4">
                <ul class="top_menu">
                    <li>
                        <a class="link" href="{{ URL::to('/start-selling') }}">{{ Helper::translation(3018,$translate) }}</a>
                    </li>
                    <li class="top_flash_sale">
                        <a href="{{ URL::to('/flash-sale') }}">
                            <span class="iconify" data-icon="tabler:currency-taka" data-width="20"></span>
                            {{ Helper::translation(2993,$translate) }}
                        </a>
                    </li>
                    @if(Auth::guest())
                        <li class="h_cart">
                            <a href="#" class="header_cart"><i class="fas fa-shopping-cart"></i></a>
                            <span class = "header_cart_notification">0</span>

                            <div class="cart_dropdown">
                                <p>{{ Helper::translation(2898,$translate) }}</p>
                            </div>
                        </li>
                        @endif

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
                        @endif

                        @if($cartcount == 0)
                             <li class="h_cart">
                                <a href="#" class="header_cart"><i class="fas fa-shopping-cart"></i></a>
                                <span class = "header_cart_notification">0</span>

                                <div class="cart_dropdown">
                                    <p>{{ Helper::translation(2898,$translate) }}</p>
                                </div>
                            </li>
                        @endif

                    </li>

                        @endif
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <!-- conatiner end -->
</header>
<!-- ------------------------------ header end ------------------------------ -->

<!-- ------------------------------ navbar start ------------------------------ -->

<!-- ------------------------------ navbar end ------------------------------ -->


<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        @if($allsettings->site_logo != '')
            <a class="navbar-brand" href="{{ URL::to('/') }}">
                <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}">
            </a>
        @else
            <a class="navbar-brand" href="{{ URL::to('/') }}">
            <img src="{{ url('public/assets/theme2/images/Logo.png')}}" alt="Logo">
            </a>
        @endif
            @if(!Auth::check())
            <ul class="navbar-nav ms-auto nav_sign">
                <li>
                    <a href="{{ url('/login') }}" class="sign_in">Sign in</a>
                    <a href="{{ url('/register') }}" class="sign_up">Sign up</a>
                </li>
            </ul>
            @elseif(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="author_img_info">
                            <div class="author_img">
                                @if(Auth::user()->user_photo != '')
                                    <img src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->name }}">
                                @else
                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->name }}">
                                @endif
                            </div>
                            <div class="author_info">
                                <p class="author_name">{{ Auth::user()->username }}</p>
                                <p class="author_ammount">{{ Auth::user()->earnings }} {{ $allsettings->site_currency }}</p>
                            </div>
                            <div class="dropdown_icon">
                                <i class="fas fa-cog"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @if(Auth::user()->user_type == 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ URL::to('/admin') }}" target="_blank">
                                    <i class="fas fa-cog"></i>{{ Helper::translation(3022,$translate) }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>{{ Helper::translation(3023,$translate) }}
                                </a>
                            </li>
                        @endif

                            @if(Auth::user()->user_type == 'vendor')
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                        <i class="fas fa-user"></i>{{ Helper::translation(2926,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a  class="dropdown-item" href="{{ URL::to('/profile-settings') }}">
                                        <i class="fas fa-cog"></i>{{ Helper::translation(2927,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/purchases') }}">
                                        <i class="fas fa-shopping-cart"></i>{{ Helper::translation(3024,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/favourites') }}">
                                        <i class="fas fa-heart"></i>{{ Helper::translation(2929,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/likes') }}">
                                        <i class="fas fa-thumbs-up"></i>{{ "Likes" }}
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/coupon') }}">
                                        <i class="fas fa-ticket-alt"></i>{{ Helper::translation(2919,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/sales') }}">
                                        <i class="fas fa-dollar-sign"></i>{{ Helper::translation(2930,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/manage-item') }}">
                                        <i class="fas fa-stream"></i>{{ Helper::translation(2932,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/withdrawal') }}">
                                        <i class="fas fa-briefcase"></i>{{ Helper::translation(2933,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="fas fa-sign-out-alt"></i>{{ Helper::translation(3023,$translate) }}
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                        <i class="fas fa-user"></i>{{ Helper::translation(2926,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/profile-settings') }}">
                                        <i class="fas fa-cog"></i>{{ Helper::translation(2927,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/purchases') }}">
                                        <i class="fas fa-shopping-cart"></i>{{ Helper::translation(3024,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/favourites') }}">
                                        <i class="fas fa-heart"></i>{{ Helper::translation(2929,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/likes') }}">
                                        <i class="fas fa-thumbs-up"></i>{{ "Likes" }}
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ URL::to('/withdrawal') }}">
                                        <i class="fas fa-briefcase"></i>{{ Helper::translation(2933,$translate) }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="fas fa-sign-out-alt"></i>{{ Helper::translation(3023,$translate) }}
                                    </a>
                                </li>
                            @endif
                    </ul>
                </li>
            </ul>
            @endif
    </div>
</nav>



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

<!-- ------------------------------ Footer start ------------------------------ -->
<footer>
    <!-- ------------------------------ Return to Top start ------------------------------ -->
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>
    <!-- ------------------------------ Return to Top end ------------------------------ -->

    <!-- ------------------------------ Messenger start ------------------------------ -->
{{--    <a href="#" id="messenger"><i class="fab fa-facebook-messenger"></i></a>--}}
    <!-- ------------------------------ Messenger end ------------------------------ -->

    <!-- container start -->
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
                                <div class="contact_details">
                                    <i class="fas fa-phone-alt"></i>
                                    <p><a href="tel:+8801847334879">+88 01847334879</a></p>
                                </div>

                                <div class="contact_details">
                                    <i class="fas fa-envelope"></i>
                                    <p> <a href="mailto:operation@gotemplate.net">operation@gotemplate.net</a> </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="footer_link">
                        <p class="footer_title">POPULAR <span class="r_title">CATEGORIES</span></p>
                        <div class="all_links">
                            <a href="#">Scripts</a>
                            <a href="#">Apps</a>
                            <a href="#">Themes</a>
                            <a href="#">Plugins</a>
                            <a href="#">Graphics</a>
                            <a href="#">Business</a>
                            <a href="#">Education</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="footer_link">
                        <p class="footer_title">More <span class="r_title">Info</span></p>
                        <div class="all_links">
                            <a href="top-authors.html">Top Authors</a>
                            <a href="about-us.html">About Us</a>
                            <a href="blog-main.html">Blog</a>
                            <a href="contact.html">Contact</a>
                            <a href="payment-policy.html">Payment Policy</a>
                            <a href="privacy-policy.html">Privacy Policy</a>
                            <a href="terms-conditions.html">Terms & Conditions</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="newsletter">
                        <p class="footer_title">Newsletter</p>
                        <p class="newsletter_details">Want more script, themes & templates? Subscribe to our mailing list to receive an update when new items arrive!</p>
                        <form action="#">
                            <input type="email" class="footer_subscribe" placeholder="Enter your email">
                            <button type="submit" class="subscribe_button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->

    <div class="footer_copyright">
        <!-- container start -->
        <div class="container">
            <p>© 2021 <a href="#" class="c_link">GoTemplate</a> | Digital Product & Template Marketplace in Bangladesh. All rights reserved.</p>
        </div>
        <!-- container end -->
    </div>
</footer>

<!-- ------------------------------ Footer end ------------------------------ -->

<script src="{{ url('public/assets/theme2/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ url('public/assets/theme2/js/popper.min.js') }}"></script>
<script src="{{ url('public/assets/theme2/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/assets/theme2/js/slick.min.js') }}"></script>
<script src="{{ url('public/assets/theme2/js/waypoints.min.js') }}"></script>
<script src="{{ url('public/assets/theme2/js/jquery.counterup.min.js') }}"></script>
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

<script>
    // ===== Return to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 200) {        // If page is scrolled more than 200px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });

    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
</script>

<script src="{{ url('public/assets/theme2/js/script.js') }}"></script>
@stack('script')

</body>
</html>
