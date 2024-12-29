<?php


include('./head.php');

$thtime = date("Y-m-d") . ' 00:00:00';

$all_site = $DB->query("SELECT * from m_site WHERE 1")->rowCount(); //所有网站数量
$today_site = $DB->query("SELECT * from m_site WHERE date>='$thtime' ")->rowCount(); //今日建站数量

$all_user = $DB->query("SELECT * from m_user WHERE 1")->rowCount(); //所有用户数量
$today_user = $DB->query("SELECT * from m_user WHERE date>='$thtime' ")->rowCount(); //今日用户数量


$q = $DB->query("SELECT sum(money) from m_order where status = 1");//总收入
$rows = $q->fetch();
$all_money = $rows[0];
if ($all_money == null) {
    $all_money = "0.00";
}


$q = $DB->query("SELECT sum(money) from m_order where date>='$thtime' and status=1");//今日交易额
$rows = $q->fetch();
$today_money = $rows[0];
if ($today_money == null) {
    $today_money = "0.00";
}
$q = $DB->query("SELECT count(*) from m_order where date>='$thtime' and status=1");//今日订单数
$rows = $q->fetch();
$today_order = $rows[0];


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
                            <li class="breadcrumb-item active">后台首页</li>
                        </ol>
                    </div>
                    <h4 class="page-title">控制中心</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Campaign Sent">
                                    新增用户</h5>
                                <h3 class="my-2 py-1"><?php echo $today_user ?> 个</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="campaign-sent-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="New Leads">今日交易</h5>
                                <h3 class="my-2 py-1">￥ <?php echo $today_money ?> </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.38%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="new-leads-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->


            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Booked Revenue">
                                    今日建站</h5>
                                <h3 class="my-2 py-1"><?php echo $today_site ?> 个</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="booked-revenue-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


        <div class="row">

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Campaign Sent">
                                    总计用户</h5>
                                <h3 class="my-2 py-1"><?php echo $all_user ?> 个</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 3.27%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="campaign-sent-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="New Leads">总计交易</h5>
                                <h3 class="my-2 py-1">￥ <?php echo $all_money ?>  </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.38%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="new-leads-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->


            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Booked Revenue">
                                    总计建站</h5>
                                <h3 class="my-2 py-1"><?php echo $all_site ?> 个</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 11.7%</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <div id="booked-revenue-chart"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- content -->


    <?php
    include('./footer.php');
    ?>
