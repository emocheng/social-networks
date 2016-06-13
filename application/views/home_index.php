<div class="wapper">
<div id="content" class="maze-content clr">

  <div class="col-md-12 panel panel-default user-info">
        <div class="user-detial">
            <div class="photo">
              <img src="<?php if($user_info['img_id']){echo $user_info['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>" width="90" height="90">
            </div>
            <p><span class="name"><?php if($user_info['name']){echo $user_info['name'];}else{echo '火星用户';} ?></span><span class="icon-f"></span></p>
            <p><span>注册会员</span><span>等级：<?php echo $user_info['level'] ?> 级</span><span>注册日期：<?php echo date("Y-m-d H:i:s", $user_info['create_time']); ?></span></p>
            <p>个人描述：<?php if($user_info['brief']){echo $user_info['brief'];}else{echo '这家伙太懒了，还未填写个人描述';} ?></p>
        </div>
        <div class="coin visible-lg-block">
          <ul>
            <li><p class="digital"><?php echo $count_diary ?></p><p>文章</p></li>
            <li><p class="digital"><?php echo $heart_count ?></p><p>心情</p></li>
            <li><p class="digital">0</p><p>照片</p></li>
          </ul>
        </div>
        <div class="but">
          <a href="/diary/edit" target="_blank" class="btn btn-default btn-write">写文章</a>
          <a href="#" target="_blank" class="btn btn-default btn-letter">发私信</a>
        </div>
  </div>

  <div class="ace_mian">
    <div>
      <!-- 主页面板开始 -->
        <div class="content_main">
            <?php if(isset($friendDiary) && !empty($friendDiary)){ ?>
            <?php foreach ($friendDiary as $v): ?>
              <div id="feed_540139" class="ty-post-item" data-feed-id="540139" data-operation="2">
               <div class="ty-post-item-head ">
                <a href="/diary/content?uid=<?php echo $v['uid'] ?>&id=<?php echo $v['id'] ?>">
                    <img class="ty-post-item-avater" src="<?php if($v['img_id']){echo $v['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.png<?php } ?>" />
                    <span class="ty-post-item-username"><?php echo $v['username'] ?></span>
                </a>
                <div class="ty-post-item-tag ty-undefined">
                 <i class="ty-icon-logo"></i>
                 <a href="javascript:;" class="ty-post-tag-text ty-white" target="_blank">来自好友文章</a>
                </div>
               </div>
               <div class="ty-post-item-body body-content ">
                <p class="ty-post-item-word"> <?php echo $v['summary'] ?> </p>
               </div>
               <div class="ty-post-item-foot">
                <span class="ty-post-item-time ty-left"><?php echo date("Y-m-d H:i:s", $v['create_time']); ?></span>
                <div class="ty-post-item-operate ty-right">

                </div>
               </div>
              </div>
            <?php endforeach; ?>
            <?php } ?>
        </div>

      <!-- 右侧开始 -->
      <div class="content_right">
        <div class="profile">
         <ul class="list-unstyled profile-ranks">
              <li>
                  <a href="#">
                      <strong><?php echo $FriendsAndFollowsNum['friendsNum'] ?></strong>
                      <span class="text-muted">关注</span>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <strong><?php echo $FriendsAndFollowsNum['followsNum'] ?></strong>
                      <span class="text-muted">被关注</span>
                  </a>
              </li>
              <li class="">
                  <strong>20</strong>
                  <span class="text-muted">次被赞</span>
              </li>
          </ul>
        </div>
      </div>
      <!-- 右侧结束 -->
      <!-- 主页面板结束 -->
    </div>
    <div class="clear"></div>
  </div>
</div>