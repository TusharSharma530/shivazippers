<?php include 'config.php';
$pagetitle = 'Choose Us';
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

if(isset($_POST['deletedata'])){
	$id = $_POST['id'];
	$sqldelete = mysqli_query($con,"DELETE FROM `chooseus` WHERE id = $id");
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
			<a href="createchooseus.php"> Add New</a>
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
					<th>Type</th>
					<th>Title</th>
					<th>Order</th>
					<th class="text-end">Action</th>
				</tr>
			</thead>
			<tbody>
<?php $sqlblogs = mysqli_query($con, "SELECT * FROM `chooseus` ORDER BY id ASC");
if(mysqli_num_rows($sqlblogs)){
$serial = 1;
while($rwblogs = mysqli_fetch_assoc($sqlblogs)){
$id = $rwblogs['id'];
?>
				<tr id='remove<?php echo $id; ?>'>
					<td><?php echo $serial; ?></td>
					<td>
						<?php if($rwblogs['type']==1){
								echo "Why Choose Us"; 
							}else if($rwblogs['type']==2){
								echo "Best Indian Market";
							}else{
								echo "-";
							}
						?>
					</td>
					<td><?=$rwblogs['title'];?></td>
					<td><?=$rwblogs['order'];?></td>
					<td class="text-end">
						<a href="editchooseus.php?id=<?=$id; ?>" class="editbtn ri-pencil-line" ></a> 
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