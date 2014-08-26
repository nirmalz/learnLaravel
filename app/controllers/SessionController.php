<?php 
use LearnLaravel\Storage\User\UserRepository as User;

class SessionController extends BaseController{

	/*==========ATTRIBUTE================*/
	
	protected $user;


	/*===========METHODS================*/

	public function __construct(User $user){
		$this->user = $user;
	}

	//login form
	public function create(){
		return View::make('session.create');
	}

	//match the credentials
	public function store(){

		if(Auth::attempt(array(
			'email' 	=> Input::get('email'),
			'password'	=> Input::get('password'))))
		{
			return Redirect::intended('users');
		}

		return Redirect::route('session.create')
					->withInput()
					->with('login_errors', true);

	}

	//to logout
	public function destroy(){
		Auth::logout();
		return View::make('session.destroy');
	}

}