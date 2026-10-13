<?php include 'config.php';
$pagetitle = 'Create Choose Us';

if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}


if(isset($_POST['addRecord'])){
	$type = trim(mysqli_real_escape_string($con,$_POST['type']));
	$title = trim(mysqli_real_escape_string($con,$_POST['title']));
	$order = trim(mysqli_real_escape_string($con,$_POST['order']));
	$desc = trim(mysqli_real_escape_string($con,$_POST['desc']));	

	$sqlins = mysqli_query($con,"INSERT INTO `chooseus`(`id`, `type`, `title`, `desc`, `order`, `status`) VALUES (null, '$type', '$title', '$desc', '$order', 1)");
		
	if($sqlins){
		echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success');$('#submitForm').remove();  </script>";
			echo "<div class='col-md-12 padd0 text-center'><a href='createchooseus.php' class='btn btn-primary'>Create New</a></div>";
	}else{
			
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); $('#submitForm').show();</script>" . mysqli_error($con);
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
				<option value="1">Why Choose Us</option>
				<option value="2">Best Indian Market</option>
			</select>
		</div>

		<div class="mb-3 col-md-6">
			<label for="title" class="form-label">Title</label>
			<input type="text" class="form-control" name="title" required>
		</div>
		<div class="mb-3 col-md-2">
			<label for="order" class="form-label">Order</label>
			<input type="text" class="form-control" name="order" required>
		</div>

		<div class="mb-3 col-md-12">
			<label for="desc" class="form-label">Description</label>
			<textarea type="text" class="tinyMCE"  name="desc"></textarea>
		</div>

		<div class="mt-2 mx-auto">
			<input type="submit" value="Add Record" name="addRecord" class="submitInput">
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