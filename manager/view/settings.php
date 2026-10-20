<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3><?=$pagetitle;?></h3>
		</div>											
	</div>
</div>
<div class="msgbox"></div>
<div class="col-md-12">
	<div class="page-content">
	<form method="POST" id="submitForm">
	<div class="row">
		<div class="col-md-4 mb-3">
			<label for="webname" >Website Name</label>
			<input type="text" name="web_name" class="form-control" value="<?=$rwshow['web_name']; ?>">
		</div>	
		<div class="col-md-8 mb-3">
			<label for="headercenterline" >Header Center Line</label>
			<input type="text" name="headercenterline" class="form-control" value="<?=$rwshow['headercenterline']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="experience">Experience</label>
			<input type="text" id="experience" name="experience" class="form-control" value="<?=$rwshow['experience']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="year_in_industry">Years In Industry</label>
			<input type="text" id="year_in_industry" name="year_in_industry" class="form-control" value="<?=$rwshow['year_in_industry']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="global_clients">Global Clients</label>
			<input type="text" id="global_clients" name="global_clients" class="form-control" value="<?=$rwshow['global_clients']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="countries_to_export">Countries To Export</label>
			<input type="text" id="countries_to_export" name="countries_to_export" class="form-control" value="<?=$rwshow['countries_to_export']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="email" >Email ID</label>
			<input type="email" id="email" name="email_id" class="form-control" value="<?=$rwshow['email_id']; ?>">
		</div>

		<div class="col-md-4 mb-3">
			<label for="alertnateemail" >Other Email ID (Optional)</label>
			<input type="text" id="alertnateemail" name="alternate_email_id" class="form-control" value="<?=$rwshow['alternate_email_id']; ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="contact" >Contact No.</label>
			<input type="number" id="contact" name="contact_no" class="form-control" value="<?=$rwshow['contact_no']; ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="alertnatecontact" >Other Contact No. (Optional) </label>
			<input type="number" id="alertnatecontact" name="alternate_no" class="form-control" value="<?=$rwshow['alternate_no']; ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="whatsapp" >Whatsapp</label>
			<input type="number" id="whatsapp" name='whatsapp_no' class="form-control" value="<?=$rwshow['whatsapp_no']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="facebook" >Facebook</label>
			<input type="text" id="facebook" name='facebook' class="form-control" value="<?=$rwshow['facebook']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="youtube" >Youtube</label>
			<input type="text" id="youtube" name='youtube'  class="form-control" value="<?=$rwshow['youtube']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="linkedin" >Linkedin</label>
			<input type="text" id="linkedin" name='linkedin'  class="form-control" value="<?=$rwshow['linkedin']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="twitter" >Twitter</label>
			<input type="text" id="twitter" name='twitter'  class="form-control" value="<?=$rwshow['twitter']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="instagram" >Instagram</label>
			<input type="text" id="instagram" name='instagram'  class="form-control" value="<?=$rwshow['instagram']; ?>">
		</div>

		<div class="col-md-3 mb-3">
			<label for="youtubelink" >Youtube Video Embed Code</label>
			<input type="text" id="youtubelink" name="youtubelink" class="form-control" value="<?=$rwshow['youtubelink']; ?>">
		</div>

		<div class="col-md-12 mb-3">
			<label for="address1" >Address</label>
			<input type="text" id="address1" name="address1" class="form-control" value="<?=$rwshow['address1']; ?>">
		</div>

		<div class="col-md-12 mb-3">
			<label for="address2" >Address 2</label>
			<input type="text" id="address2" name="address2" class="form-control" value="<?=$rwshow['address2']; ?>">
		</div>

		<div class="col-md-12 mb-3">
			<label for="map_iframe1" >Map Iframe 1</label>
			<textarea class="form-control" name="map_iframe1" rows="5"><?=$rwshow['map_iframe1']; ?></textarea>
		</div>
		
		<div class="col-md-12 mb-3">
			<label for="map_iframe2" >Map Iframe 2</label>
			<textarea class="form-control" name="map_iframe2" rows="5"><?=$rwshow['map_iframe2']; ?></textarea>
		</div>

		<div class="col-md-12 mb-3">
			<label for="googletag" >Google Tag</label>
			<textarea class="form-control" name="googletag" rows="5"><?=$rwshow['googletag']; ?></textarea>
		</div>

		<div class="col-md-12 mb-3">
			<label for="footerdesc" >Footer Description</label>
			<input class="form-control" name="footerdesc" value="<?=$rwshow['footerdesc']; ?>">
		</div>									

		<div class="col-md-6 mb-3">
			<label for="meta_title" >Meta Title</label>
			<input type="text" id="meta_title" name="meta_title" class="form-control" value="<?=$rwshow['meta_title']; ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="meta_keywords" >Meta Keywords</label>
			<input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="<?=$rwshow['meta_keywords']; ?>">
		</div>

		<div class="col-md-12 mb-3">
			<label for="meta_desc" >Meta Description</label>
			<textarea class="form-control" name="meta_desc"><?=$rwshow['meta_desc']; ?></textarea>
		</div>



		<div class="mb-3 col-md-12">
		  	<label for="formFile" class="form-label">Logo Image</label>
		  	<div class="imgquestion">
				<?php $active = empty($rwshow['logo']) ? "" : "active"; ?>
				<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
				<input hidden class="form-control imgInput" name="logoImg" type="file">
  				<?php if(empty($rwshow['logo'])){ ?>
  				<img src="<?=$adminpath;?>images/preview.jpg" alt="preview" class='preview'>
  				<?php }else{ ?>
  				<img src="<?=$path.$rwshow['logo'];?>" alt="<?=$rwshow['logo'];?>" class='preview'>
  				<?php } ?>
  			</div>
		</div>

		<div class="col-md-12">
			<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
		</div>
	</div>							
	</form>
</div>	
</div>
