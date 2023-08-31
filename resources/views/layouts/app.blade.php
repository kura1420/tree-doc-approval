<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/default/easyui.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/color.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/icon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/demo.css') }}" />
        @yield('addCss')

        <script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jquery.easyui.min.js') }}"></script>
    </head>

    <body class="easyui-layout">
        @yield('content')
    </body>
    
    @yield('addJs')
</html>
