<?php $table="faqs";

if(!empty($geturl) && $geturl=='create'){
	// add data
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));

		$sqlins=__insertData($con,$table, ['id' => null, 'title' => $title, 'url' => $url, 'desc' => $desc, 'order' => $order, 'status'=>1]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}faqs/create' class=' btn btn-primary'>Create New</a></div>";
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

	// edit data
	if(isset($_POST['editRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));

		// update query
		$sqlup=__updateData($con,$table,$geturl1,['title' => $title,  'url' => $url, 'desc' => $desc, 'order' => $order]);

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







