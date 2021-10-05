<?php
/*
Script Name: Feberr - Multivendor Digital Products Marketplace
Author: codecanor
Version: 11.0
*/
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ $allsettings->site_desc }}">
<meta name="keywords" content="{{ $allsettings->site_keywords }}">
@if($allsettings->site_favicon != '')
<link rel="apple-touch-icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
<link rel="shortcut icon" href="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_favicon }}">
@endif
<link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/linear-icon.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/slick-slider.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/editor.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap/bootstrap.min.css') }}">


<!-- views styles -->
<link rel="stylesheet" href="{{ asset('resources/views/static-style.css') }}">
<link rel="stylesheet" href="{{ asset('resources/views/css/item-card.css') }}">
<link rel="stylesheet" href="{{ asset('resources/views/css/item.css') }}">


<link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/pagination/pagination.css') }}">
<link rel="stylesheet" href="{{ asset('public/filter/jplist.core.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/filter/jplist.jquery-ui-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/filter/jquery-ui.css') }}" />
<link rel="stylesheet" media="screen" href="{{ asset('public/lightbox/topbox.css') }}" />
<link rel="stylesheet" href="{{ asset('public/video/video.popup.css') }}">
<link type="text/css" href="{{ URL::to('public/countdown/jquery.countdown.css?v=1.0.0.0') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::to('resources/views/admin/template/datepicker/picker.css') }}"> 
<link href="{{ asset('resources/views/admin/template/dragdrop/css/jquery.filer.css') }}" rel="stylesheet">
@if($translate == 'ar')
<link rel="stylesheet" href="{{ asset('public/assets/css/rtl.css') }}" />
@endif




