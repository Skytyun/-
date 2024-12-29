<?php


include('./head.php');
$siteService = new Site();
$proResult = $siteService->getProgramList();
if ($proResult['code'] == 1) {
    $list = $proResult['data'];
} else {
    echo $siteService->getError($proResult['msg']);
    die();
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

                            <li class="breadcrumb-item active">建站商城</li>
                        </ol>
                    </div>
                    <h4 class="page-title">建站商城</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->


        <div class="row">

            <?php foreach ($list as $res) {
                $sale = rand(80, 93);

                //获取价格
             /*   $priceList[0]['id'] = '0000';
                $priceList[0]['price'] = '暂未设置价格';
                $priceList[0]['duration'] = '暂未设置天数';*/

                ?>
                <div class="col-md-6 col-xl-3">
                    <!-- project card -->
                    <div class="card d-block">
                        <div class="card-body">

                            <!-- project title-->
                            <h4 class="mt-0">
                                <a href="#" class="text-title"><?php echo $res['title'] ?></a>
                                <span class="badge badge-danger mb-2"><?php echo $res['discount_desc'];?></span>
                            </h4>
                         
                            <div>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="Mat Helme" class="d-inline-block">
                                    <img src="../assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs"
                                         alt="friend">
                                </a>

                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="Michael Zenaty" class="d-inline-block">
                                    <img src="../assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs"
                                         alt="friend">
                                </a>

                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="James Anderson" class="d-inline-block">
                                    <img src="../assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs"
                                         alt="friend">
                                </a>
                                <a href="javascript:void(0);" class="d-inline-block text-muted font-weight-bold ml-2">
                                    <?php echo rand(200, 500) ?> 人 点赞
                                </a>
                            </div>
                        </div> <!-- end card-body-->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-3">
                                <!-- project progress-->
                                <p class="mb-2 font-weight-bold">热销度 <span
                                            class="float-right"><?php echo $sale ?>%</span></p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $sale ?>"
                                         aria-valuemin="0" aria-valuemax="<?php echo $sale ?>"
                                         style="width: <?php echo $sale ?>%;">
                                    </div><!-- /.progress-bar -->
                                </div><!-- /.progress -->
                            </li>
                        </ul>
                        <div style="text-align:center">
                            <a href="<?php echo $res['demo'] ?>" target="_blank">
                                <button type="button" class="btn btn-info">查看 演示</button>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-success"
                                    onclick="selectPro('<?php echo $res['id'] ?>','<?php echo $res['title'] ?>')">一键 搭建
                            </button>
                        </div>


                    </div> <!-- end card-->

                </div> <!-- end col -->
            <?php } ?>





            <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">在线建站-<span id="pid" ></span></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>项目名:<span id="proname"></span></p>
                            <hr>
                            <p>请选择购买时间</p>
                            <select class="form-control select2" data-toggle="select2" id="specificateId">
                            </select>

                            <hr>
                            <p>请选择项目服务器</p>
                            <select class="form-control select2" data-toggle="select2" id="server">
                            </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" id="build">立即搭建</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



        </div>
        <!-- end row-->


    </div> <!-- content -->


    <?php
    include('./footer.php');
    ?>


    <script>
        function selectPro(pid, proname) {
            var index = layer.msg('数据获取中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=getGoodsOtherInfo",
                dataType: "json",
                data: {
                    pid: pid
                },
                success: function (data) {

                    var serverHtml = '';

                    for(var i=0; i < data.serverList.length;i++){
                        var newD = data.serverList[i];
                        serverHtml += '<option value="'+newD.id+'">'+newD.server_name+'</option>';
                    }
                    $("#server").html(serverHtml);

                    var specificateIdHtml = '';

                    if(data.specificateList){
                        for(var i=0; i < data.specificateList.length;i++){
                            var newD = data.specificateList[i];
                            specificateIdHtml += '<option value="'+newD.id+'">'+newD.price+'元/'+newD.duration+'</option>';
                        }
                    }

                    $("#specificateId").html(specificateIdHtml);

                    layer.close(index);
                    $("#pid").html(pid);
                    $("#proname").html(proname);
                    $('#myModal').modal().show();
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });



        }

        $("#build").click(function () {
            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=build",
                dataType: "json",
                data: {
                    pid: $("#pid").text(),
                    serverId: $("#server").val(),
                    specificateId: $("#specificateId").val(),
                    proname: $("#proname").text()
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                            location.href = 'siteList.php';
                        });
                    } else {
                        layer.msg(data.msg, {icon: 2, time: 2000, shade: 0.4});
                    }
                },
                error: function () {
                    layer.alert('网络连接异常！');
                }
            });

        });
    </script>
