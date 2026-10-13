<?php // add data start
if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$type = trim(mysqli_real_escape_string($con,$_POST['type']));
		$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
		$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
		$mtitle = trim(mysqli_real_escape_string($con,$_POST['meta-title']));
		$mkeywords = trim(mysqli_real_escape_string($con,$_POST['meta-keywords']));
		$mdesc = trim(mysqli_real_escape_string($con,$_POST['meta-desc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$uploadpath = "";			

		if(isset($_FILES['img']['name'])){
			$uploadpath = createImgWebp("img", "category");

		}else{
		}

		$sqlcheck = mysqli_query($con,"SELECT * FROM `category` WHERE `title` = '$title'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
			
		}else{
			$sqlins = mysqli_query($con,"INSERT INTO `category` (`id`, `title`, `type`, `url`, `sdesc`, `desc`, `file`, `meta_title`, `meta_keywords`, `meta_desc`, `order`) VALUES (NULL, '$title', '$type', '$url', '$sdesc', '$desc', '$uploadpath', '$mtitle', '$mkeywords', '$mdesc', '$order')");
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}category/create' class=' btn btn-primary'>Create New</a></div>";
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
	if(isset($_POST['editRecord'])){
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$url = seo_friendly_url($title);
	$type = trim(mysqli_real_escape_string($con,$_POST['type']));
	$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
	$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
	$mtitle = trim(mysqli_real_escape_string($con,$_POST['meta-title']));
	$mkeywords = trim(mysqli_real_escape_string($con,$_POST['meta-keywords']));
	$mdesc = trim(mysqli_real_escape_string($con,$_POST['meta-desc']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	 
	if(empty($_FILES['img']['name'])){
		$uploadpath = $cat_file;
	}else{
		$uploadpath = createImgWebp("img", "category");
		if(!empty($cat_file)){
			if(file_exists("../".$cat_file)){
				unlink("../".$cat_file);
			}			
		}
	}
	$sqlcheck = mysqli_query($con,"UPDATE `category` SET title = '$title', `url` = '$url', `type` = '$type', `desc` = '$desc', `sdesc` = '$sdesc', `file` = '$uploadpath', `meta_title` = '$mtitle', `meta_keywords` = '$mkeywords', `meta_desc` = '$mdesc', `order` = '$order'  WHERE id = $geturl1");
		
	if($sqlcheck){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
	
	exit();
	}	 
}

// edit data end 


$table="category";

?>
