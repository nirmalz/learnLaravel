<?php

use LearnLaravel\Storage\User\UserRepository as User;

class UserController extends \BaseController {

	// =================== ATTRIBUTES ===================

	protected $user;


	// =================== METHODS ======================

	public function __construct(User $user){
		$this->user = $user;
	}


	//Display all the users
	public function index()
	{
		return $this->user->all();
	}


	public function create()
	{
		//
	}


	//stores newly created users in database
	public function store()
	{
		
		$v = new LearnLaravel\Services\Validators\User;

		if($v->passes()){
			$this->user->create($input);

			return Redirect::route('users.index')
				->with('flash', 'The new user has been created');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($v->getErrors());

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
