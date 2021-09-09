@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2919,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>
<body class="preload dashboard-statement">
    @include('header')
    @if(Auth::user()->user_type == 'vendor')

    @include("./components/hero", [
        "list" => [array("path" => "/coupon", "text" => 2919)],
        "headline" => 2919
    ])

    <section class="dashboard-area">
        @include('dashboard-menu')
        <!-- end /.dashboard_menu_area :) -->

        <div class="dashboard_contents dashboard_statement_area">
            <div class="container">
                 <div class="row">
                 <div class="col-lg-12 col-md-12 text-right">
                 <a href="{{ URL::to('/add-coupon') }}" class="btn btn--sm theme-button">{{ Helper::translation(2865,$translate) }}</a>
                 </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ Helper::translation(2920,$translate) }}</th>
                                        <th>{{ Helper::translation(2866,$translate) }}</th>
                                        <th>{{ Helper::translation(2921,$translate) }}</th>
                                        <th>{{ Helper::translation(2867,$translate) }}</th>
                                        <th>{{ Helper::translation(2873,$translate) }}</th>
                                        <th>{{ Helper::translation(2922,$translate) }}</th>
                                    </tr>
                                </thead>

                                <tbody id="listShow">
                                    @php $no = 1; @endphp
                                    @foreach($couponData['view'] as $coupon)
                                        <tr class="li-item">
                                            <td>{{ $no }}</td>
                                            <td>{{ $coupon->coupon_code }} </td>
                                            <td>{{ $coupon->discount_type }}</td>
                                            <td>@if($coupon->discount_type == 'fixed'){{ $allsettings->site_currency }} @endif{{ $coupon->coupon_value }}@if($coupon->discount_type == 'percentage')%@endif </td>
                                            <td>@if($coupon->coupon_status == 1) <span class="active-class">{{ Helper::translation(2874,$translate) }}</span> @else <span class="inactive-class">{{ Helper::translation(2875,$translate) }}</span> @endif</td>
                                            <td>
                                            <a href="{{ URL::to('/edit-coupon') }}/{{ base64_encode($coupon->coupon_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(2923,$translate) }}</a>
                                            @if($demo_mode == 'on')
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(2924,$translate) }}</a>
                                            @else
                                            <a href="{{ URL::to('/coupon') }}/{{ base64_encode($coupon->coupon_id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(2925,$translate) }}');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(2924,$translate) }}</a>
                                             @endif
                                             </td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach
                                   </tbody>
                            </table>
                            <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    @else
    @include('not-found')
    @endif
    <!--================================
            END DASHBOARD AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
   @include('footer')

   @include('javascript')
</body>

</html>
@else
@include('503')
@endif