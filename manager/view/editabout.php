<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn d-flex">
		<a href="<?=$adminpath;?>about/create"> Add New</a>
		<a href="<?=$adminpath;?>about"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm">
	<div class="row">

	<div class="mb-3 col-md-6">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" name="title" value="<?=$title;?>" required>
	</div>

    <div class="mb-3 col-md-6">
		<label for="subtitle" class="form-label">Sub Title</label>
		<input type="text" class="form-control" name="subtitle" value="<?=$subtitle;?>" required>
	</div>

	<div class="mb-3 col-md-12">
		<label for="desc" class="form-label">Description</label>
		<textarea type="text" class="tinyMCE"  name="desc"><?=$desc;?></textarea>
	</div>	

	<div class="mt-2 mx-auto">
		<input type="submit" value="Edit Record" name="editRecord" class="btn btn-primary">
	</div>

	</div>
</form>
</div>
</div>