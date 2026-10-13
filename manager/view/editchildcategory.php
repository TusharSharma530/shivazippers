<div class="col-md-12">
	<div class="page-title">							
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="<?=$adminpath;?>childcategory">List</a>
		</div>
	</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm" class="row">
	<div class="mb-3 col-md-3">
		<label for="type" class="form-label">Category</label>
		<select class="form-control form-select" id="child-category" name="category" required>
			<option value=''>--Select Category--</option>
<?php $sqlcat=mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 1 AND `type` = 1 ORDER BY `title` ASC");
if(mysqli_num_rows($sqlcat)){
while($rwcat=mysqli_fetch_array($sqlcat)){
$selected = ($rwcat['id']==$subcat_catid) ? 'selected' : '';
$cattitle=$rwcat['title'];
$catid=$rwcat['id'];
echo "<option $selected value='$catid'>$cattitle</option>";
} }?>
		</select>
	</div>

	<div class="mb-3 col-md-3">
		<label for="type" class="form-label">Sub Category</label>
		<select class="form-control form-select" name="subcategory" id="subcategory" required>
			<option value=''>Sub Category</option>
<?php
 $sqlcat=mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 1 AND `type` != 1 AND `type` = $subcat_catid ORDER BY `title` ASC");
if(mysqli_num_rows($sqlcat)){
while($rwcat=mysqli_fetch_array($sqlcat)){
$selected = ($rwcat['id']==$subcat_subcatid) ? 'selected' : '';
$cattitle=$rwcat['title'];
$catid=$rwcat['id'];
echo "<option $selected value='$catid'>$cattitle</option>";
} }
?>
		</select>
	</div>

		<div class="mb-3 col-md-4">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" id="title" name="title" required autocomplete="off" value="<?=$subcat_title;?>">
		</div>

		<div class="mb-3 col-md-2">
			<label for="order" class="form-label">Order</label>
			<input type="number" min="1" class="form-control" id="order" name="order" required autocomplete="off" value="<?=$subcat_order;?>">
		</div>

		<div class="mb-3 col-md-12">
			<label for="sdesc" class="form-label">Short Description</label>
			<textarea class="form-control" name="sdesc" id="sdesc"><?=$subcat_sdesc;?></textarea>
		</div>

		<div class="mb-3 col-md-12">
			<label for="desc" class="form-label">Description</label>
			<textarea class="tinyMCE" name="desc" id="desc"><?=$subcat_desc;?></textarea>
		</div>

		<div class="mb-3 col-md-6">
			<label for="mtitle" class="form-label">Meta Title</label>
			<input type="text" class="form-control" id="mtitle" name="meta-title" value="<?=$subcat_metatitle;?>">
		</div>

		<div class="mb-3 col-md-6">
			<label for="mkeywords" class="form-label">Meta Keywords</label>
			<input type="text" class="form-control" id="mkeywords" name="meta-keywords" value="<?=$subcat_metakeywords;?>">
		</div>

		<div class="mb-3 col-md-12">
			<label for="mdesc" class="form-label">Meta Description</label>
			<textarea name="meta-desc" class="form-control"><?=$subcat_metadesc;?></textarea>
			
		</div>


		<div class="mb-3 col-md-3">
		  	<label for="formFile" class="form-label">Image</label>
			<div class="imgquestion">
				<?php $active = empty($subcat_file) ? "" : "active"; ?>
				<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
				<input hidden class="form-control imgInput" name="img" type="file">
				<?php if($subcat_file == ''){ ?>
				<img src="<?=$adminpath;?>images/preview.jpg" alt="2" class='preview'>
		  		<?php }else{
		  		$imgfile=file_exists("../$subcat_file") ? $subcat_file : "manager/images/preview.jpg"; ?>
				<img src="<?=$path.$imgfile;?>" alt="<?=$path.$subcat_file;?>" class='preview'>
		  		<?php } ?>
  			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
		</div>
	</form>
	</div>
</div>