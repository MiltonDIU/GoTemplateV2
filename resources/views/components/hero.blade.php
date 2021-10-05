<!-- Received array of $list and $headline -->
<section class="hero-area bgimage hero-area--h200">
  <div class="bg_image_holder">
    <img src="{{ url('/') }}/public/assets/images/double-bubble-outline.png" alt="{{ $allsettings->site_title }}">
  </div>
  <div class="bg-overlay--breadcrumb"></div>

  <div class="hero-content content_above contact-hero" style="text-align: unset;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            <ul>
              <li>
                  <a href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }}</a>
              </li>

              @foreach($list as $item)
                @if(isset($item['path']))
                  <li>
{{--                    <a href="{{ URL::to($item['path']) }}">--}}
                      {{ gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text'] }}
{{--                    </a>--}}
                  </li>
                @else
                  <li>
                    {{ gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text'] }}
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
          <h1 class="page-title text-white">
            {{ gettype($headline) == "integer" ? Helper::translation($headline, $translate) : $headline }}
          </h1>
        </div>
      </div>
    </div>
  </div>
</section>
