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
                            <li class="breadcrumb-item active">在线充值</li>
                        </ol>
                    </div>
                    <h4 class="page-title">在线充值</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">在线充值</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>我的余额</label>
                                    <input type="text" class="form-control" maxlength="25" data-toggle="maxlength"
                                           data-placement="top" value="￥  <?php echo $userrow['money'] ?>" readonly>
                                </div>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>充值金额</label>
                                    <input type="text" class="form-control" maxlength="3" data-toggle="maxlength"
                                           data-placement="top" id="account">
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>支付方式</label>
                                    <button type="submit" class="btn btn-default" id="buy_alipay"><img
                                                src="../assets/images/ico/alipay.ico" class="logo">支付宝
                                    </button>&nbsp;<button type="submit" class="btn btn-default" id="buy_wxpay"><img
                                                src="../assets/images/ico/wechat.ico" class="logo">微信
                                    </button>&nbsp;<button type="submit" class="btn btn-default" id="buy_qqpay"><img
                                                src="../assets/images/ico/qqpay.ico" class="logo">QQ
                                    </button>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->


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
        $("#buy_alipay").click(function () {
            dopay('alipay')
        });
        $("#buy_qqpay").click(function () {
            dopay('qqpay')
        });
        $("#buy_wxpay").click(function () {
            dopay('wxpay')
        });
        $("#buy_tenpay").click(function () {
            dopay('tenpay')
        });


        function dopay(method) {
            var index = layer.msg('数据加载中', {time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=pay",
                dataType: "json",
                data: {
                    method: method,
                    account: $("#account").val()
                },
                success: function (data) {
                    layer.close(index);
                    if (data.code == 1) {
                        layer.msg(data.msg, {icon: 1, time: 1000, shade: 0.4}, function () {
                            window.location.href = '../pay/submit.php?type=' + data.type + '&orderid=' + data.order_no;
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
    </script>   