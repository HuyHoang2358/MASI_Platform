<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{asset('backend/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{Config::get('website.author')}}">
    <title>@yield('title') - Admin Account {{Config::get('website.webName')}}</title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('backend/dist/css/app.css')}}" />
    <!-- END: CSS Assets-->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<!-- END: Head -->
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Register Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="{{Config::get('website.webName')}} - HTML Admin Template" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
                <span class="text-white text-lg ml-3"> {{Config::get('website.webName')}}</span>
            </a>
            <div class="my-auto">
                <img alt="{{\Config::get('website.webName')}} - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{asset('backend/dist/images/illustration.svg')}}">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Chỉ  một vài bước nhỏ để
                    <br>
                    tạo tài khoản của bạn.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                    Quản lý tất cả các tài khoản thương mại điện tử của bạn tại một nơi.
                </div>
            </div>
        </div>
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            @yield('content')
        </div>
    </div>
</div>

<!-- BEGIN: JS Assets-->
<script src="{{asset('backend/dist/js/app.js')}}"></script>
<!-- END: JS Assets-->
</body>
</html>
