<?php // add data start
if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$category = trim(mysqli_real_escape_string($con,$_POST['category']));
		$subcategory = trim(mysqli_real_escape_string($con,$_POST['subcategory']));
		$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
		$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
		$mtitle = trim(mysqli_real_escape_string($con,$_POST['meta-title']));
		$mkeywords = trim(mysqli_real_escape_string($con,$_POST['meta-keywords']));
		$mdesc = trim(mysqli_real_escape_string($con,$_POST['meta-desc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$uploadpath = "";			

		if(isset($_FILES['img']['name'])){
			$uploadpath = createImgWebp("img", "childcategory");
		}else{
		}

		$sqlcheck = mysqli_query($con,"SELECT * FROM `childcategory` WHERE `title` = '$title'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
			
		}else{

			$sqlins = mysqli_query($con,"INSERT INTO `childcategory` (`id`, `cat_id`, `subcat_id`, `title`, `url`, `sdesc`, `desc`, `meta_title`, `meta_keywords`, `meta_desc`, `order`, `file`, `status`) VALUES (NULL, '$category', '$subcategory', '$title', '$url', '$sdesc', '$desc', '$mtitle', '$mkeywords', '$mdesc', '$order', '$uploadpath', 1)");
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}childcategory/create' class=' btn btn-primary'>Create New</a></div>";
		}else{
			echo mysqli_error($con);
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}
		}
		exit();
	} 
}
// add data end




// edit data start
if($geturl=='edit' && !empty($geturl)){
	// show data for edit
	$sqlshow = mysqli_query($con, "SELECT * FROM `childcategory` WHERE id = $geturl1");
	$rwshow = mysqli_fetch_assoc($sqlshow);
	$subcat_title=$rwshow['title'];
	$subcat_catid=$rwshow['cat_id'];
	$subcat_subcatid=$rwshow['subcat_id'];
	$subcat_file=$rwshow['file'];
	$subcat_order=$rwshow['order'];
	$subcat_sdesc=$rwshow['sdesc'];
	$subcat_desc=$rwshow['desc'];
	$subcat_metatitle=$rwshow['meta_title'];
	$subcat_metakeywords=$rwshow['meta_keyowrds'];
	$subcat_metadesc=$rwshow['meta_desc'];

	if(isset($_POST['editRecord'])){
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$url = seo_friendly_url($title);
	$category = trim(mysqli_real_escape_string($con,$_POST['category']));
	$subcategory = trim(mysqli_real_escape_string($con,$_POST['subcategory']));
	$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
	$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
	$mtitle = trim(mysqli_real_escape_string($con,$_POST['meta-title']));
	$mkeywords = trim(mysqli_real_escape_string($con,$_POST['meta-keywords']));
	$mdesc = trim(mysqli_real_escape_string($con,$_POST['meta-desc']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	 
	if(empty($_FILES['img']['name'])){
		$uploadpath = $cat_file;
	}else{
		$uploadpath = createImgWebp("img", "childcategory");
		if(!empty($cat_file)){
			if(file_exists("../".$cat_file)){
				unlink("../".$cat_file);
			}			
		}
	}
	$sqlcheck = mysqli_query($con,"UPDATE `childcategory` SET `cat_id`='$category',`subcat_id`='$subcategory',`title`='$title',`url`='$url',`sdesc`='$sdesc',`desc`='$desc',`meta_title`='$mtitle',`meta_keywords`='$mkeywords',`meta_desc`='$mdesc',`order`='$order',`file`='$uploadpath' WHERE `id` = $geturl1");
		
	if($sqlcheck){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
	
	exit();
	}	 
}

// edit data end 

if($_POST['fetchCategory'] ?? false){
$catid = $_POST['catid'];
$sqlcat=mysqli_query($con,"SELECT * FROM `category` WHERE `status` = 1 AND `type` != 1 AND `type` = $catid ORDER BY `title` ASC");
if(mysqli_num_rows($sqlcat)){
$data = "<option value=''>--Select Subcategory--</option>";
while($rwcat=mysqli_fetch_array($sqlcat)){
$cattitle=$rwcat['title'];
$catid=$rwcat['id'];
$data .= "<option value='$catid'>$cattitle</option>";
} }else{
	echo "<option value=''>No Subcategory</option>";
}
echo $data;
exit();
}


$table="childcategory";

?>
