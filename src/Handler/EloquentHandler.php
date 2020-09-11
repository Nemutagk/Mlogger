<?php
namespace Nemutagk\Mlogger\Handler;

use Monolog\Handler\AbstractProcessingHandler;

use Nemutagk\Mlogger\Models\Logger;

class EloquentHandler extends AbstractProcessingHandler
{
	protected function write($config) : void {
		$log = new Logger();
		
		foreach($config as $key => $valor) {
			$log->$key = $valor;
		}

		$log->save();
	}
}
