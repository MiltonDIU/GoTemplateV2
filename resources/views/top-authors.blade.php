@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3028,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page">

    @include('header')

    @include("./components/hero", [
        "list" => [array("path" => "/top-authors", "text" => 3028)],
        "headline" => 3028
    ])

    <div id="demo">

        <section class="term_condition_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="user_area">
                            <ul>
                                @foreach($user['user'] as $user)
                                    @if($count_sale->has($user->id) != 0)
                                        @php
                                            $membership = date('m/d/Y',strtotime($user->created_at));
                                            $membership_date = explode("/", $membership);
                                            $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md")
                                            ? ((date("Y") - $membership_date[2]) - 1)
                                            : (date("Y") - $membership_date[2]));

                                            $referral_count = $user->referral_count;
                                        @endphp

                                        <li class="li-item">
                                            <div class="user_single">
                                                <div class="user__short_desc own-user">
                                                    <div class="user_avatar">
                                                        <a href="{{ url('/user') }}/{{ $user->username }}">
                                                            @if($user->user_photo != '')
                                                                <img 
                                                                    src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" 
                                                                    alt="{{$user->username}}" 
                                                                    width="70"
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            @else
                                                                <img 
                                                                    src="{{ url('/') }}/public/img/no-user.png" 
                                                                    alt="{{ $user->name }}" 
                                                                    width="70"
                                                                    height="70" 
                                                                    class="rounded"
                                                                >
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <div class="user_info">
                                                        <a href="{{ url('/user') }}/{{ $user->username }}">{{ $user->name }}</a><br />
                                                        
                                                        @if($user->country_badge == 1)
                                                            <div class="social social--color--filled">
                                                                <ul>
                                                                    @if($user->country_badges != "")
                                                                        <li>
                                                                            <img 
                                                                                src="{{ url('/') }}/public/storage/flag/{{ $user->country_badges }}" 
                                                                                border="0" 
                                                                                class="icon-badges" 
                                                                                title="Located in {{ $user->country_name }}"
                                                                            >
                                                                        </li>
                                                                    @endif

                                                                    @if($user->exclusive_author == 1)
                                                                        <li>
                                                                            <img 
                                                                                src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->exclusive_author_icon }}" 
                                                                                border="0" 
                                                                                class="other-badges" 
                                                                                title="Exclusive Author: Sells items exclusively on {{ $allsettings->site_title }}"
                                                                            >
                                                                        </li>
                                                                    @endif

                                                                    <?php
                                                                        $yearIcon = '';

                                                                        switch($year) {
                                                                            case 1:
                                                                                $yearIcon = 'one_year_icon';
                                                                                break;
                                                                            case 2:
                                                                                $yearIcon = 'two_year_icon';
                                                                                break;
                                                                            case 3:
                                                                                $yearIcon = 'three_year_icon';
                                                                                break;
                                                                            case 4:
                                                                                $yearIcon = 'four_year_icon';
                                                                                break;
                                                                            case 5:
                                                                                $yearIcon = 'five_year_icon';
                                                                                break;
                                                                            case 6:
                                                                                $yearIcon = 'six_year_icon';
                                                                                break;
                                                                            case 7:
                                                                                $yearIcon = 'seven_year_icon';
                                                                                break;
                                                                            case 8:
                                                                                $yearIcon = 'eight_year_icon';
                                                                                break;
                                                                            case 9:
                                                                                $yearIcon = 'nine_year_icon';
                                                                                break;
                                                                            case $year >= 10:
                                                                                $yearIcon = 'ten_year_icon';
                                                                                break;
                                                                        }
                                                                    ?>

                                                                    <li>
                                                                        <img 
                                                                            src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->$yearIcon }}" 
                                                                            border="0" 
                                                                            class="other-badges" 
                                                                            title="@if($year >= 10) 10+ @else {{ $year }} @endif Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over @if($year >= 10) 10+ @else {{ $year }} @endif years"
                                                                        >
                                                                    </li>


                                                                    @if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_one_icon }}" border="0" class="other-badges" title="Affiliate Level 1: Has referred {{ $badges['setting']->author_referral_level_one }}+ members">
                                                                        </li>
                                                                    @endif

                                                                    @if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_two_icon }}" border="0" class="other-badges" title="Affiliate Level 2: Has referred {{ $badges['setting']->author_referral_level_two }}+ members">
                                                                        </li>
                                                                    @endif

                                                                    @if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_three_icon }}" border="0" class="other-badges" title="Affiliate Level 3: Has referred {{ $badges['setting']->author_referral_level_three }}+ members">
                                                                        </li>
                                                                    @endif

                                                                    @if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_four_icon }}" border="0" class="other-badges" title="Affiliate Level 4: Has referred {{ $badges['setting']->author_referral_level_four }}+ members">
                                                                        </li>
                                                                    @endif

                                                                    @if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_five_icon }}" border="0" class="other-badges" title="Affiliate Level 5: Has referred {{ $badges['setting']->author_referral_level_five }}+ members">
                                                                        </li>
                                                                    @endif


                                                                    @if($referral_count >= $badges['setting']->author_referral_level_six)
                                                                        <li>
                                                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_six_icon }}" border="0" class="other-badges" title="Affiliate Level 6: Has referred {{ $badges['setting']->author_referral_level_six }}+ members">
                                                                        </li>
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="user__meta own-next">
                                                    <p>{{ $count_items->has($user->id) ? count($count_items[$user->id]) : 0 }} Items</p>
                                                    <p>{{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($user->created_at)) }}</p>
                                                    <p>@if($user->country_badge == 1){{ $user->country_name }}@endif</p>
                                                </div>

                                                <div class="user__status user--following text-center last-next">
                                                    <p><span class="sale-count">{{ $count_sale->has($user->id) ? count($count_sale[$user->id]) : 0 }}</span><br />{{ Helper::translation(2930,$translate) }}</p>
                                                    
                                                    @include('rating_star', ['ratings' => isset($user->ratings) ? $user->ratings : []])
                                                </div>
                                            </div>
                                            <!-- end /.user_single -->
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="pagination-area">
                                <div class="turn-page" id="pager"></div>
                            </div>
                        </div>

                    </div>



                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>
    </div>

    @include('footer')
    @include('javascript')
</body>

</html>
@else
@include('503')
@endif