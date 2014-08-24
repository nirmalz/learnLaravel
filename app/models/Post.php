<?php
use LaravelBook\Ardent\Ardent;

class Post extends Ardent {
	protected $fillable = ['body'];

	// Validation rules
	public static $rules = array(
		'body'				=> 'required|min:10',
		'clique_id'			=> 'required|numeric'
		);	

	
	public function user(){
		return $this->belongsTo('User');
	}

	//clique relationship
	public function clique(){
		return $this->belongsTo('Clique');
	}

	//comment relatioship
	public function comments(){
		return $this->morphMany('Comment', 'commentable');
	}

}