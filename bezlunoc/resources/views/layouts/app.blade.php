<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content='Тату-студия "Bezlunoc" - уютная тату-студия в Челябинске. Безопасное нанесение художественных татуировок любого объема, сложности, направления, стиля. Разработка индивидуальных эскизов.' />
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_contacts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_reg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_record.css') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- Scripts --}}
    <script defer src = "{{ asset('js/responsiveHeader.js') }}"></script>
</head>
<body>

@if((request()->route()->uri !== 'authorization') AND (request()->route()->uri !== 'registration') AND (request()->route()->uri !== 'record'))
    @include('include.nav')
@endif

<div class="container__custom">
    @yield('content')
</div>

@if((request()->route()->uri !== 'authorization') AND (request()->route()->uri !== 'registration') AND (request()->route()->uri !== 'record'))
    @include('include.footer')
@endif

@stack('script')
</body>
</html>
