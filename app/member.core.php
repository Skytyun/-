<?php


$clientip = getIp();

if (isset($_COOKIE["admin_token"])) {
    $token = authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', SYS_KEY_ADMIN);
    list($email, $sid, $expiretime) = explode("\t", $token);
    $userrow = $DB->query("SELECT * FROM m_user WHERE `email`='{$email}' and id= 10000 limit 1")->fetch();
    $session = md5($userrow['email'] . $userrow['password'] . $password_hash);
    //var_dump($sid);exit;
    if ($session == $sid && $expiretime > time()) {
        $islogin = 1;
    }
}

if (isset($_COOKIE["user_token"])) {
    $token = authcode(daddslashes($_COOKIE['user_token']), 'DECODE', SYS_KEY);
    list($email, $sid, $expiretime) = explode("\t", $token);
    $userrow = $DB->query("SELECT * FROM m_user WHERE `email`='{$email}' limit 1")->fetch();
    $session = md5($userrow['email'] . $userrow['password'] . $password_hash);
    if ($session == $sid && $expiretime > time()) {
        $islogin2 = 1;
    }

}


?>