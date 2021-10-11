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
      <li class="control category_button" data-filter="all">
          <a href="{{ URL::to('/shop/category/') }}/{{"0"}}/{{"all"}}">{{ "All" }}</a>
      </li>

      @foreach($cats as $cat)
            <li class="control category_button" data-filter=".{{$cat->category_slug}}">
                <a href="{{ URL::to('/shop/category/') }}/{{$cat->cat_id}}/{{$cat->category_slug}}">{{ $cat->category_name }}</a>
            </li>
      @endforeach
    </ul>


    <!-- start Filter -->
    <div class="filter_field">
      <div class="row">
        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
          <div class="filter_options">
            <label for="filter_s">Tags</label>
            <div class="f_s_box">
              <input type="text" id="filter_s" data-ref="input-search">
              <i class="fas fa-search"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
          <div class="filter_options">
            <label for="filter_p">Price</label>
            <select name="" id="filter_p" class="f_o_select">
              <option value="" disabled selected>Sort by Price</option>
              <option value="price:asc">Low to High</option>
              <option value="price:desc">High to Low</option>
            </select>
          </div>
        </div>

        <!-- TODO: temporary comment, need to implement in future -->
        <!--
        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_t">Type</label>
            <select name="" id="filter_t" class="f_o_select">
              <option value="" disabled selected>Choose by Type</option>
              <option value=".popular">Popular</option>
              <option value=".recent">Recent</option>
            </select>
          </div>
        </div>
        -->

        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
          <div class="filter_options">
            <label for="filter_l">License</label>
            <select name="" id="filter_l" class="f_o_select">
              <option value="" disabled selected>Choose by License</option>
              <!-- <option value=".mix">All</option> -->
              <option value=".free">Free</option>
              <option value=".premium">Premium</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <!-- end Filter -->

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
