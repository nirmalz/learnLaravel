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
