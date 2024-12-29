<?php

include('./head.php');
$id = intval($_GET['id']);
$list = $DB->query("SELECT * FROM m_site WHERE uid='{$id}' ")->fetchAll();
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
                            <li class="breadcrumb-item active">建站数据</li>
                        </ol>
                    </div>
                    <h4 class="page-title">用户-<?php echo $id ?> 建站数据</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <!--
                            <div class="col-sm-4">
                                <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> 添加用户</a>
                            </div>
                            -->
                            <div class="col-sm-8">
                                <div class="text-sm-right">


                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th class="all" style="width: 20px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th class="all">默认域名</th>
                                    <th>程序名</th>
                                    <th>网站编号</th>
                                    <th>到期时间</th>
                                    <th>是否到期</th>
                                    <th style="width: 85px;">操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($list as $res) {
                                    if($res['date'] > date("Y-m-d", time())){
                                        $isEnd = '<span class="badge badge-success">正常</span>';
                                    }else{
                                        $isEnd = '<span class="badge badge-danger">已到期</span>';
                                    }
                                    echo '
                                        <tr id="' . $res['id'] . '">
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                             <a href="http://' . $res['domain'] . '" target="_blank">' . $res['domain'] . '</a>
                                            </td>
                                            <td>
                                                 ' . $res['name'] . '
                                            </td>
                                            <td>
                                                ' . $res['id'] . '
                                            </td>
                                            <td>
                                                ' . $res['date'] . '
                                            </td>
                                            <td>
                                                ' . $isEnd . '
                                            </td>
                                           
                                            <td class="table-action">
                                                <a href="'.$conf['api_url'].'" target="_blank" class="action-icon" ><span class="badge badge-success"><i class="mdi mdi-dictionary"></i>管理</span> </a>
                                            </td>
                                         
                                        </tr>';
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- content -->

    <?php
    include('./footer.php');
    ?>
    <script>
        function installSite(id) {
            var index = layer.msg('数据加载中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=installSite",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            location.reload();
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

        }

        function rePay(id) {
            layer.confirm('确定续费吗?', {
                btn: ['是', '否'], btn1: function () {
                    var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
                    $.ajax({
                        type: "post",
                        url: "ajax.php?act=rePay",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function (data) {
                            layer.close(index);
                            if (data.code == 1) {
                                layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                                    location.reload();
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
            });
        }

    </script>
