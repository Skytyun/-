<?php

include('../app/common.php');
if ($islogin == 1) {
} else exit("<script language='javascript'>window.location.href='./login.php';</script>");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>管理系统-<?php echo $conf['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css"/>

    <!-- third party css -->
    <link href="../assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

</head>


<body>

<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="index.php" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="../assets/images/logo-light.png" alt="" height="16">
                    </span>
            <span class="topnav-logo-sm">
                        <img src="../assets/images/logo_sm.png" alt="" height="16">
                    </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" id="topbar-notifydrop"
                   role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg"
                     aria-labelledby="topbar-notifydrop">

                    <!-- item-->
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="javascript: void(0);" class="text-dark">
                                            <small>关闭</small>
                                        </a>
                                    </span>未读消息
                        </h5>
                    </div>

                    <div class="slimscroll" style="max-height: 230px;">


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">有你的生活更美好
                                <small class="text-muted">2025-02-02</small>
                            </p>
                        </a>


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">系统正常运行中
                                <small class="text-muted">2025-01-21</small>
                            </p>
                        </a>


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">建站商城上线啦
                                <small class="text-muted">2025-01-01</small>
                            </p>
                        </a>
                    </div>

            </li>

            <li class="dropdown notification-list">
                <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                   href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="../assets/images/users/user-img.svg" alt="user-image" class="rounded-circle">
                            </span>
                    <span>
                                <span class="account-user-name">API系统</span>
                                <span class="account-position">管理员</span>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                     aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Topbar -->


<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="leftbar-user">
                <a href="#">
                    <img src="../assets/images/users/user-img.svg" alt="user-image" height="42"
                         class="rounded-circle shadow-sm">
                    <span class="leftbar-user-name">API分站管理员</span>
                </a>
            </div>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav">

                <li class="side-nav-title side-nav-item">菜单栏</li>

                <li class="side-nav-item">
                    <a href="index.php" class="side-nav-link">
                        <i class="dripicons-meter"></i>
                        <span class="badge badge-success float-right">i</span>
                        <span> 控制台 </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="dripicons-view-apps"></i>
                        <span> 系统设置 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="siteSet.php">网站设置</a>
                        </li>
                        <li>
                            <a href="paySet.php">支付设置</a>
                        </li>
                        <li>
                            <a href="cache.php">缓存设置</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="dripicons-view-apps"></i>
                        <span> 数据管理 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="userList.php">用户数据</a>
                        </li>
                        <li>
                            <a href="siteList.php">建站数据</a>
                        </li>
                        <li>
                            <a href="orderList.php">订单数据</a>
                        </li>
                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="update.php" class="side-nav-link">
                        <i class="dripicons-cloud "></i>
                        <span class="badge badge-danger float-right">NEW</span>
                        <span> 系统更新 </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="../user" class="side-nav-link">
                        <i class="dripicons-reply-all"></i>
                        <span class="badge badge-light float-right">返回</span>
                        <span> 返回前台 </span>
                    </a>
                </li>


            </ul>


            <div class="clearfix"></div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->


        <!-- Right Sidebar -->
        <!-- Right Sidebar -->
        <div class="right-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">多功能平台</h5>
            </div>

            <div class="slimscroll-menu rightbar-content">

                <!-- Settings -->
                <hr class="mt-0"/>
                <h5 class="pl-3">Basic Settings</h5>
                <hr class="mb-0"/>

                <div class="p-3">
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="notifications-check" checked>
                        <label class="custom-control-label" for="notifications-check">建站商城</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="api-access-check" checked>
                        <label class="custom-control-label" for="api-access-check">在线充值</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="auto-updates-check" checked>
                        <label class="custom-control-label" for="auto-updates-check">网站管理</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="online-status-check" checked>
                        <label class="custom-control-label" for="online-status-check">API 控制</label>
                    </div>

                </div>


            </div>
        </div>

        <!-- /Right-bar -->

