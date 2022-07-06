<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
            @include('layouts.admin.header_css')
            @yield('css')

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.admin.top')
            @include('layouts.admin.sidebar')
                @yield('content')
            {{-- @include('layouts.admin.footer') --}}
        </div>
    </body>
    @include('layouts.admin.footer_js')
    @yield('js')

</html>
