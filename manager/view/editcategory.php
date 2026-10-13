<?php $sqlshow = mysqli_query($con, "SELECT * FROM `category` WHERE `id` = $geturl1");
$rwshow = mysqli_fetch_array($sqlshow);
$cat_id=$rwshow['id'];
$cat_title=$rwshow['title'];
$cat_type=$rwshow['type'];
$cat_url=$rwshow['url'];
$cat_desc=$rwshow['desc'];
$cat_sdesc=$rwshow['sdesc'];
$cat_file=$rwshow['file'];
$cat_mtitle=$rwshow['meta_title'];
$cat_mkeywords=$rwshow['meta_keywords'];
$cat_mdesc=$rwshow['meta_desc'];
$cat_order=$rwshow['order'];
?>
<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="<?=$adminpath;?>category/create"> Add New</a>
			<a href="<?=$adminpath;?>category"> List</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
	<div class="msgbox"></div>
	<form method="POST" id="submitForm" class="row">

		<div class="mb-3 col-md-4">
			<label for="type" class="form-label">Category / Sub Category</label>
			<select class="form-control form-select" id="type" name="type" required>
				<option value='1'>Main Category</option>
<?php $sqlcat=mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 1 AND `type` = 1 ORDER BY `title` ASC");
if(mysqli_num_rows($sqlcat)){
while($rwcat=mysqli_fetch_array($sqlcat)){
$sel=$rwcat['id']==$cat_type ? "selected" : "";
$cattitle=$rwcat['title'];
$catid=$rwcat['id'];
echo "<option $sel value='$catid'>$cattitle</option>";
} }?>
			</select>
		</div>

		<div class="mb-3 col-md-7">
			<label for="title" class="form-label">Category Name</label>
			<input type="text" class="form-control" id="title" name="title" value="<?=$cat_title;?>" required>
		</div>

		<div class="mb-3 col-md-1">
			<label for="order" class="form-label">Order</label>
			<input type="text" class="form-control" id="order" name="order" value="<?=$cat_order;?>" required>
		</div>

		<div class="mb-3 col-md-12">
			<label for="sdesc" class="form-label">Short Description</label>
			<textarea class="form-control tinyMCE" name="sdesc" id="sdesc"><?=$cat_sdesc;?></textarea>
		</div>

		<div class="mb-3 col-md-12">
			<label for="desc" class="form-label">Description</label>
			<textarea class="form-control tinyMCE" name="desc" id="desc"><?=$cat_desc;?></textarea>
		</div>

		<div class="mb-3 col-md-6">
			<label for="mtitle" class="form-label">Meta Title</label>
			<input type="text" class="form-control" id="mtitle" name="meta-title" value="<?=$cat_mtitle;?>" >
		</div>

		<div class="mb-3 col-md-6">
			<label for="mkeywords" class="form-label">Meta Keywords</label>
			<input type="text" class="form-control" id="mkeywords" name="meta-keywords" value="<?=$cat_mkeywords;?>">
		</div>

		<div class="mb-3 col-md-12">
			<label for="mdesc" class="form-label">Meta Description</label>
			<textarea class="form-control" name="meta-desc" id="mdesc"><?=$cat_mdesc;?></textarea>
		</div>


		<div class="mb-3 col-md-12">
		  	<label for="formFile" class="form-label">Image</label>
		  	<div class="imgquestion">
				<?php $active = empty($cat_file) ? "" : "active"; ?>
				<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
				<input hidden class="form-control imgInput" name="img" type="file">
  				<?php if(empty($cat_file)){ ?>
  				<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
  				<?php }else{ ?>
  				<img src="<?=$path.$cat_file;?>" alt="<?=$cat_title;?>" class='preview'>
  				<?php } ?>
  			</div>
		</div>
		<div class="col-md-12">
			<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
		</div>
	</form>
	</div>
</div>