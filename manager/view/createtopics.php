<?php include 'config.php';
$pagetitle = 'Create Topics';

if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}


if(isset($_POST['addRecord'])){
	$global_title = trim(mysqli_real_escape_string($con,$_POST['global_title']));
	$global_desc = trim(mysqli_real_escape_string($con,$_POST['global_desc']));
	$years_title = trim(mysqli_real_escape_string($con,$_POST['years_title']));
	$products_title = trim(mysqli_real_escape_string($con,$_POST['products_title']));
	$clients_title = trim(mysqli_real_escape_string($con,$_POST['clients_title']));
	$branches_title = trim(mysqli_real_escape_string($con,$_POST['branches_title']));
	$years_no = trim(mysqli_real_escape_string($con,$_POST['years_no']));	
	$products_no = trim(mysqli_real_escape_string($con,$_POST['products_no']));	
	$clients_no = trim(mysqli_real_escape_string($con,$_POST['clients_no']));	
	$branches_no = trim(mysqli_real_escape_string($con,$_POST['branches_no']));		

	$sqlins = mysqli_query($con,"INSERT INTO `topics`(`id`, `global_title`, `global_desc`, `years_title`, `products_title`, `clients_title`, `branches_title`, `years_no`, `products_no`, `clients_no`, `branches_no`) VALUES (null, '$global_title', '$global_desc', '$years_title', '$products_title', '$clients_title', '$branches_title', '$years_no', '$products_no', '$clients_no', '$branches_no')");
		
	if($sqlins){
		echo "<script>swal('Added Successfully', 'Click `OK` to Close', 'success');</script>";
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
			<a href="topics.php"> List</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
	<div class="msgbox"></div>
	<form method="POST" id="submitForm">
		<div class="row">

		<div class="mb-3 col-md-12">
			<label for="global_title" class="form-label">Global Title</label>
			<input type="text" class="form-control" name="global_title" required>
		</div>

		<div class="mb-3 col-md-12">
			<label for="global_desc" class="form-label">Global Description</label>
			<textarea type="text" class="tinyMCE"  name="global_desc"></textarea>
		</div>

		<div class="mb-3 col-md-3">
			<label for="years_title" class="form-label">Years Title</label>
			<input type="text" class="form-control" name="years_title" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="products_title" class="form-label">Products Title</label>
			<input type="text" class="form-control" name="products_title" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="clients_title" class="form-label">Clients Title</label>
			<input type="text" class="form-control" name="clients_title" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="branches_title" class="form-label">Branches Title</label>
			<input type="text" class="form-control" name="branches_title" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="years_no" class="form-label">Years No.</label>
			<input type="text" class="form-control" name="years_no" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="products_no" class="form-label">Products No.</label>
			<input type="text" class="form-control" name="products_no" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="clients_no" class="form-label">Clients No.</label>
			<input type="text" class="form-control" name="clients_no" required>
		</div>

		<div class="mb-3 col-md-3">
			<label for="branches_no" class="form-label">Branches No.</label>
			<input type="text" class="form-control" name="branches_no" required>
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