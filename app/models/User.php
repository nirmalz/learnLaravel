<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// =========================== ATTRIBUTES ===========================
		
	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');

	//mass assignment
	protected $fillable = array('username', 'email', 'password');

	// Validation rules
	public static $rules = array(
		'username'				=> 'required|min:3|max:80|alpha_dash|unique:users',
		'email'					=> 'required|between:3,64|email|unique:users',
		'password'				=> 'required|alpha_num|between:4,15'
		);

	//autohydrate
	 public $autoHydrateEntityFromInput = true;

	//Purge Redundant data
	public $autoPurgeRedundantAttributes = true;

	//password hasing
	public static $passwordAttributes  = array('password');
  	public $autoHashPasswordAttributes = true;

	// ============================= METHODS ========================

	//raltion of user with post
	public function posts(){
		return $this->hasMany('Post');
	}

	//user following realtionship
	public function follow(){
		return $this->belongsToMany('User', 'user_follows', 'user_id', 'follow_id');
	}


	//user followers relationship
	public function followers(){
		return $this->belongsToMany('User', 'user_follows', 'follow_id', 'user_id');
	}

	//user relation with cliqe
	public function clique(){
		return $this->belongsToMany('Clique');
	}


}