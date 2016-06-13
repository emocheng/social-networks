<script src= "<?php echo base_url();?>public/js/ajaxfileupload.js"></script>
<div class="wapper">
<div id="content" class="maze-content clr">
	<div class="ace_mian">
			<div>
			    个人设置
			</div>
			<div class="row">
			  <div class="col-md-2"></div>
			  <div class="col-md-8">
			  	<form class="form-horizontal" action="/set/post" method="post">
				  <table class="table table-hover">
                    <tbody>
                    
                    <tr>
                        <td>昵称</td>
                        <td><input type="text" name="name" value="<?php if($user_info){echo $user_info['name'];} ?>"></td>
                    </tr>
                    <tr>
                        <td>电话</td>
                        <td><input type="text" name="phone" value="<?php if($user_info){echo $user_info['phone'];} ?>"/></td>
                    </tr>
                    <tr>
                        <td>头像</td>
                        <td>
                        	<input type="file" name="userfile" id="file" size="20" />
                            <div id='upload_img' class="btn btn-success" />上 传</div>
                            <img src="<?php if($user_info){echo $user_info['img_id'];} ?>" id="img_show" width="90px" height="90px" /></td>
                            <input type="hidden" id='img_url' name='img_url' value="">
                    </tr>
                    <tr>
                        <td>简介</td>
                        <td>
                        <textarea name="brief" class="form-control" rows="3"><?php echo $user_info['brief'] ?></textarea>
                        	
                        </td>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-default">保存</button></td>
                    </tr>
                    </tbody>
                </table>
				</form>
			  </div>
			  <div class="col-md-2"></div>
			</div>
			
		</div>
	</div>
</div>

<script>
    
	$("#upload_img").click(function(){
    
    	var that = $(this);
    	that.text('上传中...');
    	that.attr('id','');
		$.ajaxFileUpload({
			url: '/upload/ajax_upload', 
			type: 'post',
			secureuri: false, 
			fileElementId: 'file', 
			dataType: 'json',
			success: function(data, status){  
			    if(data.code == 1)
			    {	
			    	var url = data.smg.upload_data.file_url;
			    	$("#img_show").attr('src',url);
			    	$("#img_url").val(url);
			    	that.text('上传');
			    	that.attr('id','upload_img');
			    }
			},
			error: function(data, status, e){ 
			    console.log(e);
			}

		});
    })
</script>	