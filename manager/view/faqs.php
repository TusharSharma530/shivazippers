<div class="col-md-12">
<div class="page-title">			
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="javascript:" id="deleteBtn" class="delete" data-table="<?=$table;?>"> Delete Selected Data</a>
		<a href="<?=$adminpaht;?>faqs/create"> Add New</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<table class="table table-hover" id="myTable">
<thead>
	<tr>
		<th class="box" class="text-center"><input type="checkbox" id="parentcheckbox"></th>
		<th class="number">#</th>
		<th>Name</th>
		<th class="order">Order</th>
		<th class="status">Status</th>
		<th class="action">Action</th>
	</tr>
</thead>
<tbody>
<?php 

$sqlshow=__selectData($con,$table);
while($rwshow = mysqli_fetch_array($sqlshow)){
$serial++;
$id = $rwshow['id'];
$title = $rwshow['title'];
$order = $rwshow['order'];
$status = $rwshow['status'];
?>
	<tr id='remove<?php echo $id; ?>'>
		<td class="box"><input type="checkbox" name="childcheckbox" class="childcheckbox" value="<?=$id;?>"></td>
		<td class="number"><?=$serial;?></td>
		<td><?=$title;?></td>
		<td class="order"><?=$order;?></td>
		<td class="status">
			<div class="form-check form-switch">
				<?php $checked=$status==1 ? "checked" : ""; ?>
			  <input class="form-check-input" type="checkbox" data-table="<?=$table;?>" ide="<?=$id;?>" <?=$checked;?>>
			  <label class="form-check-label" for="status"></label>
			</div>
		</td>
		<td class="action">
			<a href="<?=$adminpath;?>faqs/edit/<?=$id;?>" class="editbtn ri-pencil-line" ></a> 
			<a href="javascript:"  ide="<?=$id; ?>" data-table="<?=$table;?>" class='delbtn ri-delete-bin-line' ></a>
		</td>
	</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
