<?php
class UserTest extends PHPUnit_Framework_TestCase {
 
	public static function setupBeforeClass()
	{
	    \League\FactoryMuffin\Facade::loadFactories(__DIR__ . '\factories');
	}

	public static function tearDownAfterClass()
	{
	    \League\FactoryMuffin\Facade::deleteSaved();
	}

	public function testCreateNewPost()
	{
	  	$post = \League\FactoryMuffin\Facade::create('Post');
	  	$this->assertInstanceOf('Post', $post);
	  	$this->assertInstanceOf('User', $post->user);
	}	

}