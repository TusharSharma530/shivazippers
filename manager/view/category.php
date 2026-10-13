<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="javascript:" id="deleteBtn" class="delete" data-table="<?=$table;?>"> Delete Selected Data</a>
		<a href="<?=$adminpath;?>category/create">Add New</a>
	</div>
</div>
</div>
<div class="col-md-12">
<div class="page-content">
<table class="table table-hover" id="myTable">

<thead>
	<tr>
		<th><input type="checkbox" id="parentcheckbox"></th>
		<th>#</th>
		<th>Category Name</th>
		<th>Category Type</th>
		<th>Order</th>
		<th>Status</th>
		<th class="text-center">Action</th>
	</tr>
</thead>

<tbody>
<?php $sqlshow  = mysqli_query($con, "SELECT * FROM `category` ORDER BY `title` ASC");
	while($rwcat = mysqli_fetch_array($sqlshow )){
	$id=$rwcat['id'];
	$title=$rwcat['title'];
	$order=$rwcat['order'];
	$type=$rwcat['type'];
	$status=$rwcat['status'];
	$subcat=mysqli_query($con, "SELECT * FROM `category` WHERE `id` = $type");
	$rwsubcat=mysqli_fetch_array($subcat);
	$subtitle=$rwsubcat['title'];
	
	$type=$rwcat['type']==1 ? "Main Category" : "Sub Category" . "<span style='font-size: 14px; color: #999'>($subtitle)</span>";
	$serial++;
 ?>
	<tr id='remove<?php echo $id; ?>'>
		<td><input type="checkbox" class="childcheckbox" value="<?=$id;?>"></td>
		<td><?=$serial; ?></td>
		<td><?=$title; ?></td>
		<td><?=$type;?></td>
		<td><?=$order;?></td>
		<td>
			<div class="form-check form-switch">
				<?php $checked = $status==1 ? "checked" : ""; ?>
			  <input class="form-check-input" type="checkbox" data-table="<?=$table;?>" ide="<?=$id;?>" <?=$checked;?>>
			  <label class="form-check-label" for="status"></label>
			</div>
		</td>
		<td class="text-center">
			<a href="<?=$adminpath;?>category/edit/<?=$id; ?>" class="editbtn ri-pencil-line" ></a> 
			<a href="javascript:"  ide="<?=$id; ?>" data-table="<?=$table;?>" class='delbtn ri-delete-bin-line' ></a>
		</td>
	</tr>
	<?php } ?>
</tbody>

</table>
</div>
</div>


