<?php


include('./head.php');

$site = $DB->query("SELECT * FROM m_site WHERE uid={$userrow['id']}")->rowCount();


$nowDate = date("Y-m-d");
$cteate = floor((strtotime($nowDate) - strtotime($conf['create'])) / 86400);

?>


<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<!-- Start Content-->


<div class="content-page">
    <div class="content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">

                    </div>
                    <h4 class="page-title">个人主页</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                                       <span class="float-left m-2 mr-4">
                                           <img src="../assets/images/users/user-img.svg" style="height: 100px;" alt=""
                                                class="rounded-circle img-thumbnail">
                                       </span>
                        <div class="media-body">

                            <h4 class="mt-1 mb-1">每日一语</h4>
                            <p class="font-13"><span id="jinrishici-sentence">正在加载今日诗词....</span></p>


                        </div>
                        <!-- end media-body-->
                    </div>
                    <!-- end card-body-->
                </div>
            </div> <!-- end col -->


            <div class="col-lg-8 col-lg-14">
                <div class="card">
                    <div class="card-body">

                        <div class="media-body">

                            <?php echo $conf['notice']; ?>

                        </div>
                        <!-- end media-body-->
                    </div>
                    <!-- end card-body-->
                </div>
            </div> <!-- end col -->


        </div>
        <!-- end row-->

        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-currency-btc widget-icon bg-danger rounded-circle text-white"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Revenue">Revenue</h5>
                        <h3 class="mt-3 mb-3"> <?php echo $site ?> 个</h3>
                        <p class="mb-0 text-muted">
                                           <span class="badge badge-info mr-1">
                                               <i class="mdi mdi-arrow-up-bold"></i> 7.00%</span>
                            <span class="text-nowrap">旗下网站</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Growth">Growth</h5>
                        <h3 class="mt-3 mb-3"><?php echo $userrow['money'] ?> 元</h3>
                        <p class="mb-0 text-muted">
                                           <span class="text-success mr-2">
                                               <i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                            <span class="text-nowrap">旗下余额</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat bg-success text-white">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Sites</h6>
                        <h3 class="mt-3 mb-3"> 99 个 </h3>
                        <p class="mb-0">
                                           <span class="badge badge-light-lighten mr-1">
                                               <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                            <span class="text-nowrap">商城网站</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat bg-primary text-white">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                        </div>
                        <h5 class="font-weight-normal mt-0" title="Revenue">Revenue</h5>
                        <h3 class="mt-3 mb-3 text-white"><?php echo $cteate ?> 天</h3>
                        <p class="mb-0">
                                           <span class="badge badge-info mr-1">
                                               <i class="mdi mdi-arrow-up-bold"></i> 17.26%</span>
                            <span class="text-nowrap">运行天数</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- content -->


    <?php
    include('./footer.php');
    ?>

    <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>