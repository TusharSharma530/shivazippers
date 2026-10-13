<?php $table="banners";
if(!empty($geturl) && $geturl=='create'){
	 // add data
	if(isset($_POST['addRecord'])){
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));

	// add feature image 
	$imagepath = isset($_FILES['img']['name']) ? createImgWebp("img", "banner") : "";

		// check data is already exist or not
		$sqlcheck = mysqli_query($con,"SELECT * FROM banners WHERE `title` = '$title'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Order no Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
		}else{
			$sqlins = mysqli_query($con,"INSERT INTO `banners` (`id`,  `file`, `title`, `sdesc`, `order`, `status`) VALUES (NULL,  '$imagepath', '$title', '$sdesc', '$order', 1)");
			
			if($sqlins){
				echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); $('#submitForm').remove();  </script>";
				echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}banner/create' class='btn btn-primary'>Create New</a></div>";
			}else{
				echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}
		}
	exit();
	}
} 



if(!empty($geturl) &&  $geturl=='edit'){
// show data for edit
$sqlshow = mysqli_query($con, "SELECT * FROM `banners` WHERE id = $geturl1");
$rwshow = mysqli_fetch_assoc($sqlshow);
$id=$rwshow['id'];
$file=$rwshow['file'];
$title=$rwshow['title'];
$sdesc=$rwshow['sdesc'];
$order=$rwshow['order'];
$status=$rwshow['status'];

// edit data start
if(isset($_POST['editRecord'])){
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
	if(empty($_FILES['img']['name'])){
		$imagepath = $file;
	}else{
		$imagepath = createImgWebp("img", "banner");
	}	

	$sqlins = mysqli_query($con,"UPDATE `banners` SET `file` = '$imagepath', `title` = '$title', `sdesc` = '$sdesc', `order` = '$order' WHERE id = $id");
	if($sqlins){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success');  </script>";
	}else{
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
	}

	exit();
}
}

// edit data end

?>