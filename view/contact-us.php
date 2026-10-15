<main class="cpage-main contactpg2">

    <!-- ============ HERO ============ -->
    <section class="chero">
        <div class="container-fluid">
            <div class="chero__inner">
                <span class="chero__eyebrow">We're Here To Help</span>
                <h1 class="chero__title">Contact Us</h1>
                <p class="chero__text">Have a question about our zippers, sliders or a custom order? Reach out to our
                    team and we'll get back to you within one business day.</p>

                <div class="chero__chips">
                    <a class="chero__chip" href="mailto:<?=$emailid;?>">
                        <i class="far fa-envelope"></i>
                        <span>
                            <small>Email Us</small>
                            <?=$emailid;?>
                        </span>
                    </a>
                    <a class="chero__chip" href="tel:+91<?=$contactno;?>">
                        <i class="far fa-phone"></i>
                        <span>
                            <small>Call Us</small>
                            +91-<?=$contactno;?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ INFO + FORM ============ -->
    <section class="cmain">
        <div class="container-fluid">
            <div class="row g-4 align-items-stretch">

                <!-- Left: contact details -->
                <div class="col-lg-5">
                    <aside class="cinfo">
                        <div class="cinfo__top">
                            <span class="cinfo__label">Contact Our Team</span>
                            <h3 class="cinfo__title">We're Ready To Help</h3>
                            <p class="cinfo__sub">Talk directly to the people behind the product — for enquiries, quotes
                                or collaboration.</p>
                        </div>

                        <div class="cinfo__body">
                            <?php
                                while($teamsrow = mysqli_fetch_array($teamsql)){
                            ?>
                            <div class="cinfo__person">
                                <div class="cinfo__avatar">
                                    <img src="<?=$path.$teamsrow['file'];?>" alt="<?=$teamsrow['title'];?>">
                                </div>
                                <div class="cinfo__pinfo">
                                    <h4><?=$teamsrow['title'];?></h4>
                                    <?php if(!empty($teamsrow['role'])){ ?>
                                    <span class="cinfo__role"><?=$teamsrow['role'];?></span>
                                    <?php } ?>
                                    <a class="cinfo__plink" href="mailto:<?=$teamsrow['email'];?>"
                                        target="_blank"><i class="far fa-envelope"></i><span><?=$teamsrow['email'];?></span></a>
                                    <a class="cinfo__plink" href="tel:+91<?=$teamsrow['phoneno'];?>"
                                        target="_blank"><i class="far fa-phone"></i><span>
                                            <?php if(!empty($teamsrow['otherphoneno'])){ ?>
                                            +91-<?=$teamsrow['phoneno'];?>, +91-<?=$teamsrow['otherphoneno'];?>
                                            <?php }else{ ?>
                                            +91-<?=$teamsrow['phoneno'];?>
                                            <?php } ?>
                                        </span></a>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="cinfo__divider"></div>

                            <div class="cinfo__offices">
                                <div class="cinfo__office">
                                    <div class="cinfo__oic"><img src="assets/img/location.png" alt="location"></div>
                                    <div class="cinfo__otext">
                                        <h5>Corporate Office</h5>
                                        <p><?=$address1;?></p>
                                    </div>
                                </div>
                                <div class="cinfo__office">
                                    <div class="cinfo__oic"><img src="assets/img/location.png" alt="location"></div>
                                    <div class="cinfo__otext">
                                        <h5>Factory</h5>
                                        <p><?=$address2;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Right: Get In Touch form -->
                <div class="col-lg-7">
                    <div class="cform queryform-bottomsectn2">
                        <div class="cform__head">
                            <h4 class="text-center"><span>Get In Touch </span>With Us.</h4>
                            <p class="cform__sub">Fill in the form below and our team will respond shortly.</p>
                        </div>

                        <!-- form start -->
                        <form class="row" method="POST" id="submitForm">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <input type="text" name="name" placeholder="Your Full Name*" id="name"
                                        required="" data-error="Please enter your name">
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
                                        id="phone_number" required="" data-error="Please enter your phone number">
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
                                    style="pointer-events: all; cursor: pointer;">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <div class="msgbox"></div>
                        <!-- form end -->
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============ MAPS ============ -->
    <section class="contactpg__maps">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="contactpg__map">
                        <span class="contactpg__maptag">Corporate Office</span>
                        <img src="assets/img/corporate-offmap.jpg" alt="corporate office map image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contactpg__map">
                        <span class="contactpg__maptag">Factory</span>
                        <img src="assets/img/factory-offmap.jpg" alt="factory map image">
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
