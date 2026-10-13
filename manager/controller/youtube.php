<?php $table="youtube";

if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$code = trim(mysqli_real_escape_string($con,$_POST['code']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));

		$sqlcheck = mysqli_query($con,"SELECT * FROM `$table` WHERE `code` = '$code'");
		if(mysqli_num_rows($sqlcheck)){
			echo "<script>swal('Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
		}else{
			$sqlins = __insertData($con, $table, ['id'=> NULL, 'code'=> $code, 'order'=> $order, 'status'=> 1]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}youtube/create' class=' btn btn-primary'>Create New</a></div>";
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
	$code=$rwshow['code'];
	$order=$rwshow['order'];
	
	// edit data
	if(isset($_POST['editRecord'])){
		$code = trim(mysqli_real_escape_string($con,$_POST['code']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		
		// update data from query
		$sqlup=__updateData($con,$table,$geturl1,['code'=>$code,  'order'=>$order]);
		if($sqlup){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
		
		exit();
	} 
}

?>