<?php
error_reporting(0);
@header('Content-Type: text/html; charset=UTF-8');
$do=isset($_GET['do'])?$_GET['do']:'0';
if(file_exists('install.lock')){
    $installed=true;
    $do='0';
}

function checkfunc($f,$m = false) {
    if (function_exists($f)) {
        return '<font color="green">可用</font>';
    } else {
        if ($m == false) {
            return '<font color="black">不支持</font>';
        } else {
            return '<font color="red">不支持</font>';
        }
    }
}

function checkclass($f,$m = false) {
    if (class_exists($f)) {
        return '<font color="green">可用</font>';
    } else {
        if ($m == false) {
            return '<font color="black">不支持</font>';
        } else {
            return '<font color="red">不支持</font>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <title>宝塔建站系统API分站平台-安装</title>
    <link href="./bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body >
<div class="container"><br>
    <div class="row">

        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block" style="float: none;">
            <div class="panel panel-primary">

                <?php if ($do == '0') { ?>
                <div class="panel panel-black">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #15A638;">
                            <h3 class="panel-title" align="center">宝塔建站系统API分站平台</h3>
                        </div>


                        <div class="panel-body">
                            <p><iframe src="../readme.txt" style="width:100%;height:465px;"></iframe></p>
                            <?php if ($installed) { ?>
                                <div class="alert alert-warning">您已经安装过宝塔建站系统API分站平台，如需重新安装请删除<font color=red> "/install/install.lock" </font>文件后再安装！</div>
                            <?php }else{?>
                                <p align="center"><a class="btn btn-primary" href="?do=1">开始安装&#26356;&#22810;&#36164;&#28304;&#20844;&#20247;&#21495;&#65306;&#29399;&#20975;&#20043;&#23478;</a></p>
                            <?php }?>
                        </div>
                    </div>

                    <?php }elseif($do=='1'){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">环境检查</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                    <span class="sr-only">10%</span>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width:20%">函数检测</th>
                                    <th style="width:15%">需求</th>
                                    <th style="width:15%">当前</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>PHP 5.6+</td>
                                    <td><font color="red">必须</font></td>
                                    <td><?php echo phpversion(); ?></td>
                                </tr>
                                <tr>
                                    <td>curl_exec()</td>
                                    <td><font color="red">必须</font></td>
                                    <td><?php echo checkfunc('curl_exec',true); ?></td>
                                </tr>
                                <tr>
                                    <td>file_get_contents()</td>
                                    <td><font color="red">必须</font></td>
                                    <td><?php echo checkfunc('file_get_contents',true); ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <p><span><a class="btn btn-primary" href="index.php?do=0">上一步</a></span>
                                <span style="float:right"><a class="btn btn-primary" href="index.php?do=2" align="right">下一步</a></span></p>
                        </div>

                    <?php }elseif($do=='2'){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">数据库配置</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                    <span class="sr-only">30%</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                if(defined("SAE_ACCESSKEY"))
                                    echo <<<HTML
检测到您使用的是SAE空间，支持一键安装，请点击 <a href="?do=3">下一步</a>
HTML;
                                else
                                    echo <<<HTML
		<form action="?do=3" class="form-sign" method="post">
		<label for="name">数据库地址:</label>
		<input type="text" class="form-control" name="db_host" value="localhost">
		<label for="name">数据库端口:</label>
		<input type="text" class="form-control" name="db_port" value="3306">
		<label for="name">数据库用户名:</label>
		<input type="text" class="form-control" name="db_user">
		<label for="name">数据库密码:</label>
		<input type="text" class="form-control" name="db_pwd">
		<label for="name">数据库名:</label>
		<input type="text" class="form-control" name="db_name">
		<br><input type="submit" class="btn btn-primary btn-block" name="submit" value="保存配置">
		</form><br/>
  
HTML;
                                ?>
                            </div>
                        </div>
                    <?php }elseif($do=='3'){
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">保存数据库</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                    <span class="sr-only">50%</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                require './db.class.php';
                                if(defined("SAE_ACCESSKEY") || $_GET['jump']==1){
                                    include_once '../config.php';
                                    if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']) {
                                        echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
                                    } else {
                                        if(!$con=DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port'])){
                                            if(DB::connect_errno()==2002)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
                                            elseif(DB::connect_errno()==1045)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
                                            elseif(DB::connect_errno()==1049)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
                                            else
                                                echo '<div class="alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'</div>';
                                        }
                                    }
                                }else{
                                    $db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
                                    $db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
                                    $db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
                                    $db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
                                    $db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;

                                    if($db_host==null || $db_port==null || $db_user==null || $db_pwd==null || $db_name==null){
                                        echo '<div class="alert alert-danger">保存错误,请确保每项都不为空<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
                                    } else {
                                        $config="<?php
/*数据库配置*/
\$dbconfig=array(
	'dbhost' => '{$db_host}', //数据库服务器
	'dbport' => {$db_port}, //数据库端口
	'dbuser' => '{$db_user}', //数据库用户名
	'dbpwd' => '{$db_pwd}', //数据库密码
	'dbname' => '{$db_name}' //数据库名
);
?>";
                                        if(!$con=DB::connect($db_host,$db_user,$db_pwd,$db_name,$db_port)){
                                            if(DB::connect_errno()==2002)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
                                            elseif(DB::connect_errno()==1045)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
                                            elseif(DB::connect_errno()==1049)
                                                echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
                                            else
                                                echo '<div class="alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'</div>';
                                        }elseif(file_put_contents('../app/database.php',$config)){
                                            echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
                                            if(DB::query("select * from ayangw_config where 1")==FALSE)
                                                echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=4">创建数据表>></a></p>';
                                            else
                                                echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过本系统</div>
				<div class="list-group-item">
					<a href="?do=6" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
                                        }else
                                            echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php }elseif($do=='4'){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">创建数据表</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="sr-only">70%</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                include_once '../app/database.php';
                                if(!$dbconfig['dbuser']||!$dbconfig['dbpwd']||!$dbconfig['dbname']) {
                                    echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
                                } else {

                                    require './db.class.php';
                                    $sql=file_get_contents("install.sql");
                                    $sql=explode(';',$sql);
                                    $cn = DB::connect($dbconfig['dbhost'],$dbconfig['dbuser'],$dbconfig['dbpwd'],$dbconfig['dbname'],$dbconfig['dbport']);
                                    if (!$cn) die('err:'.DB::connect_error());
                                    DB::query("set sql_mode = ''");
                                    DB::query("set names utf8");
                                    $t=0; $e=0; $error='';
                                    for($i=0;$i<count($sql);$i++) {
                                        if ($sql[$i]=='')continue;
                                        if(DB::query($sql[$i])) {
                                            ++$t;
                                        } else {
                                            ++$e;
                                            $error.=DB::error().'<br/>';
                                        }
                                    }
                                }
                                if($e) {
                                    echo '<div class="alert alert-success">安装成功！<br/>SQL成功'.$t.'句/失败 0 句</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=5">下一步>></a></p>';
                                }
                                ?>
                            </div>
                        </div>

                    <?php }elseif($do=='5'){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">安装完成</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="sr-only">100%</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                @file_put_contents("install.lock",'系统已锁定');
                                echo '<div ><font color="green">恭喜，宝塔建站系统API分站平台	安装完成！<br/><br/>管理初始账号123456@qq.com,初始密码是:123456,管理员后台:域名/admin</font><br/><br/>搭建完成后请先到网站后台->网站设置,配置对接主站信息<br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录下建立 install.lock 空文件！</font></div>';
                                ?>
                            </div>
                        </div>

                    <?php }elseif($do=='6'){?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" align="center">安装完成</h3>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    <span class="sr-only">100%</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                @file_put_contents("install.lock",'系统已锁定');
                                echo '<div ><font color="green">恭喜，宝塔建站系统API分站平台	安装完成！<br/><br/>管理初始账号123456@qq.com,初始密码是:123456,管理员后台:域名/admin</font><br/><br/>搭建完成后请先到网站后台->网站设置,配置对接主站信息<br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录下建立 install.lock 空文件！</font></div>';
                                ?>
                            </div>
                        </div>
                    <?php }?>
                </div>
</body>
</html>