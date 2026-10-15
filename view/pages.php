<?php
// Product detail page (our-products/<cat>/<child>) par breadcrumb nahi chahiye,
// kyunki title upar hero me hi dikh raha hai.
if(!($geturl1 == 'our-products' && !empty($geturl3))){
    include('view/breadcrumb.php');
}

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
	}elseif(in_array($geturl2, ['about-us'])){
		if(empty($geturl3)){
			include("view/about-us.php");
		}else{
			echo "Page Not Found.";
		}
	}elseif(in_array($geturl2, ['upcoming-events','substantially-vision-2030'])){
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