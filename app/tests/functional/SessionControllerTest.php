<?php

use LearnLaravel\Storage\User\UserRepository as User;

class SessionControllerTest extends TestCase{
 
    /*===============================SETUP=======================*/

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

    /*=============================================================*/

    //test whether the login view is loading correctly
    public function testCreate(){
        $this->call('GET', 'login');
        $this->assertResponseOK();
    }

    //test that the failed authentication flow is correct
    public function testLoginFailure(){
        
        Auth::shouldReceive('attempt')->andReturn(false);
        $this->call('POST', 'login');

        $this->assertRedirectedToRoute('session.create');
        $this->assertSessionHas('flash');
    }

    //test that the success authentication flow is correct
    public function testLoginSuccess(){

        Auth::shouldReceive('attempt')->andReturn(true);
        $this->call('POST', 'login');

        $this->assertRedirectedToRoute('users.index');

    }

}