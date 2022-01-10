<!doctype html>
<html lang="en">
<head>
    @include('shared.icons')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    @yield('css_after')
    <title>@yield('title','The Vinyl Shop')</title>
</head>
<body>
{{--  Navigation  --}}
@include('shared.navigation')
<main class="container my-3">
    @yield('main','Page under construction ...')
</main>
{{--  Footer  --}}
@include('shared.footer')
<script src="{{mix('js/app.js')}}"></script>
@yield('script_after')
@if(env('APP_DEBUG'))
    <script>
        $('form').attr('novalidate', 'true');
    </script>
@endif
</body>
</html>
