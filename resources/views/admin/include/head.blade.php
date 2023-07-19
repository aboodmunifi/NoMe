@php
    $rtl = "";
    if (app()->getLocale() === "ar") {
        $rtl = "-rtl";
    }
@endphp
<title>متجر نو مي | @yield('title')</title>
<link rel="apple-touch-icon" href="{{ asset('dashboard/app-assets/images/ico/apple-icon-120.html') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset("image/logo-3.png") }}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/vendors/css/vendors$rtl.min.css") }}">

<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/bootstrap.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/bootstrap-extended.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/colors.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/components.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/themes/dark-layout.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/themes/bordered-layout.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/app-assets/css$rtl/themes/semi-dark-layout.min.css") }}">

<link rel="stylesheet" type="text/css"
      href="{{ asset("dashboard/app-assets/css$rtl/core/menu/menu-types/vertical-menu.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("dashboard/assets/css$rtl/style.css") }}">

@yield('styles')
