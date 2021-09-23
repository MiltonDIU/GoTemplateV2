@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @include("./components/hero", [
    "list" => [array("text" => 3093)],
    "headline" => 3093
  ])    
    
  <section class="term_condition_area">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12">
          <div class="text-center">

            <div class="term">
              <div class="content">
                @if ($message = Session::get('success'))
                  <div align="center"><h4>{{ $message }}</h4></div>
                @endif

                @if ($message = Session::get('error'))
                  <div align="center"><h4>{{ $message }}</h4></div>
                @endif
              </div>
            </div>
              
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@else
  @include('theme2.503')
@endif