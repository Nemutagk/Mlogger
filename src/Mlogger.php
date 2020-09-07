<?php

namespace Nemutagk\Mlogger;

use Log;
use Nemutagk\Mlogger\Model\Logger as MloggerModel;

class Mlogger
{
    public function __call($name, $arguments) {
        if (count($arguments) == 1)
            Log::$name($arguments[0]);
        else if (is_array($arguments[1]))
            Log::$name($arguments[0], $arguments[1]);
        else
            Log::$name($arguments[0].': '.print_r($arguments[1], true));

        $debugBag = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 50);

        MLoggerModel::create([
            'message' => $arguments[0]
            ,'extra' => isset($arguments[1]) ? $arguments[1] : null
            ,'info' => $debugBag[1]
            ,'context' => array_slice($debugBag, 1)
        ]);
    }
}
