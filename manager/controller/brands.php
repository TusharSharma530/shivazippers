<?php $table="brands";

if(!empty($geturl) && $geturl=='create'){
	// add data
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$uploadpath = "";

		if(isset($_FILES['img']['name'])){
			$uploadpath = createImgWebp("img", $table);
		}


		$sqlins=__insertData($con,$table, ['id' => null, 'title' => $title, 'url' => $url, 'file' => $uploadpath, 'order' => $order, 'status' => 1]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}brands/create' class=' btn btn-primary'>Create New</a></div>";
		}else{
				
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}

		exit();
	}
}

if(!empty($geturl) && $geturl=='edit'){
	// show data for edit data
	$sqlshow = mysqli_query($con, "SELECT * FROM `$table` WHERE id = $geturl1");
	$rwshow = mysqli_fetch_array($sqlshow);
	$title=$rwshow['title'];
	$order=$rwshow['order'];
	$desc=$rwshow['desc'];
	$file=$rwshow['file'];

	// edit data
	if(isset($_POST['editRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		
		// update image
		$uploadpath = empty($_FILES['img']['name']) ? $file : createImgWebp("img", $table);
		if(!empty($file) && file_exists("../$file")){
			unlink("../$file");
		}
		
		// update query
		$sqlup=__updateData($con,$table,$geturl1,['title' => $title,  'url' => $url, 'file' => $uploadpath, 'order' => $order]);

		// send message after submitting data
		if($sqlup){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
	
	exit();
	}
}
?>







