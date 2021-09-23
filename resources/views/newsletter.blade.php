@if($allsettings->maintenance_mode == 0)

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3093,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page">

    @include('header')

    @include("./components/hero", [
        "list" => [array("text" => 3093)],
        "headline" => 3093
    ])    
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="term">
                            
                            <div class="content">
                            @if ($message = Session::get('success'))
                            <div align="center"><h4>{{ $message }}</h4></div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div align="center"><h4>{{ $message }}</h4></div>
                            @endif
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