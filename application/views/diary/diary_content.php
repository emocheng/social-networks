<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/font-awesome-4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/demo.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/icons.css" />
<style>
    .like{padding: 0;border: none;font-size: 10px;}
    .like__item{list-style-type: none;padding-right: 16px;float: left}


</style>
<div class="wapper">
<div id="content" class="maze-content clr">
    <div class="ace_mian">
		<div>
			<!-- 左侧开始 -->
		    <div class="content_main">
			  	<h1 class="h3 title" id="articleTitle">
			  		<a href="/diary/content?id=<?php echo $content['id'] ?>"><?php echo $content['title'] ?></a>
			  	</h1>
			  	<div class="author bottom-line" >
                    <a href="#" class="mr5">
                    <img class="avatar-24 mr10" src="<?php if($user_info['img_id']){echo $user_info['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>">
                    <strong><?php if($user_info['name']){echo $user_info['name'];}else{echo '火星用户';} ?></strong>
                    </a>
                    <strong class="text-black mr10">于</strong><?php echo date("Y-m-d H:i:s", $content['create_time']); ?> 发布
            	</div>
                <div class="main_content">
                	<?php echo $content['content'] ?>
                </div>

                <?php if(isset($sys) && !empty($sys)){ ?>
                <div class="clearfix mt10" id="bottom-content">
                    <ul class="article-operation list-inline pull-left">
						<li><a href="/diary/edit?id=<?php echo $content['id'] ?>" class="text-muted">编辑</a></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle text-muted" data-toggle="dropdown">更多<b class="caret"></b></a>
							<ul class="dropdown-menu dropdown-menu-left">
								<li>
									<a href="#911">举报</a>
								</li>
								<li>
									<a id="articleDel" href="javascript:void(0);">删除</a>
								</li>
								<li>
									<a id="articleHide" href="javascript:void(0);">隐藏</a>
								</li>
							</ul>
                        </li>
                    </ul>
                </div>
                <?php } ?>
                <input type="hidden" id="sys" value="<?php if(isset($sys) && !empty($sys)){ echo $sys; } ?>">
                <div class="text-center mt10">
                
                    <div class="btn like">
                        <li class="like__item do-like" data-author="<?php echo $content['uid'] ?>" data-obj="<?php echo $content['id'] ?>" id="doLike">
                            <button class="icobutton icobutton--thumbs-up">
                                <span class="fa fa-thumbs-up"></span>
                            </button>
                        </li>

                        <li class="like__item do-collection">
                            <button class="icobutton icobutton--heart" id="collection"><span class="fa fa-heart"></span></button>
                        </li>
                    </div>
                </div>
			</div>
			<!-- 左侧结束 -->	
			<!-- 右侧开始 -->
			<div class="content_right">
				<!-- 菜单栏开始 -->
				<div class="widget-messages">
					<a id="draftCount" class="widget-messages__item" href="/user/draft">我的草稿<span class="badge">2</span></a>
					<a class="widget-messages__item" href="/user/bookmarks">我的收藏</a>
				</div>
				<!-- 菜单栏结束 -->
				<!-- 热门文章开始 -->
				<div class="widget-box1">
                    <h2 class="h4 widget-box__title">热门作者</h2>
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
                <!-- 我的标签开始 -->
                <div class="widget-box1">
                    <h2 class="h4 widget-box__title">我的分类</h2>

                </div>
                <!-- 我的标签结束 -->    
			</div>
			<!-- 右侧结束 -->
			<!-- 日记结束 -->

		</div>
		<div class="clear"></div>
	</div>
</div>
<script src="<?php echo base_url();?>public/js/mo.min.js"></script>
<script src="<?php echo base_url();?>public/js/demo.js"></script>
<script>

    $(function(){
        //点赞
        $("#doLike").click(function(){

            var likeId = $(this).attr('data-obj');
            var author = $(this).attr('data-author');

            $.ajax({
                type: "POST",
                url: "/diary/doLike",
                data: {likeId:likeId,author:author},
                dataType: "json",
                success: function(data)
                {
                    console.log(data);

                }
            })


        });

        //删除文章
        $('#articleDel').click(function(){
            var del_id = $("#del_id").val();
            $.ajax({
                type: "POST",
                url: "/diary/delete",
                data: {del_id:del_id},
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
                        window.location.href="/diary/index"; 
                    }
                }
            })
        })
    })
</script>