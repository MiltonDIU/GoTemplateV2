@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ "Likes" }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload dashboard-edit">

     @include('header')

     @include("./components/hero", [
        "list" => [array("path" => "/likes", "text" => "Likes")],
        "headline" => "My Likes"
    ])


    @if(Auth::user()->id != 1)
        @include('dashboard-menu')
        @endif
    <div class="py-3">
            <div class="container">

                <!-- end /.row -->
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
                <div class="row" id="listShow">


                    @foreach($fav['item'] as $item)

                    @include("./components/item_card", [
                        "item" => $item,
                        "isLike" => true
                    ])

                    @endforeach

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-area">

                           <div class="turn-page" id="pager"></div>

                        </div>
                        <!-- end /.pagination-area -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>

   @include('footer')
   @include('javascript')
</body>
</html>
@else
@include('503')
@endif
