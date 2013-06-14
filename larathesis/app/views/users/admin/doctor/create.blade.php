@extends('users/admin/layout/main')
@section('container')
	 {{Form::open(array('action'=>'AdminDoctorController@postCreate','method'=> 'POST','class' => 'form-horizontal')) }}
     <fieldset>
        <!-- Address form -->
 
	<h2>Add a Doctor</h2>
        <div class="control-group {{ ($errors->has('username')) ? 'error' : '' }}" for="username">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input name="username" id="username" value="{{ Request::old('username') }}" type="text" class="input-xlarge" placeholder="Username">
                {{ ($errors->has('username') ? $errors->first('username') : '') }}
            </div>
        </div>

        <div class="control-group {{ ($errors->has('password')) ? 'error' : '' }}" for="password">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input name="password" id="password" value="{{ Request::old('password') }}" type="text" class="input-xlarge" placeholder="Password">
                {{ ($errors->has('password') ? $errors->first('password') : '') }}
            </div>
        </div>
        
        
    </fieldset>
    {{Form::submit('Submit');}}
{{ Form::close() }}
@stop
