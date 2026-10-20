<?php $table="certificateormembership";

// add data
if(isset($_POST['addRecord'])){
	$type = trim(mysqli_real_escape_string($con,$_POST['type']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	$uploadpath = "";

	if(isset($_FILES['img']['name']) && $_FILES['img']['error'] == 0){
		$uploadpath = createImgWebp("img", $table);
	}else{
		echo "<script>swal('Please Select Image', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();</script>";
		exit();
	}

	$sqlins=__insertData($con,$table, ['id' => null, 'type' => $type, 'file' => $uploadpath, 'order' => $order, 'status' => 1]);

	if($sqlins){
		echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
				setTimeout(function(){ location.reload(); }, 1200);
			 </script>";
	}else{
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
	}

	exit();
}
?>
