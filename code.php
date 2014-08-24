<?php

// =========== PHP ARTISAN  ===========//

//creating a table
php artisan generate:migration create_users_table --fields="email:string, name:string"

//adding a column
php artisan generate:migration add_username_to_users_table --fields="usename:string"

//to migrate the migrations
php artisan migrate





//============BEST PRACTICES==============//

1. Validation should be placed inside the model rather than controller itself.





//============ MISC ========================//

//mass assignmnet:
	protected $fillable = array();      //mass assignable
	protected $guarded	= array();		//un-assignable

//hiding column when returning an instance of the model

	protected $hidden	= array('password');

//	

