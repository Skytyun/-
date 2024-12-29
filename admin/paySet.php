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

                            <li class="breadcrumb-item active">支付设置</li>
                        </ol>
                    </div>
                    <h4 class="page-title">支付设置</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">支付配置</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>支付宝支付</label>
                                    <select class="form-control select2" data-toggle="select2">
                                        <option>易支付免签约接口</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>微信支付</label>
                                    <select class="form-control select2" data-toggle="select2">
                                        <option>易支付免签约接口</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>QQ支付</label>
                                    <select class="form-control select2" data-toggle="select2">
                                        <option>易支付免签约接口</option>
                                    </select>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>自定义易支付地址</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" placeholder="格式: http://pay.ococn.cn/ 带http和/"
                                           id="epay_api" value="<?php echo $conf['epay_api']; ?>"><a href="https://pay.ococn.cn">推荐码支付<a/>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>易支付商户ID</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" id="epay_id" value="<?php echo $conf['epay_id']; ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>易支付商户密钥</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" id="epay_key" value="<?php echo $conf['epay_key']; ?>">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <button type="submit" class="btn btn-primary" id="paySet">保存数据</button>

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

        $("#paySet").click(function () {

            var index = layer.msg('数据操作中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=paySet",
                dataType: "json",
                data: {
                    epay_api: $("#epay_api").val(),
                    epay_id: $("#epay_id").val(),
                    epay_key: $("#epay_key").val()
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


                    


       