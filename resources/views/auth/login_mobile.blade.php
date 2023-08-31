@extends('layouts.single')

@section('addCss')
<link rel="stylesheet" type="text/css" href="{{ asset('themes/mobile.css') }}" />
@endsection

@section('addJs')
<script type="text/javascript" src="{{ asset('jquery.easyui.mobile.js') }}"></script>
@endsection

@section('content')
<div class="easyui-navpanel">
    <header>
        <div class="m-toolbar">
            <span class="m-title">Login to System</span>
        </div>
    </header>
    <div style="margin: 20px auto; width: 100px; height: 100px; border-radius: 100px; overflow: hidden;">
        <img src="https://www.jeasyui.com/demo-mobile/images/login1.jpg" style="margin: 0; width: 100%; height: 100%;" />
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="ff" method="POST" action="{{ route('login') }}">
        @csrf
        <div style="padding: 0 20px;">
            <div style="margin-bottom: 10px;">
                <input class="easyui-textbox" data-options="prompt:'{{ __('Email') }}',iconCls:'icon-man',validType:'email'" style="width: 100%; height: 38px;" name="email" id="email" />
            </div>
            <div>
                <input class="easyui-passwordbox" data-options="prompt:'{{ __('Password') }}'" style="width: 100%; height: 38px;" name="password" id="password" />
            </div>
            <div style="text-align: center; margin-top: 30px;">
                <table width="100%">
                    <tr>
                        <td style="width: 50%;">
                            <button type="submit" class="easyui-linkbutton" data-options="text:'Masuk'" style="width: 100%; height: 40px;"></button>
                        </td>
                        <td>
                            <a href="{{ route('password.request') }}" class="easyui-linkbutton c8" data-options="text:'Lupa Password?'" style="width: 100%; height: 40px;"></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection