<?php $table="products";

if(!empty($geturl) && $geturl=='create'){
	if(isset($_POST['addRecord'])){
		$category = trim(mysqli_real_escape_string($con,$_POST['category']));
		$childcategory = trim(mysqli_real_escape_string($con,$_POST['childcategory']));
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
		$keyfeatures = trim(mysqli_real_escape_string($con,$_POST['keyfeatures']));
		$applications = trim(mysqli_real_escape_string($con,$_POST['applications']));
		$variants = trim(mysqli_real_escape_string($con,$_POST['variants']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$uploadpath = "";

		if(isset($_FILES['img']['name'])){
			$uploadpath = createImgWebp("img", $table);
		}
		$sqlins=__insertData($con, $table, ['id'=>'NULL', 'category'=>$category, 'childcategory'=>$childcategory, 'title'=>$title, 'url'=>$url, 'desc'=>$desc, 'keyfeatures'=>$keyfeatures, 'applications'=>$applications, 'variants'=>$variants, 'file'=>$uploadpath, 'order'=>$order, 'status'=>'1']);

		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}products/create' class=' btn btn-primary'>Create New</a></div>";
		}else{
				
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}

		exit();
	}
}

if(!empty($geturl) && $geturl=='edit'){
	// show data for edit
	$sqlshow = mysqli_query($con, "SELECT * FROM `$table` WHERE id = $geturl1");
	$rwshow = mysqli_fetch_array($sqlshow);
	$editid=$rwshow['id'];
	$categoryid=$rwshow['category'];
	$childcategoryid=$rwshow['childcategory'];
	$title=$rwshow['title'];
	$order=$rwshow['order'];
	$desc=$rwshow['desc'];
	$keyfeatures=$rwshow['keyfeatures'];
	$applications=$rwshow['applications'];
	$variants=$rwshow['variants'];
	$file=$rwshow['file'];


	// edit data 
	if($_POST['editRecord'] ?? false){
	$category = trim(mysqli_real_escape_string($con,$_POST['category']));
	$childcategory = trim(mysqli_real_escape_string($con,$_POST['childcategory']));
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$url = seo_friendly_url($title);
	$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
	$keyfeatures = trim(mysqli_real_escape_string($con,$_POST['keyfeatures']));
	$applications = trim(mysqli_real_escape_string($con,$_POST['applications']));
	$variants = trim(mysqli_real_escape_string($con,$_POST['variants']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	
	if(empty($_FILES['img']['name'])){
		$uploadpath = $file;
	}else{
		if(file_exists("../$file")){
			unlink("../$file" ?? false);
		}
		$uploadpath = createImgWebp("img", $table);
	}

	// __updateData($con, $tbl, $id, $array=null)
	$sqlupdate=__updateData($con, $table, $geturl1, ['category'=>$category, 'childcategory'=>$childcategory, 'title'=>$title,  'url'=>$url, 'desc'=>$desc, 'keyfeatures'=>$keyfeatures, 'applications'=>$applications, 'variants'=>$variants, 'file'=>$uploadpath, 'order'=>$order]);

	if($sqlupdate){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
	
	exit();
} 
}




// add more images 
if(!empty($geturl) && $geturl=='images'){
    // add multiple image of gallery
    if(isset($_POST['addRecord'])){
        $i = 0;
        $orders = $_POST['order'];

        // Upload folder ka path
        $uploadDir = "../branch/assets/productsimages/"; 
        $dbPathDir = "branch/assets/productsimages/"; 

        // Agar folder exist nahi karta, to bana do
        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['img']["name"] as $row=>$name){

            if(empty($name)) continue; // skip empty files

            $images_content = explode(".", $name);
            $ext = strtolower(end($images_content)); // file extension
            $gallery_imagename = round(microtime(true)).$i.'.'.$ext;

            $uploadpath = $dbPathDir.$gallery_imagename; // DB ke liye path
            $targetFile = $uploadDir.$gallery_imagename; // file system ke liye path

            // Move uploaded file
            if(move_uploaded_file($_FILES["img"]["tmp_name"][$i], $targetFile)){
                // Insert DB me
                $sqlins = mysqli_query($con,"INSERT INTO `productimages` (`id`, `proid`, `file`, `order`) 
                    VALUES (NULL, '$geturl1', '$uploadpath', '{$orders[$i]}')");
            }else{
                echo "<p style='color:red'>❌ Failed to upload file: {$name} (Error Code: ".$_FILES['img']['error'][$i].")</p>";
            }
            $i++;
        }  

        if(isset($sqlins) && $sqlins){
            echo "<script>
                    swal('Added Successfully', 'Click `OK` to Close', 'success'); 
                    $('#submitForm').hide();
                 </script>";
            echo "<div class='col-md-12 padd0 text-center'>
                    <a href='{$adminpath}products/images/{$geturl1}' class='btn btn-primary'>Create New</a>
                  </div>";
        }else{    
            echo mysqli_error($con);
            echo "<script>
                    swal('Failed', 'Click `OK` to try Again', 'error'); 
                    $('#submitForm').show();
                  </script>";
        }
        exit();
    } 
}
?>




