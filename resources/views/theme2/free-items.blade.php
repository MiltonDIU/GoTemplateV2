@if($allsettings->maintenance_mode == 0)

    @extends('theme2.layout.master')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/flash-sale.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
    @endpush

@section('content')

    @php
        $items = $data['itemData']['item'];
        $cats = $data['catData'];
    @endphp

    <!-- Flash banner start -->
    <section id="flash_banner">
        <div class="container">
            <h1 class="page_banner_title">Free Items</h1>
            <h2 class="page_banner_description">Download these files before they are gone</h2>

            <div class="row">
                <div class="col-lg-8 m-auto col-sm-12 col-md-12 col-xl-8">
                    <!-- counter start -->
                    <div id="getting-started" class="flash_counter">
                        <div class="count_time">
                            <p id="days" class="count_number"></p>
                            <p class="count_text">Days</p>
                        </div>
                        <div class="count_time">
                            <p id="hours" class="count_number"></p>
                            <p class="count_text">Hours</p>
                        </div>
                        <div class="count_time">
                            <p id="minutes" class="count_number"></p>
                            <p class="count_text">Minutes</p>
                        </div>
                        <div class="count_time">
                            <p id="seconds" class="count_number"></p>
                            <p class="count_text">Seconds</p>
                        </div>
                    </div>
                    <h3 id="expired"></h3>
                    <!-- counter end -->
                </div>


            </div>
        </div>
    </section>
    <!-- Flash banner end -->

    @if($items->all())
        <!-- category start -->
        <section id="flash_category">
            <!-- container start -->
            <div class="container">
                <!-- category buttons start -->
                <ul class="controls main_category">
                    <li class="control category_button" data-filter="all">All</li>

                    @foreach($cats as $cat)
                        <li class="control category_button" data-filter=".{{$cat->category_slug}}">{{ $cat->category_name }}</li>
                    @endforeach
                </ul>
                <!-- category buttons end -->

            </div>
            <!-- container end -->
        </section>
        <!-- category end -->


        <!-- product container start -->
        <section id="product_container">
            <!-- container start -->
            <div class="container">

                <!-- mix container start -->
                <div class="mix_container">

                    <div class="row">
                        @foreach($items->all() as $item)
                            @include('theme2.layout.item_flash_sale',['item'=>$item])
                        @endforeach
                    </div>

                </div>
                <!-- mix container end -->
            </div>
            <!-- container end -->
        </section>
        <!-- product container end -->
    @endif

    <script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

    <script type="text/javascript">
        var containerEl = document.querySelector('.mix_container');
        var mixer = mixitup(containerEl);
    </script>

@endsection

@else
    @include('theme2.503')
@endif

@push('script')
    <!-- Display the countdown timer in an element -->

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{$data['freeDate']}} 12:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("expired").innerHTML = "There is currently no free item";
            }
        }, 1000);
    </script>
@endpush
