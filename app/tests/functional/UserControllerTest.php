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

	//to test if index() is getting users or not
	public function testIndex(){
		
		$this->mock->shouldReceive('all')->once();

		$this->call('GET', 'users'); //get: Method , user: url

		$this->assertResponseOk();
	}

	public function testShow(){

		$this->mock->shouldReceive('find')
					->once()
					->with(42);

		$this->call('GET', 'users/42');

		$this->assertResponseOk();

	}

	public function testEdit(){
		$this->call('GET', 'users/42/edit');
		$this->assertResponseOk();
	}	

}
