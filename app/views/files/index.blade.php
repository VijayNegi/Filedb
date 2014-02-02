@extends('layouts.master')


@section('content')
	
	<h1>Files</h1>
	@if(Session::has('success'))
	
		<div class='alert alert-success'>{{ Session::get('success') }}</div>
	@endif
	@if(Session::has('error'))
	
		<div class='alert alert-danger'>{{ Session::get('error') }}</div>
	@endif

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
							
								<td> <a class="row-link" href="{{ link_to_file($file)}}">{{ $file->full_name}} </a></td>
								<td> {{ $file->check}} </td>
								<td> {{ $file->frames}} </td>
								<td> {{ $file->version}} </td>
								<td> {{ $file->description}} </td>

					    		
					    	
					    </tr>
					@endforeach

        </tbody>
      </table>
      			 {{ $files->links() }}


@stop