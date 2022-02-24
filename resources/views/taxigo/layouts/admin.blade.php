<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://unpkg.com/@webpixels/css@1.0/dist/index.css" rel="stylesheet">
    <title>{{ trans('panel.site_title') }}</title>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
    @stack('styles')
</head>

<body>


<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <x-taxigosidebar />
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        @yield('content')
    </div>
</div>

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
@livewireScripts
@yield('scripts')
@stack('scripts')
<script>
    function closeAlert(event){
        let element = event.target;
        while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>
</body>

</html>
