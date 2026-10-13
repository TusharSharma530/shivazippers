<?php if($geturl=='images'){
	$table="gallery_imgs";
	}else{
	$table="gallery";
	}
if(!empty($geturl) && $geturl=='create'){
	// add data
	if(isset($_POST['addRecord'])){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		// upload image
		$uploadpath = !empty($_FILES['img']['name']) ? createImgWebp("img", $table) : "";
		//upload data
		$sqlins=__insertData($con, $table, ['id' => NULL, 'title' => $title, 'url' => $url, 'desc' => $desc, 'file' => $uploadpath, 'order' => $order]);
			
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); 
					$('#submitForm').hide();
				 </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='{$adminpath}gallery/create' class=' btn btn-primary'>Create New</a></div>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
			}

		exit();
	} 
} 


// edit data
if(!empty($geturl) && $geturl=='edit'){
	// show data for edit
	$rwshow=__selectOneData($con,$table,$geturl1);
	$title=$rwshow['title'];
	$file=$rwshow['file'];
	$desc=$rwshow['desc'];
	$order=$rwshow['order'];

	// edit data
	if($_POST['editRecord'] ?? false){
		$title = trim(mysqli_real_escape_string($con,$_POST['title']));
		$url = seo_friendly_url($title);
		$desc = trim(mysqli_real_escape_string($con,$_POST['idesc']));
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		// upload image
		$uploadpath = !empty($_FILES['img']['name']) ? createImgWebp("img", $table) : $file;
		//upload data
		$sqlins=__updateData($con, $table, $geturl1, ['title' => $title, 'url' => $url, 'desc' => $desc, 'file' => $uploadpath, 'order' => $order]);
			
		if($sqlins){
			echo "<script>swal('Updated Successfully', 'Click `OK` to Close', 'success');</script>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error');</script>";
			}

		exit();
	} 
}

if(!empty($geturl) && $geturl=='images'){
    // add multiple image of gallery
    if(isset($_POST['addRecord'])){
        $i = 0;
        $orders = $_POST['order'];

        // Upload folder ka path
        $uploadDir = "../branch/assets/gallery_img/"; 
        $dbPathDir = "branch/assets/gallery_img/"; 

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
                $sqlins = mysqli_query($con,"INSERT INTO `gallery_imgs` (`id`, `galid`, `file`, `order`) 
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
                    <a href='{$adminpath}gallery/images/{$geturl1}' class='btn btn-primary'>Create New</a>
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