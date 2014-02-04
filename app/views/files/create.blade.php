@extends('layouts.master')

@section('content')
	{{ Form::open(['route'=>'Files.store','class'=>'form-horizontal','onsubmit'=>'return confirm("Please confirm you want to add the record");'])}}
		<div class="form-group">
			{{Form::label('full_name',' Full File name:',['class'=>'col-sm-2 control-label'])}}
			{{Form::text('full_name','',['class'=>'form-control'])}}
			{{ $errors->first('full_name', '<span class="label label-danger">:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('check',' Related Check:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('check','',['class'=>'form-control'])	}}
			{{ $errors->first('check', '<span class="label label-danger" >:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('frames',' Frames:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('frames','',['class'=>'form-control'])	}}
		</div>
		<div class="form-group">
			{{Form::label('version',' Version:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('version','',['class'=>'form-control'])	}}
		</div>
		<div class="form-group">
			{{Form::label('description',' Description:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::textarea('description',NULL,['class'=>'form-control'])	}}
			{{ $errors->first('description', '<span class="label label-danger">:message</span>') }}
		</div>


		<div>
			{{Form::Submit('Add',['class'=>'btn btn-primary'])	}}
			
		</div>




	{{ Form::close()}}



@stop