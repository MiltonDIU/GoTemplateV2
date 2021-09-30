@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
<section class="mt-5">
  <div class="container">
    @include("theme2.layout.breadcrumb", [
      "list" => [array("path" => "/favourites", "text" => "Favourites")]
    ])

    <div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
        <span>
          <span class="alert_icon lnr lnr-checkmark-circle"></span>
          <span>{{ $message }}</span>
        </span>
        <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
      </div>
      @endif

      @if ($message = Session::get('error'))
      <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
        <span>
          <span class="alert_icon lnr lnr-warning"></span>
          <span>{{ $message }}</span>
        </span>
        <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
      </div>
      @endif

      @if (!$errors->isEmpty())
      <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
        <span>
          <span class="alert_icon lnr lnr-warning"></span>
          @foreach ($errors->all() as $error)
            {{ $error }}
          @endforeach
        </span>

        <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
      </div>
      @endif
    </div>

    <div class="row" id="listShow">
      @foreach( $data['fav']['item'] as $item)
        @include('theme2.layout.item', [
          "item" => $item
        ])
      @endforeach

      <div class="pagination-area">
        <div class="turn-page" id="blogpager"></div>
      </div>
    </div>
  </div>
</section>
@endsection

@else
  @include('theme2.503')
@endif