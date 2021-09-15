@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="public/assets/theme2/css/signin.css">
  <link rel="stylesheet" href="public/assets/theme2/css/signup.css">
@endpush

@section('content')
<section id="signin">
    <div class="container">
        <div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                    <span>{{ $message }}</span>
                </span>
                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-warning"></span>
                    <span>{{ $message }}</span>
                </span>
                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            @endif

            @if (!$errors->isEmpty())
            <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                <span>
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </span>

                <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
            @endif
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="sign_text">
                    <h1>Great to have you back!</h1>
                    <h3>GoTemplate - Digital product & template marketplace in Bangladesh.</h3>
                    <div class="text_point_main">

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>5000+ Products</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>200+ Sales</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>100+ Professionals</h6>
                        </div>

                        <div class="text_point">
                            <i class="fas fa-check"></i>
                            <h6>New products upload every week</h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                <div class="sign_form">

                    <h2>Sign in</h2>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form_group">
                            <label>Username/ Email</label>
                            <input 
                                id="user_name"
                                type="text" 
                                placeholder="Your username or email" 
                                class="f_input @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}" 
                                required
                                autofocus
                            >

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form_group">
                            <label for="pass">Password</label>

                            <input 
                                id="pass"
                                type="password" 
                                placeholder="Your password" 
                                class="f_input @error('password') is-invalid @enderror" 
                                name="password"
                                autocomplete="current-password"
                                required
                            >

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form_group f_check">
                            <input 
                                type="checkbox" 
                                id="form_checkbox"
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >

                            <label for="form_checkbox" class="l_checkbox">Remember Me</label>
                        </div>

                        <button type="submit" class="s_btn">Sign in</button>
                    </form>

                    <div class="form_bottom">
                        @if(Route::has('password.request'))
                        <div class="forgot_pass">
                            <a href="{{ URL::to('/forgot') }}">Forgot password?</a>
                        </div>
                        @endif

                        <div class="c_account">
                            <p>Don't have an <a href="{{ URL::to('/register') }}">account?</a></p>
                        </div>
                    </div>


                    <!-- not use currently -->
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
            </div>
        </div>
    </div>
</section>
@endsection