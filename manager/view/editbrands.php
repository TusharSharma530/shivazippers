<div class="col-md-12">
<div class="page-title">
	<div class="title">
		<h3><?=$pagetitle;?></h3>
	</div>
	<div class="createbtn">
		<a href="<?=$adminpath;?>brands/create"> Add New</a>
		<a href="<?=$adminpath;?>brands"> List</a>
	</div>		
</div>
</div>

<div class="col-md-12">
<div class="page-content">
<div class="msgbox"></div>
<form method="POST" id="submitForm" class="row">		
	<div class="mb-3 col-md-11">
		<label for="title" class="form-label">Title / Name</label>
		<input type="text" class="form-control" name="title" value="<?=$title;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-1">
		<label for="order" class="form-label">Order</label>
		<input type="number" class="form-control" name="order" value="<?=$order;?>" required autocomplete="off">
	</div>

	<div class="mb-3 col-md-12">
	  	<label for="formFile" class="form-label">Image</label>
	  	<div class="imgquestion">
	  		<?php $active = empty($file) ? "" : "active"; ?>
			<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
			<input hidden class="form-control imgInput" name="img" type="file">
			<?php if($file == ''){ ?>
			<img src="<?=$adminpath;?>images/preview.jpg" alt="2" class='preview'>
	  		<?php }else{ ?>
			<img src="<?=$path.$file;?>" alt="<?=$path.$file;?>" class='preview'>
	  		<?php } ?>
		</div>
	</div>

	<div class="col-md-12">
		<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
	</div>
</form>
</div>
</div>
