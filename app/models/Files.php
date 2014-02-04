<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;

class Files extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'users';
	protected $guarded = ['id'];

	protected static $rules = [
			'full_name'=>'required',
			'check'=>'required',
			'description'=>'required'

	];
	public $errors;

	public static function SearchByName($name)
	{
		$files =  Files::whereRaw('full_name LIKE \'%'.$name.'%\'')->paginate(10);
		return $files;
	}
	public function isValid()
	{
		$v = Validator::make($this->attributes, static::$rules);
		if($v->fails())
		{
			$this->errors = $v->messages();
			return false;
		}
		return true;
	}
}