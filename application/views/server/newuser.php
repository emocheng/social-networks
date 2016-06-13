<div class="container" style="padding-top: 150px">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" action="/server/newuser" method="post">
			  
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">新手引导</label>
			    <div class="col-sm-10">
			      <textarea name='contents' class="form-control" rows="3"><?php echo $contents['contents'] ?></textarea>
			     
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-8">
			      <button type="submit" class="btn btn-default">提交</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>public/vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/vendor/ckfinder/ckfinder.js"></script>
<script>
    CKEDITOR.replace('contents',
            {
                filebrowserBrowseUrl: "<?php echo base_url();?>public/vendor/ckfinder/ckfinder.html",
                filebrowserImageBrowseUrl: "<?php echo base_url();?>public/vendor/ckfinder/ckfinder.html?type=Images",
                filebrowserFlashBrowseUrl: "<?php echo base_url();?>public/vendor/ckfinder/ckfinder.html?type=Flash",
                filebrowserUploadUrl: "<?php echo base_url();?>public/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
                filebrowserImageUploadUrl: "<?php echo base_url();?>public/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
                filebrowserFlashUploadUrl: "<?php echo base_url();?>public/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"
            });
    function BrowseServer(thumb, img_show) {
        var finder = new CKFinder();

        //当选中图片时执行的函数
        finder.selectActionFunction = function(fileUrl){
            $("#"+thumb).val(fileUrl);
            $("#"+img_show).attr("src",""+fileUrl+"");
        }

        finder.popup();//调用窗口
    }
</script>