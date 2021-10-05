@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')

@endsection

@else
  @include('theme2.503')
@endif