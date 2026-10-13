<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="javascript:" id="deleteBtn" class="delete" data-table="<?=$table;?>"> Delete Selected Data</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<table class="table table-hover" id="myTable">

<thead>
	<tr>
		<th width="5%" class="text-center"><input type="checkbox" id="parentcheckbox"></th>
		<th width="5%">#</th>
		<th>Name</th>
		<th>Email ID</th>
		<th>Phone</th>
		<th>Subject</th>
		<th class="text-center">Action</th>
	</tr>
</thead>

<tbody>
<?php $sqlshow=__selectData($con, $table);
if(mysqli_num_rows($sqlshow)){
while($rwshow = mysqli_fetch_assoc($sqlshow )){
$serial++;
$id = $rwshow['id'];
$name = $rwshow['name'];
$email = $rwshow['email'];
$contactno = $rwshow['contactno'];
$subject = $rwshow['subject'];
?>
	<tr id='remove<?php echo $id; ?>'>
		<td class="text-center"><input type="checkbox" name="childcheckbox" class="childcheckbox" value="<?=$id;?>"></td>
		<td><?=$serial; ?></td>
		<td><?=$name;?></td>
		<td><?=$email;?></td>
		<td><?=$contactno;?></td>
		<td><?=$subject;?></td>
		<td class="text-center"> 
			<a href="<?=$adminpath;?>appointments/<?=$id;?>" class='editbtn ri-eye-line' ></a>
			<a href="javascript:"  ide="<?=$id;?>" data-table="<?=$table;?>" class='delbtn ri-delete-bin-line' ></a>
		</td>
	</tr>
<?php }} ?>
</tbody>
</table>

</div>
</div>

