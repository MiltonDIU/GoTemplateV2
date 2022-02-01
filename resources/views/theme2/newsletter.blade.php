@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')


  <section class="pt-0">
    <div class="container">
        @include("theme2.layout.breadcrumb", [
  "list" => [array("text" => 3093)]
])

        <div class="row">
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
