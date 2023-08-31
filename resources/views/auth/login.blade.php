@extends('layouts.single')

@section('addCss')
<style>
.center {
    background-color: #B0DAFF;
    margin: auto;
    width: 30%;
    padding: 70px 0;
}
</style>
@endsection

@section('addJs')

@endsection

@section('content')
<div class="easyui-panel" title="{{ __('Login') }}" style="padding: 30px 60px;">
 
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

        <div style="margin-bottom: 10px;">
            <input class="easyui-textbox" style="width: 100%;" name="email" id="email" label="{{ __('Email') }}" data-options="required:true,validType:'email'" />
        </div>
        <div style="margin-bottom: 10px;">
            <input class="easyui-passwordbox" style="width: 100%;" name="password" id="password" label="{{ __('Password') }}" data-options="required:true" />
        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-checkbox" name="remember" id="remember" value="1" label="{{ __('Remember Me') }}" data-options="labelWidth:120">
        </div>
        <div style="text-align: center; padding: 5px 0;">
            <button type="submit" class="easyui-linkbutton" data-options="text:'{{ __('Login') }}'"></button>
            <a href="{{ route('password.request') }}" class="easyui-linkbutton c5" data-options="text:'{{ __('Forgot Your Password?') }}'"></a>
        </div>
    </form>
</div>

<script>
document.body.classList.add('center');
document.getElementById('email').focus();
</script>
@endsection