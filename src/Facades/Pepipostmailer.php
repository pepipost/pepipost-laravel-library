<?php
namespace Pepipost\PepipostLib\Facades;

use Illuminate\Support\Facades\Facade;

class Pepipostmailer extends Facade 
{
  /**
   * Get the binding in the IoC container
   * @return string
   */

  protected static function getFacadeAccessor(){
    return 'pepipostmailer';
  }
}


