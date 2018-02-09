<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/6
 * Time: 17:50
 */

namespace Sms\Sender\Template;

use Sms\Sender\SmsBase;

class DelTemplate extends SmsBase
{
    protected $tplId;
    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/del_template';
        parent::__construct();
    }

    public function setTplId(array $tplId)
    {
        $this->tplId = $tplId;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;
        $data->tpl_id = $this->tplId;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}