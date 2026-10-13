<div class="col-md-12">
<div class="page-title">
<div class="title">
	<h3><?=$pagetitle;?></h3>
</div>
<div class="createbtn">
	<a href="javascript:" id="deleteBtn" class="delete" data-table="<?=$table;?>"> Delete Selected Data</a>
	<a href="<?=$adminpath;?>banner/create"> Add New</a>
</div>
</div>
</div>
			
<div class="col-md-12">
<div class="page-content">
<table class="table table-hover" id="myTable">

<thead>
	<tr>
		<th width="5%" class="text-center"><input type="checkbox" id="parentcheckbox"></th>
		<th width="5%" class="text-center">#</th>
		<th>Banner Img</th>
		<th width="10%">Order</th>
		<th width="10%">Status</th>
		<th width="5%">Action</th>
	</tr>
</thead>

<tbody>
<?php $sqlshow=__selectData($con,$table);
if(mysqli_num_rows($sqlshow)){
$serial = 1;
while($rwshow = mysqli_fetch_array($sqlshow)){
$id=$rwshow['id'];
$file=$rwshow['file'];
$order=$rwshow['order'];
$status=$rwshow['status'];
?>
	<tr id="remove<?=$id;?>">
		<td class="text-center"><input type="checkbox" name="childcheckbox" class="childcheckbox" value="<?=$id;?>"></td>
		<td class="text-center"><?=$serial;?></td>
		<td><img src="<?=$path.$file;?>" alt="" width="80px;"></td>
		<td class="text-center"><?=$order;?></td>
		<td>
			<div class="form-check form-switch">
				<?php $checked = $status==1 ? "checked" : ""; ?>
			  <input class="form-check-input" type="checkbox" data-table="<?=$table;?>" ide="<?=$id;?>" <?=$checked;?>>
			  <label class="form-check-label" for="status"></label>
			</div>
		</td>
		<td class="text-end">
			<a href="<?=$adminpath;?>banner/edit/<?=$id; ?>" class="editbtn ri-pencil-line" ></a> 
			<a href="javascript:"  ide="<?=$id;?>" data-table="<?=$table;?>" class='delbtn ri-delete-bin-line'></a>
		</td>
	</tr>
	<?php $serial++; }} ?>
	
</tbody>

</table>
</div>
</div>