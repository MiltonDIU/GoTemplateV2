@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3016,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload term-condition-page">

    @include('header')

    <section class="hero-area bgimage d-flex flex-center">
        <div class="bg_image_holder">
            <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}" alt="{{ $allsettings->site_title }}">
        </div>
        <div class="bg-overlay"></div>

        <div class="container content_above">
            <div class="row jplist-panel">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>{{ Helper::translation(3016,$translate) }}</h3>
                            <h4 class="mt-3 pt-3 text--white">{{ Helper::translation(3017,$translate) }}</h4>
                        </div>
                        <div class="countdown-timer">
                            <ul id="example">
                                <li class="pt-2 pb-1 mb-2"><span class="days">00</span><div>{{ Helper::translation(2995,$translate) }}</div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="hours">00</span><div>{{ Helper::translation(2996,$translate) }}</div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span><div>{{ Helper::translation(2997,$translate) }}</div></li>
                                <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span><div>{{ Helper::translation(2998,$translate) }}</div></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row items">

                        @foreach($itemData['item'] as $item)
                            @include("./components/item_card", [
                                "item" => $item,
                                "isFreeItem" => true
                            ])
                        @endforeach

                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>


    @include('video_modal')
    @include('footer')
    @include('javascript')

 @if(!empty($allsettings->site_free_end_date))
	<script type="text/javascript">
            $('#example').countdown({
                date: '{{ date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date)) }}',
                offset: -8,
                day: 'Day',
                days: 'Days'
            }, function () {

            });
    </script>
    @endif
</body>

</html>
@else
@include('503')
@endif
