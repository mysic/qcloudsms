<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/1
 * Time: 10:26
 */

namespace Sms;

use Sms\Sender\SenderFactory;

class Processor
{
    private static $instance = null;
    private $senderReflections = [];
    private $senderInstance = [];
    private $type = '';

    private function __clone(){}
    private function __construct(){}

    public static function getInstance()
    {
        if (self::$instance != null && self::$instance instanceof self) {
            return self::$instance;
        }
        return self::$instance = new self();
    }

    public function init($type, array $args = [])
    {
        $this->type = $type; 
        if (!array_key_exists($type, $this->senderReflections)) {
            $this->senderReflections[$type] = SenderFactory::getInstance($type);
        }
        if (!\array_key_exists($type, $this->senderInstance)) {
            $this->senderInstance[$type] = $this->senderReflections[$type]->newInstance();
        }
        $senderMethodArgs = $this->getSenderMethodArgs($this->senderReflections[$type]);
        $methodArgs = [];
        foreach ($senderMethodArgs as $senderMethod => $methodArgument) {
            $argName = $methodArgument->getName();
            if (isset($args[$argName])) {
                $methodArgs[$senderMethod] = $args[$argName];
            } 
        }
        foreach ($methodArgs as $methodName => $argValue) {        
            \call_user_func([$this->senderInstance[$type], $methodName], $argValue);
        }
    }

    public function execute()
    {
        if (empty($this->senderInstance[$this->type])) {
            throw new \Exception('need run init() first');
        }
        return $this->senderInstance[$this->type]->send();
    }

    private function getSenderMethodArgs(\ReflectionClass $reflection)
    {
        $methods = [];
        $senderMethods = $reflection->getMethods();
        foreach($senderMethods as $method) {
            $name = $method->getName();
            if (strstr($name, 'set')) {
                $methods[] =  $method;
            }
        }

        $arr = [];
        foreach ($methods as $method) { 
            $args = $method->getParameters();
            foreach ($args as $paramObj) {
                $arr[$method->getName()] = $paramObj;
            }
        }
        return $arr;
    }
}