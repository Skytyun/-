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

                            <li class="breadcrumb-item active">网站设置</li>
                        </ol>
                    </div>
                    <h4 class="page-title">网站设置</h4>
                </div> <!-- end page-title-box -->
            </div> <!-- end col-->
        </div>
        <!-- end page title < ?php echo $conf['api_url'] ?>-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">网站设置</h4>
                        <p class="text-muted font-14 mb-3">
                            Typeahead.js is a fast and fully-featured autocomplete library.
                        </p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>主站系统域名</label>
<input type="text" class="form-control" maxlength="50" data-toggle="maxlength" data-placement="top"  
placeholder="填写主站授权域名,需要带http" id="api_url" value="http://feelweb.cn" readonly="">

                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>通信secretId</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" placeholder="请从主站菜单[账号安全]中获取" id="api_secret_id"
                                           value="<?php echo $conf['api_secret_id'] ?>"><a href="http://feelweb.cn/index/center/mySafe.html">点击获取通信secretId<a/>
                                </div>
                            </div> <!-- end col -->


                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>通信secretKey</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" placeholder="请从主站菜单[账号安全]中获取" id="api_secret_key"
                                           value="<?php echo $conf['api_secret_key'] ?>"><a href="http://feelweb.cn/index/center/mySafe.html">点击获取通信secretKey<a/>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>网站名称</label>
                                    <input type="text" class="form-control" maxlength="100" data-toggle="maxlength"
                                           data-placement="top" id="title" value="<?php echo $conf['title'] ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>网站关键词</label>
                                    <input type="text" class="form-control" maxlength="100" data-toggle="maxlength"
                                           data-placement="top" id="keywords" value="<?php echo $conf['keywords'] ?>">
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>网站描述语</label>
                                    <input type="text" class="form-control" maxlength="200" data-toggle="maxlength"
                                           data-placement="top" id="desc" value="<?php echo $conf['desc'] ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>客服QQ</label>
                                    <input type="text" class="form-control" maxlength="11" data-toggle="maxlength"
                                           data-placement="top" id="kfqq" value="<?php echo $conf['kfqq'] ?>">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label>官方群链接</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" id="qqun" value="<?php echo $conf['qqun'] ?>">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>首页模板</label>
                                    <select class="form-control select2" data-toggle="select2" id="template">
                                        <option value="<?php echo $conf['template'] ?>"><?php echo $conf['template'] ?></option>
                                        <?php
                                        $mblist = Template::getList($conf['template']);
                                        foreach ($mblist as $row) {
                                            ?>
                                            <option value="<?php echo $row ?>"><?php echo $row ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>网站创建日期</label>
                                    <input type="date" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" id="create" value="<?php echo $conf['create'] ?>">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label>价格上调比例</label>
                                    <input type="text" class="form-control" maxlength="50" data-toggle="maxlength"
                                           data-placement="top" id="rate" value="<?php echo $conf['rate'] ?>">
                                    <pre>销售价格为:原价*价格上调比例(比例需大于1,否则会亏本)</pre>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div class="form-group mb-3">
                                    <label for="example-textarea">网站公告</label>
                                    <textarea class="form-control" id="notice"
                                              rows="10"><?php echo $conf['notice'] ?></textarea>
                                </div>
                            </div>


                        </div>
                        <!-- end row -->

                        <button type="submit" class="btn btn-primary" id="siteSet">保存数据</button>

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

        $("#siteSet").click(function () {

            var index = layer.msg('数据处理中···', {icon: 16, shade: 0.01, time: 9999999});
            $.ajax({
                type: "post",
                url: "ajax.php?act=siteSet",
                dataType: "json",
                data: {
                    api_url: $("#api_url").val(),
                    api_secret_id: $("#api_secret_id").val(),
                    api_secret_key: $("#api_secret_key").val(),
                    title: $("#title").val(),
                    keywords: $("#keywords").val(),
                    desc: $("#desc").val(),
                    kfqq: $("#kfqq").val(),
                    template: $("#template").val(),
                    qqun: $("#qqun").val(),
                    notice: $("#notice").val(),
                    create: $("#create").val(),
                    rate: $("#rate").val()
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
                    layer.alert('网络连接异常！');
                }
            });
        });

    </script>


