<?php
namespace Nemutagk\Mlogger\Facades;

use Illuminate\Support\Facades\Facade;

class MloggerFacade extends Facade
{
	protected static function getFacadeAccessor() {
		return 'Mlogger';
	}
}