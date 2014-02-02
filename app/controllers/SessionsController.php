<?php

class SessionsController extends BaseController
{
	public function create()
	{
		// return a login page
		if(Auth::check())
		{
			return Redirect::back();
			//return Redirect::to('/');
			//return Auth::user();
		}

		 
		return View::make('sessions.create');
	}

	public function store()
	{
		if(Auth::attempt(Input::only('email','password')))
		{
			return Redirect::intended();
			//return Redirect::back();

			//return Redirect::to('/');
			//return Auth::user();
		}
		return Redirect::back()->withInput()->with('login_errors', true);
	}
	public function destroy()
	{
		Auth::logout();
		//return Redirect::route('sessions.create');
		//return 'you logged out!!!';
		//return Redirect::to('/');
		return Redirect::back();
	}
}