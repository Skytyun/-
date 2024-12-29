<?php
// +----------------------------------------------------------------------
// | Quotes [未来可期]
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------
// | Author: 自助建站系统 https://support.qq.com/products/129921/ 作者QQ：79517721
// +----------------------------------------------------------------------
// | Date: 2020年2月5日
// +----------------------------------------------------------------------


include("../app/common.php");
$act = isset($_GET['act']) ? daddslashes($_GET['act']) : null;

@header('Content-Type: application/json; charset=UTF-8');

switch ($act) {
    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户注册
     */
    case 'reg':
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim(strip_tags(daddslashes($_POST['email'])));
            $password = trim(strip_tags(daddslashes($_POST['password'])));
            $password2 = trim(strip_tags(daddslashes($_POST['password2'])));
            /*
            $verifycode = 1;//验证码开关
            if(!function_exists("imagecreate") || !file_exists('./code.php'))$verifycode=0;
            if ($verifycode==1 && (!$code || strtolower($code) != $_SESSION['vc_code'])) {
                unset($_SESSION['vc_code']);
              exit('{"code":-1,"msg":"验证码错误,请重新输入"}');
            }
          */

            if (!preg_match('/^[A-z0-9._-]+@[A-z0-9._-]+\.[A-z0-9._-]+$/', $email)) {
                exit('{"code":-1,"msg":"邮箱格式不正确"}');
            } elseif (strlen($password) < 6) {
                exit('{"code":-1,"msg":"密码不能低于6位"}');
            }
            if ($password != $password2) {
                exit('{"code":-1,"msg":"两次输入密码不一致"}');
            }
            $email = strtolower($email);
            $exitemail = $DB->query("SELECT * FROM m_user WHERE email='{$email}' limit 1")->fetch();
            if ($exitemail) {
                exit('{"code":-1,"msg":"邮箱:' . $email . '已存在,请更换邮箱或找回密码"}');
            }

            $password = md5($password);
            $sql = $DB->exec("INSERT INTO `m_user` (`email`, `password`,  `date`, `money`, `status`, `type`)VALUES ('{$email}', '{$password}',  '{$date}','0.00', '1', '1')");
            if ($sql) {
                exit('{"code":1,"msg":"用户注册成功"}');
            } else {
                exit('{"code":-1,"msg":"用户注册失败,请稍后再试"}');
            }


        } else {
            exit('{"code":-1,"msg":"数据不完整"}');
        }
        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户登录
     */
    case 'login':
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim(strip_tags(daddslashes($_POST['email'])));
            $password = trim(strip_tags(daddslashes($_POST['password'])));
            $email = strtolower($email);

            $userrow = $DB->query("SELECT * FROM m_user WHERE `email`='{$email}' limit 1")->fetch();
            $password = md5($password);
            if ($email == $userrow['email'] && $password == $userrow['password']) {

                $session = md5($email . $password . $password_hash);
                $expiretime = time() + 6048000;
                $token = authcode("{$email}\t{$session}\t{$expiretime}", 'ENCODE', SYS_KEY);

                setcookie("user_token", $token, time() + 604800);
                exit('{"code":1,"msg":"尊敬的 用户 ,登录成功!"}');
            } else {
                exit('{"code":-1,"msg":"邮箱或密码不正确"}');
            }
        } else {
            exit('{"code":-1,"msg":"数据不完整"}');
        }
        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户退出系统
     */
    case 'logout':
        setcookie("user_token", "", time() - 604800);
        setcookie("admin_token", "", time() - 604800);
        exit('{"code":1,"msg":"退出成功"}');
        break;

    default:

        break;


}

?>
