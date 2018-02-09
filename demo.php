<?php

/**
 * Created by PhpStorm.
 * User: Mysic
 * Date: 2018/2/1
 * Time: 9:41
 */

 require_once '../../../vendor/autoload.php';

$sender = Processor::getInstance();

$appid = 123456789;
$appkey = 'abcdefg';


try{
/**
 * smsSingleSender 单发短信   （普通发送 | 指定模板发送）
 *
 * int appid
 * string appkey
 * int type 0 普通短信 1 营销短信
 * string nationCode 国家码
 * array templData array('templId','params'=>array()) | string msg 模板ID（指定消息模板）| 消息正文
 * array params 模板数据 （指定模板发送）
 * string phoneNumber 接收手机号
 * string sign 短信内容签名 此参数可为空，系统会用默认签名
 * [string extend ]
 * [string ext ]
 *
 * @Notice templId和msg都有值时，优先调用指定模板发送接口。
 */
    $sendType = 'smsSingleSender';

    $args = [
        'appid' => $appid,
        'appkey' => $appkey,
        'type' => 0,
        'nationCode' => '86',
        'templData' => [
//                    'templId' => 83729,
//                    'params' =>['9527', '5'],
        ],
//                'sign'=> 'MYSIC',
        'phoneNumber' => '18888888888',
        'msg' => '8888为您的登录验证码，请于2分钟内填写。如非本人操作，请忽略本短信。'
    ];

    $sender->init($sendType, $args);
    echo $sender->execute();

/**
 * smsMultiSender 群发短信   普通群发 指定模板群发
 *
 * int appid
 * string appkey
 * int type 0 普通短信 1 营销短信
 * string nationCode 国家码
 * array templData array('templId','params'=>array()) | string msg  模板ID（指定消息模板）| 消息正文
 * array params 模板数据 （指定模板发送）
 * array phoneNumber 多个接收手机号
 * string sign 短信内容签名 此参数可为空，系统会用默认签名
 * [string extend ]
 * [string ext ]
 *
 * @Notice templId和msg都有值时，优先调用指定模板发送接口。
 */

    // $sendType = 'smsMultiSender';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'type' => 0,
    //     'nationCode' => '86',
    //     'templData' => [
    //         'templId' => 83729,
    //         'params' =>['9527', '5'],
    //     ],
    //     'sign'=> 'MYSIC',
    //     'phoneNumber' => ['13388888888', '18888888888'],
    //     'msg' => '9527为您的登录验证码，请于2分钟内填写。如非本人操作，请忽略本短信。'
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * smsVoiceVerifyCodeSender 语音验证码
 *
 * int appid
 * string appkey
 * string nationCode 国家码
 * string phoneNumber 接收手机号
 * string msg 消息正文
 * int playTimes 播放次数
 * [string ext ]
 *
 */

    // $sendType = 'smsVoiceVerifyCodeSender';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'nationCode' => '86',
    //     'phoneNumber' => '18888888888',
    //     'msg' => '9981',
    //     'playTimes' => 2
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * smsVoicePromptSender 语音通知
 *
 * int appid
 * string appkey
 * string nationCode 国家码
 * string phoneNumber 接收手机号
 * int promptType 语音提示类型，目前固定为2
 * int playTimes 播放次数
 * string mgs 消息正文，必须与申请的模板格式一致，否则将返回错误
 * [string ext ]
 *
 */

    // $sendType = 'smsVoicePromptSender';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'nationCode' => '86',
    //     'phoneNumber' => '18888888888',
    //     'promptType' => 2,
    //     'playTimes' => 2,
    //     'msg' => '尊敬的客户黄大凯您好！您在王者荣耀上的订单已生成，请在6分钟内完成支付，否则该订单将自动取消，感谢合作和支持',
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();


/**
 * smsStatusPuller 拉取短信状态
 *
 * int appid
 * string appkey
 * int type  拉取类型，0表示回执结果，1表示回复信息
 * int max  最大条数，最多100
 *
 */

    // $sendType = 'smsStatusPuller';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'type' => 1,
    //     'max' => 20
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * smsMobileStatusPuller 拉取单个手机短信状态
 *
 * int appid
 * string appkey
 * string nationCode 国家码
 * string phoneNumber 手机号
 * int beginTime 开始时间(unix timestamp)
 * int endTime 结束时间(unix timestamp)
 * int max 拉取最大条数，最多100
 */

    // $sendType = 'smsMobileStatusPuller';

    // $beginTime = new \DateTime('20180131');
    // $endTime = new \DateTime('20180203');
    // $beginTime = $beginTime->getTimestamp();
    // $endTime = $endTime->getTimestamp();

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'type' => 0,
    //     'nationCode' => '86',
    //     'phoneNumber' => '18888888888',
    //     'beginTime' => $beginTime,
    //     'endTime' => $endTime,
    //     'max' => 100
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * addTemplate 添加模板
 *
 * int appid
 * string appkey
 * string title 模板标题
 * string text 模板内容
 * int type 模板类型 0 普通短信 1 营销短信
 * string remark 备注
 */

    // $sendType = 'addTemplate';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'title' => '添加模板API测试',
    //     'text' => '您好{1}，欢迎来到{2}。这是一条测试模板信息。谢谢。',
    //     'type' => 0,
    //     'remark' => '备注'
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * modTemplate 修改模板
 *
 * int appid
 * string appkey
 * string title 模板标题
 * string text 模板内容
 * string type 模板类型 0 普通短信 1 营销短信
 * string remark 备注
 * int tplId 要修改的模板ID
 */
    // $sendType = 'modTemplate';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'title' => '添加模板API测试',
    //     'text' => '您好{1}，这里是修改模板API测试，模板ID{2}已修改，请留意审核结果',
    //     'type' => 0,
    //     'remark' => '腾讯云短信接口调用测试',
    //     'tplId' => 86602
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * delTemplate 删除模板
 *
 * int appid
 * string appkey
 * array tplId 要删除的模板ID数组
 */

    // $sendType = 'delTemplate';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'tplId' => [86602]
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * statusTemplate 短信模板状态查询
 *
 * int appid
 * string appkey
 * mixed params （array）模板ID数组 | (object) 分页 max 每页最大数 offset 页码偏移量
 */

//     $sendType = 'statusTemplate';

//     //按模板ID查
//     $params = [83729, 83768, 85820];

//     //按分页查
// //            $params = new \stdClass();
// //            $params->max = 10;
// //            $params->offset = 0;

//     $args = [
//         'appid' => $appid,
//         'appkey' => $appkey,
//         'params' => $params
//     ];

//     $sender->init($sendType, $args);
//     echo $sender->execute();

/**
 * AddSign 添加签名
 *
 * int appid
 * string appkey
 * string text 签名内容
 * string pic 证件资料图片的base64字符串
 * string remark 备注
 */

    // $sendType = 'addSign';
    // $picFile = \base64_encode(\file_get_contents('public/static/image/youzhibo.jpg'));

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'text' => 'MYSIC',
    //     'remark' => '测试添加签名API',
    //     'pic' => $picFile
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * ModSign 修改签名
 *
 * int appid
 * string appkey
 * int signId 签名模板ID
 * string text 签名内容
 * string pic 证件资料图片的base64字符串
 * string remark 备注
 */

    // $sendType = 'modSign';
    // $picFile = \base64_encode(\file_get_contents('public/static/image/youzhibo.jpg'));

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'text' => 'MYSIC客服',
    //     'signId' => 38930,
    //     'remark' => '测试修改签名API，将“MYSIC”改为“MYSIC客服”',
    //     'pic' => $picFile
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * DelSign 删除签名
 *
 * int appid
 * string appkey
 * array signId 签名模板ID数组
 */

    // $sendType = 'delSign';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'signId' => [38930]
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * StatusSign 签名状态查询
 *
 * int appid
 * string appkey
 * array signId 签名模板ID数组
 */

    // $sendType = 'statusSign';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'signId' => [38860, 38823]
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * SendStat 发送数据统计
 *
 * int appid
 * string appkey
 * int beginDate 开始时间 yyyymmddhh 需要拉取的起始时间,精确到小时
 * int endDate 结束时间 yyyymmddhh 需要拉取的起始时间,精确到小时
 */

    // $sendType = 'sendStat';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'beginDate' => 2018013000,
    //     'endDate' => 2018020723
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

/**
 * ReplyStat 回执数据统计
 *
 * int appid
 * string appkey
 * int beginDate 开始时间 yyyymmddhh 需要拉取的起始时间,精确到小时
 * int endDate 结束时间 yyyymmddhh 需要拉取的起始时间,精确到小时
 *
 * 此接口测试时一直报错如下：
 * {"result":60008,"errmsg":"service timeout or request format error,please check and try again"}
 */

    // $sendType = 'replyStat';

    // $args = [
    //     'appid' => $appid,
    //     'appkey' => $appkey,
    //     'beginDate' => 2018013000,
    //     'endDate' => 2018020623
    // ];

    // $sender->init($sendType, $args);
    // echo $sender->execute();

} catch (\Exception $e) {
    echo $e->getMessage();
}