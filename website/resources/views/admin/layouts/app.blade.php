<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('backend/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('backend/dist/css/app.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <!-- END: CSS Assets-->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<!-- END: Head -->
<body class="py-5 md:py-0">
@include('admin.partials.mobileMenu')
@include('admin.partials.topMenu')

<div class="flex overflow-hidden">
    @include('admin.partials.sidebar')
    <!-- BEGIN: Content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- END: Content -->
</div>
<!-- BEGIN: JS Assets-->
<script src="{{asset('backend/dist/js/app.js')}}"></script>
<!-- END: JS Assets-->
</body>
</html>
