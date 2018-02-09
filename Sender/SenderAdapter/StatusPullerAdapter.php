<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Model\Sms\Sender\SenderAdapter;


use Qcloud\Sms\SmsStatusPuller;

class StatusPullerAdapter extends AdapterBase
{
    protected $type;
    protected $max;

    public function __construct()
    {
        parent::__construct();
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setMax($max)
    {
        $this->max = $max;
    }

    public function send()
    {

    }
}