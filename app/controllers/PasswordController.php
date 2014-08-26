<?php
class PasswordController extends BaseController {
 	

 	//forgot password form display [GET]
    public function remind()
    {
        return View::make('password.remind');
    }


    //send mail and generate token [POST]
    public function request(){

  		$credentials = array('email' => Input::get('email'));

  		return Password::remind($credentials);

    }

    //Chaning password form after clicking from email [GET]
    public function reset($token){
    	return View::make('password.reset')->with('token', $token);
    }

    //update password [POST]
    public function update(){

    	$credentials = array('email' => Input::get('email'));

    	return Password::reset($credentials, function($user, $password){
    		$user->password = Hash::make($password);
    		$user->save();

    		return Redirect::to('login')->with('flash', 'Your Password has been reset');
    	});

    }

}