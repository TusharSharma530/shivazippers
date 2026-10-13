<?php include 'config.php';
$pagetitle = "Edit Offer";
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

$id = $_GET['id'] ?? "";
$sqlbanners = mysqli_query($con, "SELECT * FROM `special_offers` WHERE id = $id");
$row = mysqli_fetch_assoc($sqlbanners);


 if(isset($_POST['editRecord'])){
	$heading = trim(mysqli_real_escape_string($con,$_POST['heading']));
	$link = trim(mysqli_real_escape_string($con,$_POST['link']));
	if(empty($link)){
		$link = "javascript:";
	}
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));

	if(empty($_FILES['img']['name'])){
		$image = $row['file'];
		$imagepath = $image;
	}else{
		$imagepath = createImgWebp("img", "offers");

	}	

	$sqlins = mysqli_query($con,"UPDATE `special_offers` SET `heading` = '$heading', `file` = '$imagepath', `order` = '$order', `link` = '$link' WHERE id = $id");
		
	if($sqlins){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success');  </script>";
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
	}
	
	exit();
}





	include 'include/header.php';
	include 'include/sidebar.php';

 ?>


<section class="main-dashboard" style="overflow: auto; height: 100vh;">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>
		<div class="createbtn">
			<a href="createoffers.php"> Add New</a>
			<a href="offers.php"> List</a>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="page-content">
	<div class="msgbox"></div>
	<form method="POST" id="submitForm" class="row">
		<div class="mb-3 col-md-12">
				<div class="row">
					<div class="mb-3 col-md-9">
						<label for="heading" class="form-label">Heading</label>
						<input type="text" class="form-control" id="heading" name="heading" value="<?php echo $row['heading']; ?>" required>
					</div>
					<div class="mb-3 col-md-3">
						<label for="order" class="form-label">Order</label>
						<input type="text" class="form-control" id="order" name="order" value="<?php echo $row['order']; ?>" required>
					</div>
					<div class="mb-3 col-md-12">
						<label for="link" class="form-label">Link</label>
						<input type="text" class="form-control" id="link" name="link" value="<?php if($row['link']!="javascript:"){ echo $row['link'];} ?>">
					</div>
				</div>
			</div>
		<div class="mb-2 col-md-12">
		  	<label for="formFile" class="form-label">Image</label>
		  	<div class="imgquestion other">
				<?php $active = empty($row['file']) ? "" : "active"; ?>
				<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
				<input hidden class="form-control imgInput" name="img" type="file">
  				<?php if(empty($row['file'])){ ?>
  				<img src="images/preview.jpg" alt="preview" class='preview'>
  				<?php }else{ ?>
  				<img src="<?=$path.$row['file'];?>" alt="<?=$row['file'];?>" class='preview'>
  				<?php } ?>
  			</div>
		</div>

						
		<div class="col-md-12">
			<input type="submit" name="editRecord" class="submitInput" value="Edit Record">
		</div>
	</form>
	</div>
</div>

</div>
</div>				
</section>

<?php include 'include/footer.php'; ?>