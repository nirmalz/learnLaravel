<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/user', function(){
	$user = new User;
	$user->username 				= 'Harry';
	$user->email 					= 'harry@gmail.com';
	$user->password 				= 'general';
	$user->password_confirmation 	= 'general';


	if($user->save()){
		echo "User successfully inserted into users table";
	}else{
		echo "Make sure you did everything right !!";

		foreach ($user->errors()->all() as $error) {
			echo "<div>$error</div>"; 
		}
	}

});
