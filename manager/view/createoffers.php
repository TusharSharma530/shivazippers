<?php include 'config.php';
$pagetitle = 'Create Offer';
echo empty($_SESSION['username']) ? "<script>window.location.href='{$path}manager'</script>" : "";
	
// add data
if(isset($_POST['addRecord'])){
$heading = trim(mysqli_real_escape_string($con,$_POST['heading']));
$link = trim(mysqli_real_escape_string($con,$_POST['link']));
if(empty($link)){
	$link = "javascript:";
}
$order = trim(mysqli_real_escape_string($con,$_POST['order']));


// add feature image 
$imagepath = isset($_FILES['img']['name']) ? createImgWebp("img", "offers") : "";

	// check data is already exist or not
	$sqlcheck = mysqli_query($con,"SELECT * FROM `special_offers` WHERE `heading` = '$heading'");
	if(mysqli_num_rows($sqlcheck)){
		echo "<script>swal('Order no Already in Record', 'Click `OK` to try Again', 'warning'); $('#submitForm').show();  </script>";
	}else{
		$sqlins = mysqli_query($con,"INSERT INTO `special_offers` (`id`, `heading`, `file`, `order`, `status`, `link`) VALUES (NULL, '$heading', '$imagepath', '$order', 1, '$link')");
		
		if($sqlins){
			echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success'); $('#submitForm').remove();  </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='createoffers.php' class='btn btn-primary'>Create New</a></div>";
		}else{
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>";
		}
	}
exit();
}





	include 'include/header.php';
	include 'include/sidebar.php';

 ?>


<section class="main-dashboard">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
	<div class="page-title">						
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="offers.php"> List</a>
		</div>
	</div>
</div>

		

<div class="col-md-12">
	<div class="page-content">
		<div class="msgbox">
			<!-- <div class="loading-fetch">
				
			</div> -->
		</div>
		<form method="POST" id="submitForm" class="row">
			<div class="mb-3 col-md-12">
				<div class="row">
					<div class="mb-3 col-md-9">
						<label for="heading" class="form-label">Heading</label>
						<input type="text" class="form-control" id="heading" name="heading" required>
					</div>
					<div class="mb-3 col-md-3">
						<label for="order" class="form-label">Order</label>
						<input type="text" class="form-control" id="order" name="order" required>
					</div>										
					<div class="mb-3 col-md-12">
						<label for="link" class="form-label">Link</label>
						<input type="text" class="form-control" id="link" name="link">
					</div>

				</div>
			</div>
			

			<div class="mb-2 col-md-12">
			  	<label for="formFile" class="form-label">Main Image</label>
			  	<div class="imgquestion other">
					<a href="javascript:" class="imgclose ri-close-circle-line"></a>
					<input hidden class="form-control imgInput" name="img" type="file">
	  				<img src="images/preview.jpg" alt="preview" class='preview'>
	  			</div>
			</div>

			<div class="my-2 col-md-12">
				<input type="submit" name="addRecord" class="submitInput" value="Add Record">
			</div>
		</form>
	</div>
</div>

</div>	
</div>				
</section>


	<?php include 'include/footer.php'; ?>