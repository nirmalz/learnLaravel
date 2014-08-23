<?php

use LearnLaravel\Storage\User\UserRepository as User;

class UserControllerTest extends TestCase{


	public function setUp()
	{
	    parent::setUp();
	 
	    $this->mock = $this->mock('User');
	}
  
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	    
	    $this->app->instance($class, $mock);
	    
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

}