@extends('layouts.master');

@section('content')

	{{Form::open(['route'=>'sessions.store','class'=>'form-signin'])}}

		<h2 class="form-signin-heading">Please sign in</h2>
		

			{{Form::email('email','',['class'=>'form-control','placeholder'=>'Email','required','autofocus'])}}
		
			
			{{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'])}}

			
		
			{{Form::submit('Sign in',['class'=>'btn btn-lg btn-primary btn-block'])}}

	{{Form::close()}}
	


@stop

@section('header')

	{{ HTML::style('assets\css\signin.css') }}

@stop