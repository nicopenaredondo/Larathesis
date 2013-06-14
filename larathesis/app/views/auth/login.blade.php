@extends('auth.layouts.main')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')
<h4>Login</h4>
<div class="well">
	<form class="form-horizontal" action="{{ route('login') }}" method="post">   
        <input type="hidden" name="_token" value="{{ Session::getToken() }}">

        <div class="control-group {{ ($errors->has('username')) ? 'error' : '' }}" for="username">
            <label class="control-label" for="username">E-mail</label>
            <div class="controls">
                <input name="username" id="username" value="{{ Request::old('username') }}" type="text" class="input-xlarge" placeholder="E-mail">
                {{ ($errors->has('username') ? $errors->first('username') : '') }}
            </div>
        </div>
    
       <div class="control-group {{ $errors->has('password') ? 'error' : '' }}" for="password">
            <label class="control-label" for="password">New Password</label>
            <div class="controls">
                <input name="password" value="" type="password" class="input-xlarge" placeholder="New Password">
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>
        </div>

        <div class="control-group" for"rememberme">
            <div class="controls">
                <label class="checkbox inline">
                    <input type="checkbox" name="rememberMe" value="1"> Remember Me
                </label>
            </div>
        </div>
    
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Log In"> 
            <a href="/users/resetpassword" class="btn btn-link">Forgot Password?</a>
        </div>
  </form>
</div>

@stop