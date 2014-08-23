<?php namespace LearnLaravel\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider{

	public function register(){

		$this->app->bind(
			'LearnLaravel\Storage\User\UserRepository',
			'LearnLaravel\Storage\User\EloquentUserRepository'
			);

	}

}
