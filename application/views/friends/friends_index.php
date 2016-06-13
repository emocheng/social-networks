<link rel="stylesheet" href="<?php echo base_url();?>public/css/friend.css" />
<style>
	.ty-explore-feed-nav {
		padding: 0 10px;
		position: relative;
	}

	.ty-explore-feed-nav ul {
		width: 100%;
		height: 40px;
		overflow: hidden;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.07);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,.07);
		box-shadow: 0 1px 2px rgba(0,0,0,.07);
	}
	.ty-explore-feed-nav ul li {
		list-style: none;
		height: 100%;
		text-align: center;
		float: left;
		width: 50%;
	}

	.ty-explore-feed-nav ul li a.ty-active {
		color: #00B4FF;
		border-bottom-color: #00B4FF;
	}
	.ty-explore-feed-nav ul li a {
		display: block;
		height: 38px;
		line-height: 40px;
		background: #fff;
		border-bottom: 2px solid #fff;
		-webkit-transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-ms-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
		transition: all .3s ease-in-out;
	}

</style>
<div class="wapper">
<div id="content" class="maze-content clr">
<div class="ace_mian">
		<div class="ty-follow-list-container clearfix">
			<div id="ty_follow_list_nav" class="ty-explore-feed-nav">
				<ul>
					<li class="ty-col-6"><a href="javascript:void(0)" class="js-nav js-action ty-active" data-type="0" data-id="0" data-action="changeFollowTab">关注</a></li>
					<li class="ty-col-6"><a href="javascript:void(0)" class="js-nav js-action" data-type="1" data-id="0" data-action="changeFollowTab">关注者</a></li>
				</ul>
			</div>
			<div id="ty_follow_list_container" class="ty-follow-list">
				<div  class="container ty-active" data-type="0" data-has-more="0" data-start="1" data-is-loaded="1">
					<div id="ajax-content">
					<?php if(isset($fans) && !empty($fans)){ ?>
					<?php foreach ($fans as $v): ?>
					<div class="ty-reborn-dreamer-card ty-reborn-card ty-card-hover">
						<a class="ty-reborn-dreamer-card-follow js-action" href="javascript:void(0)" data-id="1" data-action="followDreamer">
							<i class="ty-icon-user-following js-follow-user" data-id="1">

							</i>
						</a>
						<a href="javascript:;" target="_blank">
							<div class="ty-reborn-dreamer-card-header" style="background-image:url(<?php echo $v['background']?>)">
								<div class="ty-reborn-dreamer-card-mask"></div>
							</div>
							<div class="ty-reborn-dreamer-card-body">
								<div class="ty-reborn-dreamer-card-avatar">
									<img src="<?php if($v['img_id']){echo $v['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>" alt="" width="70" height="70" />
								</div>
								<div class="ty-reborn-dreamer-card-desc">
									<div class="ty-reborn-dreamer-card-name">
										<?php echo $v['name'] ?>
									</div>
									<p class="ty-reborn-dreamer-card-cdesc"> 加入时间 <span class="ty-reborn-dreamer-card-font"><?php echo date("Y-m-d H:i:s", $v['create_time']); ?></span> </p>
									<p class="ty-reborn-dreamer-card-fdesc"> 简介 <span class="ty-reborn-dreamer-card-font"><?php if($v['brief']){echo $v['brief'];}else{echo '这家伙太懒了，还未填写个人描述';} ?></span> </p>
								</div>
							</div>
							<div class="ty-reborn-dreamer-card-footer">
								<div class="ty-reborn-card-col">
									<p class="ty-reborn-card-count"> <?php echo $v['friendsNum'] ?> </p>
									<p>关注</p>
								</div>
								<div class="ty-reborn-card-col">
									<p class="ty-reborn-card-count"> <?php echo $v['followsNum'] ?> </p>
									<p>被关注</p>
								</div>
								<div class="ty-reborn-card-col">
									<p class="ty-reborn-card-count"> 10 </p>
									<p>获赞</p>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
					<?php } ?>
					</div>
					<div class="ty-loading">
						已无更多
					</div>
				</div>
				<div class="container" style="display: none" data-type="1" data-has-more="1">
					<div class="ty-loading">
						<img src="/static/images/common/loading.gif" />加载中...
					</div>
				</div>
			</div>
		</div>
</div>

	<script>
		$(function(){
			$(".ty-col-6").click(function()
			{
				$('#ajax-content').html('');
				var that = $(this);
				var index = that.index()+1;

				that.children().addClass('ty-active');
				that.siblings().children().removeClass('ty-active');

				$.ajax( {
					type : "POST",
					url : "/friends/showFans",
					data: {index:index},
					dataType: "json",
					success : function(data) {
						console.log(data);
						if(data.code)
						{
							var html = '';

							$.each(data['fans'],function(i,item){
								html+= '<div class="ty-reborn-dreamer-card ty-reborn-card ty-card-hover">';
								html+=	'<a class="ty-reborn-dreamer-card-follow js-action" href="javascript:void(0)" data-id="1" data-action="followDreamer">'
								html+=	'<i class="ty-icon-user-following js-follow-user" data-id="1">';

								html+=	'</i>';
								html+=	'</a>';
								html+=	'<a href="javascript:;" target="_blank">';
								html+=	'<div class="ty-reborn-dreamer-card-header" style="background-image:url('+item["background"]+')">;'
								html+=	'<div class="ty-reborn-dreamer-card-mask"></div>';
								html+=	'</div>';
								html+=	'<div class="ty-reborn-dreamer-card-body">';
								html+=	'<div class="ty-reborn-dreamer-card-avatar">';
								if(item['img_id'])
								{
									var img = item['img_id'];
								}
								else
								{
									var img = 'http://hellotc.sinaapp.com/public/img/0.png';
								}
								html+=  '<img src="'+img+'" alt="" width="70" height="70" />';
								html+=  '</div><div class="ty-reborn-dreamer-card-desc"><div class="ty-reborn-dreamer-card-name">'+item['name']+'</div>';
								html+=	'<p class="ty-reborn-dreamer-card-cdesc"> 加入时间 <span class="ty-reborn-dreamer-card-font">'+item['create_time']+'</span> </p>';
								if(item['brief'])
								{
									var brief = item['brief'];
								}
								else
								{
									var brief = '这家伙太懒了，还未填写个人描述';
								}
								html+=	'<p class="ty-reborn-dreamer-card-fdesc"> 简介 <span class="ty-reborn-dreamer-card-font">'+brief+'</span> </p>';
								html+=  '</div></div><div class="ty-reborn-dreamer-card-footer"><div class="ty-reborn-card-col">';
								html+=  '<p class="ty-reborn-card-count">'+item['friendsNum']+'</p></div><div class="ty-reborn-card-col">';
								html+=  '<p class="ty-reborn-card-count">'+item['followsNum']+'</p><p>被关注</p></div><div class="ty-reborn-card-col"><p class="ty-reborn-card-count"> 10 </p>';
								html+=  '<p>获赞</p></div></div></a></div>'


							});
							$('#ajax-content').append(html);
						}else
						{
							alert('no obj');
						}
					}

				});
			})
		})
	</script>