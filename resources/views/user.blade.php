@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2926,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload">
    @include('header')

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

        <div class="row">
            @include('user-menu')

            <div class="col-lg-8 col-md-12" style="margin-top: 30px;">
                <div class="row">
                    @include('user-box')

                    <div class="col-md-12 col-sm-12">
                        <div class="author_module">
                            @if($user['user']->user_banner != '')
                                <img
                                    src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_banner }}"
                                    alt="{{ $user['user']->username }}"
                                >
                            @else
                                <img
                                    src="{{ url('/') }}/public/img/no-image.jpg"
                                    alt="{{ $user['user']->username }}"
                                >
                            @endif
                        </div>

                        @if($user['user']->profile_heading != '')
                            <div class="author_module about_author p-4">
                                <h2>{{ $user['user']->profile_heading }}</h2>
                                <p>{{ $user['user']->about }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                @if($user['user']->user_type == 'vendor')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__title">
                                <h2>{{ Helper::translation(2886,$translate) }}</h2>
                            </div>
                        </div>

                        <div class="col-md-12 row pr-0" id="listShow">
                            @foreach($itemData['item'] as $item)
                                @include("./components/item_card", [
                                    "item" => $item,
                                    "isUser" => true
                                ])
                            @endforeach
                        </div>

                        <div class="col-md-12 row" align="right">
                            <div class="col-md-12">
                                <div class="pagination-area">
                                    <div class="turn-page" id="pager"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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