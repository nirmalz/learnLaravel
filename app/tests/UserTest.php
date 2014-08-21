<?php
class UserTest extends TestCase {
 
    public static function setupBeforeClass()
    {
        \League\FactoryMuffin\Facade::loadFactories(__DIR__ . '\factories');
    }

    public function testCreateNewPost()
    {
        $post = \League\FactoryMuffin\Facade::create('Post');
        $this->assertInstanceOf('Post', $post);
        $this->assertInstanceOf('User', $post->user);
    }

    public function testfortrue(){
        $this->assertFalse(false);
    }


    public static function tearDownAfterClass()
    {
       \League\FactoryMuffin\Facade::deleteSaved();
    }   

}