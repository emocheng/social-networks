<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>迷宫</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/home.css" />
	<meta name="format-detection" content="telephone=no">
	<!-- Style Sheet-->
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/homestyle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/prettyPhoto.css">
	<link href="<?php echo base_url();?>public/css/animate.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/images/ue_grid.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/images/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/logstyle.css" />

	<!-- favicon -->
	<style>
		body {
			padding-top: 0px;
		}
		.text-obj {width:50%;margin:0 auto;}
		.text1,.text2,.text4 {visibility:hidden;}
		.text1,.text2 ,.text4{color:#fff;color:#fff;}
		.text1 {margin:50px;text-align:center;font-size:30px;text-shadow:0.025em 0.025em 0.025em rgba(0, 0, 0, 0.8);}
		.text2 {font-family:microsoft yahei;font-size:14px;line-height:24px;text-shadow:0.1em 0.1em 0.1em rgba(0, 0, 0, 0.8)}
		.text4 {font-family:microsoft yahei;font-size:14px; margin-top: 10% ; line-height:24px;text-shadow:0.1em 0.1em 0.1em rgba(0, 0, 0, 0.8)}
	</style>
</head>
<body>


	<!-- HEADER 1 -->
	<div id="home" class="header-wrapper header-main header-top">
		<header>
			<div class="text-obj">
			<h1 class="text1"><strong>迷宫</strong></h1>
			<h2 class="text2">
				感觉人单身久了真的会得单身癌。如果有人稍微走入你的生活，就会有种生活节奏被打乱的不安感。
				尤其是在需要牺牲自己的时间与喜好去取悦另一个人的时候。尤其是不想回答你到底爱不爱我这种问题。

			</h2>
			<h2 class="text4">失去的岂止是美好,Lost is more than beautiful --断水流.大师兄</h2>
			</div>
			<div>
				<a href="/reg/index?action=reg"  class="button yellow">注册</a>
				<a href="/reg/index?action=login" class="button blue openlogin">登录</a>
			</div>
			<div>
				<a href="/timeline/index" class="button" style="background-color: springgreen;padding: 10px; border-radius: 12px;color: #fff;">更新日志</a>

			</div>
		</header>
	</div>
	<!-- HEADER 1 -->
	<div class="clear"></div>
		<script src="<?php echo base_url();?>public/js/jquery-1.9.1.min.js"></script>
		<script src= "<?php echo base_url();?>public/js/bootstrap.min.js"></script>
		<script src= "<?php echo base_url();?>public/js/home.js"></script>
		<script src="<?php echo base_url();?>public/js/jquery.lettering.js"></script>
		<script src="<?php echo base_url();?>public/js/jquery.textillate.js"></script>
		<script language="javascript" src="<?php echo base_url();?>public/js/jquery.easing.min.js"></script>
		<script language="javascript" src="<?php echo base_url();?>public/js/custom.js"></script>
		<script>
			$(function () {
				$('.text1').textillate({ in: { effect: 'rollIn' } });
				$('.text2').textillate({
					initialDelay: 1000, 	//设置动画开始时间
					in: { effect: 'flipInX'	//设置动画名称
					}
				});
				$('.text4').textillate({
					initialDelay: 9000,
					in: { effect: 'flipInX' }
				});
			})

		</script>
</body>
</html>
