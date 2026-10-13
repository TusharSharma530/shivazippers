<div class="col-md-12">
<div class="page-title">						
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
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
		<input type="text" class="form-control" id="title" name="title" required autocomplete="off">
	</div>
	<div class="col-md-2 mb-3">
		<label for="order" class="form-label">Order</label>
		<input type="number" class="form-control" id="order" name="order" required autocomplete="off">
	</div>
	<div class="col-md-12 mb-3">
		<label for="sdesc" class="form-label">Short Description</label>
		<textarea type="text" class="tinyMCE"  name="sdesc"></textarea>
	</div>
	<div class="col-md-3 mb-3">
	  	<label for="formFile" class="form-label">Image</label>
		<div class="imgquestion other">
			<a href="javascript:" class="imgclose ri-close-circle-line"></a>
			<input hidden class="form-control imgInput" name="img" type="file">
			<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
		</div>
	</div>
	<div class=" col-md-12">
		<input type="submit" name="addRecord" class="submitInput" value="Add Record">
	</div>
</form>
</div>
</div>