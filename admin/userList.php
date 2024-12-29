<?php

include('./head.php');


$list = $DB->query("SELECT * FROM m_user WHERE 1 order by id asc")->fetchAll();
?>

<div class="content-page">
    <div class="content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">商城系统</a></li>

                            <li class="breadcrumb-item active">用户列表</li>
                        </ol>
                    </div>
                    <h4 class="page-title">用户列表</h4>
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
                                    <th class="all">用户邮箱</th>
                                    <th>建站</th>
                                    <th>注册日期</th>
                                    <th>金额</th>
                                    <th>类型</th>
                                    <th>状态</th>
                                    <th style="width: 85px;">操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($list as $res) {

                                    $res['numrows'] = $DB->query("SELECT * from m_site WHERE `uid`={$res['id']} ")->rowCount();
                                    if ($res['type'] == 1) {
                                        $res['type'] = "用户";
                                    } else if ($res['type'] == 10) {
                                        $res['type'] = "管理员";
                                    }

                                    if ($res['status'] == 1) {
                                        $res['status'] = "正常";
                                    } else {
                                        $res['status'] = "封停";
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
                                                    	' . $res['email'] . '
                                                        </td>
                                                        <td>
                                                        <span class="badge badge-success"><a href="getUserSite.php?id=' . $res['id'] . '">' . $res['numrows'] . ' </a></span>
                                                            
                                                        </td>
                                                        <td>
                                                           ' . $res['date'] . '
                                                        </td>
                                                        <td>
                                                            ￥ ' . $res['money'] . '
                                                        </td>
                    
                                                        <td>
                                                            ' . $res['type'] . '
                                                        </td>
                                                        <td>
                                                            ' . $res['status'] . '
                                                        </td>
                    
                                                        <td class="table-action">
                                                           <a href="#" class="btn btn-info btn-sm" onclick="user(' . $res['id'] . ')" ><i class="fa fa-pencil fa-fw"></i>修改</a>
            <a href="#" class="btn btn-danger btn-sm" onclick="delUser(' . $res['id'] . ')"><i class="fa fa-trash-o fa-lg"></i>删除</a>
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


    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">用户<span id="uid"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                        <thead class="thead-light">
                        <tr>
                            <th class="all" style="width: 20px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th class="all">网站编号</th>
                            <th>程序名</th>
                            <th>到期时间</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                </div>
                            </td>
                            <td>
                                123
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                222
                            </td>

                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <?php
    include('./footer.php');
    ?>
    <script>

        function user(id) {
            location.href = "user.php?type=edit&id=" + id;
        }

        function delUser(id) {

            layer.confirm('删除后不可恢复,是否确认删除?', {
                btn: ['是', '否'], btn1: function () {
                    $.ajax({
                        url: './ajax.php?act=delUser',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            if (data.code == 1) {
                                layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                                    var del = "#" + id;
                                    $(del).remove();
                                });
                            } else {
                                layer.msg(data.msg, {icon: 2, time: 2000, shade: 0.4});
                            }
                        }
                    });
                }

            });
        }
    </script>