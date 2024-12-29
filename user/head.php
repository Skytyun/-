<?php
include('../app/common.php');
if ($islogin2 == 1) {
} else exit("<script language='javascript'>window.location.href='./login.php';</script>");

if ($userrow['status'] == 0) {
    setcookie("user_token", " ", time() - 3600 * 12, '/');
    echo "<script type='text/javascript'>layer.alert('您好,该账号已被封禁,暂时无法使用',{icon:2},function(){window.location.href='../'});</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title><?php echo $conf['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <a href="/" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="../assets/images/logo2.png" alt="" height="50">
                    </span>
            <span class="topnav-logo-sm">
                        <img src="../assets/images/logo2.png" alt="" height="50">
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
                                <small class="text-muted">2024-02-02</small>
                            </p>
                        </a>


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">系统正常运行中
                                <small class="text-muted">2024-01-21</small>
                            </p>
                        </a>


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">建站商城上线啦
                                <small class="text-muted">2024-01-01</small>
                            </p>
                        </a>
                    </div>


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
                                <span class="account-user-name">建站用户</span>
                                
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                     aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <a href="siteList.php">我的网站</a><br>
                            <a href="siteShop.php">建站商城</a><br>
                        <a href="info.php">修改资料</a>
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
                    <span class="leftbar-user-name">编号:<?php echo $userrow['id'] ?></span>
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
                        <i class="dripicons-copy"></i>
                        <span> 商城系统 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="siteShop.php">建站商城</a>
                        </li>

                    </ul>
                </li>

                <li class="side-nav-title side-nav-item mt-1">记录类</li>

                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="dripicons-briefcase"></i>
                        <span> 个人管理 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="orderList.php">我的订单</a>
                        </li>
                        <li>
                            <a href="siteList.php">我的网站</a>
                        </li>
                        <li>
                            <a href="info.php">修改资料</a>
                        </li>

                    </ul>
                </li>

                <li class="side-nav-item">
                    <a href="pay.php" class="side-nav-link">
                        <i class="dripicons-heart"></i>
                        <span class="badge badge-light float-right">Pay</span>
                        <span> 在线充值 </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="javascript:logout()" class="side-nav-link">
                        <i class="dripicons-reply"></i>
                        <span class="badge badge-light float-right">OUT</span>
                        <span> 退出系统 </span>
                    </a>
                </li>

            </ul>


            <div class="clearfix"></div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->


        <!-- Right Sidebar -->
        <!--div class="right-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">多功能平台</h5>
            </div>

            <div class="slimscroll-menu rightbar-content">

                <!-- Settings >
                <hr class="mt-0"/>
                <h5 class="pl-3">Basic Settings</h5>
                <hr class="mb-0"/>

                <!--div class="p-3">
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
        </div-->


        <div class="rightbar-overlay"></div>
        <!-- /Right-bar -->
        <script>
            function logout() {
                var ii = layer.msg('正在退出', {icon: 16, time: 0});
                $.ajax({
                    type: "get",
                    url: "auth.php?act=logout",
                    dataType: 'json',
                    success: function (data) {
                        layer.close(ii);
                        if (data.code == 1) {
                            layer.msg(data.msg, {icon: 1, time: 2000, shade: 0.4}, function () {
                                location.href = './login.php';
                            });

                        }
                    }
                });
            }
        </script>
