<?php
require 'common.php';
session_start();
@header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>正在为您跳转到支付页面，请稍候...</title>
    <style type="text/css">
        body {margin:0;padding:0;}
        p {position:absolute;
            left:50%;top:50%;
            width:330px;height:30px;
            margin:-35px 0 0 -160px;
            padding:20px;font:bold 14px/30px "宋体", Arial;
            background:#f9fafc url(../assets/load.gif) no-repeat 20px 26px;
            text-indent:22px;border:1px solid #c5d0dc;}
        #waiting {font-family:Arial;}
    </style>
<script>
function open_without_referrer(link){
document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
}
</script>
</head>
<body>
<?php

$type=isset($_GET['type'])?daddslashes($_GET['type']):exit('No type!');
$orderid=isset($_GET['orderid'])?daddslashes($_GET['orderid']):exit('No orderid!');
if(!is_numeric($orderid))exit('订单号不符合要求!');

$row=$DB->query("SELECT * FROM m_order WHERE order_no='{$orderid}' limit 1")->fetch();
if(!$row['order_no'])exit('该订单号不存在，请返回来源地重新发起请求！');
if($row['money']=='0')exit('订单金额不合法');
if($row['status']>=1)exit('该订单已支付完成，请<a href="/">返回重新生成订单</a>');

//$DB->query("update `shua_pay` set `type` ='$type' where `trade_no`='{$orderid}'");


require_once(SYSTEM_ROOT."epay/epay.config.php");

require_once(SYSTEM_ROOT."epay/epay_submit.class.php");

$parameter = array(
	"pid" => trim($alipay_config['partner']),
	"type" => $type,
	"notify_url"	=> $siteurl.'epay_notify.php',
	"return_url"	=> $siteurl.'epay_return.php',
	"out_trade_no"	=> $orderid,
	"name"	=> $row['name'],
	"money"	=> $row['money'],
	"sitename"	=> $conf['web_name']
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);

$html_text = $alipaySubmit->buildRequestForm($parameter,"POST", "正在跳转");

echo $html_text;


?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>