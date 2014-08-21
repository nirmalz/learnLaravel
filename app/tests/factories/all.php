<?php
use League\FactoryMuffin\Facade as FactoryMuffin;
 
FactoryMuffin::define('Post', array(
    'user_id' 	=> 'factory|User',
    'clique_id'	=> 'factory|Clique',
    'body'		=> 'This is a test post'
));
 
FactoryMuffin::define('User', array(
    'username' 	=> 'firstName',
    'email' 	=> 'me@gmail.com',
    'password'	=> 'general',
    'password_confirmation' => 'general'
));
 
FactoryMuffin::define('Clique', array(
	'name'		=> 'computer'
));