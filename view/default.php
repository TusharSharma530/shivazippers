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
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-4">
                        <div class="widget-excellence__head">
                            <span class="widget-excellence__eyebrow"><?=$aboutrow['subtitle'];?></span>
                            <h2 class="widget-excellence__title"><?=$aboutrow['title'];?></h2>

                            <div class="widget-excellence__card">
                                <span class="widget-excellence__card-icon"><i class="fa-solid fa-medal"></i></span>
                                <div class="widget-excellence__card-txt">
                                    <strong>Quality before Quantity</strong>
                                    <p>Our founding motto &ndash; every zipper &amp; slider is tested at every
                                        stage before it reaches you.</p>
                                </div>
                            </div>

                            <ul class="widget-excellence__facts">
                                <li>
                                    <span class="widget-excellence__fact-icon"><i class="fa-solid fa-industry"></i></span>
                                    <span class="widget-excellence__fact-txt"><strong>Meerut, India</strong>Zipper
                                        capital of the country</span>
                                </li>
                                <li>
                                    <span class="widget-excellence__fact-icon"><i class="fa-solid fa-gears"></i></span>
                                    <span class="widget-excellence__fact-txt"><strong>In-house
                                            manufacturing</strong>Coil zippers, LFC, CFC &amp; sliders</span>
                                </li>
                                <li>
                                    <span class="widget-excellence__fact-icon"><i class="fa-solid fa-earth-asia"></i></span>
                                    <span class="widget-excellence__fact-txt"><strong>Trusted worldwide</strong>Supplied
                                        across 30+ countries</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="widget-excellence__content">
                            <?=$aboutrow['desc'];?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- home page sections css (products + trust + infra + values + brands + applications) -->
        <link rel="stylesheet" href="<?=$path;?>assets/css/style.css">

        <?php
            // home page products query
            $homeproductsql = mysqli_query($con, "SELECT p.*, c.url AS caturl, c.`order` AS catorder FROM `products` AS p INNER JOIN `category` AS c ON c.id = p.category WHERE p.status = 1 AND c.status = 1 ORDER BY c.`order` ASC, p.`order` ASC, p.id ASC LIMIT 7");
            if($homeproductsql && mysqli_num_rows($homeproductsql) > 0){
        ?>
        <!-- Products area start -->
        <section class="home-products">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="home-products__head">
                            <span class="home-products__eyebrow">What We Manufacture</span>
                            <h2 class="home-products__title">Our Products</h2>
                            <p class="home-products__lead">A complete range of coil zippers, LFC &amp; CFC zippers
                                and sliders &ndash; engineered to your exact specification, colour and finish.</p>
                        </div>
                    </div>
                </div>
                <div class="row home-products__grid">
                    <?php
                        while($homeproductsrow = mysqli_fetch_array($homeproductsql)){
                            $homeprochildurl = __getChildCategoryName($con, $homeproductsrow['childcategory']);
                            $homeproducturl = ($homeproductsrow['caturl'] && $homeprochildurl) ? $path.'our-products/'.$homeproductsrow['caturl'].'/'.$homeprochildurl : $path.'our-products';
                    ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a class="home-product__card" href="<?=$homeproducturl;?>" title="<?=$homeproductsrow['title'];?>">
                            <div class="home-product__img">
                                <img src="<?=$path.$homeproductsrow['file'];?>" alt="<?=$homeproductsrow['title'];?>" loading="lazy">
                            </div>
                            <div class="home-product__body">
                                <h4><?=$homeproductsrow['title'];?></h4>
                                <span class="home-product__link">View Details <i class="far fa-long-arrow-right"></i></span>
                            </div>
                            <span class="home-product__arrow" aria-hidden="true"><i class="far fa-long-arrow-right"></i></span>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="col-6 col-md-6 col-lg-3">
                        <a class="home-product__all" href="<?=$path;?>our-products" title="View All Products">
                            <span class="home-product__all-icon" aria-hidden="true"><i class="fa-solid fa-layer-group"></i></span>
                            <h4>Explore The Complete Range</h4>
                            <p>Coil Zippers, Sliders &amp; more - built to your exact specification.</p>
                            <span class="home-product__all-btn">View All Products <i class="far fa-long-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Products area end -->
        <?php } ?>

        <!-- Trust & benefits area start -->
        <section class="home-trust">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="home-trust__head">
                            <span class="home-trust__eyebrow">Why Choose Us</span>
                            <h2 class="home-trust__title">Trusted By Brands Across The World</h2>
                        </div>
                    </div>
                </div>
                <div class="row home-trust__grid">
                    <?php
                        // six feature trust & benefits
                        $trustinfeatures = array(
                            array('icon' => 'fa-solid fa-wallet', 'title' => 'Ease of Payment Terms'),
                            array('icon' => 'fa-solid fa-business-time', 'title' => '40+ Years In Industry'),
                            array('icon' => 'fa-solid fa-handshake', 'title' => '200+ Global Clients'),
                            array('icon' => 'fa-solid fa-face-smile', 'title' => 'Customer Satisfaction'),
                            array('icon' => 'fa-solid fa-truck-fast', 'title' => 'Fast & Express Delivery'),
                            array('icon' => 'fa-solid fa-earth-americas', 'title' => 'Export to 30+ Countries'),
                        );

                        foreach($trustinfeatures as $trustinfeature){
                            if(preg_match('/^(\d+\+)\s+(.+)$/', $trustinfeature['title'], $trustinmatch)){
                                $trustinlabel = '<span class="home-trust__stat">'.$trustinmatch[1].'</span>'.$trustinmatch[2];
                            }else{
                                $trustinlabel = preg_replace('/(\d+\+)/', '<span class="home-trust__num">$1</span>', $trustinfeature['title'], 1);
                            }
                    ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="home-trust__item text-center">
                            <span class="home-trust__icon"><i class="<?=$trustinfeature['icon'];?>"></i></span>
                            <h4><?=$trustinlabel;?></h4>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Trust & benefits area end -->

        <!-- Infrastructure / know more area start -->
        <section class="home-infra">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="home-infra__content">
                            <h2>We use modern infrastructure &amp; technology</h2>
                            <p>We have emerged as one of the most renowned manufacturers and suppliers of premium
                                quality Zippers &amp; Sliders. Our entire product line is highly acknowledged by
                                clients for its unmatched quality, long life and affordable prices.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        <a class="home-infra__btn" href="<?=$path;?>company-information" title="Know More">Know More
                            <i class="far fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Infrastructure / know more area end -->

        <div class="clientsection">
            <div class="container-fluid text-center">
                <h5 class="text-center animated fadeInUp">Who We Work With</h5>
                <h3 class="text-center animated fadeInUp"><span>Brands We Cater</span></h3>
                <div class="home-brands__slider-wrap">
                    <button class="brand-button-prev brand-nav" type="button"
                        aria-label="Previous brands"><i class="far fa-long-arrow-left"></i></button>
                    <div class="swiper-container bd-brand-active home-brands__slider">
                        <div class="swiper-wrapper">
                            <?php
                                while($brandsrow = mysqli_fetch_array($brandsql)){
                            ?>
                            <div class="swiper-slide">
                                <div class="brand-logo">
                                    <img src="<?=$path.$brandsrow['file'];?>" alt="<?=$brandsrow['title'];?>" loading="lazy">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <button class="brand-button-next brand-nav" type="button"
                        aria-label="Next brands"><i class="far fa-long-arrow-right"></i></button>
                </div>


                <!-- <img src="assets/img/clientele-logo.jpg" alt="clientele logo"> -->
            </div>
        </div>
        

        <!-- Gallery area start -->
        <section class="home-applications">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="home-applications__head">
                            <div class="home-applications__head-text">
                                <span class="home-applications__eyebrow">Where Our Zippers Perform</span>
                                <h2 class="home-applications__title">Applications</h2>
                                <p class="home-applications__lead">From apparel &amp; footwear to bags, tents &amp;
                                    technical gear &ndash; our coil zippers are engineered to perform in every
                                    application, in every industry.</p>
                            </div>
                            <!-- slider navigation -->
                            <div class="home-applications__aside">
                                <div class="bd-gallery__navigatin home-applications__nav">
                                    <button class="gallery-button-prev" type="button"
                                        aria-label="Previous applications"><i class="far fa-long-arrow-left"></i></button>
                                    <button class="gallery-button-next" type="button"
                                        aria-label="Next applications"><i class="far fa-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="home-applications__slider">
                            <div class="bd-gallery-active home-applications__track swiper-container">
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
                                        <div class="bd-gallery__item home-app__card">
                                            <div class="bd-gallery__image w-img home-app__image">
                                                <a href="<?=$finalurl;?>" title="<?=$applicationsrow['title'];?>">
                                                    <img src="<?=$path.$applicationsrow['file'];?>"
                                                        alt="<?=$applicationsrow['title'];?>">
                                                </a>
                                                <span class="home-app__arrow"><i class="far fa-long-arrow-right"></i></span>
                                                <div class="bd-gallery__content home-app__content">
                                                    <h3><a href="<?=$finalurl;?>">
                                                            <?=$applicationsrow['title'];?></a></h3>
                                                    <span class="home-app__link">View Details <i
                                                            class="far fa-long-arrow-right"></i></span>
                                                </div>
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

                <div class="row">
                    <div class="col-12">
                        <div class="categorytext home-applications__note">
                            <span class="home-applications__note-icon" aria-hidden="true"><i
                                    class="fa-solid fa-quote-left"></i></span>
                            <div class="home-applications__note-txt">
                                <h5>Across these diverse industries, our coil zippers are trusted for their quality,
                                    versatility, and dependability, making them the top choice for manufacturers seeking
                                    excellence in their products. As a leading zipper manufacturing company in India, we
                                    are dedicated to providing top-quality zippers that meet the highest standards.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery area end -->

        <!-- Custom creative / service / quality area start -->
        <section class="home-values">
            <div class="container-fluid">
                <div class="row home-values__grid">
                    <div class="col-md-4">
                        <div class="home-values__item">
                            <span class="home-values__bar"></span>
                            <h3>Custom Creative</h3>
                            <p>Our creative team travels the world to hunt for innovative designs for all zippers, and
                                sliders &ndash; staying fashion-forward is the key to lead this industry. All products
                                are unique and made-to-order for each brand.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-values__item">
                            <span class="home-values__bar"></span>
                            <h3>Unmatched Service</h3>
                            <p>We take time to understand the creative vision of our customers and turn it into a
                                reality. Therefore, we guarantee to encompass the brands' mission and aesthetic in each
                                product.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-values__item">
                            <span class="home-values__bar"></span>
                            <h3>Guaranteed Quality</h3>
                            <p>There is a reason Shiva Zippers is the choice for the largest brands in the world
                                &ndash; each of our products goes through meticulous testing to ensure peak performance
                                before they are in the hands of our customers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Custom creative / service / quality area end -->




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
        <!-- Philosophy area start -->
        <section class="home-philosophy">
            <div class="container-fluid">
                <div class="row align-items-center home-philosophy__grid">
                    <div class="col-md-12 col-lg-5">
                        <div class="home-philosophy__media">
                            <span class="home-philosophy__frame" aria-hidden="true"></span>
                            <img src="<?=$path.$philosophyrow['file'];?>" alt="<?=$philosophyrow['title'];?>"
                                class="home-philosophy__img">
                            <span class="home-philosophy__quote" aria-hidden="true"><i
                                    class="fa-solid fa-quote-left"></i></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <div class="home-philosophy__content">
                            <span class="home-philosophy__eyebrow">Our Philosophy</span>
                            <h2 class="home-philosophy__title"><?=$philosophyrow['title'];?></h2>
                            <div class="home-philosophy__text">
                                <?=$philosophyrow['sdesc'];?>
                            </div>
                            <a class="home-philosophy__btn" href="<?=$path;?>company-information/<?=$philosophyrow['url'];?>"
                                title="<?=$philosophyrow['title'];?>">Read More <i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Philosophy area end -->

        <!-- GTB Syndicate / global presence area start -->
        <section class="home-syndicate">
            <div class="container-fluid">
                <div class="row align-items-center home-syndicate__grid">
                    <div class="col-lg-6 col-xl-7">
                        <div class="home-syndicate__content">
                            <!-- <span class="home-syndicate__eyebrow">Global Presence</span> -->
                            <h2 class="home-syndicate__title"><?=$sindicaterow['title'];?></h2>
                            <div class="home-syndicate__text">
                                <?=$sindicaterow['sdesc'];?>
                            </div>
                            <a class="home-syndicate__btn"
                                href="<?=$path;?>company-information/<?=$sindicaterow['url'];?>"
                                title="<?=$sindicaterow['title'];?>">Read More <i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5">
                        <div class="home-syndicate__media">
                            <span class="home-syndicate__ring" aria-hidden="true"></span>
                            <span class="home-syndicate__sheet" aria-hidden="true"></span>
                            <img src="<?=$path.$sindicaterow['file'];?>" alt="<?=$sindicaterow['title'];?>"
                                class="home-syndicate__img">
                            <div class="home-syndicate__badge">
                                <span class="home-syndicate__badge-icon"><i class="fa-solid fa-earth-americas"></i></span>
                                <span class="home-syndicate__badge-txt"><strong>13+ Countries</strong>Export
                                    network</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- GTB Syndicate / global presence area end -->

        <!-- GTB India area start -->
        <section class="home-india">
            <div class="container-fluid">
                <div class="row align-items-center home-india__grid">
                    <div class="col-lg-6">
                        <div class="home-india__media">
                            <span class="home-india__sheet" aria-hidden="true"></span>
                            <img src="<?=$path.$gtbindiarow['file'];?>" alt="<?=$gtbindiarow['title'];?>"
                                class="home-india__img">
                            <div class="home-india__stamp">
                                <span class="home-india__stamp-icon"><i class="fa-solid fa-industry"></i></span>
                                <span class="home-india__stamp-txt"><strong>Since 1989</strong>Meerut, India</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="home-india__content">
                            <span class="home-india__eyebrow">Made In India</span>
                            <h2 class="home-india__title"><?=$gtbindiarow['title'];?></h2>
                            <div class="home-india__text">
                                <?=$gtbindiarow['sdesc'];?>
                            </div>
                            <a class="home-india__btn"
                                href="<?=$path;?>company-information/<?=$gtbindiarow['url'];?>"
                                title="<?=$gtbindiarow['title'];?>">Read More <i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- GTB India area end -->

        <!-- Certifications & memberships area start -->
        <section class="home-certified">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home-certified__head">
                            <span class="home-certified__eyebrow">Quality &amp; Compliance</span>
                            <h2 class="home-certified__title">Yearly Tested at TESTEX</h2>
                            <p class="home-certified__lead">Independently tested, globally recognised &mdash; our
                                products and processes are certified by leading international bodies.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center home-certified__grid">
                    <div class="col-md-6 col-lg-3 order-md-1 order-lg-0">
                        <div class="home-certified__cert">
                            <img src="assets/img/certificate-img.png" alt="certificate image">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="home-certified__center">
                            <div class="home-certified__testex">
                                <img src="assets/img/testex-logo.png" alt="testex logo">
                            </div>
                            <h3 class="home-certified__subtitle">Members</h3>
                            <div class="row home-certified__members">
                                <div class="col-lg-3 col-md-3">
                                    <div class="home-certified__tile">
                                        <script type="text/javascript">
                                        var memberfieo2009token = 'xUR6nkOJqD_106957',
                                            fieo2009img = 'horz';
                                        </script>
                                        <script src=https://fieo.org/fieome2009mberlogo.js></script>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="home-certified__tile">
                                        <img src="assets/img/member-logos.png" alt="member logo">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="home-certified__tile">
                                        <img src="assets/img/member-logos2.png" alt="member logo">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="home-certified__tile">
                                        <img src="assets/img/member-logos3.png" alt="member logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 order-md-0 order-lg-1">
                        <div class="home-certified__cert">
                            <img src="assets/img/certificate-img2.png" alt="certificate image">
                        </div>
                    </div>
                </div>

                <div class="home-certified__divider"><span>Trusted Worldwide</span></div>

                <div class="row home-certified__trusted-row">
                    <?php
                        // trusted / partner logos
                        $trustedlogos = array(
                            'assets/img/trusted-logo1.png',
                            'assets/img/trusted-logo2.png',
                            'assets/img/trusted-logo3.png',
                            'assets/img/trusted-logo4.png',
                            'assets/img/trusted-logo5.png',
                            'assets/img/trusted-logo6.png',
                        );

                        foreach($trustedlogos as $trustedlogo){
                    ?>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="home-certified__trusted">
                            <img src="<?=$trustedlogo;?>" alt="trusted brand logo" loading="lazy">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Certifications & memberships area end -->
        <!-- Enquiry area start -->
        <section class="home-enquiry">
            <div class="container-fluid">
                <div class="row align-items-center home-enquiry__grid">
                    <div class="col-lg-5">
                        <div class="home-enquiry__info">
                            <span class="home-enquiry__eyebrow">Get In Touch</span>
                            <h2 class="home-enquiry__title">Let&rsquo;s Build Something Great Together</h2>
                            <p class="home-enquiry__lead">Share your requirement and our team will revert with the
                                best quote, sampling support and delivery timeline.</p>
                            <ul class="home-enquiry__points">
                                <li><span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                                    Competitive pricing &amp; mass customisation</li>
                                <li><span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                                    Fast response &amp; on-time delivery</li>
                                <li><span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                                    Export-ready quality &amp; packaging</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="home-enquiry__card">
                            <!-- form start -->
                            <form class="row home-enquiry__form" method="POST" id="submitForm">
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
                                            rows="5" required="" data-error="Please enter your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn v1 home-enquiry__submit d-block w-100"
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
            </div>
        </section>
        <!-- Enquiry area end -->