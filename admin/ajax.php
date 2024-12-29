<?php


include("../app/common.php");
$act = isset($_GET['act']) ? daddslashes($_GET['act']) : null;

@header('Content-Type: application/json; charset=UTF-8');

if ($userrow['id'] != 10000) {
    exit('{"code":-1,"msg":"非法访问"}');
}

switch ($act) {

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 更新版本
     */
    case 'update':
        $result = System::update();
        if ($result['code'] == 1) {
            exit('{"code":1,"msg":"系统更新完成,正在更新数据库","url":"../install/update.php?update=updateDB"}');
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 清空缓存
     */
    case 'cache':
        $type = trim(strip_tags(daddslashes($_POST['type'])));
        $result = system::cache($type);
        if ($result['code'] == 1) {
            exit('{"code":1,"msg":"缓存刷新成功"}');
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }
        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 网站设置
     */
    case 'siteSet':
        $api_url = trim($_POST['api_url']);
        if (!strexists($api_url, "http")) {
            exit('{"code":-1,"msg":"域名需要带http://"}');
        }

        // 服务端校验

        $conf['api_url'] = $_POST['api_url'];
        $conf['api_secret_id'] = $_POST['api_secret_id'];
        $conf['api_secret_key'] = $_POST['api_secret_key'];
        $site = new Site();
        $result = $site->login();
        if ($result['code'] == 1) {
            $token = $result['data'];
            $_POST['server_token'] = $token;
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }

        foreach ($_POST as $k => $value) {
            $value = trim(daddslashes($value));
            $DB->query("insert into m_conf set `k`='{$k}',`v`='{$value}' on duplicate key update `v`='{$value}'");
        }


        exit('{"code":1,"msg":"数据保存成功"}');

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 支付设置
     */
    case 'paySet':

        foreach ($_POST as $k => $value) {
            $value = trim(strip_tags(daddslashes($value)));
            $DB->query("insert into m_conf set `k`='{$k}',`v`='{$value}' on duplicate key update `v`='{$value}'");
        }
        exit('{"code":1,"msg":"数据保存成功"}');

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户增加/修改
     */
    case 'user':
        $id = trim(strip_tags(daddslashes($_POST['id'])));
        $email = trim(strip_tags(daddslashes($_POST['email'])));
        $password = trim(strip_tags(daddslashes($_POST['password'])));
        $money = trim(strip_tags(daddslashes($_POST['money'])));
        $status = trim(strip_tags(daddslashes($_POST['status'])));
        if (!$email) {
            exit('{"code":-1,"msg":"数据不得为空,请补充完整"}');
        }
        if (!$id) {
            exit('{"code":-1,"msg":"修改失败,参数不存在"}');
        }
        if (!preg_match('/^[A-z0-9._-]+@[A-z0-9._-]+\.[A-z0-9._-]+$/', $email)) {
            exit('{"code":-1,"msg":"邮箱格式不正确"}');
        }
        $email = strtolower($email);
        $exitemail = $DB->query("SELECT * FROM m_user WHERE email='{$email}'  and id!='$id' limit 1")->fetch();

        if ($exitemail) {
            exit('{"code":-1,"msg":"邮箱:' . $email . '已存在,请重新设置"}');
        }
        $rows = $DB->query("select * from m_user where id='$id' limit 1")->fetch();
        //无修改内容时执行
        if ($password == null && $email == $rows['email'] && $money == $rows['money'] && $status == $rows['status']) {
            exit('{"code":1,"msg":"修改成功"}');
        }

        if ($password == null) {
            $sql = $DB->exec("UPDATE `m_user` SET `email` ='{$email}',`money` ='{$money}',`status` ='{$status}' WHERE `id`='{$id}'");
            if ($sql) {
                exit('{"code":1,"msg":"修改成功"}');
            } else {
                exit('{"code":-1,"msg":"修改失败,请稍后再试"}');
            }
        } else {//修改密码
            $password = md5($password);
            $sql = $DB->exec("UPDATE `m_user` SET  `password` ='{$password}',`email` ='{$email}',`money` ='{$money}',`status` ='{$status}' WHERE `id`='{$id}'");
            if ($sql) {
                exit('{"code":1,"msg":"修改成功"}');
            } else {
                exit('{"code":-1,"msg":"修改失败,请稍后再试"}');
            }
        }

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 删除用户
     */
    case 'delUser':
        $id = trim(strip_tags(daddslashes($_POST['id'])));
        if (!$id) {
            exit('{"code":-1,"msg":"删除失败,参数不存在"}');
        }
        if ($uid == 10000) {
            exit('{"code":0,"msg":"删除失败,管理员账号不可删除"}');
        }
        $rows = $DB->query("select * from m_user where id='$id' limit 1")->fetch();
        if (!$rows) {
            exit('{"code":-1,"msg":"删除失败,用户不存在"}');
        }
        $sql = $DB->exec("DELETE FROM m_user WHERE id='$id'");
        if ($sql) {
            exit('{"code":1,"msg":"删除成功"}');
        } else {
            exit('{"code":-1,"msg":"删除失败"}');
        }

        break;



    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 获取用户网站
     */
    case 'getUserSite':
        $id = trim(strip_tags(daddslashes($_POST['id'])));
        $site = $DB->query("SELECT * FROM m_site WHERE uid='{$id}' ")->fetchAll();
        if (!$site) {
            exit('{"code":-1,"msg":"旗下没有网站"}');
        }
        exit('{"code":1,"msg":"网站已经获取","data":"' . $site . '"}');

        break;


    default:
        exit('{"code":-1,"msg":"网络错误"}');
        break;


}

?>
