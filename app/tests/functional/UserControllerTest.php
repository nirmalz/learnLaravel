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

	//To test whethere create() is rendering its view page or not
	public function testCreate(){
		$this->call('GET', 'users/create');
		$this->assertResponseOk();	//Asserting that the response is 200
	}

	//To test for store() method for failing to store
	public function testStoreFails(){
		
		$this->mock->shouldReceive('create')
					->once()
					->andReturn(Mockery::mock(array(
						'save' 		=> false,				//mocking that save failed
						'errors'	=> array()		
						)));

		$this->call('POST', 'users');
		
		$this->assertRedirectedToRoute('users.create');		//assertion that after failing to create, it is routed to users/create	
  		$this->assertSessionHasErrors();					//assertion that it has also errors in session
	}

	public function testStoreSuccess()
	{
	    $this->mock->shouldReceive('create')
	               ->once()
	               ->andReturn(Mockery::mock(array(
	                   'save' => true
	                 )));
	   
	    $this->call('POST', 'users');
	    $this->assertRedirectedToRoute('users.index');
	    $this->assertSessionHas('flash');
	}	

}