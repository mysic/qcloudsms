<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/8
 * Time: 16:34
 */

namespace Sms\Sender\SenderAdapter;

use Sms\Sender\SmsBase;

abstract class AdapterBase extends SmsBase
{
    protected $nationCode;
    protected $phoneNumber;
    protected $extend;
    protected $ext;
    protected $instance = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function setNationCode($nationCode)
    {
        $this->nationCode =$nationCode;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setExtend($extend = '')
    {
        $this->extend = \strval($extend);
    }

    public function setExt($ext = '')
    {
        $this->ext = \strval($ext);
    }

    protected function init($className)
    {
        if ($this->instance[$className] == null || !($this->instance[$className] instanceof $className)) {
            $this->instance[$className] = new $className($this->appid, $this->appkey);
        } else {
            $appid = new \ReflectionProperty($this->instance[$className], 'appid');
            $appid->setAccessible(true);
            $appid->setValue($this->instance[$className], $this->appid);

            $appkey = new \ReflectionProperty($this->instance[$className], 'appkey');
            $appkey->setAccessible(true);
            $appkey->setValue($this->instance[$className], $this->appkey);
        }
        return $this->instance[$className];
    }
}