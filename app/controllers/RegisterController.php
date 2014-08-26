<?php

class RegisterController extends BaseController{

	//user repository
	protected $user;

	//inject the user repository
	public function __construct(User $user){

		$this->user = $user;

	}

	public function index(){
		return View::make('register.index');
	}

	public function store(){

		$user = new User;

		if($user->save()){
			return Redirect::route('users.index')
					->with('flash', 'A new user has been created.');
		}

		return Redirect::route('register.index')
				->withInput()
				->withErrors($user->errors());

	}

}