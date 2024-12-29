<?php

include('./head.php');

?>


<div class="content-page">
    <div class="content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">商城系统</a></li>

                            <li class="breadcrumb-item active">修改资料</li>
                        </ol>
                    </div>
                    <h4 class="page-title">修改资料</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">修改邮箱</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>登录邮箱</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           value="<?php echo $userrow['email'] ?>" data-placement="top" id="email">
                                </div>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <button type="submit" class="btn btn-primary" id="emailSet">保存邮箱</button>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">修改密码</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>原密码</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="oldpass">
                                </div>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>新密码</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="password">
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>再次输入新密码</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="password1">
                                </div>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <button type="submit" class="btn btn-primary" id="passSet">保存数据</button>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- content -->

    <?php
    include('./footer.php');
    ?>

    <script>

        $("#emailSet").click(function () {

            var index = layer.msg('数据操作中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=emailSet",
                dataType: "json",
                data: {
                    email: $("#email").val()
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4});
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


        $("#passSet").click(function () {

            var index = layer.msg('数据操作中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=passSet",
                dataType: "json",
                data: {
                    oldpass: $("#oldpass").val(),
                    password: $("#password").val(),
                    password1: $("#password1").val()
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4});
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

       