<?php

class FilesController extends BaseController {


	 public function __construct()
    {
    	$this->beforeFilter('auth',['only'=>['store','edit','destroy']]);
        // $this->beforeFilter('auth', array('except' => 'getLogin'));

        // $this->beforeFilter('csrf', array('on' => 'post'));

        // $this->afterFilter('log', array('only' =>
        //                     array('fooAction', 'barAction')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$files = Files::paginate(10);
		return View::make('files.index',compact('files'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$file = new Files;
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$file = Files::findOrFail($id);
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
		$file = Files::findOrFail($id);
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
		$file = Files::findOrFail($id);
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
		$file = Files::findOrFail($id);
		$file->delete();
		return Redirect::to('/');
	}
	public function Search()
	{
		// $files = Files::searchByName($name);
		// return View::make('files.index',compact('files'));
		return View::make('files.search',compact('files'));
	}
	public function Results()
	{
		
		if(Input::has('name') )
		{
		 	//var_dump(Input::all());
			$name = Input::get('name', '');	
			// $files = Files::searchByName(Input::get('name', ''));
			$files =  Files::whereRaw('full_name LIKE \'%'.$name.'%\'')->paginate(10);
		 	return View::make('files.search',compact('files'));
		}
		else if(Input::has('page'))
		{
			//var_dump(Input::all());
			Input::flash();
			$name = Input::get('name', '');	
			// $files = Files::searchByName(Input::get('name', ''));
			$files =  Files::whereRaw('full_name LIKE \'%'.$name.'%\'')->paginate(10);
		 	return View::make('files.search',compact('files'));
		}
		else
		{	
			//var_dump(Input::all());
			return View::make('files.search');
		}
	}

}