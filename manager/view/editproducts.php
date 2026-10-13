<div class="col-md-12">
<div class="page-title">
<div class="title">
<h3><?=$pagetitle;?></h3>
</div>
<div class="createbtn">
<a href="<?=$adminpath;?>products/create"> Add New</a>
<a href="<?=$adminpath;?>products"> List</a>
</div>		
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm" class="row">

	<div class="mb-3 col-md-6">
		<label for="category" class="form-label">Category</label>
		<select name="category" id="category" class="form-control form-select">
			<option value="">Select Category</option>
			<?php 
			$sqlprocat = mysqli_query($con,"SELECT * FROM `category` WHERE `type` = 83");
			while($rwprocat=mysqli_fetch_array($sqlprocat)){
				$selected = ($rwprocat['id']==$categoryid) ? "selected" : "";
				?>
				<option value="<?=$rwprocat['id'];?>" <?=$selected;?>><?=$rwprocat['title'];?></option>
			<?php } ?>
		</select>
	</div>
	
	<div class="mb-3 col-md-6">
		<label for="childcategory" class="form-label">Child Category</label>
		<select name="childcategory" id="childcategory" class="form-control form-select">
			<option value="">Select Child Category</option>
		</select>
	</div>	

	<div class="mb-3 col-md-10">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" name="title" required value="<?=$title;?>" autocomplete="off">
	</div>

	<div class="mb-3 col-md-2">
		<label for="order" class="form-label">Order</label>
		<input type="number" min="1" class="form-control" name="order" value="<?=$order;?>" autocomplete="off">
	</div>

	<div class="mb-3 col-md-12">
		<label for="desc" class="form-label">Description</label>
		<textarea type="text" class="tinyMCE"  name="desc"><?=$desc;?></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="keyfeatures" class="form-label">Key Features</label>
		<textarea type="text" class="tinyMCE"  name="keyfeatures"><?=$keyfeatures;?></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="applications" class="form-label">Applications</label>
		<textarea type="text" class="tinyMCE"  name="applications"><?=$applications;?></textarea>
	</div>

	<div class="mb-3 col-md-12">
		<label for="variants" class="form-label">Variants</label>
		<textarea type="text" class="tinyMCE"  name="variants"><?=$variants;?></textarea>
	</div>

	<div class="mb-3 col-md-12">
	  	<label for="formFile" class="form-label">Featured Image</label>
	  	<div class="imgquestion">
	  		<?php $active = empty($file) ? "" : "active"; ?>
			<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
			<input hidden class="form-control imgInput" name="img" type="file">
			<?php if($file == ''){ ?>
			<img src="<?=$adminpath;?>images/preview.jpg" alt="2" class='preview'>
	  		<?php }else{
	  		$imgfile=file_exists("../$file") ? $file : "manager/images/preview.jpg"; ?>
			<img src="<?=$path.$imgfile;?>" alt="<?=$path.$file;?>" class='preview'>
	  		<?php } ?>
		</div>
	</div>

	<div class="col-md-12">
		<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
	</div>
</form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Jab category change ho
    $("#category").change(function(){
        loadChildCategory($(this).val(), "");
    });

    // Agar page refresh pe already category selected hai
    var selectedCategory = $("#category").val();
    var selectedChild = "<?= $childcategoryid ?? '' ?>"; // PHP se current child id bhejna
    
    if(selectedCategory){
        loadChildCategory(selectedCategory, selectedChild);
    }

    function loadChildCategory(categoryId, selectedChild){
        $.ajax({
            url: window.location.href,
            type: "POST",
            data: {cat_id: categoryId},
            success: function(data){
                $("#childcategory").html(data);

                // Agar edit mode me koi child already selected hai to usko select kar do
                if(selectedChild){
                    $("#childcategory").val(selectedChild);
                }
            }
        });
    }
});
</script>