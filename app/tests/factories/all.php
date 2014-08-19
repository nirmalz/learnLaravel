<?php
use League\FactoryMuffin\Facade as FactoryMuffin;
 
FactoryMuffin::define('Post', array(
    'user_id' 	=> 'factory|User',
    'body'		=> 'This is a test post'
));
 
FactoryMuffin::define('User', array(
    'username' 	=> 'firstName',
    'email' 	=> 'me@gmail.com',
    'password'	=> 'general'
));