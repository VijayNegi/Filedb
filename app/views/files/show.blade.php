@extends('layouts.master')
@section('content')
	
		<ul  class="list-group">
			
			<li class="list-group-item"><b>File name  </b>: {{ $file->full_name}} </li>
			<li class="list-group-item"><b>Check      </b>: {{ $file->check}} </li>
			<li class="list-group-item"><b>Frames     </b>: {{ $file->frames}} </li>
			<li class="list-group-item"><b>Version    </b>: {{ $file->version}} </li>
			<li class="list-group-item"><b>Description</b>: {{ $file->description}} </li>
	    			    	
	    </ul>
	    <a class="btn" href="{{ URL::route('Files.edit',[$file->id]) }}">Edit</a>
	    <a class="btn" href="{{ URL::route('Files.delete',[$file->id]) }}" onclick='return confirm("Please confirm you want to delete the record");'>Delete</a>

@stop 