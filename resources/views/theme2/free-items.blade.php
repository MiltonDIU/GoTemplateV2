@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
<section class="hero-area bgimage d-flex flex-center">
  <div class="bg_image_holder">
    <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}" alt="{{ $allsettings->site_title }}">
  </div>
  <div class="bg-overlay"></div>

  <div class="container content_above">
    <div class="row jplist-panel">
      <div class="col-md-8 offset-md-2">
        <div class="search">
          <div class="search__title">
            <h3>{{ Helper::translation(3016,$translate) }}</h3>
            <h4 class="mt-3 pt-3 text--white">{{ Helper::translation(3017,$translate) }}</h4>
          </div>
          <div class="countdown-timer">
            <ul id="example">
              <li class="pt-2 pb-1 mb-2"><span class="days">00</span>
                <div>{{ Helper::translation(2995,$translate) }}</div>
              </li>
              <li class="pt-2 pb-1 mb-2"><span class="hours">00</span>
                <div>{{ Helper::translation(2996,$translate) }}</div>
              </li>
              <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span>
                <div>{{ Helper::translation(2997,$translate) }}</div>
              </li>
              <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span>
                <div>{{ Helper::translation(2998,$translate) }}</div>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row" id="listShow">
    @foreach($data['item'] as $item)
      @include('theme2.layout.item', [
        "item" => $item
      ])
    @endforeach
  
    <div class="pagination-area">
      <div class="turn-page" id="blogpager"></div>
    </div>
  </div>
</div>

@if(!empty($allsettings->site_free_end_date))
<script type="text/javascript">
  $('#example').countdown({
    date: '{{ date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date)) }}',
    offset: -8,
    day: 'Day',
    days: 'Days'
  }, function () {

  });
</script>
@endif

@endsection

@else
  @include('theme2.503')
@endif