<?php
use League\FactoryMuffin\Facade as FactoryMuffin;

class UserTest extends TestCase {
 
    public static function setupBeforeClass()
    {
        // note that method chaining is supported
        FactoryMuffin::setFakerLocale('en_EN')->setSaveMethod('save'); // optional step
        FactoryMuffin::loadFactories(__DIR__ . '/factories');
    }

    public function testCreateNewPost()
    {
        $post = FactoryMuffin::create('Post');
        $this->assertInstanceOf('Post', $post);
    }

    public function testCreateNewUser(){
        $user = FactoryMuffin::create('User');
        $this->assertInstanceOf('User', $user);
    }

    public static function tearDownAfterClass()
    {
        FactoryMuffin::setDeleteMethod('delete'); // optional step
        FactoryMuffin::deleteSaved();
    }
}