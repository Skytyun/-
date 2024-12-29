<?php

include("../app/common.php");
$act = isset($_GET['act']) ? daddslashes($_GET['act']) : null;

@header('Content-Type: application/json; charset=UTF-8');

if (!$userrow['id']) {
    exit('{"code":-1,"msg":"非法访问"}');
}

switch ($act) {

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户邮箱设置
     */
    case 'emailSet':
        $email = trim(strip_tags(daddslashes($_POST['email'])));

        if (!preg_match('/^[A-z0-9._-]+@[A-z0-9._-]+\.[A-z0-9._-]+$/', $email)) {
            exit('{"code":-1,"msg":"邮箱格式不正确"}');
        }
        $email = strtolower($email);
        $exitemail = $DB->query("SELECT * FROM m_user WHERE email='{$email}'  and id!='{$userrow['id']}' limit 1")->fetch();

        if ($exitemail) {
            exit('{"code":-1,"msg":"邮箱已存在,请重新设置"}');
        }
        if ($email == $userrow['email']) {
            exit('{"code":1,"msg":"修改成功"}');
        }
        //正常修改
        $sql = $DB->exec("UPDATE `m_user` SET `email` ='{$email}' WHERE `id`='{$userrow['id']}'");
        if ($sql) {
            exit('{"code":1,"msg":"修改成功"}');
        } else {
            exit('{"code":-1,"msg":"修改失败啦"}');
        }

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户密码设置
     */
    case 'passSet':
        $oldpass = trim(strip_tags(daddslashes($_POST['oldpass'])));
        $password = trim(strip_tags(daddslashes($_POST['password'])));
        $password1 = trim(strip_tags(daddslashes($_POST['password1'])));

        if ($userrow['password'] != md5($oldpass)) {
            exit('{"code":-1,"msg":"原密码错误"}');
        }

        if (strlen($password) < 6) {
            exit('{"code":-1,"msg":"密码不能低于6位"}');
        }
        if ($password != $password1) {
            exit('{"code":-1,"msg":"两次输入密码不一致"}');
        }

        $password = md5($password);
        $oldpass = md5($oldpass); //原密码

        //没有修改的情况下
        if ($oldpass == $password) {
            exit('{"code":-1,"msg":"新密码不能和旧密码一样"}');
        }

        //正常修改
        $sql = $DB->exec("UPDATE `m_user` SET `password` ='{$password}' WHERE `id`='{$userrow['id']}'");
        if ($sql) {
            exit('{"code":1,"msg":"修改成功,请重新登录"}');
        } else {
            exit('{"code":-1,"msg":"修改失败啦"}');
        }

        break;

    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户支付
     */
    case 'pay':
        $account = trim(strip_tags(daddslashes($_POST['account'])));
        $type = trim(strip_tags(daddslashes($_POST['method'])));

        $order_no = date("YmdHis") . rand(111, 999);
        if (!is_numeric($account)) {
            exit('{"code":-1,"msg":"提交参数错误！"}');
        }
        if ($account > 1000 || $account < 1) {
            exit('{"code":-1,"msg":"充值金额不能小于1且不能超过1000！"}');
        }
        $name = '用户' . $userrow['id'] . '-在线充值' . $account . '元余额';
        $sitename = $conf['title'];//站点名字

        $sql = $DB->exec("INSERT INTO `m_order` (`order_no`,  `name`,`uid`, `money`, `date`, `type`, `status`)VALUES ('{$order_no}', '{$name}', '{$userrow['id']}',  '{$account}', '{$date}','{$type}', '0')");

        if ($sql) {
            exit('{"code":1,"msg":"提交订单成功！","order_no":"' . $order_no . '","money":"' . $account . '","type":"' . $type . '"}');
        } else {
            exit('{"code":-1,"msg":"提交订单失败！"}');
        }


        break;


    case 'getGoodsOtherInfo':
        $goodsId = trim(strip_tags(daddslashes($_POST['pid'])));
        $siteService = new Site();

        //获取服务器
        $serverResult = $siteService->getServerList($goodsId);
        if ($serverResult['code'] == 1) {
            $serverList = $serverResult['data'];
        } else {
            $server['id'] = '0000';
            $server['server_name'] = '暂无可用服务器';
            $serverList = array($server);
        }

        //获取费用信息
        $result = $siteService->getSpecificateList($goodsId,0);

        if ($result['code'] == 1) {
            $specificateList = $result['data'];
        } else {
            $specificate['id'] = '0000';
            $specificate['price'] = '暂未设置价格';
            $specificate['duration'] = '暂未设置天数';
            $specificateList = array($specificate);
        }

        $arr = array('code'=>1,"msg"=>"获取成功","serverList"=>($serverList),"specificateList"=>$specificateList);
        exit(json_encode($arr));
        break;



    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 用户创建网站
     */
    case 'build':
        $siteService = new Site();

        $goodsId = trim(strip_tags(daddslashes($_POST['pid'])));
        $serverId = trim(strip_tags(daddslashes($_POST['serverId'])));
        $specificateId = trim(strip_tags(daddslashes($_POST['specificateId'])));
        $proname = trim(strip_tags(daddslashes($_POST['proname'])));
        $price = 200;

        $specificateList = $siteService->getSpecificateList($goodsId,0);

        //判断商品的价格
        foreach ($specificateList['data'] as $specificate) {
            if ($specificate['id'] == $specificateId) {
                $price = $specificate['price'];
            }
        }

        if ($price > $userrow['money']) {
            exit('{"code":-1,"msg":"余额不足,请先充值"}');
        }

        //根据选择的服务器获取域名列表，默认使用第一个，生成自定义域名
        $result = $siteService->getServerDomainList( $serverId);
        if ($result['code'] == 1) {
           $domainData = $result['data'];
           if(isset($domainData[0])){
               $defaultDomain = $domainData[0]['domain'];
               $preDomain = substr(md5(uniqid() . rand(1, 10000)), 26);//域名前缀

               $domainId = $domainData[0]['id'];
               $result = $siteService->build($goodsId, $serverId, $specificateId, $domainId, $preDomain);
               if ($result['code'] == 1) {
                   $data = $result['data'];
                   $domain = $preDomain.".".$defaultDomain;
                   if($data['port'] != 80){
                       $domain = $preDomain.".".$defaultDomain.":".$data['siteInfo']['http_port'];
                   }
                   $endtime = $data['siteInfo']['end_time'];
                   $zSiteId = $data['siteInfo']['id'];
                   $sql = $DB->exec("INSERT INTO `m_site` (`uid`,  `domain`, `date`, `name`,`z_site_id`)VALUES ( '{$userrow['id']}',  '{$domain}', '{$endtime}', '{$proname}','{$zSiteId}')");
                   //计算用户余额
                   $money = $userrow['money'] - $price;
                   $DB->exec("UPDATE `m_user` SET `money` ='{$money}' WHERE `id`='{$userrow['id']}'");
                   exit('{"code":1,"msg":"搭建成功"}');
               } else {
                   exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
               }

           }else{
               exit('{"code":-1,"msg":"主站管理员未设置域名，请联系管理员处理"}');
           }
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }

        break;



    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 获取用户商品详情信息
     */
    case 'getUserProductInfo':
        $siteService = new Site();

        $id = trim(strip_tags(daddslashes($_POST['id'])));
        $zSiteId = trim(strip_tags(daddslashes($_POST['zSiteId'])));

        $site = $DB->query("SELECT * FROM m_site WHERE id='{$id}' and uid='{$userrow['id']}' limit 1")->fetch();

        if (!$site) {
            exit('{"code":-1,"msg":"网站不存在,或操作不是您的网站"}');
        }

        $result = $siteService->getUserGoodsDetail($zSiteId);
        if ($result['code'] == 1) {
            $row = $result['data'];
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }

        //更新网站到期时间
        $endtime = $row['end_time'];
        $DB->query("update `m_site` set `date` ='$endtime}' where `id`='{$id}'")->fetch();


        //获取费用信息
        $result = $siteService->getSpecificateList($row['good']['id'],1);
        if ($result['code'] == 1) {
            $specificateList = $result['data'];
        } else {
            $specificate['id'] = '0000';
            $specificate['price'] = '暂未设置价格';
            $specificate['duration'] = '暂未设置天数';
            $specificateList = array($specificate);
        }


        $arr = array('code'=>1,"msg"=>"获取成功",'row'=>$row, 'site'=>$site , 'specificateList'=>$specificateList);
        exit(json_encode($arr));
        break;



        /**
         * author: 79517721@qq.com
         * time:2023/8/12 22:35
         * description:TODO 网站续费
         */
    case 'siteRePay':
        $siteService = new Site();

        $newId = trim(strip_tags(daddslashes($_POST['newId'])));
        $zSiteId = trim(strip_tags(daddslashes($_POST['zSiteId'])));
        $specificateId = trim(strip_tags(daddslashes($_POST['specificateId'])));

        $price =200;

        //根据zsiteid 获取到商品id
        //获取服务器
        $result = $siteService->getUserGoodsDetail($zSiteId);
        if ($result['code'] == 1) {
            $row = $result['data'];
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }

        //判断余额是否充足
        $specificateList = $siteService->getSpecificateList($row['good']['id'],1);

        if ($specificateList['code'] == 1) {
            foreach ($specificateList['data'] as $specificate) {
                if ($specificate['id'] == $specificateId) {
                    $price = $specificate['price'];
                }
            }
        } else {
            exit('{"code":-1,"msg":"' . $specificateList['msg'] . '"}');
        }

        //判断商品的价格
        if ($price > $userrow['money']) {
            exit('{"code":-1,"msg":"余额不足,请先充值"}');
        }
        $result = $siteService->siteRePay($zSiteId, $specificateId);

        if ($result['code'] == 1) {
            //扣款
            //计算用户余额
            $money = $userrow['money'] - $price;
            $DB->exec("UPDATE `m_user` SET `money` ='{$money}' WHERE `id`='{$userrow['id']}'");
            exit('{"code":1,"msg":"续费成功"}');
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }
        break;




    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 绑定域名
     */
    case 'bindDomain':
        $siteService = new Site();

        $domain = trim(strip_tags(daddslashes($_POST['domain'])));
        $zSiteId = trim(strip_tags(daddslashes($_POST['zSiteId'])));

        $result = $siteService->bindDomain($zSiteId, $domain,'SiteAddUserDomainAjax');

        if ($result['code'] == 1) {
            exit('{"code":1,"msg":"域名绑定成功"}');
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }
        break;




    /**
     * author: 79517721@qq.com
     * time:2023/8/12 22:35
     * description:TODO 删除绑定域名
     */
    case 'delDomain':
        $siteService = new Site();

        $domain = trim(strip_tags(daddslashes($_POST['domain'])));
        $zSiteId = trim(strip_tags(daddslashes($_POST['zSiteId'])));

        $result = $siteService->bindDomain($zSiteId, $domain,'SiteDelUserDomainAjax');

        if ($result['code'] == 1) {
            exit('{"code":1,"msg":"成功删除域名绑定"}');
        } else {
            exit('{"code":-1,"msg":"' . $result['msg'] . '"}');
        }
        break;




    default:

        break;


}

