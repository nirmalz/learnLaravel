<?php

use LearnLaravel\Storage\User\UserRepository as User;

class RegisterControllerTest extends TestCase{
 
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

    /**
     * Test Index
     */
    public function testIndex()
    {
        $this->call('GET', 'register');
     
        $this->assertResponseOk();
    }
   
    /**
     * Test Store fails
     */
    public function testStoreFails()
    {
        $this->mock->shouldReceive('create')
            	->once()
            	->andReturn(Mockery::mock(array('save' => false, 'errors' => array())));
     
        $this->call('POST', 'register');
     
        $this->assertRedirectedToRoute('register.index');
        $this->assertSessionHasErrors();
    }
   
    // /**
    //  * Test Store success
    //  */
    // public function testStoreSuccess()
    // {
    //     $this->mock->shouldReceive('create')
    //         	->once()
    //         	->andReturn(Mockery::mock(array('save' => true)));
     
    //     $this->call('POST', 'register');
     
    //     $this->assertRedirectedToRoute('users.index');
    //     $this->assertSessionHas('flash');
    // }
}