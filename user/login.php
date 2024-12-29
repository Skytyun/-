<?php


include('../app/common.php');
if ($islogin2 == 1) {
    exit("<script language='javascript'>window.location.href='./';</script>");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $conf['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="../assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>
                    -->
                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">在线登陆账号</h4>
                            <p class="text-muted mb-4"><span id="jinrishici-sentence"></span></p>
                        </div>

                        <form action="#" method="post">

                            <div class="form-group">
                                <label for="emailaddress">邮箱</label>
                                <input class="form-control" type="email" id="emailaddress" required=""
                                       placeholder="请输入邮箱">
                            </div>

                            <div class="form-group">
                                <a href="" id="find" class="text-muted float-right"><small>忘记密码?</small></a>
                                <label for="password">密码</label>
                                <input class="form-control" type="password" required="" id="password"
                                       placeholder="输入密码">
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="button" id="login"> 现在登录</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">还没有账号? <a href="reg.php" class="text-muted ml-1"><b>免费注册</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2020 - 2025 © <?php echo $conf['title'] ?>
</footer>

<!-- App js -->
<script src="../assets/js/app.min.js"></script>
<script src="../assets/js/layer/layer.js"></script>
</body>
<script>

    $("#find").click(function () {
        layer.msg("联系系统管理员");
        return false;
    });
    $("#login").click(function () {

        var index = layer.msg('数据加载中', {time: 9999999});
        $.ajax({
            type: "post",
            url: "auth.php?act=login",
            dataType: "json",
            data: {
                email: $("#emailaddress").val(),
                password: $("#password").val()
            },
            success: function (data) {
                layer.close(index);
                if (data.code == 1) {
                    layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                        location.href = './index.php';
                    });
                } else {
                    layer.msg(data.msg, {icon: 7, time: 2000, shade: 0.4});
                }
            },
            error: function () {
                layer.alert('服务器异常！');
                layer.close(index);
            }
        });
    });

</script>
<script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
</html>
