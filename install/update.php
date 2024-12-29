<?php

error_reporting(0);
$install = true;
include_once '../app/common.php';
@header('Content-Type: text/html; charset=UTF-8');

$updateDB = $_GET['update'];

if ($updateDB == "updateDB") {
    if ($conf['version'] < DB_VERSION) {
        if ($conf['version'] < 1000) {
            $sqls = "install.sql";
            $version = 1000;
        } else {
            exit("<script language='javascript'>alert('你的网站已经升级到最新版本了！');window.location.href='../admin';</script>");
        }
        $ml = "./" . $sqls;
        $s = file_get_contents($ml);
        if ($DB->exec($s)) {
            $sql = $DB->query("UPDATE m_conf SET `v`='{$version}' WHERE `k`='version'")->fetch();
            exit("<script language='javascript'>alert('网站数据库升级完成！');window.location.href='../admin';</script>");
        } else {
            exit("<script language='javascript'>alert('导入数据失败,请手动导入sql文件！');window.location.href='../admin';</script>");
        }
    } else {
        exit("<script language='javascript'>alert('你的网站已经升级到最新版本了！');window.location.href='../admin';</script>");
    }


}


?>





