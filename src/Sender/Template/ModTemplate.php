<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/6
 * Time: 17:46
 */

namespace Sms\Sender\Template;

use Sms\Sender\SmsBase;

class ModTemplate extends SmsBase
{
    protected $title;
    protected $text;
    protected $type;
    protected $tplId;
    protected $remark;

    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/mod_template';
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

    public function setTplId($tplId)
    {
        $this->tplId = $tplId;
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
        $data->tpl_id = $this->tplId;
        $data->remark = $this->remark;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}