<?php

include('../app/common.php');
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
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">免费注册账号</h4>
                            <p class="text-muted mb-4"><span id="jinrishici-sentence"></span></p>
                        </div>

                        <form action="#" method="post">

                            <div class="form-group">
                                <label for="emailaddress">邮箱</label>
                                <input class="form-control" type="email" id="emailaddress" required
                                       placeholder="输入你的邮箱">
                            </div>

                            <div class="form-group">
                                <label for="password">密码</label>
                                <input class="form-control" type="password" required id="password" placeholder="输入密码">
                            </div>

                            <div class="form-group">
                                <label for="password">确认密码</label>
                                <input class="form-control" type="password" required id="password2"
                                       placeholder="再次输入密码">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">我同意 <a href="#"
                                                                                                     class="text-muted"
                                                                                                     data-toggle="modal"
                                                                                                     data-target="#myModal">使用条款</a></label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="button" id="reg">免费注册</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"> 使用条款</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <p>参照中华人民共和国宪法.</p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" onclick="agree()" data-dismiss="modal">
                                    同意
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="login.php"
                                                                       class="text-muted ml-1"><b>马上登录</b></a></p>
                    </div> <!-- end col-->
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
<script src="../assets/js/pages/demo.toastr.js"></script>
<script src="../assets/js/layer/jquery.min.js"></script>

<script src="../assets/js/layer/layer.js"></script>
</body>
<script>
    function agree() {

        $("#checkbox-signup").attr("checked", true);
    }


    $("#reg").click(function () {

        if (!$('#checkbox-signup').is(':checked')) {
            layer.alert("请先同意使用条款");
            return false;
        }


        var index = layer.msg('数据加载中', {time: 9999999});

        $.ajax({
            type: "post",
            url: "auth.php?act=reg",
            dataType: "json",
            data: {
                email: $("#emailaddress").val(),
                password: $("#password").val(),
                password2: $("#password2").val()
            },
            success: function (data) {
                layer.close(index);
                if (data.code == 1) {
                    layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                        location.href = 'login.php';
                    });
                } else {
                    layer.msg(data.msg, {icon: 2, time: 2000, shade: 0.4});
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
