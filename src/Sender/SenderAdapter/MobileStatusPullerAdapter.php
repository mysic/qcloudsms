<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Sms\Sender\SenderAdapter;

use Sms\Sender\SmsBase;
use Qcloud\Sms\SmsMobileStatusPuller;

class MobileStatusPullerAdapter extends SmsBase
{

    public function __construct()
    {
        parent::__construct();
    }

    public function send()
    {

    }
}