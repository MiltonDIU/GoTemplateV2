@if($user['user']->user_type == 'vendor')
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-1 fa fa-bullhorn"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title">{{ $getitemcount }}</h3>
                <h5 class="card-subtitle">{{ Helper::translation(3195,$translate) }}</h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-2 fa fa-briefcase"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title">{{ $getsalecount }}</h3>
                <h5 class="card-subtitle">{{ Helper::translation(3039,$translate) }}</h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-4 profile-card-wrapper">
        <div class="card">
            <i class="card-icon card-icon-3 fa fa-star"></i>
            <div class="card-body card-body-dashboard">
                <h3 class="card-title">{{ $getreview }}</h3>
                <h5 class="card-subtitle">{{ Helper::translation(3196,$translate) }}</h5>
            </div>
        </div>
    </div>
@endif