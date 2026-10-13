<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="<?=$adminpath;?>gallery"> List</a>
	</div>
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm" enctype="multipart/form-data">
	<div class="row">

	<div class="mb-3 col-md-12">
	  	<label for="formFile" class="form-label">Image</label>
	  	<div class="clearallimgdiv" style="display: none;">
	  		<a href="javascript:" id="clrimgs">Clear All</a>
	  	</div>
	  	<div class="multi-imgquestion">			  		
			<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
			<input hidden class="form-control imgInputMultiple" name="img[]" type="file" multiple>
			<img src="<?=$adminpath;?>images/preview.jpg" alt="2" class='preview'>
		</div>
		<div id="gal-container"></div>
	</div>

	<div class="col-md-12">
		<input type="submit" value="Add Record" name="addRecord" class="submitInput">
	</div>

	</div>
</form>



<?php $sqlshow=mysqli_query($con,"SELECT * FROM `$table` WHERE `galid`=$geturl1");
if(mysqli_num_rows($sqlshow)){
 ?>
<div class="page-title">
<div class="title">
	<br><br>
</div>
<div class="createbtn">
	<a href="javascript:" id="deleteBtn" class="delete" data-table="<?=$table;?>"> Delete Selected Data</a>
</div>
</div>


<table class="table table-hover" id="myTable">

<thead>
<tr>
	<th width="5%"><input type="checkbox" id="parentcheckbox"></th>
	<th width="5%">#</th>
	<th width="">Images</th>
	<th width="5%">Order</th>
	<th width="10%">Action</th>
</tr>
</thead>

<tbody>
<?php while($rwshow = mysqli_fetch_array($sqlshow)){
$serial++;
$id=$rwshow['id'];
$file=$rwshow['file'];
$order=$rwshow['order'];

?>
<tr id="remove<?=$id;?>">
	<td width="5%"><input type="checkbox" name="childcheckbox" class="childcheckbox" value="<?=$id;?>"></td>
	<td width="5%"><?=$serial;?></td>
	<td width=""><img src="<?=$path.$file;?>" alt="" width="80px;"></td>
	<td width="5%"><?=$order;?></td>
	<td width="10%">
		<a href="javascript:"  ide="<?=$id;?>" data-table="<?=$table;?>" class='delbtn ri-delete-bin-line'></a>
	</td>
</tr>
<?php } ?>
	
</tbody>

</table>

<?php } ?>
</div>			
</div>