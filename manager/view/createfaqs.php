<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="<?=$adminpath;?>faqs"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm">
	<div class="row">

	<div class="mb-3 col-md-11">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" name="title" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-1">
		<label for="order" class="form-label">Order</label>
		<input type="text" class="form-control" name="order" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-12">
		<label for="desc" class="form-label">Description</label>
		<textarea type="text" class="tinyMCE"  name="idesc"></textarea>
	</div>

	<div class="col-md-12">
		<input type="submit" value="Add Record" name="addRecord" class="submitInput">
	</div>

	</div>
</form>
</div>
</div>