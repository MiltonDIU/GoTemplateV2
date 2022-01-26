@extends('theme2.layout.master')

@push('others')
    {!! NoCaptcha::renderJs() !!}
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/form.css') }}">
@endpush

@section('content')
<section id="signup">
    <!-- container start -->
    <div class="container">
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

        <div class="row">

            <div class="col-lg-4 col-md-12 col-sm-12 col-xl-5">
                <!-- sign up text start -->
                <div class="sign_text">
                    <h1>Create a free account!</h1>
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
                      <div class="sign_up_img">
                        <!--<img src="{{url('public/assets/theme2/images/sign_up_page.png')}}" alt="sign up page">-->
                    </div>
                </div>
                <!-- sign up text end -->
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 col-xl-7">
                <!-- sign up form start -->
                <div class="sign_form s_up">

                    <h2>Sign up</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form_group group_flex">
                            <div class="group_box">
                                <label for="name">Name</label>
                                <input 
                                    id="name"
                                    name="name"
                                    type="text" 
                                    placeholder="Your name" 
                                    class="f_input" 
                                    required
                                    autofocus
                                >

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="group_box">
                                <label for="username">Username</label>
                                <input 
                                    id="username"
                                    name="username"
                                    type="text" 
                                    placeholder="Your username" 
                                    class="f_input" 
                                    required
                                >
                            </div>
                        </div>

                        <div class="form_group group_flex">
                            <div class="group_box">
                                <label for="email">Email</label>
                                <input 
                                    id="email"
                                    name="email"
                                    type="email" 
                                    placeholder="Your email" 
                                    class="f_input" 
                                    required
                                >

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="group_box">
                                <label for="user_type">User Type</label>
                                <select name="user_type" id="user_type" class="f_input" required>
                                    <option value="" disabled selected hidden>Select Type</option>
                                    <option value="{{ $encrypter->encrypt('customer') }}">Customer</option>
                                    <option value="{{ $encrypter->encrypt('vendor') }}">Vendor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_group group_flex">
                            <div class="group_box">
                                <label for="password">Password</label>
                                <input 
                                    id="password"
                                    name="password"
                                    type="password" 
                                    placeholder="Your password" 
                                    class="f_input" 
                                    required
                                >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="group_box">
                                <label for="password-confirm">Confirm Password</label>
                                <input
                                    id="password-confirm" 
                                    name="password_confirmation"
                                    type="password" 
                                    placeholder="Confirm password" 
                                    class="f_input" 
                                    required
                                >
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label for="con_pass"> {{ Helper::translation(3244,$translate) }}</label>

                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong class="red">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit" class="s_btn">Sign up</button>
                    </form>

                    <div class="form_bottom f_bottom_up">
                        <div class="c_account">
                            <p>Already have an account? <a href="{{ URL::to('/login') }}">Sign in</a></p>
                        </div>
                    </div>


                </div>
                <!-- sign up form end -->
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
@endsection