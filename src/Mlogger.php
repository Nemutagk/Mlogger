<?php

namespace Nemutagk\Mlogger;

use Log;
use Nemutagk\Mlogger\Model\Logger as MloggerModel;

class Mlogger
{
    public function __call($name, $arguments) {
        $arguments = $this->_toArray($arguments);

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

    protected function _toArray($object) {
        if (is_array($object)) {
            foreach($object as $key => $val) {
                if (is_object($val))
                    $object[$key] = $this->_toArray($val);
                else
                    $object[$key] = $val;
            }
        }else if (is_object($object)) {
            if (isset($object) && is_object($object)) {
                if (method_exists($object,'toArray'))
                    $object = $object->toArray();
                else if (method_exists($object, '_toArray()'))
                    $object = $object->_toArray();
                else if (method_exists($object, '__toArray()'))
                    $object = $object->__toArray();
                else
                    $object = (array)$object;
            }
        }

        return $object;
    }
}
