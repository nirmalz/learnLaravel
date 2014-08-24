<?php
use League\FactoryMuffin\Facade as Factory;
 
Factory::define('Post', array(
    'user_id' 	=> 'factory|User',
    'clique_id'	=> 'factory|Clique',
    'body'		=> 'This is a test post'
));
 
Factory::define('User', array(
    'username' 	=> 'unique:firstName',
    'email' 	=> 'unique:email',
    'password'	=> 'general',
    'password_confirmation' => 'general'
));
 
Factory::define('Clique', array(
	'name'		=> 'unique:firstName'
));