@extends('theme2.layout.master')

@push('styles')
    <link rel="stylesheet" href="public/assets/theme2/css/signin.css">
    <link rel="stylesheet" href="public/assets/theme2/css/signup.css">
@endpush

@section('content')
<section id="signup">
    <!-- container start -->
    <div class="container">
        <div class="row">

            <div class="col-lg-5">
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
                </div>
                <!-- sign up text end -->
            </div>

            <div class="col-lg-7">
                <!-- sign up form start -->
                <div class="sign_form s_up">

                    <h2>Sign up</h2>

                    <form action="">
                        <div class="form_group group_flex">
                            <div class="group_box">
                                <p>Name</p>
                                <input type="text" placeholder="Your name" class="f_input" required>
                            </div>
                            <div class="group_box">
                                <p>Username</p>
                                <input type="text" placeholder="Your username" class="f_input" required>
                            </div>
                        </div>

                        <div class="form_group group_flex">
                            <div class="group_box">
                                <p>Email</p>
                                <input type="email" placeholder="Your email" class="f_input" required>
                            </div>
                            <div class="group_box">
                                <p>User Type</p>
                                <select name="" id="" class="f_input">
                                    <option value="" disabled selected hidden>Select Type</option>
                                    <option value="">Customer</option>
                                    <option value="">Vendor</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_group group_flex">
                            <div class="group_box">
                                <p>Password</p>
                                <input type="password" placeholder="Your password" class="f_input" required>
                            </div>
                            <div class="group_box">
                                <p>Confirm Password</p>
                                <input type="password" placeholder="Confirm password" class="f_input" required>
                            </div>
                        </div>

                        <button type="submit" class="s_btn">Sign up</button>
                    </form>

                    <div class="form_bottom f_bottom_up">
                        <div class="c_account">
                            <p>Already have an account? <a href="sign-in.html">Sign in</a></p>
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