<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 14:33
 */

namespace Sms\Sender\Sign;

use Sms\Sender\SmsBase;

class DelSign extends SmsBase
{
    protected $signId = [];
    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/del_sign';
        parent::__construct();
    }

    public function setSignId($signId)
    {
        $this->signId = $signId;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;
        $data->sign_id = $this->signId;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}