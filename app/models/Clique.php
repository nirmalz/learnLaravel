<?php

class Clique extends \Eloquent {

	//user relationship
	public function users(){
		return $this->belongsToMany('User');
	}

	//relationship with post
	public function posts(){
		return $this->hasMany('Post');
	}

}