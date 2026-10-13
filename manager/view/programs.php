<div class="col-md-12">
<div class="page-title">			
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="createprogram.php"> Add New</a>
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
		<th>Image</th>
		<th>Name</th>
		<th>Order</th>
		<th>Status</th>
		<th class="text-end">Action</th>
	</tr>
</thead>
<tbody>
<?php 

	$sqltc  = mysqli_query($con, "SELECT * FROM `programs` ORDER BY `order` ASC");
	if(mysqli_num_rows($sqltc)){
		$serial = 1;
		while($rwtc = mysqli_fetch_assoc($sqltc)){
			$tcid = $rwtc['id'];
 ?>
	<tr id='remove<?php echo $tcid; ?>'>
		<td><?php echo $serial; ?></td>									
		<td><img src="<?=$path.$rwtc['file'];?>" alt="<?=$rwtc['title'];?>" width="80px"></td>
		<td><?=$rwtc['title'];?></td>
		<td><?=$rwtc['order'];?></td>
		<td>
			<div class="form-check form-switch">
				<?php $checked = $rwtc['status']==1 ? "checked" : ""; ?>
			  <input class="form-check-input" type="checkbox" data-table="programs" ide="<?=$rwtc['id'];?>" <?=$checked;?>>
			  <label class="form-check-label" for="status"></label>
			</div>
		</td>
		<td class="text-end">
			<a href="editprogram.php?id=<?=$tcid;?>" class="editbtn ri-pencil-line" ></a> 
			<a href="javascript:"  ide="<?=$tcid; ?>" class='delbtn ri-delete-bin-line' ></a>
		</td>
	</tr>
<?php $serial++; }} ?>
</tbody>
</table>
</div>
</div>