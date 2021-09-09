@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $page['page']->page_title }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page">

    @include('header')

    @include("./components/hero", [
        "list" => [
            array(
                "path" => "/page/".$page['page']->page_id."/".$page['page']->page_slug, 
                "text" => $page['page']->page_title
            )
        ],
        "headline" => $page["page"]->page_title
    ])
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cardify term_modules">
                        <div class="term">
                            <div class="term__title">
                                <h4>{{ $page['page']->page_title }}</h4>
                            </div>
                            <div class="content">
                            {!! html_entity_decode($page['page']->page_desc) !!}
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