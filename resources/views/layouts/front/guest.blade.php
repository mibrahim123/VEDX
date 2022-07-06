<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico">
            @include('layouts.front.header_css')

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.front.navigation')
                @yield('content')
            @include('layouts.front.footer')
            {{-- @include('layouts.admin.footer') --}}
        </div>
    </body>
    @include('layouts.front.footer_js')
    @yield('js')

</html>
