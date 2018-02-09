<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/1
 * Time: 10:26
 */

namespace Model\Sms;

use Model\Sms\Sender\SenderFactory;

class Processor
{
    private static $instance = null;
    private $senderReflections = [];
    private $senderMethods = [];
    private $senderArgs = [];
    private $senderInstance = [];
    private $type = '';
    private $args = [];


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
        $this->args = $args;
        if (!array_key_exists($type, $this->senderReflections)) {
            $this->senderReflections[$type] = SenderFactory::getInstance($type);
        }
        if (!\array_key_exists($this->type, $this->senderInstance)) {
            $this->senderInstance[$this->type] = $this->senderReflections[$this->type]->newInstance();
        }
        $this->getMethods($this->senderReflections[$type]);

        $methodArgs = [];
        foreach ($this->senderArgs as $senderMethod => $senderMethodArgs) {
            if (!empty($this->args[$senderMethodArgs])) {
                $methodArgs[$senderMethod] = $this->args[$senderMethodArgs];
            } else {
                $methodArgs[$senderMethod] ='';
            }
        }

        $instance = $this->senderInstance[$this->type];
        foreach ($this->senderMethods as $method) {
            $argValue = $this->args[$this->senderArgs[$method]];
            \call_user_func([$instance, $method], $argValue);
        }
    }

    public function execute()
    {
        if (empty($this->senderArgs)) {
            throw new \Exception('need run init() first');
        }

        $instance = $this->senderInstance[$this->type];
        return $instance->send();
    }

    private function getMethods(\ReflectionClass $reflection)
    {
        $arr = [];
        $senderMethods = $reflection->getMethods();
        foreach($senderMethods as $method) {
            $name = $method->getName();
            if (strstr($name, 'set')) {
                $this->senderMethods[] =  $method->getName();
            }
        }

        foreach ($senderMethods as $method) {
            $this->senderArgs[$method->getName()] = $method->getParameters();
            foreach ($this->senderArgs[$method->getName()] as $paramObj) {
                $arr[$method->getName()] = $paramObj->getName();
            }
        }
        $this->senderArgs = $arr;
    }
}