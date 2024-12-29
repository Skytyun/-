<?php


include('./head.php');

$list = $DB->query("SELECT * FROM m_site WHERE uid={$userrow['id']} order by id desc ")->fetchAll();
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
                    <h4 class="page-title">建站数据</h4>
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
                                                <a href="#" class="action-icon" onclick="operate('.$res['id'].',\''.$res['z_site_id'].'\');"><span class="badge badge-success"><i class="mdi mdi-dictionary"></i>管理</span> </a>
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


        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="pointer-events：auto"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">操作网站</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><b>基本信息</b></p>
                        <p>产品原始编号：<span id="z_site_id"></span></p>
                        <p>产品编号：<span id="newId"></span></p>
                        <p>产品名称：<span id="proname"></span></p>
                        <p>创建时间：<span id="createtime"></span></p>
                        <p>到期时间：<span id="endtime"></span></p>
                        <p>默认域名：<span id="defaultdomain"></span></p>
                        <p>温馨提示：<span id="smallTip"></span></p>
                        <hr>
                        <p><b>自定义域名</b></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="newDomain" maxlength="125" data-toggle="maxlength" placeholder="请输入自定义域名"
                                            data-placement="top" >
                                </div>
                            </div> <!-- end col -->
                            <div style="float: bottom">
                                <button type="submit" onclick="bindDomain();" class="btn btn-primary">新增域名</button>
                            </div>
                        </div>

                        <!-- end row -->
                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="">
                                <tr>
                                    <th class="all">自定义域名</th>
                                    <th style="width: 85px;">操作</th>
                                </tr>
                                </thead>
                                <tbody id="userDomain">
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <p><b>网站续费</b></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <select class="form-control select2" data-toggle="select2" id="specificateId">
                                    </select>
                                </div>
                            </div> <!-- end col -->
                            <div style="float: bottom">
                                <button type="submit" onclick="siteRePay();" class="btn btn-primary">立即续费</button>
                            </div>
                        </div>
<!--
                        <button type="button" class="btn btn-primary" id="build">域名管理</button>
                        <button type="button" class="btn btn-success" id="build">网站续费</button>-->

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div> <!-- content -->

    <?php
    include('./footer.php');
    ?>
    <script>

        function operate(id,z_site_id) {
            var index = layer.msg('数据获取中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=getUserProductInfo",
                dataType: "json",
                data: {
                    id: id,
                    zSiteId: z_site_id
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        let proname = data.site.name ; //产品名称
                        $("#proname").html(proname);
                        $("#createtime").html(data.row.create_time);
                        $("#endtime").html(data.row.end_time);
                        $("#defaultdomain").html('http://'+data.site.domain);
                        $("#smallTip").html(data.row.good.small_tip);
                        let z_site_id = data.site.z_site_id
                        $("#z_site_id").html(z_site_id);
                        $("#newId").html(id);

                        let userDomain = data.row.user_domain;

                        let userDomainHtml = "";

                        if(userDomain){
                            let userDomainArr = userDomain.split("|");
                            for(let i=0;i < userDomainArr.length ; i++){
                            userDomainHtml += ' <tr>' +
                                '                 <td>' +
                                '                   <a href="http://' +userDomainArr[i] + '" target="_blank">'+userDomainArr[i]+'</a>'+
                                '                 </td>' +
                                '                 <td class="table-action">' +
                                '                   <a href="#" class="" onclick="delDomain(\''+userDomainArr[i]+'\',\''+z_site_id+'\');"><i class="mdi mdi-delete">删除</i> </a> ' +
                                '                 </td>' +
                                '               </tr>';

                            }
                        }

                        $("#userDomain").html(userDomainHtml);


                        //网站续费详情
                        var specificateIdHtml = '';

                        if(data.specificateList){
                            for(var i=0; i < data.specificateList.length;i++){
                                var newD = data.specificateList[i];
                                specificateIdHtml += '<option value="'+newD.id+'">'+newD.price+'元/'+newD.duration+'</option>';
                            }
                        }

                        $("#specificateId").html(specificateIdHtml);

                        $('#myModal').modal().show();

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

        function bindDomain() {
            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=bindDomain",
                dataType: "json",
                data: {
                    domain: $("#newDomain").val(),
                    zSiteId: $("#z_site_id").html() ,
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            operate($("#newId").html(),$("#z_site_id").html());
                        });
                    } else {
                        layer.msg(data.msg, {icon: 7, time: 2000, shade: 0.4});
                    }
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });

        }

        //网站续费
        function siteRePay() {
            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=siteRePay",
                dataType: "json",
                data: {
                    specificateId: $("#specificateId").val(),
                    newId: $("#newId").html(),
                    zSiteId: $("#z_site_id").html() ,
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            operate($("#newId").html(),$("#z_site_id").html());
                        });
                    } else {
                        layer.msg(data.msg, {icon: 7, time: 2000, shade: 0.4});
                    }
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });

        }

        function delDomain(domain,zSiteId) {
            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=delDomain",
                dataType: "json",
                data: {
                    domain: domain,
                    zSiteId: zSiteId ,
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            operate($("#newId").html(),$("#z_site_id").html());
                        });
                    } else {
                        layer.msg(data.msg, {icon: 7, time: 2000, shade: 0.4});
                    }
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });

        }


        function rePay(id) {
            layer.confirm('确定续费吗?', {
                btn: ['是', '否'], btn1: function () {
                    var index = layer.msg('数据处理中', {time: 9999999});
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
                                layer.msg(data.msg, {icon: 7, time: 2000, shade: 0.4});
                            }
                        },
                        error: function () {
                            layer.alert('服务器异常！');
                            layer.close(index);
                        }
                    });
                }
            });
        }

    </script>
