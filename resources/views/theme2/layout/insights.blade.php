@push('styles')
  <link rel="stylesheet" href="public/assets/theme2/css/insights.css">
@endpush

<section id="premium_member">
  <div class="container">
    <div class="counter_main">
      <div class="row">
        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
          <div class="counter_number">
            <h3><span class="counter">{{ $totalearning }}</span></h3>
            <p>BDT Total earnings</p>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
          <div class="counter_number">
            <h3><span class="counter">{{ $totalfiles }}</span></h3>
            <p>Products</p>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
          <div class="counter_number">
            <h3><span class="counter">{{ $totalsales }}</span></h3>
            <p>Sales</p>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
          <div class="counter_number">
            <h3><span class="counter">{{ $totalmembers }}</span></h3>
            <p>Professionals</p>
          </div>
        </div>
      </div>
    </div>

    <div class="member_action">
      <div class="action_button">
        <a href="{{ url('/register') }}">Become our Premium Member</a>
      </div>
      <div class="member_text">
        <p>Easy payment in local currency</p>
      </div>
    </div>
  </div>
</section>