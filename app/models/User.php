<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');

	// Validation rules
	private $rules = array(
		'username'				=> 'required|min:3|max:80|alpha_dash|unique:users',
		'email'					=> 'required|between:3,64|email|unique:users',
		'password'				=> 'required|alpha_num|between:4,15|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,15'
		);

}