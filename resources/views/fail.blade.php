@if($allsettings->maintenance_mode == 0)
@include('version')
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2882,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page">

    @include('header')

    @include("./components/hero", [
        "list" => [array("path" => "/cancel", "text" => 5645)],
        "headline" => 5645
    ])


    <section class="term_condition_area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="term">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif
                            <div class="content">
                                <h4>{{ Helper::translation(5647,$translate) }}</h4>
                            </div>
                        </div>

                        <!-- end /.term -->
                    </div>
                    <!-- end /.term_modules -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>


    @include('footer')
    @include('javascript')
</body>

</html>
@else
    @include('503')
@endif
