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
    <!--TinyMCE + lfm-->
    <script src="https://cdn.tiny.cloud/1/af6s904lyfpr5w3pids1ap9ei06381sfv7ne6e6eju3fpwis/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: '#mytextarea',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <!--end tinyMCE + lfm-->
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('backend/dist/css/app.css')}}" />
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
        @yield('text-area')
        @yield('size-management')
    </div>
    <!-- END: Content -->
</div>
<!-- BEGIN: JS Assets-->
<script src="{{asset('backend/dist/js/app.js')}}"></script>
<!-- END: JS Assets-->
</body>
</html>
