<?php
if(!defined('IN_CRONLITE'))exit();

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<title><?php echo $conf['title']?></title>
<meta name="keywords" content="<?php echo $conf['keywords']?>">
<meta name="description" content="<?php echo $conf['desc']?>">
<link href="<?php echo STATIC_ROOT?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_ROOT?>css/index1200.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_ROOT?>css/index960.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_ROOT?>css/index720.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo STATIC_ROOT?>css/aos.css">
<script src="//cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo STATIC_ROOT?>js/aos.js"></script>
<script src="<?php echo STATIC_ROOT?>js/main.js"></script>
<!--[if lt IE 9]>
  <script src="//cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<!--头-开始-->
    <div class="head backFFF">
    	<div class="headK">
    	   <div class="Logo fl"> <img height="60" src="assets/images/logo.png"  /></div>
            <div class="MenuPC fr">
      		<!--	<a href="/user/reg.php" class="hdReg fr" style="float: right">注册</a>
                <a href="/user/" class="hdLog fr" style="float: right">登录</a>-->

                <a href="/user/reg.php" class="MenuA fl" style="float: right">注册</a>
                <a href="/user/" class="MenuA fl" style="float: right">登录</a>
            	<a href="/" class="MenuA backB1 MenuAo fl" style="float: right">首页</a></a>

            </div>
            <div class="hd_nav fr"><i></i></div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="wap_nav">
        <div class="wap_navK">
            <a href="/" class="">首页</a>
            <a href="/user/siteShop.php" class="">一键建站</a>
            <a href="/user/reg.php" class="">注册</a>
            <a href="/user/" class="">登录</a>
        </div>
    </div>
    
    
    
    
    
    <div id="index" style="display: block">
<div class="bannerK">
    <div class="banner">
    	<div class="banNr" data-aos="fade-right" aos-delay="50">
        	<div class="banNrT"><?php echo $conf['sitename']?></div>
            <p>不懂设计、不懂编程，在线制作响应式网站。<br/>动动鼠标、想改就改、自由添加、支持深度个性化定制，一键建站</p>
            <a href="/user/" class="ButAN backB1">前往建站</a>
        </div>
    </div>
    <div class="Title">
    	<p>服务项目优势</p>
        <span>CONSIGNMENT SERVICE ITEMS</span>
        <i></i>
    </div>
    <div class="IndIte" data-aos="fade-up" aos-delay="50">
    	<div class="IndIteK fl"><div class="IndIteI"><img src="<?php echo STATIC_ROOT?>picture/01.png" /></div><p>零配置网站</p></div>
        <div class="IndIteK fl"><div class="IndIteI"><img src="<?php echo STATIC_ROOT?>picture/02.png" /></div><p>响应式网站</p></div>
        <div class="IndIteK fl"><div class="IndIteI"><img src="<?php echo STATIC_ROOT?>picture/03.png" /></div><p>全球部署网站</p></div>
        <div class="IndIteK fl"><div class="IndIteI"><img src="<?php echo STATIC_ROOT?>picture/04.png" /></div><p>伪静态网站</p></div>
        <div class="clear"></div>
    </div>
    
    


    
    <div class="Title">
    	<p>超多源码站点源码</p>
        <span>CHANNEL OF PAYMENT</span>
        <i></i>

        <div class="divcss5"><img href="/user" src="../assets/images/001.png"</div> 
    </div>
     </div>
    <div class="Title">
    	<p>平台功能</p>
        <span>PLATFORM FUNCTION</span>
        <i></i>
    </div>
    <div class="IndPlaK" >
    	<div class="IndPlaL fl" data-aos="fade-right" aos-delay="50">
        	<div class="IndPlaLT">01.无需代码，可以亲自设计网站</div>
            <div class="IndPlaLn">
            	<div class="IndPlaLz backB1 fl">A</div>
                <div class="IndPlaLr fr">
                	<p>模式1.用户自用</p><span>操作自由，网站升级改版不操心</span>
                </div><div class="clear"></div>
            </div>
            <div class="IndPlaLn">
            	<div class="IndPlaLz backB1 fl">B</div>
                <div class="IndPlaLr fr">
                	<p>模式2.网站代理</p><span>花更少的钱，做更漂亮的网站
</span>
                </div><div class="clear"></div>
            </div>
        </div>
        <div class="IndPlar fr" data-aos="fade-left" aos-delay="50">
        	<img src="<?php echo STATIC_ROOT?>picture/indpic01.png" />
        </div><div class="clear"></div>
    </div>
    <div class="IndPlaS" data-aos="fade-down" aos-delay="50">
    	<div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl01.png" height="100%" /></div>
            <div class="IndPlaKt">极简使用</div><p>七行代码，极速完成，一键建站 简洁的操作界面易于使用</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl02.png" height="100%" /></div>
            <div class="IndPlaKt">灵活便利</div><p>产品服务灵活组合 满足企业多元化业务需求</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl03.png" height="100%" /></div>
            <div class="IndPlaKt">大数据</div><p>运用交易数据分析功能 了解网站运营状况</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl04.png" height="100%" /></div>
            <div class="IndPlaKt">安全稳定</div><p>平台运行于信息计算中心 多备份容灾保障</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl05.png" height="100%" /></div>
            <div class="IndPlaKt">不介入资金流</div><p>只负责交易处理不参与资金清算 保障您的网站安全</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl06.png" height="100%" /></div>
            <div class="IndPlaKt">安全密码</div><p>可自行开关 为你的网站安全保驾护航</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl07.png" height="100%" /></div>
            <div class="IndPlaKt">增值服务</div><p>提供金融产品及技术服务 帮助企业整合互联网金融</p>
        </div>
        <div class="IndPlaC fl">
        	<div class="IndPlaI"><img src="<?php echo STATIC_ROOT?>picture/indpl08.png" height="100%" /></div>
            <div class="IndPlaKt">自助服务</div><p>同时平台全面提供7*24小时客户服务，保障客户问题随时得到处理解决</p>
        </div>
        <div class="clear"></div>
        <a href="javascript:;" class="ButAN ButPla backB1" data-aos="fade-down" aos-delay="50">更多功能等你来发掘</a>
    </div>

    <div class="Title">
    	<p>核心优势</p>
        <span>CHANNEL OF PAYMENT</span>
        <i></i>
    </div>
    <div class="IndCha">
    	<div class="IndChaZ fl" data-aos="fade-right" aos-delay="50">
        	<div class="IndChaZt">服务器安全</div>
            <p>采用群集服务器，防御高，故障率低，无论用户身在何处，均能获得流畅安全可靠的体验</p>
            <a href="javascript:;" class="ButAN backB1">立即体验</a>
        </div>
        <div class="IndChaP fr" data-aos="fade-left" aos-delay="60"><img src="<?php echo STATIC_ROOT?>picture/indpic02.png" width="100%" /></div>
        <div class="clear"></div>
    </div>
    <div class="IndCha">
    	<div class="IndChaP fl" data-aos="fade-right" aos-delay="60"><img src="<?php echo STATIC_ROOT?>picture/indpic03.png" width="100%" /></div>
    	<div class="IndChaZ fr" data-aos="fade-left" aos-delay="50">
        	<div class="IndChaZt">站点保障</div>
            <p>商户的网站，全部添加防火墙，专业运维24小时处理，您的网站安全将得到充分的保障。</p>
            <a href="javascript:;" class="ButAN backB1">立即体验</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="IndCha">
    	<div class="IndChaZ fl" data-aos="fade-right" aos-delay="50">
        	<div class="IndChaZt">专属客服</div>
            <p>专业客服团队，专属客服一对一贴心服务，7*24小时全天候在线为你解答。</p>
            <a href="javascript:;" class="ButAN backB1">立即体验</a>
        </div>
        <div class="IndChaP fr" data-aos="fade-left" aos-delay="50"><img src="<?php echo STATIC_ROOT?>picture/indpic04.png" width="100%" /></div>
        <div class="clear"></div>
    </div>
    <div class="IndCha">
    	<div class="IndChaP fl" data-aos="fade-right" aos-delay="50"><img src="<?php echo STATIC_ROOT?>picture/indpic05.png" width="100%" /></div>
    	<div class="IndChaZ fr" data-aos="fade-left" aos-delay="50">
        	<div class="IndChaZt">代理低价</div>
            <p>直接对接官方，直接去掉中间商的差价，因此我们可以给商户提供更实惠建站服务</p>
            <a href="javascript:;" class="ButAN backB1">立即体验</a>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<
<div class="footer">
    <div class="footN">
        <div class="footF fl">
        	<div class="footFk"><i class="footF1 fl"></i>0746-123456789</div>
            <div class="footFk"><i class="footF2 fl"></i><a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['kfqq']?>&Site=pay&Menu=yes" target="_blank"><?php echo $conf['kfqq']?></a></div>
            
        </div>
        <div class="footR fl">
            <div class="footRT">快速通道</div>
            <a href="/user/" style="display:block; width:70px" target="_blank">商户登录</a>
            <a href="/user/reg.php" style="display:block; width:70px" target="_blank">商户注册</a>
           
        </div>
        <div class="footR fl">
            <div class="footRT">更多内容</div>
              <a href="#" style="display:block; width:70px" target="_blank">帮助中心</a>
              <a href="#" style="display:block; width:70px" target="_blank">开发文档</a>
        </div>
        <div class="footR fl">
            <div class="footRT">服务协议</div>
            <a href="#" style="display:block; width:70px" target="_blank">服务协议</a>
            <a href="#" style="display:block; width:70px" target="_blank">法律声明</a>
        </div>        <div class="clear"></div>
    </div>
    <div class="footC">
    	<p><?php echo $conf['footer']?></p>
        <p>&nbsp;&nbsp;&copy;2021-2024&nbsp;<?php echo $conf['title']; ?>All Rights Reserved.</p>
	</div>
</div> 
<!--尾-结束-->
<a href="#0" class="cd-top">Top</a>
<script type="text/javascript">
AOS.init({
	easing: 'ease-in',
	duration: 800,
	disable: 'mobile'
});
jQuery(document).ready(function($) {

})
</script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	//下拉
	$('.HelpNs').click(function(){
	  if($(this).find('.HelpA').is(':visible')){
		$(this).find('.HelpA').slideUp(100);
	  }else{
		$(this).find('.HelpA').slideDown(200);
	  }
	});

	$('.helpc').click(function(){
	  $("#index").hide();
	  $("#faq").show();
	});
})

</script>
<style type="text/css">
.divcss5 img{
    width: 90%;
    padding-top: 3%;
} 
</style>
</body>
</html>
