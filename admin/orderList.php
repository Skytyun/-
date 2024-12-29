<?php

include('./head.php');


$list = $DB->query("SELECT * FROM m_order  order by id asc")->fetchAll();
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
                            <li class="breadcrumb-item active">订单数据</li>
                        </ol>
                    </div>
                    <h4 class="page-title">订单数据</h4>
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
                                    <th class="all">充值编号</th>
                                    <th>本站编号</th>
                                    <th>用户</th>
                                    <th>日期</th>
                                    <th>金额</th>
                                    <th>支付方式</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($list as $res) {
                                    if ($res['type'] == 'qqpay') {
                                        $res['type'] = 'QQ支付';
                                    } elseif ($res['type'] == 'alipay') {
                                        $res['type'] = '支付宝支付';
                                    } else {
                                        $res['type'] = '微信支付';
                                    }
                                    $user = $DB->query("SELECT * FROM m_user where id={$res['uid']} limit 1")->fetch();

                                    if ($res['status'] == 1) {
                                        $res['status'] = "<span class='badge badge-success mb-3'>支付成功</span>";
                                    } else {

                                        $res['status'] = "<span class='badge badge-danger mb-3'>支付失败</span>";
                                    }

                                    echo '
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                    	' . $res['order_no'] . '
                                                        </td>
                                                        <td>
                                                    	' . $res['id'] . '
                                                        </td>
                                                        <td>
                                                    	' . $user['email'] . '
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
