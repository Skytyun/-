<?php

include('./head.php');
$type = daddslashes($_GET['type']);
$id = daddslashes($_GET['id']);
if ($type == 'edit') {
    $title = '用户修改';
} else {
    $title = '用户添加';
}

if ($id) {
    $row = $DB->query("SELECT * from m_user WHERE id={$id} limit 1")->fetch();
}


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

                            <li class="breadcrumb-item active">用户修改</li>
                        </ol>
                    </div>
                    <h4 class="page-title">用户修改</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">编号<?php echo $row['id'] ?>-用户修改</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>
                        <input type="hidden" id="id" value="<?php echo $row['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>用户邮箱</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="email" value="<?php echo $row['email'] ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>用户密码</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="password" placeholder="不修改请留空">
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>用户余额</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" id="money" value="<?php echo $row['money'] ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>用户状态</label>
                                    <select class="form-control select2" data-toggle="select2" id="status">
                                        <?php if ($row['status'] == 0) { ?>
                                            <option value="0">封停</option>
                                            <option value="1">正常</option>
                                        <?php } else { ?>
                                            <option value="1">正常</option>
                                            <option value="0">封停</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <button type="submit" class="btn btn-primary" id="user">保存数据</button>

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

        $("#user").click(function () {

            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=user",
                dataType: "json",
                data: {
                    id: $("#id").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    money: $("#money").val(),
                    status: $("#status").val()
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
                    layer.alert('网络连接！');
                    layer.close(index);
                }
            });
        });

    </script>


       