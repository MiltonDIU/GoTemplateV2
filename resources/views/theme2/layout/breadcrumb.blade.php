@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/breadcrumb.css') }}">
@endpush

<section id="breadcrumb">
  <div class="row">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }}</a></li>
        
        @php 
          $counter = 1;
          $arrLength = count($list);
        @endphp

        @foreach($list as $item)
          @php
            $className = $counter == $arrLength ? 'active' : '';
          @endphp

          @if(isset($item['path']))
            <li class="breadcrumb-item {{$className}}">
              {{ gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text'] }}
            </li>
          @else
            <li class="breadcrumb-item {{$className}}">
              {{ gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text'] }}
            </li>
          @endif

          @php $counter++; @endphp
        @endforeach
      </ol>
    </nav>
  </div>
</section>