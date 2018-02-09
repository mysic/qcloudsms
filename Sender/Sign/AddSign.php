<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 12:55
 */

namespace Model\Sms\Sender\Sign;

use Model\Sms\Sender\SmsBase;

class AddSign extends SmsBase
{
    protected $text = '';
    protected $remark = '';
    protected $pic = '';


    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/add_sign';
        parent::__construct();
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
        $data->text = $this->text;
        $data->remark = $this->remark;
        $data->pic = $this->pic;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}