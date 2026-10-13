<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn d-flex">
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
			<input type="text" class="form-control" name="title" required autocomplete="off">
		</div>

		<div class="mb-3 col-md-3">
			<label for="role" class="form-label">Designation/Role</label>
			<input type="text" class="form-control" name="role" required autocomplete="off">
		</div>
		
		<div class="mb-3 col-md-1">
			<label for="order" class="form-label">Order</label>
			<input type="text" class="form-control" name="order" autocomplete="off">
		</div>

		<div class="mb-3 col-md-4">
			<label for="email" class="form-label">Email</label>
			<input type="text" class="form-control" name="email" autocomplete="off">
		</div>

		<div class="mb-3 col-md-4">
			<label for="phoneno" class="form-label">Phone no.</label>
			<input type="text" class="form-control" name="phoneno" autocomplete="off">
		</div>

		<div class="mb-3 col-md-4">
			<label for="otherphoneno" class="form-label">Other Phone no.</label>
			<input type="text" class="form-control" name="otherphoneno" autocomplete="off">
		</div>

		<div class="mb-3 col-md-12">
		  	<label for="formFile" class="form-label">Image</label>
		  	<div class="imgquestion">
				<a href="javascript:" class="imgclose ri-close-circle-line"></a>
				<input hidden class="form-control imgInput" name="img" type="file">
  				<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
  			</div>
		</div>
		
		<div class="mt-2 mx-auto">
			<input type="submit" value="Add Record" name="addRecord" class="submitInput">
		</div>
		</div>
	</form>
	</div>
</div>