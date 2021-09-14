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

            <div class="col-lg-6">
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

            <div class="offset-lg-1 col-lg-5">
                <div class="sign_form">

                    <h2>Sign in</h2>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form_group">
                            <p>Username/ Email</p>
                            <input type="text" placeholder="Your username or email" class="f_input" required>
                        </div>

                        <div class="form_group">
                            <p>Password</p>
                            <input type="password" placeholder="Your password" class="f_input" required>
                        </div>

                        <div class="form_group f_check">
                            <input type="checkbox" id="form_checkbox">
                            <label for="form_checkbox" class="l_checkbox">Remember Me</label>
                        </div>

                        <button type="submit" class="s_btn">Sign in</button>
                    </form>

                    <div class="form_bottom">
                        <div class="forgot_pass">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="c_account">
                            <p>Don't have an <a href="sign-up.html">account?</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection