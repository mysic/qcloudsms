<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/6
 * Time: 17:41
 */

namespace Model\Sms\Sender;

use Qcloud\Sms\SmsSenderUtil;
use Model\ISender;

abstract class SmsBase implements ISender
{
    protected $url;
    protected $appid;
    protected $appkey;
    protected $util;
    protected $random;
    protected $curTime;

    protected function __construct()
    {
        $this->util = new SmsSenderUtil();
    }

    public function setAppid($appid)
    {
        $this->appid = $appid;
    }

    public function setAppkey($appkey)
    {
        $this->appkey = $appkey;
    }

    public function setRandom()
    {
        $this->random = $this->util->getRandom();
    }

    public function setCurTime()
    {
        $this->curTime = \time();
    }

    abstract public function send();



}