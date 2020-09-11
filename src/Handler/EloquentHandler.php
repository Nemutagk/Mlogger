<?php
namespace Nemutagk\Mlogger\Handler;

use Monolog\Handler\AbstractProcessingHandler;

use Nemutagk\Mlogger\Models\Logger;

class EloquentHandler extends AbstractProcessingHandler
{
	protected function write($config) : void {
		Logger::create($config);
	}
}
