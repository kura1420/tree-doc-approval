@extends('layouts.app')

@section('addCss')

@endsection

@section('addJs')
<script>
const PAGE = '{{ url("/") }}';
const REST = '{{ url("/rest") }}';
const RESTMODULE = '{{ route("rest-user.index") }}';
</script>

<script src="{{ asset('js/helper.js') }}"></script>

<script type="module" src="{{ asset('js/setting/user/main.js') }}"></script>
<script type="module" src="{{ asset('js/setting/user/list.js') }}"></script>
<script type="module" src="{{ asset('js/setting/user/form.js') }}"></script>
@endsection

@section('content')
<div id="tt" class="easyui-tabs" style="height: 100%;">
    <div title="List">
        @include('setting.user.list')
    </div>
    <div title="Form">
        @include('setting.user.form')
    </div>
</div>
<div id="tab-tools">
    <span class="easyui-tooltip" title="Create">
        <a id="btnAdd" href="javascript:void(0)">Add</a>
    </span>

    <span class="easyui-tooltip" title="Save">
        <a id="btnSave" href="javascript:void(0)">Save</a>
    </span>

    <span class="easyui-tooltip" title="Edit">
        <a id="btnEdit" href="javascript:void(0)">Edit</a>
    </span>

    <span class="easyui-tooltip" title="Duplicate">
        <a id="btnCopy" href="javascript:void(0)">Copy</a>
    </span>

    <span class="easyui-tooltip" title="Remove">
        <a id="btnRemove" href="javascript:void(0)">Delete</a>
    </span>
</div>
@endsection
