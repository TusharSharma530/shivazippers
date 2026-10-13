<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn d-flex">
		<a href="<?=$adminpath;?>team/create"> Add New</a>
		<a href="<?=$adminpath;?>team"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm">
	<div class="row">

	<div class="mb-3 col-md-8">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" name="title" value="<?=$title;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-3">
		<label for="role" class="form-label">Designation/Role</label>
		<input type="text" class="form-control" name="role" value="<?=$role;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-1">
		<label for="order" class="form-label">Order</label>
		<input type="text" class="form-control" name="order" value="<?=$order;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-4">
		<label for="email" class="form-label">Email</label>
		<input type="text" class="form-control" name="email" value="<?=$email;?>" autocomplete="off">
	</div>

	<div class="mb-3 col-md-4">
		<label for="phoneno" class="form-label">Phone no.</label>
		<input type="text" class="form-control" name="phoneno" value="<?=$phoneno;?>" autocomplete="off">
	</div>

	<div class="mb-3 col-md-4">
		<label for="otherphoneno" class="form-label">Other Phone no.</label>
		<input type="text" class="form-control" name="otherphoneno" value="<?=$otherphoneno;?>" autocomplete="off">
	</div>

	<div class="mb-3 col-md-12">
	  	<label for="formFile" class="form-label">Image</label>
	  	<div class="imgquestion">
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
	

	<div class="mt-2 mx-auto">
		<input type="submit" value="Edit Record" name="editRecord" class="btn btn-primary">
	</div>

	</div>
</form>
</div>
</div>