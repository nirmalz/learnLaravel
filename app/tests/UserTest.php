<?php

use League\FactoryMuffin\Facade as Factory;

class UserTest extends TestCase {
 
    public static function setupBeforeClass()
    {
        // note that method chaining is supported
        Factory::setFakerLocale('en_EN')->setSaveMethod('save'); // optional step
        Factory::loadFactories(__DIR__ . '/factories');
    }

    //creation of new post
    public function testCreateNewPost()
    {
        $post = Factory::create('Post');
        $this->assertInstanceOf('Post', $post);
    }


    //creation of new user
    public function testCreateNewUser(){
        $user = Factory::create('User');
        $this->assertInstanceOf('User', $user);
    }

    // Test a user can follow other users
    public function testUserCanFollowUsers(){
        
        //create users
        $nirmal = Factory::create('User');
        $jack = Factory::create('User');
        $harry = Factory::create('User');
        $gordon = Factory::create('User');

        //First set
        $nirmal->follow()->save($jack);

        //first tests
        $this->assertCount(1, $nirmal->follow);
        $this->assertCount(0, $nirmal->followers);

        //second set
        $jack->follow()->save($harry);
        $jack->follow()->save($gordon);

        //second tests
        $this->assertCount(2, $jack->follow);
        $this->assertCount(1, $jack->followers);

        // Thirdet
        $harry->follow()->save($jack);
        $harry->follow()->save($nirmal);
        $harry->follow()->save($gordon);
        
        // Third tests
        $this->assertCount(3, $harry->follow);
        $this->assertCount(1, $harry->followers);  

        // Fourth set
        $gordon->follow()->save($jack);
        $gordon->follow()->save($harry);
     
        // Fourth tests
        $this->assertCount(2, $gordon->follow);
        $this->assertCount(2, $gordon->followers);    

    }


    //name reequired to create Clique
    public function testNameIsRequired(){
        //create a new clique
        $clique = new Clique;

        //clique should not be saved
        $this->assertFalse($clique->save());

        //save the errors
        $errors = $clique->errors()->all();

        //there should be one error
        $this->assertCount(1, $errors);

        //The error should be set 
        $this->assertEquals($errors[0], 'The name field is required.');
    } 

    //saving users to the clique
    public function testCliqueUserRelationship(){
            
        //create clique    
        $clique = Factory::create('Clique');

        //creating two users
        $user1 = Factory::create('User');
        $user2 = Factory::create('User');

        //save users to the clique
        $clique->users()->save($user1);
        $clique->users()->save($user2);

        //count number of users joined
        $this->assertCount(2, $clique->users);

    }

    //test adding new commment
    public function testAddingNewComment(){
        //create a new post
        $post = Factory::create('Post');

        //create a new comment
        $comment = new comment(array('body' => 'A new comment'));

        //save the comment to the post
        $post->comments()->save($comment);

        //This post should have one comment
        $this->assertCount(1, $post->comments);
    }

    public static function tearDownAfterClass()
    {
        Factory::setDeleteMethod('delete'); // optional step
        Factory::deleteSaved();
    }
}
