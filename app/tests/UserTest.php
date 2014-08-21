<?php
use League\FactoryMuffin\Facade as FactoryMuffin;

class UserTest extends TestCase {
 
    public static function setupBeforeClass()
    {
        // note that method chaining is supported
        FactoryMuffin::setFakerLocale('en_EN')->setSaveMethod('save'); // optional step
        FactoryMuffin::loadFactories(__DIR__ . '/factories');
    }

    //creation of new post
    public function testCreateNewPost()
    {
        $post = FactoryMuffin::create('Post');
        $this->assertInstanceOf('Post', $post);
    }


    //creation of new user
    public function testCreateNewUser(){
        $user = FactoryMuffin::create('User');
        $this->assertInstanceOf('User', $user);
    }

    // Test a user can follow other users
    public function testUserCanFollowUsers(){
        
        //create users
        $nirmal = FactoryMuffin::create('User');
        $jack = FactoryMuffin::create('User');
        $harry = FactoryMuffin::create('User');
        $gordon = FactoryMuffin::create('User');

        //First set
        $nirmal->follow()->save($jack);

        //first tests
        $this->assertCount(1, $nirmal->follow);
        $this->assertCount(0, $nirmal->follower);

    }

    public static function tearDownAfterClass()
    {
        FactoryMuffin::setDeleteMethod('delete'); // optional step
        FactoryMuffin::deleteSaved();
    }
}