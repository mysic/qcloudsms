<?php

/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/1
 * Time: 10:41
 */

namespace Model\Sms\Sender;

use Model\Sms\Sender\SenderAdapter\MobileStatusPullerAdapter;
use Model\Sms\Sender\SenderAdapter\MultiSenderAdapter;
use Model\Sms\Sender\SenderAdapter\SingleSenderAdapter;
use Model\Sms\Sender\SenderAdapter\StatusPullerAdapter;
use Model\Sms\Sender\SenderAdapter\VoicePromptSenderAdapter;
use Model\Sms\Sender\SenderAdapter\VoiceVerifyCodeSenderAdapter;
use Model\Sms\Sender\Template\AddTemplate;
use Model\Sms\Sender\Template\ModTemplate;
use Model\Sms\Sender\Template\DelTemplate;
use Model\Sms\Sender\Template\StatusTemplate;
use Model\Sms\Sender\Sign\AddSign;
use Model\Sms\Sender\Sign\ModSign;
use Model\Sms\Sender\Sign\DelSign;
use Model\Sms\Sender\Sign\StatusSign;
use Model\Sms\Sender\Stat\SendStat;
use Model\Sms\Sender\Stat\ReplyStat;


class SenderFactory
{
    public static function getInstance($type)
    {

        switch ($type) {
            case 'smsSingleSender':
                $senderReflection = new \ReflectionClass(SingleSenderAdapter::class);
                break;
            case 'smsMultiSender':
                $senderReflection = new \ReflectionClass(MultiSenderAdapter::class);
                break;
            case 'smsVoiceVerifyCodeSender':
                $senderReflection = new \ReflectionClass(VoiceVerifyCodeSenderAdapter::class);
                break;
            case 'smsVoicePromptSender':
                $senderReflection = new \ReflectionClass(VoicePromptSenderAdapter::class);
                break;
            case 'smsStatusPuller':
                $senderReflection = new \ReflectionClass(StatusPullerAdapter::class);
                break;
            case 'smsMobileStatusPuller':
                $senderReflection = new \ReflectionClass(MobileStatusPullerAdapter::class);
                break;
            case 'addTemplate':
                $senderReflection = new \ReflectionClass(AddTemplate::class);
                break;
            case 'modTemplate':
                $senderReflection = new \ReflectionClass(ModTemplate::class);
                break;
            case 'delTemplate':
                $senderReflection = new \ReflectionClass(DelTemplate::class);
                break;
            case 'statusTemplate':
                $senderReflection = new  \ReflectionClass(StatusTemplate::class);
                break;
            case 'addSign':
                $senderReflection = new \ReflectionClass(AddSign::class);
                break;
            case 'modSign':
                $senderReflection = new \ReflectionClass(ModSign::class);
                break;
            case 'delSign':
                $senderReflection = new \ReflectionClass(DelSign::class);
                break;
            case 'statusSign':
                $senderReflection = new \ReflectionClass(StatusSign::class);
                break;
            case 'sendStat':
                $senderReflection = new \ReflectionClass(SendStat::class);
                break;
            case 'replyStat':
                $senderReflection = new \ReflectionClass(ReplyStat::class);
                break;
            default:
                $senderReflection = null;
                break;
        }
        return $senderReflection;
    }
}