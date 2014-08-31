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

Route::get('/postSample', function(){
	
	//create a new Post
	$post = new Post(array('body' => 'Binog, The hird post is now live.'));

	//grab User 1
	$user = User::find(1);

	//save the post
	if($user->posts()->save($post)){
		echo "User successfully inserted into users table";
	}else{
		echo "Make sure You have written the body content !!";

		foreach ($post->errors()->all() as $error) {
			echo "<div>$error</div>"; 
		}
	}

});

Route::get('/test', function(){
	echo First::greeting();
});

Route::resource('users', 'UserController');

//================== REGISTRATION =======================

// Get request to register member [display form]
Route::get('register', array(
	'uses'	=> 'RegisterController@index',
	'as'	=> 'register.index'
	));

// Post request to store new member
Route::post('register', array(
	'uses'	=> 'RegisterController@store',
	'as'	=> 'register.store'	
	));


//=========================================================



Route::get('/userSample', function(){

	$user = new User;
	
	$user->username 				= 'second';
	$user->email 					= 'second@gmail.com';
	$user->password 				= 'computer';
	$user->password_confirmation 	= 'computer';


	if($user->save()){
		echo "User successfully inserted into users table";
	}else{
		echo "Make sure you did everything right !!";

		foreach ($user->errors()->all() as $error) {
			echo "<div>$error</div>"; 
		}
	}

});

/*==== AUHTENTICATION ==================*/

Route::get('login', array(
	'uses'	=> 'SessionController@create',
	'as'	=> 'session.create'
	));

Route::post('login', array(
	'uses'	=> 'SessionController@store',
	'as'	=> 'session.store'
	));

Route::get('logout', array(
	'uses'	=> 'SessionController@destroy',
	'as'	=> 'session.destroy'
	));

/*===========PASSWORD REMINDERS==============*/

Route::get('password/reset', array(
	'uses'	=> 'PasswordController@remind',
	'as'	=> 'password.remind'
	));

Route::post('password/reset', array(
	'uses'	=> 'PasswordController@request',
	'as'	=> 'password.request'		
	));

Route::get('password/reset/{token}', array(
	'uses'	=> 'PasswordController@reset',
	'as'	=> 'password.reset'
	));

Route::post('password/reset/{token}', array(
	'uses'	=> 'PasswordController@update',
	'as'	=> 'password.update'
	));


/*=================ENVIRONMENT===================*/
Route::get('environment', function(){
	return App::environment();
});
