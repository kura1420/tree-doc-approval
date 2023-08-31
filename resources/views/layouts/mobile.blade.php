<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/default/easyui.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/mobile.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/demo.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/color.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/icon.css') }}" />
        @yield('addCss')

        <script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jquery.easyui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jquery.easyui.mobile.js') }}"></script>
    </head>

    <body>
        <div id="home" class="easyui-navpanel">
            <header>
                <div class="m-toolbar">
                    <div class="m-title">{{ config('app.name', 'Laravel') }}</div>
                    <!-- <div class="m-left">
                        <a href="{{ route('home') }}" class="easyui-linkbutton" data-options="iconCls:'icon-home',plain:true"></a>
                    </div> -->
                    <div class="m-right">
                        <a href="javascript:void(0)" class="easyui-menubutton" data-options="iconCls:'icon-more',plain:true,hasDownArrow:false,menu:'#mm',menuAlign:'right'"></a>
                    </div>
                </div>
                <div id="mm" class="easyui-menu" style="width: 150px;" data-options="itemHeight:30,noline:true">
                    <div>Keluar</div>
                </div>
            </header>

            @yield('content')
        </div>

        @include('mobile.document.list_waiting')
        @include('mobile.document.list_approve')
        @include('mobile.document.list_reject')
        @include('mobile.document.show')
    </body>
    
    @yield('addJs')
</html>
