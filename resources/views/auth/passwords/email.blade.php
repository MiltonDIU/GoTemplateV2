@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
    @include("theme2.layout.breadcrumb", [
        "list" => [
            array("path" => "/password/reset", "text" => "Forgot Your Password")
        ]
    ])

    <section class="pass_recover_area section--padding2">
        <div class="container">
            <div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="cardify recover_pass">
                            <div class="login--header">
                                <p>
                                    Please enter the email address for your account. A verification link will be sent to you.
                                    Once you have received the verification link, you will be able to create a new password
                                    for your account.</p>
                            </div>
                            <!-- end .login_header -->
    
                            <div class="login--form">
                                <div class="form-group">
                                    <label for="email_ad">Email Address</label>
                                    <input id="email" type="email" class="text_field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required autocomplete="email" autofocus>
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
    
    
                                </div>
    
                                <button class="btn btn--md register_btn theme-button" type="submit">{{ __('Send Password Reset Link') }}</button>
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
@endsection


@else
    @include('503')
@endif