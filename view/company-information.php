<?php
  if($geturl2 == 'factory-tour'){
?>

  <section class='widget-event'>
      <div class='container'>
          <div class='row'>
            <div class="col-md-12">
                <div class="title head">
                    <h3>Factory Tour</h3>
                </div>
            </div>
            <?php
              while($factorydatarow = mysqli_fetch_array($factorytoursqlsc)){
            ?>
              <div class='col-md-6 head mb-4'>
              <h4><?=$factorydatarow['title'];?></h4>
                  <div class='eventbox'>
                      <img src="<?=$path.$factorydatarow['file'];?>" alt=''  />
                  </div>
              </div>
            <?php
              }
            ?>
          </div>
      </div>
  </section>

<?php }else {?>
<section class="philosophy-cont pt-50 pb-50">
<!-- <div class="box">
    <div class="wave -one"></div>
    <div class='wave -two'></div>
    <div class='wave -three'></div>
</div> -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-5 text-center <?=$geturl3=='gtb-philosophy' ? 'order-1' : 'order-2'; ?>">
    	<?php if($geturl3=='gtb-syndicate'){ ?>
    		<div style="background: #004f44; padding: 15px;">
    	<?php } ?>
      <img src="<?=$path.$file;?>" alt="<?=$pagename;?>" class="img-fluid" style="border-radius: 20px; ">
    	<?php if($geturl3=='gtb-syndicate'){ ?>
    		</div>
    	<?php } ?>
    </div>
    <div class="col-md-12 col-lg-7 <?=$geturl3=='gtb-philosophy' ? 'order-2' : 'order-1'; ?>">
      <h2><?=$pagename;?></h2>
      <?=$sdesc;?>
    </div>

    <div class="col-md-12 order-3">
    	<?=$data;?>
  	</div>
  </div>
</div>
</section>
<?php } ?>


        <section class="queryform-bottomsectn2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="text-center"><span>Get In Touch </span>With Us.</span></h4>
                        <!-- form start -->
                        <form class="row" method="POST" id="submitForm">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <input type="text" name="name" placeholder="Your Full Name*" id="name" required=""
                                        data-error="Please enter your name">
                                    <!-- <div class="help-block with-errors"><ul class="list-unstyled"><li>Please enter your name</li></ul></div> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" required="" placeholder="Email Address*"
                                        data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="Phone Number" id="phone_number"
                                        required="" data-error="Please enter your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" placeholder="Subject" id="msg_subject"
                                        required="" data-error="Please enter your subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group v1">
                                    <textarea name="message" id="message" placeholder="Your Messages.." cols="30"
                                        rows="10" required="" data-error="Please enter your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn v1 d-block w-100"
                                    style="pointer-events: all; cursor: pointer;">Send
                                    Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <div class="msgbox">

                        </div>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </section>