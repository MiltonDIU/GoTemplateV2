@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3188,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload cart-page">


   @include('header')

   @include("./components/hero", [
        "list" => [array("text" => 3188)],
        "headline" => 3188
    ])

   <section class="cart_area section--padding2 bgcolor">
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
                    <div class="product_archive added_to__cart padding-top-70">

                        <div align="center"><h4>{{ Helper::translation(3189,$translate) }}</h4><br/>
                        @if(!empty($payment_token))<h4> {{ Helper::translation(3190,$translate) }} : {{ $payment_token }}</h4>@endif

                        </div>


                    </div>

                </div>
                <!-- end .col-md-12 -->
            </div>
            <!-- end .row -->

        </div>
        <!-- end .container -->
    </section>



   @include('footer')

   @include('javascript')

</body>

</html>
@else
@include('503')
@endif
