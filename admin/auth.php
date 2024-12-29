<?php



include("../app/common.php");
$act = isset($_GET['act']) ? daddslashes($_GET['act']) : null;

@header('Content-Type: application/json; charset=UTF-8');

switch ($act) {


    case 'login':
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim(strip_tags(daddslashes($_POST['email'])));
            $password = trim(strip_tags(daddslashes($_POST['password'])));
            $email = strtolower($email);
            $userrow = $DB->query("SELECT * FROM m_user WHERE `email`='{$email}' and id = 10000 limit 1")->fetch();
            $password = md5($password);
            if ($email == $userrow['email'] && $password == $userrow['password']) {

                $session = md5($email . $password . $password_hash);
                $expiretime = time() + 6048000;
                $token = authcode("{$email}\t{$session}\t{$expiretime}", 'ENCODE', SYS_KEY_ADMIN);
                setcookie("admin_token", $token, time() + 6048000);
                exit('{"code":1,"msg":"尊敬的 用户 ,登录成功!"}');
            } else {
                exit('{"code":-1,"msg":"用户名或密码不正确"}');
            }
        } else {
            exit('{"code":-1,"msg":"数据不完整"}');
        }
        break;

    default:
        exit('{"code":-1,"msg":"网络错误"}');
        break;


}

?>