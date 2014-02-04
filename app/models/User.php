<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	protected $guarded = ['id'];

	protected static $rules = [
			'username'=>'required',
			'email'=>'required|unique:users',
			'password'=>'required'
	];
	public $errors;
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function setPasswordAttribute($value)
	{
	 	 $this->attributes['password'] = Hash::make($value);
	}
	public function files()
    {
        return $this->hasMany('Files');
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