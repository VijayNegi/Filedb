@extends('layouts.master')

@section('content')
	


	{{ Form::model($file, ['route'=>['Files.update',$file->id],'class'=>'form-horizontal','method'=>'put'] ) }}

		<div class="form-group">
			{{Form::label('full_name',' Full File name:',['class'=>'col-sm-2 control-label'])}}
			{{Form::text('full_name',NULL,['class'=>'form-control'])}}
			{{ $errors->first('full_name', '<span class="label label-danger">:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('check',' Related Check:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('check',NULL,['class'=>'form-control'])	}}
			{{ $errors->first('check', '<span class="label label-danger" >:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::label('frames',' Frames:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('frames',NULL,['class'=>'form-control'])	}}
		</div>
		<div class="form-group">
			{{Form::label('version',' Version:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::text('version',NULL,['class'=>'form-control'])	}}
		</div>
		<div class="form-group">
			{{Form::label('description',' Description:',['class'=>'col-sm-2 control-label'])	}}
			{{Form::textarea('description',NULL,['class'=>'form-control'])	}}
		</div>



		<div>
			{{Form::Submit('Update',['class'=>'btn btn-primary'])	}}
			
		</div>


	{{ Form::close() }}



@stop