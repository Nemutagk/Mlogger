<?php
namespace Nemutagk\Mlogger\Handler;

use Monolog\Handler\AbstractProcessingHandler;

class EloquentHandler extends AbstractProcessingHandler
{
	protected function write($config) : void {
		error_log('config: '.print_r($config, true));
	}
}
