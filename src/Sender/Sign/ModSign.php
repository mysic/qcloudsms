<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 14:30
 */

namespace Sms\Sender\Sign;

use Sms\Sender\SmsBase;

class ModSign extends SmsBase
{
    protected $signId;
    protected $text;
    protected $remark;
    protected $pic;

    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/mod_sign';
        parent::__construct();
    }

    public function setSignId($signId)
    {
        $this->signId = $signId;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    public function setPic($pic)
    {
        $this->pic = $pic;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;
        $data->sign_id = $this->signId;
        $data->text = $this->text;
        $data->remark = $this->remark;
        $data->pic = $this->pic;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}