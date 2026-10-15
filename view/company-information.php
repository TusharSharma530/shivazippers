<?php
  if($geturl2 == 'factory-tour'){
    $factoryRows = [];
    while($factorydatarow = mysqli_fetch_array($factorytoursqlsc)){ $factoryRows[] = $factorydatarow; }
?>

<!-- Factory Tour - Home page theme (Header + Image card grid) -->
<section class="home-philosophy gtb-detail factory-tour">
    <div class="container-fluid">
        <div class="factory-tour__head">
            <span class="home-philosophy__eyebrow">Take A Look</span>
            <h1 class="home-philosophy__title"><?=$pagename;?></h1>
        </div>

        <div class="row factory-tour__grid">
            <?php foreach($factoryRows as $frow){ ?>
            <div class="col-md-6 col-lg-4">
                <div class="factory-tour__card">
                    <div class="factory-tour__media">
                        <img src="<?=$path.$frow['file'];?>" alt="<?=$frow['title'];?>" loading="lazy">
                    </div>
                    <div class="factory-tour__caption"><?=$frow['title'];?></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php }elseif($geturl2=='gtb-philosophy' || $geturl2=='gtb-syndicate' || $geturl2=='gtb-india'){
    $gtbEyebrow = ($geturl2=='gtb-syndicate') ? 'Global Presence' : (($geturl2=='gtb-india') ? 'Our Journey' : 'Our Philosophy');
?>
<!-- GTB Philosophy / Syndicate / India - Home page theme (Image Left / Content Right + full story below) -->
<section class="home-philosophy gtb-detail">
    <div class="container-fluid">
        <div class="row home-philosophy__grid">
            <div class="col-md-12 col-lg-5">
                <div class="home-philosophy__media">
                    <img src="<?=$path.$file;?>" alt="<?=$pagename;?>" class="home-philosophy__img" loading="lazy">
                </div>
            </div>
            <div class="col-md-12 col-lg-7">
                <div class="home-philosophy__content">
                    <span class="home-philosophy__eyebrow"><?=$gtbEyebrow;?></span>
                    <h1 class="home-philosophy__title"><?=$pagename;?></h1>
                    <div class="home-philosophy__text gtb-detail__intro">
                        <?=$sdesc;?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gtb-detail__body">
            <div class="col-lg-12">
                <div class="gtb-detail__story">
                    <?=$data;?>
                </div>
            </div>
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
    		<div style="background: var(--clr-theme); padding: 15px;">
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