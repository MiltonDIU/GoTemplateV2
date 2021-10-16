@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/item.css') }}">
@endpush

@section('content')
@php
  $items = $data['itemData']['item'];
  $cats = $data['catData']['item'];
@endphp

<section id="all_category">
  <div class="container">
    <ul class="controls main_category">
      <li class="control category_button" data-filter="all">All</li>

      @foreach($cats as $cat)
        <li class="control category_button" data-filter=".{{$cat->category_slug}}">{{ $cat->category_name }}</li>
      @endforeach
    </ul>
      @include('theme2.layout.filter2')
      @include('theme2.layout.item_category',['items'=>$items])


  </div>
</section>

<script src="{{ asset('public/assets/theme2/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('public/assets/theme2/js/mixitup.min.js') }}"></script>

<script type="text/javascript">
  const mixContainerEl        = $('#mix-container');
  const filterPriceSelectEl   = $('#filter_p');
  const filterTypeSelectEl    = $('#filter_t');
  const filterLicenceSelectEl = $('#filter_l');
  const inputSearchEl         = $('#filter_s');

  let keyupTimeout;

  const mixer = mixitup(mixContainerEl, {
    animation: {
      duration: 350
    },
    callbacks: {
      onMixClick: function() {
        // Reset the search if a filter is clicked
        if (this.matches('[data-filter]')) {
          inputSearchEl.val('');
        }
      }
    }
  });

  inputSearchEl.on('keyup', function() {
    let searchValue;

    if ($(this).val().length < 3) {
      // If the input value is less than 3 characters, don't send
      searchValue = '';
    } else {
      searchValue = $(this).val().toLowerCase().trim();
    }

    // Very basic throttling to prevent mixer thrashing. Only search
    // once 350ms has passed since the last keyup event

    clearTimeout(keyupTimeout);

    keyupTimeout = setTimeout(function() {
      filterByString(searchValue);
    }, 350);
  });

  /**
    * Filters the mixer using a provided search string, which is matched against
    * the contents of each target's "class" attribute. Any custom data-attribute(s)
    * could also be used.
    *
    * @param  {string} searchValue
    * @return {void}
    */

  function filterByString(searchValue) {
    if (searchValue) {
      // Use an attribute wildcard selector to check for matches

      mixer.filter('[class*="' + searchValue + '"]');
    } else {
      // If no searchValue, treat as filter('all')

      mixer.filter('all');
    }
  }

  filterPriceSelectEl.on('change', function() {
    mixer.sort(this.value);
  });

  filterTypeSelectEl.on('change', function() {
    mixer.filter(this.value);
  });

  filterLicenceSelectEl.on('change', function() {
    mixer.filter(this.value);
  });

  // var containerEl = document.querySelector('.mix_container');
  // var mixer = mixitup(containerEl);
</script>

@endsection

@else
  @include('theme2.503')
@endif
