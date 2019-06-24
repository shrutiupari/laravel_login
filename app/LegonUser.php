<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable; 
use Illuminate\Auth\Passwords\CanResetPassword; 
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; 
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class LegonUser extends Model implements AuthenticatableContract, CanResetPasswordContract 
{ 
	use Authenticatable, CanResetPassword;

    //
	 /**
	 * The database name used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'mysql_external';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'emp_username_db';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['emp_id', 'tgi', 'pass'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['pass'];
}
