<!DOCTYPE html>
<html>
<head>
<title>迷宫-注册</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/jq22.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/layer.css">
	<style>
		.index-tab-navs {
			margin-bottom: 10px;
			font-size: 18px;
			text-align: center;
		}
		.navs-slider {
			position: relative;
			display: inline-block;
		}
		.index-tab-navs a.active {
			opacity: 1;
			-ms-filter: "alpha(Opacity=100)";
			color: #0f88eb;
		}
		.index-tab-navs a {
			float: left;
			width: 4em;
			line-height: 35px;
			opacity: .7;
			-ms-filter: "alpha(Opacity=70)";
			-webkit-transition: opacity .15s,color .15s;
			transition: opacity .15s,color .15s;
		}
		.index-tab-navs .navs-slider .navs-slider-bar {
			position: absolute;
			left: 0;
			bottom: 0;
			margin: 0 .8em;
			width: 2.4em;
			height: 2px;
			background: #0f88eb;
			-webkit-transition: left .15s ease-in;
			transition: left .15s ease-in;
		}
	</style>
</head>
<body>
	<script  src= "<?php echo base_url();?>public/js/jquery.min.js"></script> 
    <script src= "<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src= "<?php echo base_url();?>public/js/layer.js"></script>
	<!-- begin -->
	<div id="login">
		<div class="wrapper">
			<div class="login">
				<form action="" method="post" class="container offset1 loginform">
					<div id="owl-login">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad">
						<input type="hidden" name="_csrf" value="9IAtUxV2CatyxHiK2LxzOsT6wtBE6h8BpzOmk=">
						<div class="index-tab-navs">
							<div class="navs-slider" data-active-index="0">
								<a href="#signup" class="active">注册</a>
								<a href="#signin">登录</a>
								<span class="navs-slider-bar"></span>
							</div>
						</div>
						<div class="login_tab">
							<div class="control-group">
								<div class="controls">
									<label for="email" class="control-label fa fa-envelope"></label>
									<input id="reg_email" type="email" name="email" placeholder="输入电子邮箱" tabindex="1" autofocus="autofocus" class="form-control input-medium">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<label for="password" class="control-label fa fa-asterisk"></label>
									<input id="reg_psw" type="password" name="password" placeholder="输入密码" tabindex="2" class="form-control input-medium">
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label for="password" class="control-label fa fa-asterisk"></label>
									<input id="rep_reg_psw" type="password" name="password" placeholder="再输一次密码" tabindex="2" class="form-control input-medium">
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<label for="img-code" class="control-label fa fa-asterisk"></label>
									<input id="img-code" type="text"  name="img-code" placeholder="输入验证码" tabindex="2" class="form-control input-medium" style="display: initial;width: 75%;">
									<img src="/reg/get_code" alt="看不清,点击更换" style="padding-top: 6px;float: right;" onclick="this.src='/reg/get_code?d='+Math.random();" >
								</div>
							</div>
						</div>
						<div class="login_tab" style="display:none">
							<div class="control-group">
								<div class="controls">
									<label for="email" class="control-label fa fa-envelope"></label>
									<input id="login_email" type="email" name="email" placeholder="输入电子邮箱" tabindex="1" autofocus="autofocus" class="form-control input-medium">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<label for="password" class="control-label fa fa-asterisk"></label>
									<input id="login_psw" type="password" name="password" placeholder="输入密码" tabindex="2" class="form-control input-medium">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div id="login_submit" tabindex="4" class="btn btn-primary" style="display:none">登录</div>
						<div id="reg_submit" tabindex="4" class="btn btn-primary">注册</div>
					</div>
				</form>
			</div>
		</div>

		<script>
			$(function() {
				var action = <?php echo $action ?>;

				if(action == 1)
				{
					changTab(0);	
				}
				else
				{
					changTab(1);
				}

				function changTab(i)
				{
					$(".navs-slider a").eq(i).addClass("active");
					$(".navs-slider a").eq(i).siblings().removeClass("active");
					if(i==0)
					{
						$(".navs-slider-bar").css("left",0);
						$(".login_tab").eq(0).show();
						$(".login_tab").eq(1).hide();

						$("#login_submit").hide();
						$("#reg_submit").show();
					}
					else
					{
						$(".navs-slider-bar").css("left","4em");
						$(".login_tab").eq(1).show();
						$(".login_tab").eq(0).hide();

						$("#login_submit").show();
						$("#reg_submit").hide();
					}

				}

				$(".navs-slider a").click(function()
				{
					$(this).addClass("active");
					$(this).siblings().removeClass("active");
					if($(this).index() == 0)
					{
						$(".navs-slider-bar").css("left",0);
						$(".login_tab").eq(0).show();
						$(".login_tab").eq(1).hide();

						$("#login_submit").hide();
						$("#reg_submit").show();
					}
					else
					{
						$(".navs-slider-bar").css("left","4em");
						$(".login_tab").eq(1).show();
						$(".login_tab").eq(0).hide();

						$("#login_submit").show();
						$("#reg_submit").hide();
					}

					
				})

				$('#login #rep_reg_psw').focus(function() {
					$('#owl-login').addClass('password');
				}).blur(function() {
					$('#owl-login').removeClass('password');
				});

				$('#login #reg_psw').focus(function() {
					$('#owl-login').addClass('password');
				}).blur(function() {
					$('#owl-login').removeClass('password');
				});

				$('#reg_submit').click(function(){
					var Email = $('#reg_email').val();
					isValidMail(Email);
					var regPsw = $('#reg_psw').val();
					var repRegPsw = $('#rep_reg_psw').val();
					var imgCode = $("#img-code").val();
					if(!Email || !regPsw || !repRegPsw)
					{
						layer.msg('填写信息不完整');
						return false;
					}
					if( regPsw.length < 8)
					{
						layer.msg('密码长度要大于8个字符');
						return false;
					}
					if(regPsw != repRegPsw)
					{
						layer.msg('密码不一致');
						return false;
					}

					$.ajax({
						url:"/reg/ajaxReg",
						type:"post",
						dataType: 'json',
						data : {'Email':Email,
							'regPsw':regPsw,
							'repRegPsw':repRegPsw,
							'imgCode':imgCode
						},
						success: function(data){
							console.log(data);
							if(data.code==-4)
							{
								layer.msg("邮箱已被注册");

							}else if(data.code==-5)
							{
								layer.msg("验证码错误")
							}else if(data.code==1)
							{
								window.location.href="/font/index";
							}else
							{
								layer.msg("出现错误");
							}
						}
					});
				});

				$("#login_submit").click(function(){
					var email = $("#login_email").val();
					var psw = $("#login_psw").val();
					if(!email || !psw)
					{
						return false;
					}
					$.ajax({
						url:"/font/ajaxLogin",
						type:"post",
						dataType: 'json',
						data : {'email':email,
							'psw':psw,
						},
						success: function(data){
							console.log(data);
							if(data.code == -2)
							{	
								layer.msg('密码错误');
							}else if(data.code == -1)
							{
								layer.msg('信息不完整');
							}else{
								window.location.href="/home/index";
							}
						}
					});
				})
			});

			function isValidMail(TextVal) {

				//var TextVal = document.getElementById("TextBox1").value;

				var Regex = /^(?:\w+\.?)*\w+@(?:\w+\.)*\w+$/;

				if (Regex.test(TextVal)){

					return true;

				}

				else {

					if (TextVal == "") {

						layer.msg("请输入电子邮件地址！！");

						return false;

					}

					else {

						layer.msg("请输入正确的邮箱地址");

						document.getElementById("TextBox1").value = "";

						return false;

					}

				}

			}
		</script>
	</div>
	<!-- end -->

</body>
</html>