<?php if(empty($geturl)){
// set status 
if(isset($_POST['updateStatus'])){
$id = $_POST['id'];
$tbl = $_POST['table'];
$sql = mysqli_query($con, "SELECT * FROM `$tbl` WHERE `id` = '$id'");
if(mysqli_num_rows($sql)){
$rw = mysqli_fetch_array($sql);
$status=$rw['status'];
$status=$status==1 ? 0 : 1;
	mysqli_query($con, "UPDATE `$tbl` SET `status` = $status WHERE `id` = '$id'");
	echo true;
}else{
	echo false;
}
exit();
}
}




// delete data start
if(empty($geturl)){
if(isset($_POST['deletedata'])){
$id = $_POST['id'];
$tbl = $_POST['tbl'];
$sqldelImg = mysqli_query($con, "SELECT * FROM `$tbl` WHERE `id`=$id");
if(mysqli_num_rows($sqldelImg)){
	$rowimg = mysqli_fetch_array($sqldelImg);
		$imgid = "../".$rowimg['file'];
		unlink($imgid);

	$sqldelete = mysqli_query($con,"DELETE FROM `$tbl` WHERE `id`=$id");
	if($sqldelete){
		echo 'true';
	}else{
		echo 'false';
	}	
	
}
	
	exit();
}
}
// delete data end


// delete selected data start
if($_POST['deleteselecteddata'] ?? false){
	$ids = $_POST['ids'];
	$tbl=$_POST['tbl'];
	$data=__selectData($con,$tbl, " WHERE id IN($ids)");
	while($rw=mysqli_fetch_array($data)){
		$file=$rw['file'];
		if(!empty($file) && file_exists("../".$file)){
			unlink("../".$file);
		}
	}

	$delete=__deleteData($con,$tbl,$ids);
	if($delete){
		echo true;
	}else{
		echo false;
	}



	exit();

	echo true;
	exit();
}

// $data=__selectData($con, 'category');
// while($rw=mysqli_fetch_array($data)){
//     echo "hello";
// }
// delete selected data end







if(empty($geturl)){
$pagetitle=ucfirst($gettype);
}else{
$pagetitle=ucfirst($gettype)." <span>|</span> ".ucfirst($geturl);
}

?>