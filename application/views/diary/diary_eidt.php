<div class="wapper">
<div id="content" class="maze-content clr">
<div class="ace_mian">
		<div>
		    <p class="main-title hidden-xs">
                撰写一篇属于你的日记
            </p>
            <form id="form1">
	            <table class="table table-hover">
					<tbody>
					<tr>
					  <th scope="row">标题</th>
					  <td>
					  	<input type="text" class="form-control" id="title" name='title' placeholder="输入标题" value="<?php if(isset($content)){echo $content['title'];} ?>">
					  </td>
					</tr>

					<tr>
					    <th scope="row">分类</th>
						<td>
							<select class="form-control" id="cate" name='diary_cate'>
							<?php foreach($diary_cate as $v): ?>
								<option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
							<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">权限</th>
						<td>
							<label class="radio-inline">
								<input type="radio" name="authority" class="authority" value="1" checked> 公开
							</label>
							<label class="radio-inline">
								<input type="radio" name="authority" class="authority" value="0"> 私密
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row">简介</th>
						<td>
							<textarea class="form-control" name="summary" rows="3" placeholder="输入简介,会显示在日记首页">
								<?php if(isset($content)){echo $content['summary'];} ?>
							</textarea>
						</td>
					</tr>
					<tr>
					  <th scope="row">内容</th>
					  <td>
						  <textarea id='edit' id="content" name="contents">
					  		<?php if(isset($content)){echo $content['content'];} ?>
						  </textarea>
					  	<input type='hidden' name='post_id' value="<?php if(isset($content)){echo $content['id'];} ?>">
					  </td>
					</tr>
					</tbody>
				</table>
				<div class="sub_bottom">
					<div id="submit" class="btn btn-default">发表</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script src="<?php echo base_url();?>public/js/libs/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>public/js/froala_editor.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>public/js/froala_editor_ie8.min.js"></script>
<![endif]-->
<script src="<?php echo base_url();?>public/js/plugins/tables.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/lists.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/colors.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/media_manager.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/font_family.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/font_size.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/block_styles.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/video.min.js"></script>
<script>
	$(function(){
		$('#edit').editable({
			inlineMode: false,
			alwaysBlank: true,
			theme:'gray',
			height:'200px'//高度
		});

		$("#submit").click(function(){
			var title = $("#title").val();
			if(title=="")
			{
				alert("标题不能为空");
				return false;
			}

			$.post('/diary/postDiary',$("#form1").serialize(),function(data){
				if(data.code=='1')
				{
					alert(data.msg);
				}
				else
				{
					window.location.href='/diary/index';
				}
			},'json')
		})
	});
</script>
