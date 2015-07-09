<?php
namespace BechBank\Entities;
use Illuminate\Database\Eloquent;

class User extends \Eloquent {
	protected $table = 'users';
	protected $fillable = array('nickname','password','email','apellidos','nombres','url_intercambio','idpais');

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = \Hash::make($value);
	}

}