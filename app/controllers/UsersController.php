<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$files = User::findOrFail($id)->files()->paginate(10);
		return View::make('files.index',compact('files'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->admin)
			return View::make('users.create');
		$message = 'You dont have admin privilages!!!';
		return Redirect::to('/')->with('error', $message);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!Auth::user()->admin)
		{
			$message = 'You dont have admin privilages!!!';
			return Redirect::to('/')->with('error', $message);
		}
		$user = new User;
		$user->fill(Input::all());
		//Auth::user()->id;
		if($user->isValid() )
		{
			$user->save();
			$message = 'user with name "'.$user->username.' " added to db';
			return Redirect::to('/')->with('success', $message);
		}
		//return 'Validation Failed!!!!';
		return Redirect::back()->withInput()->withErrors($user->errors);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$file = User::findOrFail($id);
		return View::make('files.show',compact('file'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$file = User::findOrFail($id);
		return View::make('files.edit')->with(compact('file'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$file = User::findOrFail($id);
		$file->fill(Input::all());
		if($file->isValid())
		{
			$file->save();
			return Redirect::to('/');
		}
		//return 'Validation Failed!!!!';
		return Redirect::back()->withInput()->withErrors($file->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$file = User::findOrFail($id);
		$file->delete();
		return Redirect::to('/');
	}
	

}