<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Model\Sms\Sender\SenderAdapter;

use Qcloud\Sms\SmsSingleSender;

class SingleSenderAdapter extends AdapterBase
{
    protected $type;
    protected $templData = [];
    protected $msg;
    protected $sign;

    public function __construct()
    {
        parent::__construct();
    }

    public function setType($type)
    {
        $this->type= $type;
    }

    public function setTemplData(array $templData)
    {
        $this->templData['templId'] = $templData['templId'];
        $this->templData['params'] = $templData['params'];
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    public function setSign($sign)
    {
        $this->sign = $sign;
    }

    public function send()
    {
        $instance = $this->init(SmsSingleSender::class);
        if (!empty($this->templData['templId'] && !empty($this->templData['params']))) {
            return $instance->sendWithParam(
                $this->nationCode,
                $this->phoneNumber,
                $this->templData['templId'],
                $this->templData['params'],
                $this->sign,
                $this->extend,
                $this->ext
            );
        }

        return $instance->send(
            $this->type,
            $this->nationCode,
            $this->phoneNumber,
            $this->msg,
            $this->extend,
            $this->ext
        );
    }
}