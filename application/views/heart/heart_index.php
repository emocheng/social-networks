<div class="wapper">
<div id="content" class="maze-content clr">
	<div class="ace_mian">
		<div>
			<!-- 心情开始 -->
		    <div class="say_main">
			  	<div id='say_heart' class="jumbotron">
				  <form>
					  <div class="form-group">
					    <label for="exampleInputEmail1"><i class="icon-edit" style="color:#4f8ef7"></i>发表一篇心情吧</label>
						<textarea class="form-control" rows="3" id='heart_content'></textarea>					  </div>
			 		  <div class="dropdown" id="ath">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    权限
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="#">自己可见</a></li>
						    <li><a href="#">好友可见</a></li>
						    <li><a href="#">所有人可见</a></li>
						  </ul>
					 </div>
 					 <div id="post_heart" class="btn btn-default">发表</div>

					 <div class="clear"></div>
				 </form>
				</div>
				<div class="clear"></div>
				<?php if(isset($heart_list) && !empty($heart_list)){ ?>
				<?php foreach ($heart_list as $v): ?>
				<div id="feed_540139" class="ty-post-item" data-feed-id="540139" data-operation="2" style="width:90%"> 
		           <div class="ty-post-item-head "> 
		            <a href="/user/461288"> <img class="ty-post-item-avater" src="<?php if($user_info['img_id']){echo $user_info['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>"/> 
                    <span class="ty-post-item-username"><?php if($user_info['name']){echo $user_info['name'];}else{echo '火星用户';} ?></span> </a> 
		            <div class="ty-post-item-tag ty-undefined"> 
		             <i class="ty-icon-logo"></i> 
		             <a href="/user/461288#155775" class="ty-post-tag-text ty-white" target="_blank">来自我的心情</a> 
		            </div> 
		           </div> 
		           <div class="ty-post-item-body body-content "> 
		            <p class="ty-post-item-word"> <?php echo $v['content']; ?> </p> 
		           </div> 
		           <div class="ty-post-item-foot"> 
		            <span class="ty-post-item-time ty-left"><?php echo date("Y-m-d H:i:s", $v['create_time']); ?></span> 
		            <div class="ty-post-item-operate ty-right" style="float: right">
	                    <ul class="article-operation list-inline pull-left">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle text-muted" data-toggle="dropdown">更多<b class="caret"></b></a>
								<ul class="dropdown-menu dropdown-menu-left">
									<li>
										<a href="#911">举报</a>
									</li>
									<li>
										<a id="heartDel" href="javascript:void(0);" onclick="delheart(<?php echo $v['id']; ?>)">删除</a>
									</li>
									<li>
										<a id="heartHide" href="javascript:void(0);">隐藏</a>
									</li>
								</ul>
	                        </li>
	                    </ul>
		            </div> 
		           </div> 
		        </div>
		        <?php endforeach; ?>
		    	<?php } ?>
			</div>

			<!-- 右侧开始 -->
			<div class="content_right">
				<!-- 热门文章开始 -->
				<div class="widget-box1">
                    <h2 class="h4 widget-box__title">最近来访</h2>
                    <ul class="list-unstyled list-unstyled">
                                                <li class="widget-user media">
                            <a class="pull-left" href="/blog/jellybool">
                                <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/418/144/4181447503-544532bc47195_big64">
                            </a>
                            <div class="media-object">
                                <strong><a href="/blog/dpzwd">大盘振五代</a></strong>
                                <p class="text-muted">最近获得 77 推荐</p>
                            </div>
                        </li>
                        <li class="widget-user media">
                            <a class="pull-left" href="/blog/share">
                                <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/272/640/2726403996-559e442cbe599_big64">
                            </a>
                            <div class="media-object">
                                <strong><a href="/blog/lxpspl">刘小胖是胖脸</a></strong>
                                <p class="text-muted">最近获得 51 推荐</p>
                            </div>
                        </li>
                        <li class="widget-user media">
                            <a class="pull-left" href="/blog/OneAPM_Official">
                                <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/285/617/2856174340-55947353d817b_big64">
                            </a>
                            <div class="media-object">
                                <strong><a href="/blog/xhh">笑哈哈</a></strong>
                                <p class="text-muted">最近获得 50 推荐</p>
                            </div>
                        </li>
                        <li class="widget-user media">
                            <a class="pull-left" href="/blog/trigkit4">
                                <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/550/538/550538601-54b5303a2d493_big64">
                            </a>
                            <div class="media-object">
                                <strong><a href="/blog/kiki">kiki</a></strong>
                                <p class="text-muted">最近获得 28 推荐</p>
                            </div>
                        </li>
                        <li class="widget-user media">
                            <a class="pull-left" href="/blog/jiyinyiyong">
                                <img class="media-object avatar-40" src="http://sfault-avatar.b0.upaiyun.com/235/520/2355203916-1030000000093283_big64">
                            </a>
                            <div class="media-object">
                                <strong><a href="/blog/xixi">xixi</a></strong>
                                <p class="text-muted">最近获得 25 推荐</p>
                            </div>
                        </li>
                    </ul>                       
                </div>
                <!-- 热门文章结束 -->
			</div>
			<!-- 右侧结束 -->
			<!-- 心情结束 -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">
	function delheart(id)
	{

		$.ajax({
                type: "POST",
                url: "/heart/delete",
                data: {id:id},
                dataType: "json",
                success: function(data)
                {
                    console.log(data);
                    if(data.code == 0)
                    {
                        alert("删除失败");
                    }else if(data.code == -1)
                    {
                        alert("参数错误");
                    }else
                    {
                        location.reload();
                    }
                }
            })
	}

	$(function(){
		$("#post_heart").click(function(){
			var content = $('#heart_content').val();
			$.ajax({
                type: "POST",
                url: "/heart/addHeart",
                data: {content:content},
                dataType: "json",
                success: function(data)
                {
                    console.log(data);
                    if(data.code == 0)
                    {
                        alert("添加失败");
                    }else if(data.code == -1)
                    {
                        alert("参数错误");
                    }else
                    {
                        location.reload();
                    }
                }
            })
		})
	})
</script>