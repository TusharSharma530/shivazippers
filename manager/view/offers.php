<?php include 'config.php';
$pagetitle = 'Offers';

if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path2}manager'</script>";
}

		if(isset($_POST['deletedata'])){
		$id = $_POST['id'];
		$sqldelImg = mysqli_query($con, "SELECT * FROM `special_offers` WHERE id = $id");
			if(mysqli_num_rows($sqldelImg)){
				$rowimg = mysqli_fetch_assoc($sqldelImg);
					$imgid = $rowimg['file'];
					unlink("../".$imgid);

				$sqldelete = mysqli_query($con,"DELETE FROM `special_offers` WHERE id = $id");
				if($sqldelete){
					echo 'true';
				}else{
					echo 'false';
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
			<a href="createoffers.php"> Add New</a>
		</div>
	</div>
</div>
					
<div class="col-md-12">
<div class="page-content">
	<table class="table table-hover" id="myTable">
		<thead>
			<tr>
				<th width="5%" class="text-center">#</th>
				<th width="15%">Image</th>
				<th>Heading</th>
				<th width="10%">Order</th>
				<th width="10%">Status</th>
				<th width="5%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $sqlshow = mysqli_query($con, "SELECT * FROM `special_offers` ORDER BY `order` ASC");
				if(mysqli_num_rows($sqlshow)){
					$serial = 1;
					while($rwshow = mysqli_fetch_assoc($sqlshow)){
			 ?>
			<tr id="remove<?php echo $rwshow['id']; ?>">
				<td style="vertical-align: middle;" class="text-center"><?php echo $serial; ?></td>
				<td><img src="<?=$path.$rwshow['file']; ?>" alt="" width="80px;"></td>
				<td ><?=$rwshow['heading']; ?></td>
				<td class="text-center"><?=$rwshow['order']; ?></td>
				<td>
					<div class="form-check form-switch">
						<?php $checked = $rwshow['status']==1 ? "checked" : ""; ?>
					  <input class="form-check-input" type="checkbox" data-table="special_offers" ide="<?=$rwshow['id'];?>" <?=$checked;?>>
					  <label class="form-check-label" for="status"></label>
					</div>
				</td>
				<td style="vertical-align:middle;" class="text-end">
					<a href="editoffers.php?id=<?=$rwshow['id']; ?>" class="editbtn ri-pencil-line" ></a> 
					<a href="javascript:"  ide="<?=$rwshow['id']; ?>" class='delbtn ri-delete-bin-line' ></a>
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

<?php include 'include/footer.php'; ?>