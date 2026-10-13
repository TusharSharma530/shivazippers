<main class="conatct-us-wrapper">
<section class="contactUs pt-50 pb-50">
<div class="container-fluid">
<div class="row">

<?php
    while($teamsrow = mysqli_fetch_array($teamsql)){
?>
<div class="col-lg-6 col-md-12">
    <div class="contact-img-wrapper">

        <div class="contact-img-box">
            <img src="<?=$path.$teamsrow['file'];?>" alt="<?=$teamsrow['title'];?>">
        </div>

        <div class="contact-content">
            <h5><strong><?=$teamsrow['title'];?></strong></h5>
            <p><?=$teamsrow['role'];?></p>
            <p><i class="far fa-envelope"></i> <a href="mailto:<?=$teamsrow['email'];?>" target="_blank"> <?=$teamsrow['email'];?></a></p>

            <p> <i class="far fa-phone"></i> 
                <?php
                    if(!empty($teamsrow['otherphoneno'])){
                ?>
                <a href="tel:+91<?=$teamsrow['phoneno'];?>" target="_blank">+91-<?=$teamsrow['phoneno'];?></a>, 
                <a href="tel:+91<?=$teamsrow['otherphoneno'];?>" target="_blank">+91-<?=$teamsrow['otherphoneno'];?></a>
                <?php }else {?>
                <a href="tel:+91<?=$teamsrow['phoneno'];?>" target="_blank">+91-<?=$teamsrow['phoneno'];?></a>
                <?php } ?>
            </p>
        </div>

    </div>

</div>
<?php
    }
?>
<div class="col-lg-6 col-md-12">
<div class="contactCard">
<div class="ccIcon">
<img src="assets/img/location.png" alt="icon">
</div>
<div class="ccContent">
<h5>Our Location</h5>
<p>
<strong> Corp. Office :</strong>
<?=$address1;?>
</p>

<p>
<strong>Factory :</strong>
<?=$address2;?>
</p>
</div>

</div>

</div>

</div>

</div>
</section>

<section class="queryform-bottomsectn2">
<div class="container-fluid">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h4 class="text-center"><span>Get In Touch </span>With Us.</span></h4>
<!-- form start -->
<form class="row" method="POST" id="submitForm">
<div class="col-lg-6">
    <div class="form-group has-error">
        <input type="text" name="name" placeholder="Your Full Name*" id="name"
            required="" data-error="Please enter your name">
        <!-- <div class="help-block with-errors"><ul class="list-unstyled"><li>Please enter your name</li></ul></div> -->
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <input type="email" name="email" id="email" required=""
            placeholder="Email Address*" data-error="Please enter your email">
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <input type="text" name="phone_number" placeholder="Phone Number"
            id="phone_number" required=""
            data-error="Please enter your phone number">
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
        <textarea name="message" id="message" placeholder="Your Messages.."
            cols="30" rows="10" required=""
            data-error="Please enter your message"></textarea>
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
</div>
</section>


<section class="mapSection pt-0 pb-40">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6">
    <div class="mapcont">
        <img src="assets/img/corporate-offmap.jpg" alt="corporate office map image">
    </div>
</div>

<div class="col-lg-6">
    <div class="mapcont">
        <img src="assets/img/factory-offmap.jpg" alt="factory map image">
    </div>
</div>
</div>
</div>
</section>

</main>
    <!-- Body main wrapper end -->
