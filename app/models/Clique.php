<?php
use LaravelBook\Ardent\Ardent;

class Clique extends Ardent {

	// ===================== ATTRIBUTES =================

	protected $fillable = array('name');

	//ardent validation rules
	public static $rules = array(
		'name' 	=> "required|unique:cliques"
		);

	// ===================== METHODS ===================

	//user relationship
	public function users(){
		return $this->belongsToMany('User');
	}

	//relationship with post
	public function posts(){
		return $this->hasMany('Post');
	}

}