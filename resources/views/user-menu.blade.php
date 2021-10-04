<div class="col-lg-4 col-md-12">
    <aside class="sidebar sidebar_author">

        <!-- start author card -->
        <div class="author-card sidebar-card ">
            <div class="author-infos pb-0">
                <div class="author-avatar-bg"></div>
                
                <div class="author_avatar">
                    @if($user['user']->user_photo != '')
                        <img 
                            src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_photo }}" 
                            alt="{{ $user['user']->name }}" 
                            width="100"
                            height="100"
                        >
                    @else
                        <img 
                            src="{{ url('/') }}/public/img/no-user.png" 
                            alt="{{ $user['user']->username }}" 
                            width="100"
                            height="100"
                        >
                    @endif
                </div>

                <div class="author pb-3">
                    <h4>{{ $user['user']->name }}</h4>
                    {{ Helper::translation(3077,$translate) }} {{ $since }}
                    
                    @if($user['user']->user_type == 'vendor' || $user['user']->user_type == 'customer')
                        @if($user['user']->country_badge == 1 || $user['user']->country != '')
                            <div>From {{ $country['view']->country_name }}</div>
                        @endif
                    @endif
                </div>


                <!-- start badges section -->
                @if($user['user']->user_type == 'vendor')
                    <div class="social social--color--filled mt-2">
                        <ul>
                            @if($user['user']->country_badge == 1)
                                @if($country['view']->country_badges != "")
                                    <li>
                                        <img src="{{ url('/') }}/public/storage/flag/{{ $country['view']->country_badges }}" border="0" class="icon-badges" title="Located in {{ $country['view']->country_name }}">
                                    </li>
                                @endif
                            @endif

                            @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                <div class="sidebar-card card--metadata">
                                    <div>
                                        <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="single-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}"> {{ $badges['setting']->author_sold_level_six_label }}
                                    </div>
                                </div>
                            @endif


                            @if($featured_count->has($user['user']->id) ? count($featured_count[$user['user']->id]) : 0 != 0)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" class="other-badges" title="Featured Item: Had an item featured on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($free_count->has($user['user']->id) ? count($free_count[$user['user']->id]) : 0 != 0)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->free_item_icon }}" border="0" class="other-badges" title="Free Item : Contributed a free file of this item">
                                </li>
                            @endif

                            @if($tren_count->has($user['user']->id) ? count($tren_count[$user['user']->id]) : 0 != 0)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->trends_icon }}" border="0" class="other-badges" title="Trendsetter: Had an item that was trending">
                                </li>
                            @endif

                            @if($user['user']->exclusive_author == 1)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->exclusive_author_icon }}" border="0" class="other-badges" title="Exclusive Author: Sells items exclusively on {{ $allsettings->site_title }}">
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
                            

                            @if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_one_icon }}" border="0" class="other-badges" title="Author Level 1: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_one }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($sold_amount >= $badges['setting']->author_sold_level_two && $badges['setting']->author_sold_level_three > $sold_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_two_icon }}" border="0" class="other-badges" title="Author Level 2: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_two }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($sold_amount >= $badges['setting']->author_sold_level_three && $badges['setting']->author_sold_level_four > $sold_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->	author_sold_level_three_icon }}" border="0" class="other-badges" title="Author Level 3: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_three }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif


                            @if($sold_amount >= $badges['setting']->author_sold_level_four && $badges['setting']->author_sold_level_five > $sold_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_four_icon }}" border="0" class="other-badges" title="Author Level 4: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_four }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($sold_amount >= $badges['setting']->author_sold_level_five && $badges['setting']->author_sold_level_six > $sold_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_five_icon }}" border="0" class="other-badges" title="Author Level 5: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_five }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif


                            @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_six_icon }}" border="0" class="other-badges" title="Author Level 6: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="other-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_one_icon }}" border="0" class="other-badges" title="Collector Level 1: Has collected {{ $badges['setting']->author_collect_level_one }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_two_icon }}" border="0" class="other-badges" title="Collector Level 2: Has collected {{ $badges['setting']->author_collect_level_two }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_three_icon }}" border="0" class="other-badges" title="Collector Level 3: Has collected {{ $badges['setting']->author_collect_level_three }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_four_icon }}" border="0" class="other-badges" title="Collector Level 4: Has collected {{ $badges['setting']->author_collect_level_four }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_five_icon }}" border="0" class="other-badges" title="Collector Level 5: Has collected {{ $badges['setting']->author_collect_level_five }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

                            @if($collect_amount >= $badges['setting']->author_collect_level_six)
                                <li>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_six_icon }}" border="0" class="other-badges" title="Collector Level 6: Has collected {{ $badges['setting']->author_collect_level_six }}+ items on {{ $allsettings->site_title }}">
                                </li>
                            @endif

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
                <!-- end badges section -->

                <div class="flex-row-around theme-button p-2 followers-following">
                    <a href="{{ url('/user-followers') }}/{{ $user['user']->username }}" class="flex-column-between text-white">
                        <span>{{ $followercount }}</span>
                        <span>{{ Helper::translation(3197,$translate) }}</span>
                    </a>

                    <a href="{{ url('/user-following') }}/{{ $user['user']->username }}" class="flex-column-between text-white">
                        <span>{{ $followingcount }}</span>
                        <span>{{ Helper::translation(3201,$translate) }}</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end author card -->

        <!-- start social links -->
        <div class="sidebar-card message-card">
            <div class="p-3">
                <h4>{{ Helper::translation(3206,$translate) }}</h4>
            </div>

            <div class="p-3 flex-center">
                <div class="social social--color--filled">
                    <ul>
                        <li>
                            <a href="{{ $user['user']->facebook_url }}" target="_blank">
                                <span class="fa fa-facebook octagon social-icon flex-center"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user['user']->twitter_url }}" target="_blank">
                                <span class="fa fa-twitter octagon social-icon flex-center"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $user['user']->gplus_url }}" target="_blank">
                                <span class="fa fa-google-plus octagon social-icon flex-center"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="author-btn col-sm-12 pb-3">
                @if(Auth::guest())
                    <a href="javascript:void(0);" class="btn btn--md btn-block theme-button" onClick="alert('Login user only');">
                        {{ Helper::translation(3202,$translate) }}
                    </a>
                @endif

                @if (Auth::check())
                    @if($user['user']->username != Auth::user()->username)
                        @if($followcheck == 0)
                            <a href="{{ url('/user') }}/{{ Auth::user()->id }}/{{ $user['user']->id }}" class="btn btn--md btn-block theme-button">
                                {{ Helper::translation(3202,$translate) }}
                            </a>
                        @else
                            <a href="{{ url('/user') }}/unfollow/{{ Auth::user()->id }}/{{ $user['user']->id }}" class="btn btn--md btn-block theme-primary">
                                {{ Helper::translation(3203,$translate) }}
                            </a>
                        @endif
                    @endif
                @endif
            </div>
        </div>
        <!-- end social links -->

        <!-- start affiliate referral url -->
        @if (Auth::check())
            <div class="sidebar-card message-card">
                <div class="p-3">
                    <h4>{{ Helper::translation(3204,$translate) }}</h4>
                </div>

                <div class="p-3">
                    <div class="social--color--filled">
                        <ul>
                            <li>
                                <input type="text" value="{{ URL::to('/') }}/?ref={{ $user['user']->id }}" id="myInput" class="text_field" readonly="readonly">
                                <a href="javascript:void(0)" onclick="myFunction()" class="btn btn--md btn-block theme-button">
                                    {{ Helper::translation(3205,$translate) }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <!-- end affiliate refferal url -->


        <!-- start author section -->
        @if($user['user']->user_type == 'vendor')
            <div class="sidebar-card author-menu">
                <p>
                    <a href="{{ url('/user') }}/{{ $user['user']->username }}">
                        <span class="lnr lnr-home"></span> {{ Helper::translation(2926,$translate) }}
                    </a>
                </p>

                <p>
                    <a href="{{ url('/user-reviews') }}/{{ $user['user']->username }}">
                        <span class="lnr lnr-star"></span> {{ Helper::translation(3207,$translate) }}
                    </a>
                </p>
            </div>
        @endif
        <!-- end author section -->

        <!-- start available for freelance work -->
        @if($user['user']->user_freelance == 1)
            <div class="sidebar-card freelance-status">
                <div class="custom-radio freelance">
                    <input type="radio" id="opt1" class="" name="filter_opt" checked>
                    <label for="opt1">
                        <span class="circle"></span>{{ Helper::translation(3208,$translate) }}
                    </label>
                </div>
            </div>
        @endif
        <!-- end available for freelance work -->

        <!-- start send message for login user -->
        @if (Auth::check())
            @if($user['user']->username != Auth::user()->username)
                <div class="sidebar-card message-card">
                    <div class="p-3">
                        <h4>{{ Helper::translation(2915,$translate) }} {{ $user['user']->username }}</h4>
                    </div>

                    <div class="p-3">
                        <form action="{{ route('user') }}" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="message" class="text_field" id="author-message" placeholder="{{ Helper::translation(3209,$translate) }}" data-bvalidator="required"></textarea>
                            </div>

                            <input type="hidden" name="from_email" value="{{ Auth::user()->email }}" />
                            <input type="hidden" name="from_name" value="{{ Auth::user()->name }}" />
                            <input type="hidden" name="to_email" value="{{ $user['user']->email }}" />
                            <input type="hidden" name="to_name" value="{{ $user['user']->name }}" />

                            <div class="msg_submit">
                                <button type="submit" class="btn btn--md btn-block theme-button">{{ Helper::translation(3210,$translate) }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endif
        <!-- end send message for login user -->

        <!-- start warning to login -->
        @if(Auth::guest())
            <div class="sidebar-card message-card">
                <div class="p-3">
                    <h4>{{ Helper::translation(2915,$translate) }} {{ $user['user']->username }}</h4>
                </div>

                <div class="p-3">
                    <p> {{ Helper::translation(3061,$translate) }}
                        <a href="{{ url('/login') }}" class="theme-color">{{ Helper::translation(3020,$translate) }}</a> {{ Helper::translation(3062,$translate) }}
                    </p>
                </div>
            </div>
        @endif
        <!-- end warning to login -->
    </aside>
</div>