<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="<?=$adminpath;?>products"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm">
	<div class="row">

	<div class="mb-3 col-md-3">
		<label for="category" class="form-label">Category</label>
		<select name="category" id="category" class="form-control form-select">
			<option value="">Select Category</option>
			<?php $sqlprocat=mysqli_query($con,"SELECT * FROM `category` WHERE `type` = 83");
			while($rwprocat=mysqli_fetch_array($sqlprocat)){ ?>
			<option value="<?=$rwprocat['id'];?>"><?=$rwprocat['title'];?></option>
			<?php } ?>
		</select>
	</div>

	<div class="mb-3 col-md-8">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" name="title" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-1">
		<label for="order" class="form-label">Order</label>
		<input type="number" class="form-control" name="order" autocomplete="off">
	</div>

	<div class="mb-3 col-md-12">
		<label for="desc" class="form-label">Description</label>
		<textarea type="text" class="tinyMCE"  name="desc"></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="keyfeatures" class="form-label">Key Features</label>
		<textarea type="text" class="tinyMCE"  name="keyfeatures"></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="applications" class="form-label">Applications</label>
		<textarea type="text" class="tinyMCE"  name="applications"></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="variants" class="form-label">Variants</label>
		<textarea type="text" class="tinyMCE"  name="variants"></textarea>
	</div>

	<div class="mb-3 col-md-12">
	  	<label for="formFile" class="form-label">Image</label>
	  	<div class="imgquestion">			  		
			<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
			<input hidden class="form-control imgInput" name="img" type="file">
			<img src="<?=$adminpath;?>images/preview.jpg" alt="2" class='preview'>
		</div>
	</div>

	<div class="col-md-12">
		<input type="submit" value="Add Record" name="addRecord" class="submitInput">
	</div>

	</div>
</form>
</div>
</div>