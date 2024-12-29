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
                            <li class="breadcrumb-item active">缓存设置</li>
                        </ol>
                    </div>
                    <h4 class="page-title">缓存设置</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">缓存设置</h4>
                        <p class="text-muted font-14 mb-3">请保持系统为最新版本,否则可能影响使用</p>

                        <div class="ibox-content"><a onclick="cache('program')" class="btn btn-success">刷新项目缓存</a>&nbsp;<!--<a
                                    onclick="cache('server')" class="btn btn-success ">刷新服务器列表缓存</a>--></div>


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
        function cache(type) {

            var index = layer.msg('数据加载中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=cache",
                dataType: "json",
                data: {
                    type: type
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
        }
    </script>
