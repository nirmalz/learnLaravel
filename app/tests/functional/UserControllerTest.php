<?php

use LearnLaravel\Storage\User\UserRepository as User;

class UserControllerTest extends TestCase{


	//create any mock objects that we require in this test file
	public function setUp()
	{
	    parent::setUp();
	 
	    $this->mock = $this->mock('User');
	}
  
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	    
	    $this->app->instance($class, $mock); //binding the mock to the name of the class in Laravel's IoC container
	    
	    return $mock;
	}

	/*
	*@group user
	*/
	public function testIndex(){
		
		$this->mock->shouldReceive('all')->once();

		$this->call('GET', 'user'); //get: Method , user: url

		$this->assertResponseOk();
	}

	// public function tearDown(){
	// 	Mockery::close();
	// }

}