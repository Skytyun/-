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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">建站商城</a></li>
                            <li class="breadcrumb-item active">系统更新</li>
                        </ol>
                    </div>
                    <h4 class="page-title">系统更新</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">系统更新</h4>
                        <p class="text-muted font-14 mb-3">请保持系统为最新版本,否则可能影响使用</p>
                        <?php echo System::getUpdate(); ?>

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- content -->

    <?php
    include('./footer.php');
    ?>
    <script>
        function update() {
            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=update",
                dataType: "json",
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            location.href = data.url;
                        });
                    } else {
                        layer.msg(data.msg, {icon: 2, time: 2000, shade: 0.4});
                    }
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });
        }
    </script>