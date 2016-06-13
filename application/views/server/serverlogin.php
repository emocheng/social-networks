<!DOCTYPE html>
<html>
<head>
<title>迷宫管理后台</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
</head>
<body>
	<script  src= "<?php echo base_url();?>public/js/jquery.min.js"></script> 
    <script src= "<?php echo base_url();?>public/js/bootstrap.min.js"></script>
    <script charset="GBK" language="javascript" src= "<?php echo base_url();?>public/js/common.js"></script>
    <div class="container" style="padding-top:100px">
<div class="row">
  <div class="col-md-3"></div>
  	<div class="col-md-6">
	    <!-- 注册开始 -->
	    <h1 style="text-align: center;">迷宫管理后台</h1>
		<form class="form-horizontal" action="" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="Email" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="psw" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    <div id='login' class="btn btn-default">登陆</div>
		    </div>
		  </div>
		</form>
	</div>
	<div class="col-md-3"></div>
	</div>
</div>
	<!-- 注册结束 -->

</body>
</html>