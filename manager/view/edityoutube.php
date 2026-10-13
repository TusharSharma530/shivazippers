<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn d-flex">
		<a href="<?=$adminpath;?>youtube/create"> Add New</a>
		<a href="<?=$adminpath;?>youtube"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm">
	<div class="row">

	<div class="mb-3 col-md-11">
		<label for="code" class="form-label">Embed Youtube Code</label>
		<input type="text" class="form-control" name="code" value="<?=$code;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-1">
		<label for="order" class="form-label">Order</label>
		<input type="text" class="form-control" name="order" value="<?=$order;?>" required autocomplete="off">
	</div>

	<div class="mt-2 mx-auto">
		<input type="submit" value="Edit Record" name="editRecord" class="btn btn-primary">
	</div>

	</div>
</form>
</div>
</div>