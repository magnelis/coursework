<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_tattoo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_size.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_time.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_pages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_mainPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_aboutPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_records.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_users.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_contactsPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style_index.css') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    {{-- icons --}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- Disable date --}}
    <script src="{{ asset('js/admin/disableDate.js') }}"></script>
</head>
<body>

@if((request()->route()->uri !== 'admin'))
    <section class="section__custom__admin">
        @include('include.admin_nav')
        <div class="container__custom__admin">
            @yield('content')
        </div>
    </section>
@else
    <section class="section__custom__auth__admin">
        @yield('content')
    </section>
@endif

@stack('script')
</body>
</html>
