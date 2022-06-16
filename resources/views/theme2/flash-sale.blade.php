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
                <h1 class="page_banner_title">{{ Helper::translation(2993,$translate) }}</h1>
            <h2 class="page_banner_description">{{ Helper::translation(2994,$translate) }}</h2>

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

    <section id="all_category">
        <div class="container">
            <ul class="controls main_category">
                <li class="control category_button" data-filter="all">All</li>

                @foreach($cats as $cat)
                    <li class="control category_button" data-filter=".category{{ $cat->cat_id }}">{{ $cat->category_name }}</li>
                @endforeach
            </ul>
            @include('theme2.layout.filter2')
            @include('theme2.layout.item_category',['items'=>$items])


        </div>
    </section>

    <script src="{{ asset('public/assets/theme2/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

    <script type="text/javascript">
        const mixContainerEl        = $('#mix-container');
        const filterPriceSelectEl   = $('#filter_p');
        const filterTypeSelectEl    = $('#filter_t');
        const filterLicenceSelectEl = $('#filter_l');
        const inputSearchEl         = $('#filter_s');

        let keyupTimeout;

        const mixer = mixitup(mixContainerEl, {
            animation: {
                duration: 350
            },
            callbacks: {
                onMixClick: function() {
                    // Reset the search if a filter is clicked
                    if (this.matches('[data-filter]')) {
                        inputSearchEl.val('');
                    }
                }
            }
        });

        inputSearchEl.on('keyup', function() {
            let searchValue;

            if ($(this).val().length < 3) {
                // If the input value is less than 3 characters, don't send
                searchValue = '';
            } else {
                searchValue = $(this).val().toLowerCase().trim();
            }

            // Very basic throttling to prevent mixer thrashing. Only search
            // once 350ms has passed since the last keyup event

            clearTimeout(keyupTimeout);

            keyupTimeout = setTimeout(function() {
                filterByString(searchValue);
            }, 350);
        });

        /**
         * Filters the mixer using a provided search string, which is matched against
         * the contents of each target's "class" attribute. Any custom data-attribute(s)
         * could also be used.
         *
         * @param  {string} searchValue
         * @return {void}
         */

        function filterByString(searchValue) {
            if (searchValue) {
                // Use an attribute wildcard selector to check for matches

                mixer.filter('[class*="' + searchValue + '"]');
            } else {
                // If no searchValue, treat as filter('all')

                mixer.filter('all');
            }
        }

        filterPriceSelectEl.on('change', function() {
            mixer.sort(this.value);
        });

        filterTypeSelectEl.on('change', function() {
            mixer.filter(this.value);
        });

        filterLicenceSelectEl.on('change', function() {
            mixer.filter(this.value);
        });

        // var containerEl = document.querySelector('.mix_container');
        // var mixer = mixitup(containerEl);
    </script>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{$data['flashDate']}} 12:00:00").getTime();

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
                document.getElementById("expired").innerHTML = "There is currently no flash item";
            }
        }, 1000);
    </script>
@endsection

@else
    @include('theme2.503')
@endif
