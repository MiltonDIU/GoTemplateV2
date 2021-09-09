<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoTemplate</title>
  <link rel="icon" href="public/assets/theme2/images/fav.png" type="image/fav" sizes="16x16">

  <!-- Google Fonts start -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Google Fonts end -->

  @include('theme2/stylesheet')

</head>

<body>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="offset-lg-8 col-lg-4">
          <ul class="top_menu">
            <li>
              <a class="link" href="{{ URL::to('/start-selling') }}">{{ Helper::translation(3018,$translate) }}</a>
            </li>
            <li class="top_flash_sale">
              <a class="link" href="{{ URL::to('/flash-sale') }}"><i class="fas fa-dollar-sign"></i>{{ Helper::translation(2993,$translate) }}</a>
            </li>

            <!-- guest user -->
            @if(Auth::guest())
            <li class="has_dropdown h_cart">
              <div class="icon_wrap">
                <i class="fa fa-shopping-cart"></i>
                <span class="notification_count header_cart_notification purch">0</span>
              </div>
              <div class="dropdowns dropdown--cart" style="top: 58px !important; right: -11px; z-index: 11111;">
                <div class="cart_area">
                  <p align="center" class="emptycart">{{ Helper::translation(2898,$translate) }}</p>
                </div>
              </div>
            </li>
            @endif

            @if(Auth::check())
            <!-- customer/vendor, if id == 1 its admin -->
            @if(Auth::user()->id != 1)
            <li class="has_dropdown h_cart">
              <div class="icon_wrap">
                <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i></a>
                <span class="notification_count header_cart_notification purch">{{ $cartcount }}</span>
              </div>

              @if($cartcount != 0)
              <div class="dropdowns dropdown--cart" style="top: 58px !important; right: -11px; z-index: 11111;">
                <div class="cart_area">
                  @php $subtotal = 0; @endphp

                  @foreach($cartitem['item'] as $cart)
                  <div class="row col-12 mx-0 py-3">
                    <div class="col-3 px-0">
                      <a class="p-0" href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                        @if($cart->item_thumbnail!='')
                        <img class="cart-thumb-small p-0" src="{{ url('/') }}/public/storage/items/{{ $cart->item_thumbnail }}" alt="{{ $cart->item_name }}">
                        @else
                        <img class="cart-thumb-small p-0" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->item_name }}">
                        @endif
                      </a>
                    </div>

                    <div class="col-7">
                      <a class="title text-truncate p-0" style="width: 100%;" href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                        {{ $cart->item_name }}
                      </a>
                      <p>{{ $allsettings->site_currency }} {{ $cart->item_price }}</p>
                    </div>

                    <div class="col-2 flex-center px-0">
                      <a class="remove_cart" href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');">
                        <span class="lnr lnr-trash"></span>
                      </a>
                    </div>
                  </div>

                  @php $subtotal += $cart->item_price; @endphp
                  @endforeach

                  <div class="total px-4">
                    <p>
                      <span>{{ Helper::translation(2896,$translate) }} :</span>
                      {{ $subtotal }} {{ $allsettings->site_currency }}
                    </p>
                  </div>

                  <div class="cart_action">
                    <a class="go_cart" href="{{ url('/cart') }}">{{ Helper::translation(3021,$translate) }}</a>
                    <a class="go_checkout" href="{{ url('/checkout') }}">{{ Helper::translation(2899,$translate) }}</a>
                  </div>
                </div>
              </div>
              @endif

              @if($cartcount == 0)
              <div class="dropdowns dropdown--cart" style="top: 58px !important; right: -11px; z-index: 11111;">
                <div class="cart_area">
                  <p align="center" class="emptycart">{{ Helper::translation(2898,$translate) }}</p>
                </div>
              </div>
              @endif
            </li>
            @endif
            @endif

          </ul>
        </div>
      </div>
    </div>
  </header>


  <nav id="navbar" class="navbar sticky-top">
    <div class="container">
      @if($allsettings->site_logo != '')
      <a class="navbar-brand" href="{{ URL::to('/') }}">
        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" alt="{{ $allsettings->site_title }}">
      </a>
      @endif

      <ul class="navbar-nav ms-auto nav_sign">
        @if(!Auth::check())
        <li>
          <a href="{{ url('/login') }}" class="sign_in">Sign in</a>
          <a href="{{ url('/register') }}" class="sign_up">Sign up</a>
        </li>
        <!-- if checked in - show profile -->
        @elseif(Auth::check())
        <div class="author-author__info inline has_dropdown ml-3">
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
                  <span class="lnr lnr-user"></span>{{ Helper::translation(2926,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/profile-settings') }}">
                  <span class="lnr lnr-cog"></span>{{ Helper::translation(2927,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/purchases') }}">
                  <span class="lnr lnr-cart"></span>{{ Helper::translation(3024,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/favourites') }}">
                  <span class="lnr lnr-heart"></span>{{ Helper::translation(2929,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/likes') }}">
                  <span class="lnr lnr-thumbs-up"></span>{{ "Likes" }}
                </a>
              </li>

              <li>
                <a href="{{ URL::to('/coupon') }}">
                  <span class="lnr lnr-location"></span>{{ Helper::translation(2919,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/sales') }}">
                  <span class="lnr lnr-chart-bars"></span>{{ Helper::translation(2930,$translate) }}
                </a>
              </li>
              <?php /*?><li>
                  <a href="{{ URL::to('/upload-item') }}">
                      <span class="lnr lnr-upload"></span>{{ Helper::translation(2931,$translate) }}</a>
              </li><?php */ ?>
              <li>
                <a href="{{ URL::to('/manage-item') }}">
                  <span class="lnr lnr-book"></span>{{ Helper::translation(2932,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/withdrawal') }}">
                  <span class="lnr lnr-briefcase"></span>{{ Helper::translation(2933,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ url('/logout') }}">
                  <span class="lnr lnr-exit"></span>{{ Helper::translation(3023,$translate) }}
                </a>
              </li>
              @endif

              @if(Auth::user()->user_type == 'customer')
              <li>
                <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                  <span class="lnr lnr-user"></span>{{ Helper::translation(2926,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/profile-settings') }}">
                  <span class="lnr lnr-cog"></span>{{ Helper::translation(2927,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/purchases') }}">
                  <span class="lnr lnr-cart"></span>{{ Helper::translation(3024,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/favourites') }}">
                  <span class="lnr lnr-heart"></span>{{ Helper::translation(2929,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ URL::to('/likes') }}">
                  <span class="lnr lnr-thumbs-up"></span>{{ "Likes" }}
                </a>
              </li>

              <li>
                <a href="{{ URL::to('/withdrawal') }}">
                  <span class="lnr lnr-briefcase"></span>{{ Helper::translation(2933,$translate) }}
                </a>
              </li>
              <li>
                <a href="{{ url('/logout') }}">
                  <span class="lnr lnr-exit"></span>{{ Helper::translation(3023,$translate) }}
                </a>
              </li>
              @endif
            </ul>
          </div>
        </div>
        @endif
      </ul>
    </div>
  </nav>


  @yield('content')


  <footer>
    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>


    <!-- Messenger -->
    <a href="#" id="messenger"><i class="fab fa-facebook-messenger"></i></a>


    <div class="container">
      <div class="footer_main">
        <div class="row">

          <div class="col-lg-3">
            <div class="footer_follow">
              <div class="follow_us">
                <p class="footer_title">Follow <span class="r_title">Us</span></p>
                <div class="follow_icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
              </div>

              <div class="contact_us">
                <p class="footer_title">Contact <span class="r_title">Us</span></p>
                <div class="contact_main">
                  <div class="contact_details">
                    <i class="fas fa-phone-alt"></i>
                    <p>+88 01811458897</p>
                  </div>

                  <div class="contact_details">
                    <i class="fas fa-envelope"></i>
                    <p>info@gotemplate.net</p>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
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

          <div class="col-lg-3">
            <div class="footer_link">
              <p class="footer_title">More <span class="r_title">Info</span></p>
              <div class="all_links">
                <a href="#">Top Authors</a>
                <a href="#">About Us</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>
                <a href="#">Payment Policy</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
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

    <div class="footer_copyright">
      <div class="container">
        <p>© 2021 <a href="#" class="c_link">GoTemplate</a> | Digital Product & Template Marketplace in Bangladesh. All rights reserved.</p>
      </div>
    </div>
  </footer>


  <script src="public/assets/theme2/js/jquery-1.12.4.min.js"></script>
  <script src="public/assets/theme2/js/popper.min.js"></script>
  <script src="public/assets/theme2/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/theme2/js/slick.min.js"></script>
  <script src="public/assets/theme2/js/waypoints.min.js"></script>
  <script src="public/assets/theme2/js/jquery.counterup.min.js"></script>

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

  <script src="public/assets/theme2/js/script.js"></script>

</body>

</html>