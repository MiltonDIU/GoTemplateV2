@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3225,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload home1 mutlti-vendor">

    @include('header')

    @include("./components/hero", [
        "list" => [array("path" => "/login", "text" => 3225)],
        "headline" => 3225
    ])

    <section class="login_area section--padding2">
        <div class="container">
            <div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
                @endif

                @if ($message = Session::get('error'))
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

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{ route('login') }}" method="POST" id="item_form">
                        @csrf
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>{{ Helper::translation(3226,$translate) }}</h3>
                                <p>{{ Helper::translation(3227,$translate) }}</p>
                            </div>

                            <!-- start .login--form -->
                            <div class="login--form">
                                <div class="form-group">
                                    <label for="user_name">{{ Helper::translation(3228,$translate) }}</label>

                                    <input
                                        id="user_name"
                                        type="text"
                                        class="text_field text-field__modify @error('email') is-invalid @enderror"
                                        name="email"
                                        value="{{ old('email') }}"
                                        data-bvalidator="required"
                                        autofocus
                                    >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pass">{{ Helper::translation(3113,$translate) }}</label>

                                    <input
                                        id="pass"
                                        type="password"
                                        class="text_field text-field__modify @error('password') is-invalid @enderror"
                                        name="password"
                                        data-bvalidator="required"
                                        autocomplete="current-password"
                                    >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="ch2" {{ old('remember') ? 'checked' : '' }}
                                        >

                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">{{ Helper::translation(3229,$translate) }}</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md theme-button login-btn__full" type="submit">
                                    {{ Helper::translation(3225,$translate) }}
                                </button>

                                <div class="login_assist">
                                    @if (Route::has('password.request'))
                                    <p class="recover">
                                        <a href="{{ URL::to('/forgot') }}" class="theme-color">
                                            {{ Helper::translation(3009,$translate) }}?
                                        </a>
                                    </p>
                                    @endif

                                    <p class="signup">
                                        {{ Helper::translation(3230,$translate) }}
                                        <a href="{{ URL::to('/register') }}" class="theme-color">
                                            {{ Helper::translation(3231,$translate) }}?
                                        </a>
                                    </p>
                                </div>

                                @if($allsettings->display_social_login == 1)
                                <div class="row form-group mt-4 social-media-login">
                                    <div class="col-md-12 text-center">
                                        <label class="font-weight-bold" for="fullname">
                                            {{ Helper::translation(3232,$translate) }}
                                        </label>
                                    </div>

                                    <div>
                                        <a href="{{ url('/login/facebook') }}">
                                            <img src="{{ url('/') }}/public/img/fb.png" alt="" />
                                        </a>
                                        <a href="{{ url('/login/google') }}">
                                            <img src="{{ url('/') }}/public/img/gp.png" alt="" />
                                        </a>
                                    </div>

                                </div>
                                @endif
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>



   @include('footer')

   @include('javascript')

</body>

</html>
