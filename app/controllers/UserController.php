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


	public function store()
	{
		//
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
