<?php

//composer dump-autoload
function link_to_file($file)
{
	//return link_to_route('user.tasks.show',$task->title,[$task->user->username,$task->id]);
	return URL::route('Files.show',[$file->id]);
}