<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ Helper::translation(3192,$translate) }}</title>
</head>

<body class="preload dashboard-upload">

  <div class="dashboard_contents">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="dashboard_title_area">
            <div class="pull-left">
              <div class="dashboard__title">
                <h2>{{ Helper::translation(3193,$translate) }} {{ $from_name }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-md-7">
          <p><strong> {{ Helper::translation(3194,$translate) }}</strong></p>
          <p> Send to {{ $from_name }}, <br />
            <br />
            {{ $message_text }}
          </p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>