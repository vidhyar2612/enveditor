<?php
/**
 * Laravel 5.2 - Env Floder 
 * 
 * @author   Vidhya R <vidhyar2612@gmail.com>
 * @package  lc-enveditor
 */

namespace Laravelcustom\Enveditor;

class Facade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
	{
		return 'Laravelcustom\Enveditor\EnveditorStore';
	}
}
