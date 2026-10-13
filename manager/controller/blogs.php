<?php $table="blogs";

if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$date = trim(mysqli_real_escape_string($con,$_POST['date']));
		$uploadpath = "";

		if(isset($_FILES['img']['name'])){
			$uploadpath = createImgWebp("img", $table);
		}

		$sqlcheck = mysqli_query($con,"SELECT * FROM `$table` WHERE `title` = '$title'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
		}else{
			$sqlins = __insertData($con, $table, ['id'=> NULL, 'title'=> $title, 'url'=> $url, 'desc'=> $desc, 'sdesc'=> $sdesc, 'file'=> $uploadpath, 'order'=> $order, 'date'=> $date, 'status'=> 1]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}blogs/create' class=' btn btn-primary'>Create New</a></div>";
		}else{
				
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}
		}
		exit();
	} 
}

// edit data 
if(!empty($geturl) && $geturl=='edit'){
	// show data for edit
	$sqlshow = mysqli_query($con, "SELECT * FROM `$table` WHERE id = $geturl1");
	$rwshow = mysqli_fetch_assoc($sqlshow);
	$title=$rwshow['title'];
	$date=$rwshow['date'];
	$file=$rwshow['file'];
	$order=$rwshow['order'];
	$sdesc=$rwshow['sdesc'];
	$desc=$rwshow['desc'];
	// edit data
	if(isset($_POST['editRecord'])){
		$tagline = trim(mysqli_real_escape_string($con,$_POST['tagline']));
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$sdesc = trim(mysqli_real_escape_string($con,$_POST['sdesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$date = trim(mysqli_real_escape_string($con,$_POST['date']));
		
		if(empty($_FILES['img']['name'])){
			$uploadpath = $file;
		}else{
			if(!empty($file) && file_exists("../".$file)){
				unlink("../".$file);
			}
			$uploadpath = createImgWebp("img", $table);
		}
		// update data from query
		$sqlup=__updateData($con,$table,$geturl1,['tagline'=>$tagline, 'title'=>$title, 'url'=>$url, 'desc'=>$desc, 'sdesc'=>$sdesc, 'file'=>$uploadpath, 'order'=>$order, 'date'=>$date]);
		if($sqlup){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
		
		exit();
	} 
}

?>