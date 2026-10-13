<section class="bd-hero__area">

    <div class="hero__active swiper-container">
        <?php
            while($bannerrow = mysqli_fetch_array($bannersql)){
        ?>
        <div class="swiper-wrapper">

            <div class="">
                <div class="bd-singel__hero">
                    <div class="hero__height d-flex align-items-center p-relative">
                        <div class="bd-hero__banner hero__overlay include__bg" data-background="assets/img/banner.jpg">
                        </div>
                        <div class="container-fluid" style="z-index:2;">
                            <div class="row">
                                <div class="col-xl-6 ps-lg-5">
                                    <div class="bd-hero__content-2">
                                        <span class="animated fadeInUp"></span>
                                        <h1 class="animated fadeInUpBig" style='font-size:18px; color:#fff;'>
                                            <?=$bannerrow['title'];?></h1>
                                        <div class="animated fadeInUpBig"><?=$bannerrow['sdesc'];?></div>
                                        <div class="bd-hero__btn-wrapper animated fadeInDown">
                                            <a class="bd-hero__btn-1" href="<?=$path;?>contact-us">Get Your
                                                Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end item -->
            </div>



        </div>
        <?php
            }
        ?>
        <div class="container-fluid sincebtn">
            <a href="#" title="About Us">Since 1989</a>
        </div>
        <img src="assets/img/banner-bottom.png" class="afterbnr-zip">

        <section class='widget-excellence'>
            <div class="container-fluid  ">
                <div class="row">
                    <span><?=$aboutrow['subtitle'];?></span>
                    <h2><?=$aboutrow['title'];?></h2>
                    <?=$aboutrow['desc'];?>
                </div>
            </div>
        </section>

        <div class="clientsection">
            <div class="container-fluid text-center">
                <h5 class="text-center animated fadeInUp">Who We Work With</h5>
                <h3 class="text-center animated fadeInUp"><span>Brands We Cater</span></h3>
                <div class="row">
                    <?php
                        while($brandsrow = mysqli_fetch_array($brandsql)){
                    ?>
                    <div class="col-6 col-sm">
                        <div class="brand-logo">
                            <img src="<?=$path.$brandsrow['file'];?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>


                <!-- <img src="assets/img/clientele-logo.jpg" alt="clientele logo"> -->
            </div>
        </div>

        <!-- Gallery area start -->
        <section class="bd-gallery__area gallery__overlay fix pt-60 pb-20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bd-gallery__inner p-relative">
                            <div class="bd-section__title-wrapper mb-45">
                                <h2 class="bd-section__title"> Applications</h2>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="bd-gallery__navigatin">
                                <button class="gallery-button-prev"><i class="far fa-long-arrow-left"></i></button>
                                <button class="gallery-button-next"><i class="far fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="bd-gallery__wrapper">
                            <div class="bd-gallery-active swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                        while($applicationsrow = mysqli_fetch_array($applicationsql)){
                                            $subcatid = $applicationsrow['subcat_id'];
                                            $catid = $applicationsrow['cat_id'];
                                                $applicationsubcatsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id='$subcatid'");
                                                $applicationsubcatrow = mysqli_fetch_assoc($applicationsubcatsql);
                                                $applicationsubcaturl = $applicationsubcatrow['url'];
                                                $applicationcatsql = mysqli_query($con, "SELECT * FROM `category` WHERE status=1 AND id='$catid'");
                                                $applicationcatrow = mysqli_fetch_assoc($applicationcatsql);
                                                $applicationcaturl = $applicationcatrow['url'];

                                                $finalurl = $path.$applicationcaturl.'/'.$applicationsubcaturl.'/'.$applicationsrow['url'];
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="bd-gallery__item">
                                            <div class="bd-gallery__image w-img">
                                                <a href="<?=$finalurl;?>">
                                                    <img src="<?=$path.$applicationsrow['file'];?>"
                                                        alt="<?=$applicationsrow['title'];?>">
                                                </a>
                                            </div>
                                            <div class="bd-gallery__content">
                                                <h3><a href="<?=$finalurl;?>">
                                                        <?=$applicationsrow['title'];?></a></h3>
                                                <!-- <p>Lorem Ipsum is simply dummy text of the </p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- slide end -->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="categorytext">
                    <h5>Across these diverse industries, our coil zippers are trusted for their quality, versatility,
                        and dependability, making them the top choice for manufacturers seeking excellence in their
                        products. As a leading zipper manufacturing company in India, we are dedicated to providing
                        top-quality zippers that meet the highest standards.</h5>
                </div>
            </div>
        </section>
        <!-- Gallery area end -->




        <section class="bd-serrvice__area pb-20" style="display: none;">
            <img src="assets/img/zip-circle.jpg" class="zip-circle">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="bd-about__image-wrapper p-relative mb-60">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bd-about__content-wrapper mb-60">
                            <div class="bd-section__title-wrapper mb-40"> <span class="bd-sub__title">About Us</span>
                                <h2 class="bd-section__title mb-30">Shiva Fastener's Pvt Ltd</h2>
                                <p>Shiva Fastener's Pvt Ltd is the dream child of Mr. Harmeet Singh Pasricha. The
                                    foundation was laid
                                    back in 1989 with his confidence, courage, and conviction with just few set of
                                    machinery and labor.
                                    The continuous and conscious efforts of our Managing Director help in establishing
                                    the reputation of
                                    the company in the market by 1994. Under his leadership, the company got to be known
                                    nationwide and in
                                    overseas as well and people have full confidence in the product.</p>

                                <p>Our product range includes the best quality Long Chain Zippers, LFC Zippers and CFC
                                    Zippers. We
                                    supply these to various parts of the world with the guarantee of the best quality
                                    product as we
                                    believe in 'customer's satisfaction is our satisfaction'.</p>
                            </div>
                            <div class="bd-about__features-wrapper mb-25">
                                <div class="bd-about__features">
                                    <div class="bd-about__features-title">
                                        <h4>Our Service</h4>
                                    </div>
                                    <div class="bd-about__features-list">
                                        <ul>
                                            <li>
                                                <div class="features__icon"> <i class="fa-regular fa-check"></i> </div>
                                                <div class="features__list-title"> High-quality work </div>
                                            </li>
                                            <li>
                                                <div class="features__icon"> <i class="fa-regular fa-check"></i> </div>
                                                <div class="features__list-title"> Straightforward pricing </div>
                                            </li>
                                            <li>
                                                <div class="features__icon"> <i class="fa-regular fa-check"></i> </div>
                                                <div class="features__list-title"> Rapid response times </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bd-about__experience text-center"> <span
                                        class="number counter">29</span><span class="plus">+</span>
                                    <p>Years experience</p>
                                </div>
                            </div>
                            <a class="bd-theme__btn-1" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container" style="display: none;">
            <div class="col-lg-11 offset-lg-2">
                <div class="downloadbrochure">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3>We Aim to Be the Most Professional Provider of Zipper Solutions</h3>
                            <a href="GTB-catalog2023-2024.pdf"><i class="far fa-file-pdf"></i> Download Brochure</a>
                        </div>
                        <div class="col-lg-5">
                            <img src="assets/img/brochure-img.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="philosophy-cont pt-50 pb-50">
            <!-- <div class="box">
          <div class="wave -one"></div>
          <div class='wave -two'></div>
          <div class='wave -three'></div>
        </div> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-5 text-center">
                        <img src="<?=$path.$philosophyrow['file'];?>" alt="<?=$philosophyrow['title'];?>" class="img-fluid">
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <h2><?=$philosophyrow['title'];?></h2>
                        <?=$philosophyrow['sdesc'];?>
                        <div class="text-end">
                            <a class="bd-hero__btn-2 mt-3" href="gtb-philosophy.html" title="GTB Philosophy">Read
                                More</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="bd-about__area pt-70 pb-20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-xl-7">
                        <div class="ourknowledge">
                            <h2><?=$sindicaterow['title'];?></h2>
                            <?=$sindicaterow['sdesc'];?>
                            <a class="bd-hero__btn-2 mt-3" href="<?=$path;?>company-information/<?=$sindicaterow['url'];?>" title="GTB Syndicate">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 text-center">
                        <img src="<?=$path.$sindicaterow['file'];?>" alt="<?=$sindicaterow['title'];?>" class="globeimg img-fluid">

                    </div>
                </div>
            </div>
        </section>

        <section class="gtb-india gtb-indiaa">
            <div class="row">
                <div class="col-lg-6">
                    <div class="bd-section__title-wrapper mb-20 mt-50">
                        <h2 class="bd-section__title"><?=$gtbindiarow['title'];?></h2>
                    </div>
                    <?=$gtbindiarow['sdesc'];?>
                    <a class="bd-hero__btn-2" href="<?=$path;?>company-information/<?=$gtbindiarow['url'];?>" title="GTB India">Read More</a>
                </div>
                <div class="col-lg-6">
                    <div class="companyimg">
                        <img src="<?=$path.$gtbindiarow['file'];?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Service area start -->
        <section class="bd-service__area pt-60 pb-10 testedcont">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 pl-lg-0 pr-lg-0 text-center order-md-1 order-lg-0">
                        <img src="assets/img/certificate-img.png" alt="certificate image" class="certificate-img">
                    </div>
                    <div class="col-md-12 col-lg-6 text-center pr-lg-0">
                        <h3 class="yearlytested-hd">Yearly Tested at :</h3>
                        <img src="assets/img/testex-logo.png" alt="testex logo" class="testex-logo">

                        <h3 class="yearlytested-hd textblack mt-2 pt-4">Members :</h3>
                        <div class="col-lg-10 offset-lg-1 col-md-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 pt-lg-2">
                                    <script type="text/javascript">
                                    var memberfieo2009token = 'xUR6nkOJqD_106957',
                                        fieo2009img = 'horz';
                                    </script>
                                    <script src=https://fieo.org/fieome2009mberlogo.js></script>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <img src="assets/img/member-logos.png" alt="member logo" class="memberlogo">
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <img src="assets/img/member-logos2.png" alt="member logo" class="memberlogo">
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <img src="assets/img/member-logos3.png" alt="member logo" class="memberlogo">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6 col-lg-3 pl-lg-0 pr-lg-0 text-center order-md-0 order-lg-1">
                        <img src="assets/img/certificate-img2.png" alt="certificate image" class="certificate-img">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo1.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo2.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo3.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo4.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo5.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 trustedlogo text-center">
                            <img src="assets/img/trusted-logo6.png">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
          <div class="col-xl-12 text-center">
               <img src="assets/img/trusted.jpg">
          </div>
        </div> -->
        </section>
        <!-- Service area end -->
        <!-- Cta area start -->
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