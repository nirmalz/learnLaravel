<?php
class UserTest extends TestCase {

	// Testing that a username is a required field

	public function testUsernameIsRequired(){

		//create a new user
		$user = new User;
		$user->email 					= "test@gmail.com";
		$user->password 				= "general";
		$user->password_confirmation 	= "general";

		//User should not save
		$this->assertFalse($user->save());

		//save the errors
		$errors = $user->errors()->all();

		// There should be 1 error
		$this->assertCount(1, $errors);

		//The Username error should be set
		$this->assertEquals($errors[0], "The username is required.");
	}
}