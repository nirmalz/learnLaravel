<?php

use LearnLaravel\Storage\User\UserRepository as User;

class UserController extends \BaseController {

	// =================== ATTRIBUTES ===================

	protected $user;


	// =================== METHODS ======================

	public function __construct(User $user){ //dependancy injection
		$this->user = $user;
	}


	//Display all the users
	public function index()
	{
		return $this->user->all();
	}


	/*
		Displays form
		GET Request for View
	*/
	public function create()
	{
		return View::make('users.create');
	}


	/*
		POST Request to register new user
		-To test this method, we only need to assert that the user is redirected to the correct place dpending on success or failure.
		- Remember, we should only be testing one thing at a time and so we need to mock other dependancies
	*/
	public function store()
	{
		$user = $this->user->create(Input::all());

		if($user->save()){
			return Redirect::route('users.index')
				->with('flash', 'The new user has been created.');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($user->errors()->all());

	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}


	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}


}
