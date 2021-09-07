@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3200,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload author-followers">

    @include('header')
    @include("./components/hero", [
        "list" => [array("path" => "/user-following", "text" => 3200)],
        "headline" => 3200
    ])


    <section class="author-profile-area">
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
                @include('user-menu')
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @include('user-box')
                    </div>
                    <!-- end /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>
                                        <span class="bold">{{ $followingcount }}</span> @if($followingcount <= 1) {{ Helper::translation(3200,$translate) }} @else {{ Helper::translation(3201,$translate) }} @endif</h2>
                                </div>
                            </div>

                            <div class="user_area">
                                <ul id="listShow" class="mb-0">
                                    @foreach($viewfollowing['view'] as $follower)
                                        <li class="li-item">
                                            <div class="col-12 user_single d-flex px-3">
                                                <div class="col-sm-2 d-flex justify-content-center">
                                                    <div class="user_avatar">
                                                        <a href="{{ url('/user') }}/{{ $follower->username }}">
                                                            @if($follower->user_photo != '')
                                                                <img 
                                                                    src="{{ url('/') }}/public/storage/users/{{ $follower->user_photo }}" 
                                                                    alt="{{ $follower->username }}" 
                                                                    width="70" 
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            @else
                                                                <img 
                                                                    src="{{ url('/') }}/public/img/no-user.png" 
                                                                    alt="{{ $follower->username }}" 
                                                                    width="70" 
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-sm-10 d-flex row justify-content-between">
                                                    <div class="user_info">
                                                        <a href="{{ url('/user') }}/{{ $follower->username }}">
                                                            {{ $follower->name }}
                                                        </a>
                                                        <p class="mb-0">{{ Helper::translation(3077,$translate) }}: {{ date("F Y", strtotime($follower->created_at))}} </p>
                                                        <p class="mb-0">{{ Helper::translation(3199,$translate) }} : @if($follower->country !='') {{ $follower->country_name }} @else - @endif</p>
                                                    </div>

                                                    <div><a href="{{ url('/user') }}/{{ $follower->username }}" class="btn btn--md theme-button">{{ Helper::translation(3078,$translate) }}</a></div>
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                        <div class="turn-page" id="pager"></div>
                                    </nav>
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