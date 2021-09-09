@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2860,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page">

    @include('header')

    @include("./components/hero", [
        "list" => [array("path" => "/404", "text" => 2860)],
        "headline" => 2860
    ])
    
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cardify term_modules">
                        <div class="term">    
                            <div class="content text-center">
                            <div class="foru_heading">{{ Helper::translation(2863,$translate) }}</div>
                            <h4>{{ Helper::translation(2864,$translate) }}</h4>
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