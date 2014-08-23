<?php namespace Nextgen\First\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class First extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() {
  	return 'First'; 
  }
 
}