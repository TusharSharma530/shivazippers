<?php include "config.php";
$pagetitle = 'Edit Choose Us';
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

$id = $_GET['id'] ?? "";
$sqlblogs = mysqli_query($con, "SELECT * FROM `chooseus` WHERE id = $id");
$rwblogs = mysqli_fetch_assoc($sqlblogs);

if(isset($_POST['editRecord'])){
	$type = trim(mysqli_real_escape_string($con,$_POST['type']));
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));	
	
	$sqlcheck = mysqli_query($con,"UPDATE `chooseus` SET `type` = '$type', `title` = '$title', `desc` = '$desc', `order` = '$order' WHERE `id` = $id");
		
	if($sqlcheck){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
		
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
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
		<div class="createbtn d-flex">
			<a href="createchooseus.php"> Add New</a>
			<a href="chooseus.php"> List</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
		<div class="msgbox"></div>
		<form method="POST" id="submitForm">
			<div class="row">
			<div class="mb-3 col-md-4">
				<label for="type" class="form-label">Type</label>
				<select name="type" id="type" class="form-control form-select">
					<option value="">--Select Type--</option>
					<?php if($rwblogs['type']==1){ ?>
					<option value="1" selected>Why Choose Us</option>
					<option value="2">Best Indian Market</option>
					<?php }else if($rwblogs['type']==2){ ?>
					<option value="1">Why Choose Us</option>
					<option value="2" selected>Best Indian Market</option>
					<?php }else{ ?>
					<option value="1">Why Choose Us</option>
					<option value="2">Best Indian Market</option>
					<?php } ?>
				</select>
			</div>

			<div class="mb-3 col-md-6">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control" name="title" required value="<?=$rwblogs['title'];?>">
			</div>
			
			<div class="mb-3 col-md-2">
				<label for="order" class="form-label">Order</label>
				<input type="text" class="form-control" name="order" required value="<?=$rwblogs['order'];?>">
			</div>

			<div class="mb-3 col-md-12">
				<label for="desc" class="form-label">Description</label>
				<textarea type="text" class="tinyMCE"  name="desc"><?=$rwblogs['desc'];?></textarea>
			</div>

			<div class="mt-2 mx-auto">
				<input type="submit" value="Edit Record" name="editRecord" class="btn btn-primary">
			</div>

			</div>
		</form>
	</div>
</div>
					
</div>
</div>
</section>

	
<?php 
	include "include/footer.php"; 
?>