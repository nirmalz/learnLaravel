<?php namespace LearnLaravel\Storage\User;

use User;

class EloquentUserRepository implements UserRepository{

	public function all(){
		return User::all();
	}

	public function find($id){
		return User::find($id);
	}

	public function create($input){
		return User::create($input);
	}

	public function save(){
		return User::save();
	}

}