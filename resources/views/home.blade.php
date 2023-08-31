@extends('layouts.app')

@section('addCss')

@endsection

@section('addJs')
<script>
const PAGE = '{{ url("/") }}';
const REST = '{{ url("/rest") }}';
</script>
<script src="{{ asset('js/helper.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
<div data-options="region:'north',split:false,border:false," style="height: 33px;">
    @include('layouts.includes.menubuttons')
</div>

<!-- <div data-options="region:'south',split:false" style="height:20px;">Footer</div> -->

<div style="width: 20%;"
    data-options="
        region:'east',
        title:'Profile User',
        split:true,
        hideCollapsedContent:false,
        collapsed:true
    ">
    <table id="_pg"></table>
</div>

<div style="width: 20%;"
    data-options="
        region:'west',
        title:'Main Menu',
        split:true,
        hideCollapsedContent:false,
        collapsed:false,
        tools: [
            {
                iconCls: 'icon-reload',
                handler: reloadTree
            },
        ],
    ">
    <ul id="_tt" style="padding-top: 2%;"></ul>
</div>

<div style="background-image: url('{{ asset('logo.jpg') }}'); background-repeat: no-repeat; background-attachment: fixed; background-position: center;"
    data-options="
        region:'center',
        title:'{{ config('app.name', 'Laravel') }}'
    ">
    <div id="_tb" class="easyui-tabs" data-options="border:false,fit:true,"></div>
</div>

@include('layouts.includes.window')
@endsection
