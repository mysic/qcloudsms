<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 10:08
 */

namespace Sms\Sender\Template;

use Sms\Sender\SmsBase;

class StatusTemplate extends SmsBase
{

    protected $params;
    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/get_template';
        parent::__construct();
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;

        if (\is_array($this->params)) {
            $data->tpl_id = $this->params;
        }

        if (\is_object($this->params)) {
            $data->tpl_page = $this->params;
        }

        return $this->util->sendCurlPost($wholeUrl, $data);
    }


}