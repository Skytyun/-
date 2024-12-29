<?php

error_reporting(0);

define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
date_default_timezone_set('Asia/Shanghai');
$date = date("Y-m-d H:i:s");

if (function_exists("set_time_limit"))
{
	@set_time_limit(0);
}
if (function_exists("ignore_user_abort"))
{
	@ignore_user_abort(true);
}

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

require ROOT.'/app/database.php';
try {
    $DB = new PDO("mysql:host={$dbconfig['dbhost']};dbname={$dbconfig['dbname']};port={$dbconfig['dbport']}",$dbconfig['dbuser'],$dbconfig['dbpwd']);
}catch(Exception $e){
    exit('链接数据库失败:'.$e->getMessage());
}
$DB->exec("set names utf8");
$rs=$DB->query("select * from m_conf");
while($row=$rs->fetch()){ 
	$conf[$row['k']]=$row['v'];
}


include ROOT.'app/function.php';

$clientip=getIp();
function showalert($msg){
	$link = '../../user/index.php';
	echo '<meta charset="utf-8"/><script>alert("'.$msg.'");window.location.href="'.$link.'";</script>';
}