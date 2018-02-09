<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Sms\Sender\SenderAdapter;


use Qcloud\Sms\SmsVoiceVerifyCodeSender;

class VoiceVerifyCodeSenderAdapter extends AdapterBase
{
    protected $msg;
    protected $playTimes;

    public function __construct()
    {
        parent::__construct();
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    public function setPlayTimes($playTimes)
    {
        $this->playTimes = $playTimes;
    }

    public function send()
    {
        $instance = $this->init(SmsVoiceVerifyCodeSender::class);
        return $instance->send(
            $this->nationCode,
            $this->phoneNumber,
            $this->msg,
            $this->playTimes,
            $this->ext
        );
    }
}