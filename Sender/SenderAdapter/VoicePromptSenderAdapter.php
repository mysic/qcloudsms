<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Model\Sms\Sender\SenderAdapter;

use Qcloud\Sms\SmsVoicePromptSender;

class VoicePromptSenderAdapter extends AdapterBase
{
    protected $promptType;
    protected $msg;
    protected $playTimes;

    public function __construct()
    {
        parent::__construct();
    }

    public function setPromptType($promptType)
    {
        $this->promptType  = $promptType;
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
        $instance = $this->init(SmsVoicePromptSender::class);
        return $instance->send(
            $this->nationCode,
            $this->phoneNumber,
            $this->promptType,
            $this->msg,
            $this->playTimes,
            $this->ext
        );
    }
}