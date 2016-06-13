<div class="wapper">


    <div id="content" class="maze-content clr">
        <?php if(isset($result['sum']) && !empty($result['sum'])){ ?>
        <?php if($result['sum'] > 0) { ?>
        <?php foreach ($result['res'] as $v): ?>
        <div class="col-md-12 panel panel-default user-info">
            <div class="user-detial">
                <div class="photo">
                    <img src="<?php if($v['img_id']){echo $v['img_id'];}else{ ?> http://hellotc.sinaapp.com/public/img/0.jpg<?php } ?>" width="90" height="90">
                </div>
                <p><span class="name"><?php if($v['name']){echo $v['name'];}else{echo '火星用户';} ?></span><span class="icon-f"></span></p>
                <p><span>注册会员</span><span>等级：<?php echo $v['level'] ?> 级</span><span>注册日期：<?php echo date("Y-m-d H:i:s", $v['create_time']); ?></span></p>
                <p>个人描述：<?php if($v['brief']){echo $v['brief'];}else{echo '这家伙太懒了，还未填写个人描述';} ?></p>
            </div>
            <div class="coin visible-lg-block">
                <ul>
                    <li><p class="digital"><?php echo $v['diary'] ?></p><p>文章</p></li>
                    <li><p class="digital"><?php echo $v['heart'] ?></p><p>心情</p></li>
                    <li><p class="digital">0</p><p>照片</p></li>
                </ul>
            </div>
            <div class="but">
                <?php if($v['isFriend'] == 0){ ?>
                    <a href="javascript:;" target="_blank" class="followHim btn btn-default btn-write">关注TA</a>
                    <input type="hidden" class="followId" value='<?php echo $v["id"] ?>'>
                <?php }else{ ?>
                    <a href="javascript:;" target="_blank" class="btn btn-default btn-write">已关注</a>
                <?php } ?>
                <a href="#" target="_blank" class="btn btn-default btn-letter">发私信</a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php }else{ ?>
            <h1>对不起</h1>
        <?php }} ?>
    </div>

    <script>
        $(function(){
            $(".followHim").click(function(){
                var that = $(this);
                var id = that.next().val();
                if(!id)
                {
                    alert('system error!');
                    window.location.href = "/home/index";
                }

                $.ajax({
                    type : "POST",
                    url : "/home/addFollow",
                    data: {id:id},
                    dataType: "json",
                    success:function(data)
                    {
                        console.log(data);
                        if(data.code !== 1)
                        {
                            alert(data.msg);

                        }else
                        {
                            that.text("关注成功");
                            that.removeClass('followHim');
                        }
                    }
                })
            })
        })
    </script>

