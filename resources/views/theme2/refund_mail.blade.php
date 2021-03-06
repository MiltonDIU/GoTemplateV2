<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ Helper::translation(3164,$translate) }}</title>
</head>

<body class="preload dashboard-upload">

  <div class="dashboard_contents">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="dashboard_title_area">
              <div class="pull-left">
                <div class="dashboard__title">
                  <h2>{{ Helper::translation(3164,$translate) }}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 col-md-7">
            <p><strong> {{ Helper::translation(2917,$translate) }} : </strong> {{ $from_name }}</p>   
            <p><strong> {{ Helper::translation(2915,$translate) }} : </strong> {{ $from_email }}</p>
            <p><strong> {{ Helper::translation(3146,$translate) }} : </strong> {{ $ref_refund_reason }}</p>
            <p><strong> {{ Helper::translation(2909,$translate) }} : </strong> {{ $ref_refund_comment }}</p>
            <p><strong> {{ Helper::translation(2908,$translate) }} : </strong> <a href="{{ $item_url }}">{{ $item_url }}</a></p>   
          </div>
        </div>
      </div>
  </div>

</body>
</html>