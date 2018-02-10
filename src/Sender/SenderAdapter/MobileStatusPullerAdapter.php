<?php
/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/7
 * Time: 18:11
 */

namespace Sms\Sender\SenderAdapter;

use Qcloud\Sms\SmsMobileStatusPuller;

class MobileStatusPullerAdapter extends AdapterBase
{
	protected $type;
	protected $beginTime;
	protected $endTime;
	protected $max;

    public function __construct()
    {
        parent::__construct();
    }

    public function setType($type)
    {
    	$this->type = $type;
    }

    public function setBeginTime($beginTime)
    {
    	$this->beginTime = $beginTime;
    }

    public function setEndTime($endTime)
    {
    	$this->endTime = $endTime;
    }

    public function setMax($max)
    {
    	$this->max = $max;
    }

    public function send()
    {
    	$instance = $this->init(SmsMobileStatusPuller::class);
        $methodName = '';	
    	switch ($this->type) {
    		case 0:
    		    $methodName = 'pullCallback';
    		    break;
    		case 1:
    			$methodName = 'pullReply';
    			break;

    		default:
    			$methodName = 'pullCallback';
    	}
    	return $instance->{$methodName}($this->nationCode, $this->phoneNumber, $this->beginTime, $this->endTime, $this->max);
    }
}