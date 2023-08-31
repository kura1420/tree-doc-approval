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
<div class="easyui-panel" title="{{ __('Reset Password') }}" style="padding: 30px 60px;">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="ff" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div style="margin-bottom: 10px;">
            <input class="easyui-textbox" style="width: 100%;" name="email" id="email" label="{{ __('Email') }}" data-options="required:true,validType:'email'" />
        </div>
        <div style="text-align: center; padding: 5px 0;">
            <button type="submit" class="easyui-linkbutton" data-options="text:'{{ __('Send Password Reset Link') }}'"></button>
            <a href="{{ route('login') }}" class="easyui-linkbutton c6" data-options="text:'Login'"></a>
        </div>
    </form>
</div>

<script>
document.body.classList.add('center');
document.getElementById('email').focus();
</script>
@endsection