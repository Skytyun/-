<?php
/* * 
 * 功能：彩虹易支付页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */

require_once("./common.php");
require_once(SYSTEM_ROOT."epay/epay.config.php");
require_once(SYSTEM_ROOT."epay/epay_notify.class.php");

//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result ) {
	//商户订单号

	$out_trade_no = daddslashes($_GET['out_trade_no']);

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	//金额
	$money = $_GET['money'];

	
  
  $srow=$DB->query("SELECT * FROM m_order WHERE order_no='{$out_trade_no}' limit 1 for update")->fetch();


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		if($srow['status']==0 && $srow['money']==$money){
			  $DB->query("update `m_order` set `status` ='1' where `order_no`='{$out_trade_no}'")->fetch();
      
            $user=$DB->query("SELECT * FROM m_user WHERE `id`='{$srow['uid']}' limit 1")->fetch();
            $user['money'] = $user['money']+$srow['money'];
            $DB->query("update `m_user` set `money` ='{$user['money']}' where `id`='{$user['id']}'")->fetch();
          	
			showalert('充值成功,请查看余额！');
		}else{
			showalert('充值成功,请查看余额！');
        }
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
}else {
    //验证失败
	showalert('验证失败！');
}

?>