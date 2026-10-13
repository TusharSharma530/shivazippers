<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="<?=$adminpath;?>banner/create"> Add New</a>
			<a href="<?=$adminpath;?>banner"> List</a>
		</div>
	</div>
</div>


<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm" class="row">
	<div class="col-md-10 mb-3">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" id="title" name="title" required autocomplete="off" value="<?=$title;?>">
	</div>
	<div class="col-md-2 mb-3">
		<label for="order" class="form-label">Order</label>
		<input type="number" class="form-control" id="order" name="order" required autocomplete="off" value="<?=$order;?>">
	</div>
	<div class="col-md-12 mb-3">
		<label for="sdesc" class="form-label">Short Description</label>
		<textarea type="text" class="tinyMCE"  name="sdesc"><?=$sdesc;?></textarea>
	</div>
	<div class="col-md-12 mb-3">
	  	<label for="formFile" class="form-label">Image :</label>
		<div class="imgquestion other">
			<?php $active = empty($file) ? "" : "active"; ?>
			<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
			<input hidden class="form-control imgInput" name="img" type="file">
				<?php if(empty($file)){ ?>
				<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
				<?php }else{ ?>
				<img src="<?=$path.$file;?>" alt="<?=$file;?>" class='preview'>
				<?php } ?>
			</div>
	</div>
	<div class="col-md-10">
		<input type="submit" name="editRecord" class="submitInput" value="Edit Record">
	</div>
</form>
</div>
</div>

</div>
</div>				
</section>

<?php include 'include/footer.php'; ?>