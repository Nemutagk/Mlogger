<?php
namespace Nemutagk\Mlogger;

use Monolog\Logger as MonoLogger;

class Logger
{
	public function __invoke($config) {
		$logger = new MonoLogger('mongodb');
        $logger->pushHandler(new Handler\EloquentHandler());

        return $logger;
	}
}