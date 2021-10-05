@if($allsettings->maintenance_mode == 0)

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2910,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    {!! NoCaptcha::renderJs() !!}
</head>

<body class="preload contact-page">

    @include('header')

    <!-- start hero section -->
    <section class="hero-area bgimage hero-area--h200">
        <div class="bg_image_holder">
            <img src="{{ url('/') }}/public/assets/images/double-bubble-outline.png" alt="{{ $allsettings->site_title }}">
        </div>
        <div class="bg-overlay--breadcrumb"></div>

        <div class="hero-content content_above contact-hero">
            <h1 class="text-center contact-hero-title m-auto">
                <span>{{ Helper::translation(2911,$translate) }}</span>
                <span>{{ Helper::translation(2912,$translate) }}</span>
            </h1>
        </div>
    </section>
    <!-- end hero section -->


    <section class="contact-area section--padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row col-sm-12 contact-card-wrapper">
                    <div class="card col-lg-4 col-md-6 col-sm-12 mb-5">
                        <div class="cardify text-center px-3 py-3">
                            <span class="contact-card-icon lnr lnr-map-marker theme-color"></span>
                            <h4 class="contact-card-title">{{ Helper::translation(2913,$translate) }}</h4>
                            <div class="tiles__content">
                                <p>{{ $allsettings->office_address }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card col-lg-4 col-md-6 col-sm-12 mb-5">
                        <div class="cardify text-center px-3 py-3">
                            <span class="contact-card-icon lnr lnr-phone theme-color"></span>
                            <h4 class="contact-card-title">{{ Helper::translation(2914,$translate) }}</h4>
                            <div class="tiles__content">
                                <p>{{ $allsettings->office_phone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card col-lg-4 col-md-6 col-sm-12 mb-5">
                        <div class="cardify text-center px-3 py-3">
                            <span class="contact-card-icon lnr lnr-envelope theme-color"></span>
                            <h4 class="contact-card-title">{{ Helper::translation(2915,$translate) }}</h4>
                            <div class="tiles__content">
                                <p>{{ $allsettings->office_email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact_form cardify">
                                <div class="contact_form__title">
                                    <h3>{{ Helper::translation(2916,$translate) }}</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="contact_form--wrapper">
                                            <form action="{{ route('contact') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>{{ Helper::translation(2917,$translate) }}</label>
                                                            <input type="text" name="from_name" data-bvalidator="required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ Helper::translation(2915,$translate) }}</label>
                                                            <input type="text" name="from_email" data-bvalidator="email,required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <label>{{ Helper::translation(2918,$translate) }}</label>
                                                <textarea cols="30" rows="10" name="message_text" data-bvalidator="required"></textarea>

                                                <div class="row">
                                                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} col-md-12">
                                                        {!! app('captcha')->display() !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="help-block">
                                                                <strong class="red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="sub_btn">
                                                    <button type="submit" class="btn btn--default theme-button">{{ Helper::translation(2876,$translate) }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    @include('footer')
    @include('javascript')
</body>
</html>
@else
@include('503')
@endif
