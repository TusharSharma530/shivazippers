<?php $table="settings"; 
$sqlshow = mysqli_query($con, "SELECT * FROM `settings` WHERE id = '1'");
$rwshow = mysqli_fetch_array($sqlshow);

if(isset($_POST['editRecord'])){
	$web_name = mysqli_real_escape_string($con, $_POST['web_name']);
	$headercenterline = mysqli_real_escape_string($con, $_POST['headercenterline']);
	$email_id = mysqli_real_escape_string($con, $_POST['email_id']);
	$alternate_email_id = mysqli_real_escape_string($con, $_POST['alternate_email_id']);
	$contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
	$alternate_no = mysqli_real_escape_string($con, $_POST['alternate_no']);
	$whatsapp_no = mysqli_real_escape_string($con, $_POST['whatsapp_no']);
	$address1 = mysqli_real_escape_string($con, $_POST['address1']);
	$address2 = mysqli_real_escape_string($con, $_POST['address2']);
	$youtubelink = mysqli_real_escape_string($con, $_POST['youtubelink']);
	$facebook = mysqli_real_escape_string($con, $_POST['facebook']);
	$youtube = mysqli_real_escape_string($con, $_POST['youtube']);
	$instagram = mysqli_real_escape_string($con, $_POST['instagram']);
	$twitter = mysqli_real_escape_string($con, $_POST['twitter']);
	$linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
	$googletag = mysqli_real_escape_string($con, $_POST['googletag']);
	$map_iframe1 = mysqli_real_escape_string($con, $_POST['map_iframe1']);
	$map_iframe2 = mysqli_real_escape_string($con, $_POST['map_iframe2']);
	$footerdesc = mysqli_real_escape_string($con, $_POST['footerdesc']);
	$meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
	$meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
	$meta_desc = mysqli_real_escape_string($con, $_POST['meta_desc']);
	$experience = mysqli_real_escape_string($con, $_POST['experience']);

	if(empty($_FILES['logoImg']['name'])){
		$imgpath = $rwshow['logo'];
	}else{
		$imgpath = createImgWebp("logoImg", "logo");
		if(!empty($rwshow['logo']) && file_exists('../'.$rwshow['logo'])){
			unlink('../'.$rwshow['logo']);
		}
	}

	$sqlabout = mysqli_query($con, "UPDATE settings SET 
		web_name = '$web_name',
		headercenterline = '$headercenterline',
		email_id = '$email_id',
		alternate_email_id = '$alternate_email_id',
		contact_no = '$contact_no',
		alternate_no = '$alternate_no',
		whatsapp_no = '$whatsapp_no',
		address1 = '$address1 ',
		address2 = '$address2 ',
		youtubelink = '$youtubelink ',
		facebook = '$facebook',
		youtube = '$youtube' ,			
		instagram = '$instagram ',
		twitter = '$twitter', 
		linkedin = '$linkedin', 
		map_iframe1 = '$map_iframe1',
		map_iframe2 = '$map_iframe2',
		googletag = '$googletag',
		footerdesc = '$footerdesc',
		meta_title = '$meta_title',
		meta_keywords = '$meta_keywords',
		meta_desc = '$meta_desc',
		logo = '$imgpath',
		experience = '$experience'
		WHERE id = 1");
	
		
		if($sqlabout){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success');</script>";
		}else{
			echo mysqli_error($con);
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
	
	exit();
}
?>
