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
			->withErrors($user->errors());

	}

	/*
		Get Request to show particular user
	*/
	public function show($id)
	{
		return $this->user->find($id);
	}

	/*
		Update form
		GET Request
	*/
	public function edit($id)
	{
		$user = $this->user->find($id);
		return View::make('users.edit', array('user' => $user));
	}


	public function update($id)
	{

		$user = $this->user->update($id);
 
  		if($user->save())
		{
		    return Redirect::route('users.show', $id)
		      					->with('flash', 'The user was updated');
		}
 
		return Redirect::route('users.edit', $id)
		    			->withInput()
		    			->withErrors($user->errors());		

	}


	public function destroy($id)
	{
		//
	}


}
