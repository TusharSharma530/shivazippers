<?php include('view/breadcrumb.php'); 
if(!empty($geturl1) && file_exists("view/$geturl1.php")){
include("view/$geturl1.php");
}else{
	if(in_array($geturl1, ['company-information'])){
		if(!empty($geturl1) && file_exists("view/$geturl1.php")){
			include("view/$geturl1.php");
		}elseif(!empty($geturl2) && file_exists("view/$geturl2.php")){
			include("view/$geturl2.php");
		}else{
			echo "Page Not Found.";
		}
	}elseif(in_array($geturl2, ['our-applications'])){
		if(!empty($geturl3)){
			include("view/$geturl2.php");
		}else{
			echo "Page Not Found.";
		}
	}elseif(in_array($geturl2, ['customization-request'])){
		if(empty($geturl3)){
			include("view/$geturl2.php");
		}else{
			echo "Page Not Found.";
		}
	}else{
		echo $data;
	}

}


?>