<?php
use LaravelBook\Ardent\Ardent;

class Post extends Ardent {
	protected $fillable = ['body'];

	// Validation rules
	public static $rules = array(
		'body'				=> 'required|min:10'
		);	

	public function user(){
		return $this->belongsTo('User');
	}
}