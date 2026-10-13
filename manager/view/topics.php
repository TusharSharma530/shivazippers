<?php include 'config.php';
$pagetitle = 'Topics';
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

if(isset($_POST['deletedata'])){
	$id = $_POST['id'];
	$sqldelete = mysqli_query($con,"DELETE FROM `topics` WHERE id = $id");
	if($sqldelete){
		echo 'true';
	}else{
		echo 'false';
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
			<a href="createtopics.php"> Add New</a>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
		<div class="msgbox"></div>
		<table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Global Title</th>
					<th>Years</th>
					<th>Products</th>
					<th>Happy Clients</th>
					<th>Branches</th>
					<th class="text-end">Action</th>
				</tr>
			</thead>
			<tbody>
<?php $sqlblogs = mysqli_query($con, "SELECT * FROM `topics` ORDER BY id ASC");
if(mysqli_num_rows($sqlblogs)){
$serial = 1;
while($rwblogs = mysqli_fetch_assoc($sqlblogs)){
$id = $rwblogs['id'];
?>
				<tr id='remove<?php echo $id; ?>'>
					<td><?php echo $serial; ?></td>
					<td><?=$rwblogs['global_title'];?></td>
					<td><?=$rwblogs['years_no'];?></td>
					<td><?=$rwblogs['products_no'];?></td>
					<td><?=$rwblogs['clients_no'];?></td>
					<td><?=$rwblogs['branches_no'];?></td>
					<td class="text-center">
						<a href="edittopics.php?id=<?=$id; ?>" class="editbtn ri-pencil-line" ></a> 
						<a href="javascript:"  ide="<?=$id; ?>" class='delbtn ri-delete-bin-line' ></a>
					</td>
				</tr>
		<?php $serial++; }} ?>
			</tbody>
		</table>
	</div>
</div>

</div>
</div>
</section>

<?php 
	include "include/footer.php"; 
?>