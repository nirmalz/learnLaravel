<?php namespace LearnLaravel\Services\Validators;

class User extends Validator{

	/*=============== ATTRIBUTE =======================*/

	//validation rules
	public static $rules = array(
		'username'				=> 'required|min:3|max:80|alpha_dash|unique:users',
		'email'					=> 'required|between:3,64|email|unique:users',
		'password'				=> 'required|alpha_num|between:4,15|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,15'
		);




	/*=============== METHOD ========================*/

}