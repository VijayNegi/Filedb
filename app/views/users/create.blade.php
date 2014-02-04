@extends('layouts.master')

@section('content')
	{{ Form::open(['route'=>'user.store','class'=>'form-horizontal','onsubmit'=>'return confirm("Please confirm you want to add the user");'])}}
		<div class="form-group">
			{{Form::label('username',' Username:',['class'=>'col-sm-2 control-label'])}}
			{{Form::text('username','',['class'=>'form-control'])}}
			{{ $errors->first('username', '<span class="label label-danger">:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('email',' Email:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::email('email','',['class'=>'form-control'])	}}
			{{ $errors->first('email', '<span class="label label-danger" >:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('password',' Password:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('password','',['class'=>'form-control'])	}}
			{{ $errors->first('password', '<span class="label label-danger" >:message</span>') }}
		</div>
		
		<div class="form-group">
			{{Form::label('admin',' Admin:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::checkbox('admin', true)}}
		</div>

		<div>
			{{Form::Submit('Add User',['class'=>'btn btn-primary'])	}}
			
		</div>




	{{ Form::close()}}



@stop