<?php
namespace App\models;
/*
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
*/

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends \Eloquent implements AuthenticatableContract, CanResetPasswordContract { //implements UserInterface, RemindableInterface{

	//use UserTrait, RemindableTrait, SoftDeletingTrait;

	use Authenticatable, CanResetPassword;	
	
	protected $dates = ['deleted_at'];

    protected $table = 'user';

}
