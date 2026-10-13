<div class="col-md-12">
	<div class="page-title">							
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="<?=$adminpath;?>category">List</a>
		</div>
	</div>
</div>

<div class="col-md-12">

	<div class="page-content">
	<div class="msgbox"></div>
	<form method="POST" id="submitForm" class="row">
		<div class="mb-3 col-md-4">
			<label for="type" class="form-label">Category Type</label>
			<select class="form-control form-select" id="type" name="type" required>
				<option value='1'>Main Category</option>
<?php $sqlcat=mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 1 AND `type` = 1 ORDER BY `title` ASC");
if(mysqli_num_rows($sqlcat)){
while($rwcat=mysqli_fetch_array($sqlcat)){
$cattitle=$rwcat['title'];
$catid=$rwcat['id'];
echo "<option value='$catid'>$cattitle</option>";
} }?>
			</select>
		</div>

		<div class="mb-3 col-md-7">
			<label for="title" class="form-label">Category Name</label>
			<input type="text" class="form-control" id="title" name="title" required autocomplete="off">
		</div>

		<div class="mb-3 col-md-1">
			<label for="order" class="form-label">Order</label>
			<input type="number" min="1" class="form-control" id="order" name="order" required autocomplete="off">
		</div>

		<div class="mb-3 col-md-12">
			<label for="sdesc" class="form-label">Short Description</label>
			<textarea class="tinyMCE" name="sdesc" id="sdesc"></textarea>
		</div>

		<div class="mb-3 col-md-12">
			<label for="desc" class="form-label">Description</label>
			<textarea class="tinyMCE" name="desc" id="desc"></textarea>
		</div>

		<div class="mb-3 col-md-6">
			<label for="mtitle" class="form-label">Meta Title</label>
			<input type="text" class="form-control" id="mtitle" name="meta-title" >
		</div>

		<div class="mb-3 col-md-6">
			<label for="mkeywords" class="form-label">Meta Keywords</label>
			<input type="text" class="form-control" id="mkeywords" name="meta-keywords" >
		</div>

		<div class="mb-3 col-md-12">
			<label for="mdesc" class="form-label">Meta Description</label>
			<textarea name="meta-desc" class="form-control"></textarea>
			
		</div>


		<div class="mb-3 col-md-3">
		  	<label for="formFile" class="form-label">Image</label>
			<div class="imgquestion">
				<a href="javascript:" class="imgclose ri-close-circle-line"></a>
				<input hidden class="form-control imgInput" name="img" type="file">
  				<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
  			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" value="Add Record" name="addRecord" class="submitInput">
		</div>
	</form>
	</div>
</div>