
<section class="bd-hero__area">
    <div class="hero-slider-wrap">
        <div class="hero__active swiper-container">
            <div class="swiper-wrapper">
                <?php
                    if($bannersql && mysqli_num_rows($bannersql) > 0){
                        while($bannerrow = mysqli_fetch_array($bannersql)){
                            $bannerImg = !empty($bannerrow['file']) ? $path.$bannerrow['file'] : $path.'assets/img/banner.jpg';
                ?>
                <div class="swiper-slide">
                    <div class="bd-singel__hero">
                        <div class="hero__height d-flex align-items-center p-relative">
                            <div class="bd-hero__banner hero__overlay include__bg" data-background="<?=$bannerImg;?>" style="background-image: url('<?=$bannerImg;?>');">
                            </div>
                            <div class="container-fluid" style="position:relative; z-index:2;">
                                <div class="row">
                                    <div class="col-xl-6 ps-lg-5">
                                        <div class="bd-hero__content-2">
                                            <span class="animated fadeInUp"></span>
                                            <h1 class="animated fadeInUpBig" style="font-size:18px; color:#fff;">
                                                <?=$bannerrow['title'];?>
                                            </h1>
                                            <div class="animated fadeInUpBig">
                                                <?=$bannerrow['sdesc'];?>
                                            </div>
                                            <div class="bd-hero__btn-wrapper animated fadeInDown">
                                                <a class="bd-hero__btn-1" href="<?=$path;?>contact-us" title="Get Your Quote">Get Your Quote</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <!-- Slider navigation arrows & pagination -->
            <div class="swiper-button-prev hero-nav-arrow hero-nav-prev"><i class="far fa-angle-left"></i></div>
            <div class="swiper-button-next hero-nav-arrow hero-nav-next"><i class="far fa-angle-right"></i></div>
            <div class="banner-pagination-1"></div>
        </div>
    </div>
    
    <div class="container-fluid sincebtn">
        <a href="<?=$path;?>company-information/gtb-philosophy" title="About Shiva Zippers">Since 1989</a>
    </div>
    <img src="assets/img/banner-bottom.png" class="afterbnr-zip" alt="zipper decorative divider">
</section>


<?php
    $homeproductsql = mysqli_query($con, "SELECT p.*, c.url AS caturl, c.`order` AS catorder FROM `products` AS p INNER JOIN `category` AS c ON c.id = p.category WHERE p.status = 1 AND c.status = 1 ORDER BY c.`order` ASC, p.`order` ASC, p.id ASC LIMIT 12");
    if($homeproductsql && mysqli_num_rows($homeproductsql) > 0){
?>
<section class="home-products">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="home-products__head">
                    <span class="home-products__eyebrow">Our Products</span>
                    <h2 class="home-products__title">Zippers &amp; Sliders Range</h2>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="home-products__aside">
                    <p class="home-products__lead">A comprehensive range of high-performance zippers and sliders designed to meet diverse industry needs. Available in various materials, sizes and finishes.</p>
                    <a class="home-products__btn" href="<?=$path;?>our-products/coil-zippers" title="View All Products">
                        <span>View All Products</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="home-products__sliderwrap">
            <div class="home-products__slider swiper-container">
                <div class="swiper-wrapper home-products__grid">
                    <?php
                        while($homeproductsrow = mysqli_fetch_array($homeproductsql)){
                            $homeprochildurl = __getChildCategoryName($con, $homeproductsrow['childcategory']);
                            $homeproducturl = !empty($homeproductsrow['caturl'])
                                ? $path.'our-products/'.$homeproductsrow['caturl'].'/'.$homeproductsrow['url']
                                : $path.'our-products';
                    ?>
                    <div class="swiper-slide home-products__slide">
                        <a class="home-product__card" href="<?=$homeproducturl;?>" title="<?=$homeproductsrow['title'];?>">
                            <div class="home-product__img">
                                <img src="<?=$path.$homeproductsrow['file'];?>" alt="<?=$homeproductsrow['title'];?>" loading="lazy">
                            </div>
                            <div class="home-product__body">
                                <h4><?=$homeproductsrow['title'];?></h4>
                                <span class="home-product__arrow" aria-hidden="true"><i class="far fa-long-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Slider navigation arrows -->
            <div class="home-products__nav home-products__prev" aria-label="Previous products"><i class="far fa-long-arrow-left"></i></div>
            <div class="home-products__nav home-products__next" aria-label="Next products"><i class="far fa-long-arrow-right"></i></div>
        </div>
    </div>
</section>
<?php } ?>

<section class="home-impact-strip">
    <div class="container-fluid">
        <div class="home-impact-grid">
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-building"></i></div>
                <div class="home-impact-txt">
                    <strong><?=!empty($yearinindustry) ? $yearinindustry : '35+';?></strong>
                    <span>Years in Industry<br>Since 1989</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-users"></i></div>
                <div class="home-impact-txt">
                    <strong><?=!empty($globalclients) ? $globalclients : '200+';?></strong>
                    <span>Global Clients</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-ship"></i></div>
                <div class="home-impact-txt">
                    <strong><?=!empty($countriestoexport) ? $countriestoexport : '30+';?></strong>
                    <span>Countries<br>Exported To</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-gears"></i></div>
                <div class="home-impact-txt home-impact-txt--plain">
                    <span>Advanced<br>Manufacturing Setup</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-award"></i></div>
                <div class="home-impact-txt home-impact-txt--plain">
                    <span>Consistent<br>Quality Standards</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-users-gear"></i></div>
                <div class="home-impact-txt home-impact-txt--plain">
                    <span>Custom Solutions<br>for Every Need</span>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
(function () {
    var strip = document.querySelector('.home-impact-strip');
    if (!strip) return;
    var nums = strip.querySelectorAll('.home-impact-txt strong');
    if (!nums.length) return;
    var started = false;

    function run() {
        if (started) return;
        started = true;
        nums.forEach(function (el) {
            var raw = el.textContent.trim();
            /* split into leading non-digits / the number / trailing suffix (e.g. "35+" -> "" / 35 / "+") */
            var m = raw.match(/^([^\d]*)(\d+)([\s\S]*)$/);
            if (!m) return;
            var prefix = m[1], target = parseInt(m[2], 10), suffix = m[3];
            if (isNaN(target)) return;

            var dur = 1500, t0 = null;
            function tick(ts) {
                if (t0 === null) t0 = ts;
                var p = Math.min((ts - t0) / dur, 1);
                var eased = 1 - Math.pow(1 - p, 3); /* easeOutCubic */
                el.textContent = prefix + Math.round(target * eased) + suffix;
                if (p < 1) requestAnimationFrame(tick);
            }
            el.textContent = prefix + '0' + suffix;
            requestAnimationFrame(tick);
        });
    }

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { run(); io.disconnect(); }
            });
        }, { threshold: 0.4 });
        io.observe(strip);
    } else {
        run();
    }
})();
</script>
<!-- ==========================================================================
     SECTION 2: TRUST & STRATEGIC ADVANTAGES (Outperforming Olympic Zipper)
     ========================================================================== -->
<!-- <section class="home-trust">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="home-trust__head">
                    <span class="home-trust__eyebrow">Why Choose Us</span>
                    <h2 class="home-trust__title">Trusted By Global Brands Across 30+ Countries</h2>
                </div>
            </div>
        </div>
        <div class="row home-trust__grid">
            <?php
                $trustinfeatures = array(
                    array('icon' => 'fa-solid fa-wallet', 'stat' => 'Flexible', 'title' => 'Ease of Payment Terms'),
                    array('icon' => 'fa-solid fa-business-time', 'stat' => '40+', 'title' => 'Years In Industry'),
                    array('icon' => 'fa-solid fa-handshake', 'stat' => '200+', 'title' => 'Global Clients'),
                    array('icon' => 'fa-solid fa-face-smile', 'stat' => '100%', 'title' => 'Customer Satisfaction'),
                    array('icon' => 'fa-solid fa-truck-fast', 'stat' => 'Express', 'title' => 'Fast Delivery Support'),
                    array('icon' => 'fa-solid fa-earth-americas', 'stat' => '30+', 'title' => 'Export Destinations'),
                );

                foreach($trustinfeatures as $trustinfeature){
            ?>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="home-trust__card">
                    <div class="home-trust__icon-wrap">
                        <i class="<?=$trustinfeature['icon'];?>"></i>
                    </div>
                    <span class="home-trust__stat"><?=$trustinfeature['stat'];?></span>
                    <h4><?=$trustinfeature['title'];?></h4>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section> -->

<!-- ==========================================================================
     SECTION 3: HERITAGE & MANUFACTURING EXCELLENCE (Quality before Quantity)
     ========================================================================== -->
<section class="widget-excellence">
    <div class="container-fluid">
        <div class="row align-items-center widget-excellence__grid">
            <div class="col-lg-4">
                <div class="widget-excellence__media">
                    <?php $excImg = !empty($gtbindiarow['file']) ? $path.$gtbindiarow['file'] : $path.'assets/img/company-img.jpg'; ?>
                    <img src="<?=$excImg;?>" alt="<?=$aboutrow['title'];?>" class="widget-excellence__img" loading="lazy">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="widget-excellence__content">
                    <span class="widget-excellence__eyebrow"><?=$aboutrow['subtitle'];?></span>
                    <h2 class="widget-excellence__title"><?=$aboutrow['title'];?></h2>
                    <?php $excDesc = trim($aboutrow['desc']); ?>
                    <?php if($excDesc !== ''){ ?>
                    <div class="excellence-desc" id="excellenceDesc">
                        <?=$excDesc;?>
                    </div>
                    <?php } ?>

                    <a class="widget-excellence__btn" href="<?=$path;?>more-about-us/about-us" title="About Us">
                        <span>Know More</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget-excellence__features-head">
                    <div class="widget-excellence__features-headline">
                        <span class="widget-excellence__features-line"></span>
                        <h3 class="widget-excellence__features-title">Our Excellence</h3>
                        <span class="widget-excellence__features-line"></span>
                    </div>
                    <p class="widget-excellence__features-sub">Driving quality, innovation and sustainability.</p>
                </div>
                <div class="widget-excellence__features">
                    <div class="widget-excellence__feature">
                        <span class="widget-excellence__feature-icon"><i class="fa-solid fa-industry"></i></span>
                        <span class="widget-excellence__feature-txt">Quality Manufacturing</span>
                    </div>
                    <div class="widget-excellence__feature">
                        <span class="widget-excellence__feature-icon"><i class="fa-solid fa-lightbulb"></i></span>
                        <span class="widget-excellence__feature-txt">Innovative Designs</span>
                    </div>
                    <div class="widget-excellence__feature">
                        <span class="widget-excellence__feature-icon"><i class="fa-solid fa-earth-americas"></i></span>
                        <span class="widget-excellence__feature-txt">Global Export Network</span>
                    </div>
                    <div class="widget-excellence__feature">
                        <span class="widget-excellence__feature-icon"><i class="fa-solid fa-headset"></i></span>
                        <span class="widget-excellence__feature-txt">Customer Focus</span>
                    </div>
                    <div class="widget-excellence__feature">
                        <span class="widget-excellence__feature-icon"><i class="fa-solid fa-leaf"></i></span>
                        <span class="widget-excellence__feature-txt">Sustainable Practices</span>
                    </div>
                    <div class="widget-excellence__feature">
                    <span class="widget-excellence__feature-icon">
                        <i class="fa-solid fa-seedling"></i>
                    </span>
                    <span class="widget-excellence__feature-txt">Eco-Friendly Solutions</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION 4: WHAT WE MANUFACTURE / PRODUCT SHOWCASE
     ========================================================================== -->

<!-- ==========================================================================
     SECTION 5: MODERN INFRASTRUCTURE & TECHNOLOGY BANNER
     ========================================================================== -->
<!-- <section class="home-infra">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="home-infra__content">
                    <span class="home-infra__kicker"><i class="fa-solid fa-microchip"></i> Advanced Manufacturing</span>
                    <h2>We Use Modern Infrastructure &amp; Technology</h2>
                    <p>We have emerged as one of the most renowned manufacturers and suppliers of premium quality Zippers &amp; Sliders. Our entire product line is acknowledged globally for unmatched tensile strength, smooth gliding endurance, long life and competitive pricing.</p>
                    <div class="home-infra__features">
                        <div class="home-infra__feature-item">
                            <i class="fa-solid fa-circle-check"></i> High-Speed Automatic Weaving
                        </div>
                        <div class="home-infra__feature-item">
                            <i class="fa-solid fa-circle-check"></i> Computerized Dye-House Testing
                        </div>
                        <div class="home-infra__feature-item">
                            <i class="fa-solid fa-circle-check"></i> ISO &amp; TESTEX Quality Standards
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 text-lg-end mt-4 mt-lg-0">
                <a class="home-infra__btn" href="<?=$path;?>company-information" title="Explore Infrastructure">
                    <span>Know More &amp; Tour</span> <i class="far fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section> -->

<!-- ==========================================================================
     SECTION 6: AUTHORITY IMPACT METRICS STRIP (Outclassing Competitors)
     ========================================================================== -->





<!-- ==========================================================================
     SECTION 8: APPLICATIONS SHOWCASE (Where Our Zippers Perform)
     ========================================================================== -->
     <!-- <section>
<a class="home-applications__btn cutomizatinreqbtn" href="<?=$path;?>more-about-us/customization-request" title="Customization Request">
                        <span>Customization Request</span> <i class="far fa-long-arrow-right"></i>
                    </a> -->
                    <section>
            <section class="home-applications">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="home-applications__head">
                                <span class="home-applications__eyebrow">Applications</span>
                                <h2 class="home-applications__title">Serving Diverse Industries</h2>
                            </div>
                        </div>
                <div class="col-lg-5">
                <div class="home-applications__aside">

                    <a class="home-applications__btn cutomizatinreqbtn"
                    href="<?=$path;?>more-about-us/customization-request"
                    title="Customization Request">
                        <span>Customization Request</span>
                        <i class="far fa-long-arrow-right"></i>
                    </a>

                    <p class="home-applications__lead">
                        Our zippers and sliders are used across various industries, offering reliable fastening solutions for a wide range of applications.
                    </p>
                    <!-- <hr class="customization-divider"> -->
                    <a class="home-applications__btn"
                    href="<?=$path;?>more-about-us/our-applications"
                    title="View All Applications">
                        <span>View All Applications</span>
                        <i class="far fa-long-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
        
        <div class="home-applications__sliderwrap">
            <div class="home-applications__slider swiper-container">
                <div class="swiper-wrapper home-applications__grid">
                    <?php
                        if($applicationsql && mysqli_num_rows($applicationsql) > 0){
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
                <div class="swiper-slide home-applications__slide">
                    <a class="home-app__card" href="<?=$finalurl;?>" title="<?=$applicationsrow['title'];?>">
                        <div class="home-app__image">
                            <img src="<?=$path.$applicationsrow['file'];?>" alt="<?=$applicationsrow['title'];?>" loading="lazy">
                        </div>
                        <div class="home-app__content">
                            <h3><?=$applicationsrow['title'];?></h3>
                            <span class="home-app__arrow" aria-hidden="true"><i class="far fa-long-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
            <!-- Slider navigation arrows -->
            <div class="home-applications__nav home-applications__prev" aria-label="Previous applications"><i class="far fa-long-arrow-left"></i></div>
            <div class="home-applications__nav home-applications__next" aria-label="Next applications"><i class="far fa-long-arrow-right"></i></div>
        </div>

    </div>
</section>



<?php
$globalPresenceUrl = !empty($sindicaterow['url'])
    ? $path.'company-information/'.$sindicaterow['url']
    : $path.'contact-us';
?>

<section class="home-four-sections">
    <div class="container-fluid">

        <div class="row g-4 home-four-row">

            <!-- 1. OUR PHILOSOPHY -->
            <?php if(!empty($philosophyrow)){ ?>
            <div class="col-12 col-md-6 home-four-col">
                <div class="home-four-card">

                    <div class="home-four-card__media">
                        <img src="<?=$path.$philosophyrow['file'];?>"
                             alt="<?=htmlspecialchars($philosophyrow['title']);?>"
                             loading="lazy">
                    </div>

                    <div class="home-four-card__content">
                        <span class="home-four-card__eyebrow">
                            Our Philosophy
                        </span>

                        <h2><?=$philosophyrow['title'];?></h2>

                        <?php
                        $words = preg_split(
                            '/\s+/u',
                            trim(strip_tags($philosophyrow['sdesc'])),
                            -1,
                            PREG_SPLIT_NO_EMPTY
                        );

                        $short = implode(' ', array_slice($words, 0, 45));

                        if(count($words) > 45) {
                            $short .= '...';
                        }
                        ?>

                        <p><?=$short;?></p>

                        <a href="<?=$path;?>company-information/<?=$philosophyrow['url'];?>"
                           title="<?=htmlspecialchars($philosophyrow['title']);?>">
                            Read More
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
            <?php } ?>


            <!-- 2. GLOBAL FOOTPRINT -->
            <?php if(!empty($sindicaterow)){ ?>
            <div class="col-12 col-md-6 home-four-col">
                <div class="home-four-card">

                    <div class="home-four-card__media">
                        <img src="<?=$path.$sindicaterow['file'];?>"
                             alt="<?=htmlspecialchars($sindicaterow['title']);?>"
                             loading="lazy">
                    </div>

                    <div class="home-four-card__content">
                        <span class="home-four-card__eyebrow">
                            Global Footprint
                        </span>

                        <h2><?=$sindicaterow['title'];?></h2>

                        <?php
                        $words = preg_split(
                            '/\s+/u',
                            trim(strip_tags(str_replace(
                                'text-white',
                                '',
                                $sindicaterow['sdesc']
                            ))),
                            -1,
                            PREG_SPLIT_NO_EMPTY
                        );

                        $short = implode(' ', array_slice($words, 0, 45));

                        if(count($words) > 45) {
                            $short .= '...';
                        }
                        ?>

                        <p><?=$short;?></p>

                        <a href="<?=$path;?>company-information/<?=$sindicaterow['url'];?>"
                           title="<?=htmlspecialchars($sindicaterow['title']);?>">
                            Explore Global Network
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
            <?php } ?>


            <!-- 3. MADE IN INDIA -->
            <?php if(!empty($gtbindiarow)){ ?>
            <div class="col-12 col-md-6 home-four-col">
                <div class="home-four-card">

                    <div class="home-four-card__media">
                        <img src="<?=$path.$gtbindiarow['file'];?>"
                             alt="<?=htmlspecialchars($gtbindiarow['title']);?>"
                             loading="lazy">
                    </div>

                    <div class="home-four-card__content">
                        <span class="home-four-card__eyebrow">
                            Made In India
                        </span>

                        <h2><?=$gtbindiarow['title'];?></h2>

                        <?php
                        $words = preg_split(
                            '/\s+/u',
                            trim(strip_tags($gtbindiarow['sdesc'])),
                            -1,
                            PREG_SPLIT_NO_EMPTY
                        );

                        $short = implode(' ', array_slice($words, 0, 45));

                        if(count($words) > 45) {
                            $short .= '...';
                        }
                        ?>

                        <p><?=$short;?></p>

                        <a href="<?=$path;?>company-information/<?=$gtbindiarow['url'];?>"
                           title="<?=htmlspecialchars($gtbindiarow['title']);?>">
                            Know More
                            <i class="far fa-long-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
            <?php } ?>


            <!-- 4. GLOBAL PRESENCE -->
            <div class="col-12 col-md-6 home-four-col">
                <div class="home-four-card">

                    <div class="home-four-card__media">
                        <img src="<?=$path;?>global.png"
                             alt="Global Presence"
                             loading="lazy">
                    </div>

                    <div class="home-four-card__content">

                        <span class="home-four-card__eyebrow">
                            Global Presence
                        </span>

                        <h2>
                            Exporting to 30+ Countries Across the World
                        </h2>

                        <p>
                            The GTB Group's extensive global network enables
                            us to serve customers across key markets with
                            reliable products and timely delivery.
                        </p>

                        <a href="<?=$globalPresenceUrl;?>">
                            Our Global Presence
                            <i class="far fa-long-arrow-right"></i>
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<section class="home-certified">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-certified__head">
                    <span class="home-certified__eyebrow">Quality &amp; Compliance</span>
                    <h2 class="home-certified__title">Yearly Tested at TESTEX &amp; Globally Certified</h2>
                    <p class="home-certified__lead">Independently tested, globally recognized &mdash; our zipper products and manufacturing processes adhere to stringent international safety and performance standards.</p>
                </div>
            </div>
        </div>
        
        <div class="row align-items-center home-certified__grid">
            <div class="col-md-6 col-lg-3 order-md-1 order-lg-0">
                <div class="home-certified__cert">
                    <img src="<?=!empty($comcertfiles[0]) ? $path.$comcertfiles[0] : $path.'assets/img/certificate-img.png';?>" alt="TESTEX certification compliance" loading="lazy">
                </div>
            </div>
            
            <div class="col-md-12 col-lg-6">
                <div class="home-certified__center">
                    <div class="home-certified__testex">
                        <img src="assets/img/testex-logo.png" alt="TESTEX Swiss laboratory accreditation" loading="lazy">
                    </div>
                    
                    <h3 class="home-certified__subtitle">Industry Memberships</h3>
                    
                    <div class="row home-certified__members">
                        <!-- <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <script type="text/javascript">
                                    var memberfieo2009token = 'xUR6nkOJqD_106957', fieo2009img = 'horz';
                                </script>
                                <script src="https://fieo.org/fieome2009mberlogo.js"></script>
                            </div>
                        </div> -->
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="<?=!empty($commemberfiles[0]) ? $path.$commemberfiles[0] : $path.'assets/img/member-logos.png';?>" alt="Federation of Indian Export Organisations member" loading="lazy">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="<?=!empty($commemberfiles[1]) ? $path.$commemberfiles[1] : $path.'assets/img/member-logos2.png';?>" alt="Indian Industry Association accreditation" loading="lazy">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="<?=!empty($commemberfiles[2]) ? $path.$commemberfiles[2] : $path.'assets/img/member-logos3.png';?>" alt="Chamber of Commerce member" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 order-md-0 order-lg-1">
                <div class="home-certified__cert">
                    <img src="<?=!empty($comcertfiles[1]) ? $path.$comcertfiles[1] : $path.'assets/img/certificate-img2.png';?>" alt="ISO Quality assurance certification" loading="lazy">
                </div>
            </div>
        </div>

        <div class="home-certified__divider">
            <span>Trusted Worldwide</span>
        </div>

        <div class="row home-certified__trusted-row">
            <?php
                $defaulttrustedlogos = array(
                    'assets/img/trusted-logo1.png',
                    'assets/img/trusted-logo2.png',
                    'assets/img/trusted-logo3.png',
                    'assets/img/trusted-logo4.png',
                    'assets/img/trusted-logo5.png',
                    'assets/img/trusted-logo6.png',
                );

                // DB se aaye trusted logos, warna default images
                $trustedlogos = !empty($comtrustedfiles) ? $comtrustedfiles : $defaulttrustedlogos;

                foreach($trustedlogos as $trustedlogo){
                    $trustedlogoFull = (strpos($trustedlogo, 'assets/img/') === 0) ? $trustedlogo : $path.$trustedlogo;
            ?>
            <div class="col-4 col-sm-4 col-md-2">
                <div class="home-certified__trusted">
                    <img src="<?=$trustedlogoFull;?>" alt="trusted partner badge" loading="lazy">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php ?>

<section class="home-brands">
    <div class="container-fluid">
        <div class="home-brands__head">
            <h2 class="home-brands__label">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <span>Brands We Cater</span>
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </h2>
        </div>
        <div class="home-brands__wrap">
            <button class="home-brands__nav home-brands__prev" type="button" aria-label="Previous brands">
                <i class="far fa-long-arrow-left"></i>
            </button>
            <div class="home-brands__track">
                <?php
                    if($brandsql && mysqli_num_rows($brandsql) > 0){
                        while($brandsrow = mysqli_fetch_array($brandsql)){
                ?>
                <div class="home-brands__tile">
                    <img src="<?=$path.$brandsrow['file'];?>" alt="<?=$brandsrow['title'];?>" loading="lazy">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <button class="home-brands__nav home-brands__next" type="button" aria-label="Next brands">
                <i class="far fa-long-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<script>
(function () {
    var track = document.querySelector('.home-brands__track');
    var prev = document.querySelector('.home-brands__prev');
    var next = document.querySelector('.home-brands__next');
    if (!track) return;
    if (prev) prev.addEventListener('click', function () { track.scrollBy({ left: -340, behavior: 'smooth' }); });
    if (next) next.addEventListener('click', function () { track.scrollBy({ left: 340, behavior: 'smooth' }); });
})();
</script>

<!-- ==========================================================================
     SECTION 12: CTA BANNER - GET THE RIGHT ZIPPER SOLUTION
     ========================================================================== -->


<section class="home-cta">
    <div class="container-fluid">
        <div class="home-cta__inner">
            <div class="home-cta__content">
                <span class="home-cta__eyebrow">Let&rsquo;s Work Together</span>
                <h2 class="home-cta__title">Get the Right Zipper Solution for Your Business</h2>
                <p class="home-cta__text">Connect with our team for product details, custom requirements or bulk inquiries.</p>
            </div>
            <a class="home-cta__btn" href="<?=$path;?>contact-us">
                <span>Get in Touch</span> <i class="far fa-long-arrow-right"></i>
            </a>
        </div>
    </div>
</section>