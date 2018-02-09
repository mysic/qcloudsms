<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 15:51
 */

namespace Sms\Sender\Stat;

use Sms\Sender\SmsBase;

class ReplyStat extends SmsBase
{
    protected $beginDate = 0;
    protected $endDate = 0;
    public function __construct()
    {
        $this->url = 'https://yun.tim.qq.com/v5/tlssmssvr/pullcallbackstatus';
        parent::__construct();
    }

    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function send()
    {
        $wholeUrl = $this->url . "?sdkappid=" . $this->appid . "&random=" . $this->random;

        $data = new \stdClass();
        $data->sig = $this->util->calculateSigForPuller($this->appkey, $this->random, $this->curTime);
        $data->time = $this->curTime;
        $data->begin_date = $this->beginDate;
        $data->end_date = $this->endDate;

        return $this->util->sendCurlPost($wholeUrl, $data);
    }
}