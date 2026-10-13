<?php $table="about";

if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$subtitle = trim(mysqli_real_escape_string($con,$_POST['subtitle']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));

		$sqlcheck = mysqli_query($con,"SELECT * FROM `$table` WHERE `title` = '$title'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
		}else{
			$sqlins = __insertData($con, $table, ['id'=> NULL, 'title'=> $title, 'subtitle'=> $subtitle, 'url'=> $url, 'desc'=> $desc, 'status'=> 1]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}about/create' class=' btn btn-primary'>Create New</a></div>";
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
	$subtitle=$rwshow['subtitle'];
	$desc=$rwshow['desc'];
	// edit data
	if(isset($_POST['editRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$subtitle = trim(mysqli_real_escape_string($con,$_POST['subtitle']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
		
		$sqlup=__updateData($con,$table,$geturl1,['title'=>$title, 'subtitle'=>$subtitle, 'url'=>$url, 'desc'=>$desc, 'date'=>$date]);
		if($sqlup){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
		
		exit();
	} 
}

?>