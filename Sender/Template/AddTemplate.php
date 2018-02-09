<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/6
 * Time: 17:27
 */

namespace Model\Sms\Sender\Template;

use Model\Sms\Sender\SmsBase;

class AddTemplate extends SmsBase
{
    protected $title;
    protected $text;
    protected $type;
    protected $remark;

    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/add_template';
        parent::__construct();
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;
        $data->title =  $this->title;
        $data->text = $this->text;
        $data->type = \intval($this->type);
        $data->remark = $this->remark;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}