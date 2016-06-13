<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/css/popModal.css">
<style>
  #new-msg{font-size: 12px;
    color: magenta;}
</style>
<nav class="navbar navbar-default navbar-fixed-top" id='home_nav' role="navigation">
  <div class="home-fluid container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="navbar-logo" class="navbar-brand" href="#">迷宫</a>
    </div>
    <?php
      $user = $this->session->userdata('user');
    ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id='act-nav'>
        <li class=""><a href="/home/index">主页<span class="sr-only">(current)</span></a></li>
        <li class=""><a href="/diary/index">日记<span class="sr-only">(current)</span></a></li>
        <li class=""><a href="/heart/index">心情<span class="sr-only">(current)</span></a></li>
        <li class=""><a href="/friends/index">好友<span class="sr-only">(current)</span></a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right" >
        <li><span class="zySearch" id="zySearch"></span></li>
        <li><a href="#"><i class="icon-wrench"></i>工具箱</a></li>
        <li class="note-msg"><a href="javascript:;"><i class="icon-comment"></i>通知<span id="badge-msg" class="badge"></span></a></li>
        <li><span><img class="img-circle" src="<?php if($user['img_id']){echo $user['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>" height="50" width="50"/></span></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['name'] ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/set/index">个人设置</a></li>
            <li><a href="#">权限管理</a></li>
            <li><a href="/font/logout">退出</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="display:none">
  <div id="content-msg" >
    <div id="new-msg">
      <p>暂时没有新的消息</p>
    </div>
    <div class="popModal_footer">
      <button type="button" data-popModalBut="ok">ok</button>
      <button type="button" data-popModalBut="cancel">cancel</button>
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>public/js/popModal.js"></script>
<script type="text/javascript">

  $("#zySearch").zySearch({
    "width":"355",
    "height":"33",
    "parentClass":"pageTitle",
    "callback":function(keyword){
      console.info("搜索的关键字");
      console.info(keyword);
    }
  });

  $(function(){
    $('.note-msg').on("click",function(){
      //console.log($("#badge-msg").text());

        $('.note-msg').popModal({
          html : $('#content-msg'),
          placement : 'bottomLeft',
          showCloseBut : true,
          onDocumentClickClose : true,
          onOkBut : function()
          {
              msgSure();
          },
          onCancelBut : function(){},
          onLoad : function(){},
          onClose : function(){}
        });

    });

  });

  setInterval("checkMsg()",5000);
  //消息推送
  function checkMsg()
  {
    $.ajax({
      url:"/home/getMessage",
      type:"post",
      dataType: 'json',
      //data : {'email':email,'psw':psw},
      success: function(data){
        console.log(data);
        var html = '';
        var sum = data.data.sum;
        if( sum > 0 )
        {
          $("#badge-msg").text(sum);
          var org = '';
          var res = data['data']['res'];
          $.each(res,function(i,item)
          {
            if(item['type'] == 1)
            {
              org = "您有一位新粉丝";
            }else if(item['type'] == 2)
            {
              org = "您有一条新评论";
            }else
            {
              org = "您获得了好友的一个赞";
            }
             html+= '<p>'+org+'</p>';
          });
          $("#new-msg").html(html);
        }

      }
    });
  }

  function msgSure()
  {
    $.ajax({
      url:"/home/closeMessage",
      type:"post",
      dataType: 'json',
      //data : {'email':email,'psw':psw},
      success: function(data){
        console.log(data);
        if(data)
        {
          $("#new-msg").html('');
          $("#badge-msg").hide();
        }
        
      }
    });
  }



</script>