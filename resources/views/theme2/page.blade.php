@extends('theme2.layout.master')

@php
  $page = $data['page']['page'];
@endphp

@section('content')
<section class="term_condition_area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cardify term_modules">
          <div class="term">
            <div class="term__title">
              <h4>{{ $page->page_title }}</h4>
            </div>
            <div class="content">
              {!! html_entity_decode($page->page_desc) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection