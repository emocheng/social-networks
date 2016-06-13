<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/css/showBo.css" />
<script type="text/javascript" src="<?php echo base_url();?>public/js/showBo.js"></script>
<style>
    #dvMsgBtns .btn{font-size: 12px}
</style>
<div class="wapper">
<div id="content" class="maze-content clr">
	<div class="ace_mian">
		<div>
			<!-- 日记开始 -->
		    <div class="content_main">
			  	<p class="main-title hidden-xs">
                    Hi!guy~ 你有多久没有写日记啦！
                    <a href="/diary/edit" id="editDiary" class="btn btn-primary">撰写日记 </a>
                </p>
                <div class="main-board">
                	<ul class="nav nav-tabs">
						<li role="presentation" class="active"><a href="#">公开</a></li>
						<li role="presentation"><a href="#">私密</a></li>
					</ul>

					<div class="stream-list blog-stream" id="blog-content">
					<?php if(isset($diary_list) && !empty($diary_list)){ ?>
					<?php foreach ($diary_list as $v): ?>
					    <section class="stream-list__item">                                                
					        <div class="blog-rank">
					            <div class="votes">
					                <?php echo $v['fab']; ?><small>赞</small>
					            </div>
					            <div class="views hidden-xs">
                                    <?php echo $v['view']; ?><small>浏览</small>
					            </div>
					        </div>
					        <div class="summary">
					            <h2 class="title"><a href="/diary/content?id=<?php echo $v['id']; ?>"><?php echo $v['title']; ?></a></h2>
					            <div class="excerpt wordbreak hidden-xs"><?php echo $v['summary']; ?></div>
					            <ul class="author list-inline">
                                    <li class="pull-right" title="3 收藏">
                                        <small class="glyphicon glyphicon-bookmark"></small> 3
                                    </li>
                                    <li>
					                    <a href="/diary/content?uid=<?php echo $v['uid'] ?>&id=<?php echo $v['id'] ?>">
					                        <img class="avatar-20 mr10 hidden-xs" src="<?php if($user_info['img_id']){echo $user_info['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.png<?php } ?>">
                                            来自<?php if($user_info['name']){echo $user_info['name'];}else{echo '火星用户';} ?>
					                    </a>
					                    发布于
					                    <span class="split"></span>
					                    <?php echo date("Y-m-d H:i:s", $v['create_time']); ?>
                                        <span class="split"></span>
                                        <span style="padding-left: 10px;">
                                            分类:
                                            <?php if($v['cate'] !== 0){ ?>
                                            <a href="#" style="color: #337ab7">
                                                <?php echo $v['cate'] ?>
                                            </a>
                                            <?php }else{ ?>
                                                暂无分类
                                            <?php } ?>
                                        </span>
					                </li>
					            </ul>
					        </div>
					    </section>
				    	<?php endforeach; ?>
				    	<?php } ?>
					</div>
                </div>
			</div>

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
                    <h2 class="h4 widget-box__title">好友排行</h2>
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
                    <ul class="list-group" id="cateUl">
                        <?php if(isset($diary_cate) && !empty($diary_cate)){ ?>
                        <?php foreach ($diary_cate as $v): ?>
                            <li class="list-group-item">
                                <?php echo $v['name'] ?>
                                <span class="glyphicon glyphicon-trash" style="float: right" aria-hidden="true" onclick="delCate(<?php echo $v['id'] ?>)"></span>
                            </li>
                        <?php endforeach; ?>
                        <?php }else{ ?>
                            暂无分类
                        <?php } ?>
                    </ul>
                    <button class="btn btn-default" id="addCate">新增分类</button>
                </div>
                <!-- 我的标签结束 -->    
			</div>
			<!-- 右侧结束 -->
			<!-- 日记结束 -->
            <!-- 弹出层-->
            <div class="modal fade" id="addCateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">新增分类</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" id="cata-name" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" id="postCateAdd" class="btn btn-primary">增加</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(function(){

                    //调出弹出层
                    $('#addCate').click(function(){
                        $('#addCateModal').modal('show');
                    });

                    //增加分类
                    $("#postCateAdd").click(function(){
                        var cataName = $("#cata-name").val();
                        if(cataName == '')
                        {
                            alert("请填写分类名称");
                            return false;
                        }
                        $.ajax( {
                            type : "POST",
                            url : "/diary/postDiaryCate",
                            data: {cataName:cataName},
                            dataType: "json",
                            success : function(data) {
                                //console.log(data);
                                if(data.code=1)
                                {
                                    alert("添加成功");
                                    var html = '<li class="list-group-item">'+cataName+'</li>';
                                    $('#cateUl').append(html);
                                }else
                                {
                                    alert("添加失败");
                                }
                                $('#addCateModal').modal('hide');
                            }

                        });
                    });

                    //公开&私密选项卡切换
                    $(".main-board ul li").click(function(){
                        var that = $(this);
                        var index = $(this).index(); //0-公开;1-私密
                        var authority;
                        that.addClass('active');
                        that.siblings().removeClass('active');
                        if(index == 1) //私密
                        {
                            authority = 0;
                        }
                        else
                        {
                            authority = 1;
                        }
                        var html = '';
                        $.ajax( {
                            type : "POST",
                            url : "/diary/ajaxGetDiary",
                            data: {authority:authority},
                            dataType: "json",
                            success : function(data) {
                                console.log(data);
                                if(data.code==1)
                                {


                                    $("#blog-content").html(html);

                                    $.each(data['data'],function(i,item){
                                        html+='<section class="stream-list__item">';
                                        html+='<div class="blog-rank">';
                                        html+='<div class="votes">';
                                        html+=item['fab']+'<small>赞</small></div> <div class="views hidden-xs">81<small>浏览</small></div></div><div class="summary">';
                                        html+='<h2 class="title"><a href=/diary/content?id='+item["id"]+'>'+item["title"]+'</a></h2>';
                                        html+= '<div class="excerpt wordbreak hidden-xs">'+item['summary']+'</div>';
                                        html+='<ul class="author list-inline"><li class="pull-right" title="3 收藏"><small class="glyphicon glyphicon-bookmark"></small> 3</li><li><a href="#">';
                                        if(data['user']['img_id'])
                                        {
                                            var img = data['user']['img_id'];
                                        }
                                        else
                                        {
                                            var img = 'http://hellotc.sinaapp.com/public/img/0.png';
                                        }
                                        html+='<img class="avatar-20 mr10 hidden-xs" src='+img+'>';

                                        if(data['user']['name'])
                                        {
                                            html+=data['user']['name'];
                                        }
                                        else
                                        {
                                            html+='来自火星用户';
                                        }

                                        html+='</a>发布于<span class="split"></span>'+item['fri_create_time'];
                                        html+='<span class="split"></span><span style="padding-left: 10px;">分类:';
                                        if(item['cate'] !==0)
                                        {
                                            html+='<a href="#" style="color: #337ab7">'+item['cate']+'</a>';

                                        }else
                                        {
                                            html+='暂无分类';
                                        }
                                        html+='</span></li></ul></div></section>';
                                    });

                                }
                                else
                                {
                                    html += '<h1>没有内容</h1>';
                                }
                                $("#blog-content").html($(html).fadeIn(2000));
                            }

                        });


                    })

                });

                function delCate(id)
                {
                    Showbo.Msg.confirm('您确定删除吗？',function(flag){
                        if(flag=='yes'){
                            $.ajax( {
                                type : "POST",
                                url : "/diary/delDiaryCate",
                                data: {id:id},
                                dataType: "json",
                                success : function(data) {
                                    console.log(data);
                                    if(data.code==1)
                                    {
                                        Showbo.Msg.alert('删除成功!');

                                    }else if(data==0)
                                    {
                                        Showbo.Msg.alert('删除失败!');

                                    }else
                                    {
                                        Showbo.Msg.alert('参数错误!');

                                    }
                                    location.reload();
                                }

                            });
                        }
                    });
                }
            </script>
		</div>
		<div class="clear"></div>
	</div>
</div>