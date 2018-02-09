<?php

/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/1
 * Time: 10:41
 */

namespace Sms\Sender;

use Sms\Sender\SenderAdapter\MobileStatusPullerAdapter;
use Sms\Sender\SenderAdapter\MultiSenderAdapter;
use Sms\Sender\SenderAdapter\SingleSenderAdapter;
use Sms\Sender\SenderAdapter\StatusPullerAdapter;
use Sms\Sender\SenderAdapter\VoicePromptSenderAdapter;
use Sms\Sender\SenderAdapter\VoiceVerifyCodeSenderAdapter;
use Sms\Sender\Template\AddTemplate;
use Sms\Sender\Template\ModTemplate;
use Sms\Sender\Template\DelTemplate;
use Sms\Sender\Template\StatusTemplate;
use Sms\Sender\Sign\AddSign;
use Sms\Sender\Sign\ModSign;
use Sms\Sender\Sign\DelSign;
use Sms\Sender\Sign\StatusSign;
use Sms\Sender\Stat\SendStat;
use Sms\Sender\Stat\ReplyStat;


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