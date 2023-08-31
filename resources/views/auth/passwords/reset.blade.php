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
<div class="easyui-panel" title="{{ __('Reset Password') }}" style="padding: 30px 60px; width: 500px;">
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="ff" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div style="margin-bottom: 10px;">
            <input class="easyui-textbox" style="width: 100%;" name="email" id="email" label="{{ __('Email') }}" data-options="required:true,validType:'email'" value="{{ $email ?? old('email') }}" />
        </div>
        <div style="margin-bottom: 10px;">
            <input class="easyui-passwordbox" style="width: 100%;" name="password" id="password" label="{{ __('Password') }}" data-options="required:true" />
        </div>
        <div style="margin-bottom: 10px;">
            <input class="easyui-passwordbox" style="width: 100%;" name="password_confirmation" id="password_confirmation" label="{{ __('Confirm Password') }}" data-options="required:true,labelWidth:150," />
        </div>
        <div style="text-align: center; padding: 5px 0;">
            <button type="submit" class="easyui-linkbutton" data-options="text:'{{ __('Reset Password') }}'"></button>
        </div>
    </form>
</div>

<script>
document.body.classList.add('center');
document.getElementById('email').focus();
</script>
@endsection