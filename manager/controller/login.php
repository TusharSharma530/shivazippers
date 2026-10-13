<?php if(isset($_POST['login'])){
$userName = trim(mysqli_real_escape_string($con, $_POST['userName']));
$password = trim(mysqli_real_escape_string($con, md5($_POST['password'])));

$sqlcheck = mysqli_query($con, "SELECT * FROM `admin` WHERE `username` = '$userName' AND password = '$password'");
if(mysqli_num_rows($sqlcheck)){
	while($row = mysqli_fetch_assoc($sqlcheck)){
	$_SESSION['username'] = $row['username'];
	echo json_encode(["status"=>true, "msg"=>""]);
	}
}else{
	echo json_encode(["status"=>false, "msg"=>"<div class='alertbox'><p>Invalid Username or Password</p></div>"]);
}
exit();

}

?>