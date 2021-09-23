@if($allsettings->maintenance_mode == 0)

<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2934,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    
</head>

<body class="preload dashboard-upload">

    @include('header')
    @if(Auth::user()->user_type == 'vendor')

    @include("./components/hero", [
        "list" => [array("path" => "/add-coupon", "text" => 2934)],
        "headline" => 2934
    ])    
    
    <section class="dashboard-area pt-0">
        
        @include('dashboard-menu')
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
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
               
                <form action="{{ route('edit-coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                
                   <div class="upload_modules">
                    <div class="modules__content">
                    <div class="row">
                  <div class="col-md-12">
            
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">{{ Helper::translation(2866,$translate) }}<sup>*</sup></label>
                        <input id="coupon_code" name="coupon_code" type="text" class="text_field" value="{{ $edit['value']->coupon_code }}" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">{{ Helper::translation(2867,$translate) }} <sup>*</sup></label>
                        <input id="coupon_value" name="coupon_value" type="text" class="text_field" value="{{ $edit['value']->coupon_value }}" data-bvalidator="required,min[1]">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">{{ Helper::translation(2868,$translate) }} <sup>*</sup></label>
                        <input id="coupon_start_date" name="coupon_start_date" type="text" class="text_field" autocomplete="off" value="{{ $edit['value']->coupon_start_date }}" data-bvalidator="required">
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2">{{ Helper::translation(2869,$translate) }} <sup>*</sup></label>
                        <input id="coupon_end_date" name="coupon_end_date" type="text" class="text_field" autocomplete="off" value="{{ $edit['value']->coupon_end_date }}" data-bvalidator="required">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputCity">{{ Helper::translation(2870,$translate) }} <sup>*</sup></label>
                        <div class="select-wrap select-wrap2">
                        <select name="discount_type" class="text_field" data-bvalidator="required">
                         <option value=""></option>
                         <option value="percentage" @if($edit['value']->discount_type == 'percentage') selected @endif>{{ Helper::translation(2871,$translate) }}</option>
                         <option value="fixed" @if($edit['value']->discount_type == 'fixed') selected @endif>{{ Helper::translation(2872,$translate) }}</option>
                         </select>
                         <span class="lnr lnr-chevron-down"></span>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputState">{{ Helper::translation(2873,$translate) }} <sup>*</sup></label>
                        <div class="select-wrap select-wrap2">
                        <select name="coupon_status" class="text_field" data-bvalidator="required">
                        <option value=""></option>
                         <option value="1" @if($edit['value']->coupon_status == 1) selected @endif>{{ Helper::translation(2874,$translate) }}</option>
                         <option value="0" @if($edit['value']->coupon_status == 0) selected @endif>{{ Helper::translation(2875,$translate) }}</option>
                         </select>
                         <span class="lnr lnr-chevron-down"></span>
                         </div>
                    </div>
                    
                </div>
                <input type="hidden" name="coupon_id" value="{{ base64_encode($edit['value']->coupon_id) }}">
                <button type="submit" class="btn btn--default theme-button">{{ Helper::translation(2876,$translate) }}</button>
            
            </div>
          </div>
                                
                                <!-- end /.modules__content -->
                            </div>
                             
                        
                    </div>
                    
                    
               
                
                </form>
               
                <!-- end /.row -->
           </div>
           </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    @else
    @include('not-found')
    @endif
    
   @include('footer')
    
   @include('javascript')

    
</body>

</html>
@else
@include('503')
@endif