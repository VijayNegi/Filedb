@extends('layouts.master')

@section('content')
	{{ Form::open(['route'=>'Files.results','class'=>'form-inline'])}}
		<div class="form-group">
			{{Form::label('name',' String:',['class'=>'sr-only'])}}
			{{Form::text('name','',['class'=>'form-control'])}}
			{{ $errors->first('name', '<span class="label label-danger">:message</span>') }}
		</div>
		<div class="form-group">
			{{Form::Submit('Search',['class'=>'btn btn-primary'])	}}
			
		</div>




	{{ Form::close()}}

	@if(isset($files))
		<h1>Search Results</h1>

		<table class="table table-striped">
        <thead>
          <tr>
            <th>Filename</th>
            <th>Check</th>
            <th>Frames</th>
            <th>Version</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
			@foreach ($files as $file)
			
				<tr>
					
						<td><a class="row-link" href="{{ link_to_file($file)}}"> {{ $file->full_name}} </a></td>
						<td> {{ $file->check}} </td>
						<td> {{ $file->frames}} </td>
						<td> {{ $file->version}} </td>
						<td> {{ $file->description}} </td>
			    		
			    	
			    </tr>
			
			@endforeach

        </tbody>
      </table>
      {{ $files->links() }}
	@endif

@stop