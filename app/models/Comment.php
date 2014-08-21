<?php
 
class Comment extends Eloquent {

	// ======================= ATTRIBUTES =================
	protected $fillable = array('body');

	// ======================= METHODS ====================
 
	public function commentable()
	{
		return $this->morphTo();
	}
 
}