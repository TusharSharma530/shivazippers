<!-- Home page stylesheet (Theme-consistent, premium layouts) -->
<link rel="stylesheet" href="<?=$path;?>assets/css/style.css">

<!-- ==========================================================================
     SECTION 1: HERO BANNER CAROUSEL
     ========================================================================== -->
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
                                    <div class="col-xl-7 col-lg-8 ps-lg-5">
                                        <div class="hero-content-box">
                                            <div class="hero-kicker animated fadeInUp">
                                                <i class="fa-solid fa-award"></i> Since 1989 &bull; India's Premier Zipper Manufacturer
                                            </div>
                                            <h1 class="hero-title animated fadeInUp">
                                                <?=$bannerrow['title'];?>
                                            </h1>
                                            <div class="hero-desc animated fadeInUp">
                                                <?=$bannerrow['sdesc'];?>
                                            </div>
                                            <div class="hero-actions animated fadeInUp">
                                                <a class="hero-btn-primary" href="<?=$path;?>contact-us">
                                                    Get Instant Quote <i class="far fa-long-arrow-right"></i>
                                                </a>
                                                <a class="hero-btn-secondary" href="<?=$path;?>our-products">
                                                    <i class="fa-solid fa-layer-group"></i> Explore Products
                                                </a>
                                            </div>
                                            <!-- Floating Hero Metrics Strip -->
                                            <div class="hero-pills-bar animated fadeInUp">
                                                <div class="hero-pill-item">
                                                    <i class="fa-solid fa-shield-check"></i>
                                                    <span><strong>100%</strong> Tested Quality</span>
                                                </div>
                                                <div class="hero-pill-divider"></div>
                                                <div class="hero-pill-item">
                                                    <i class="fa-solid fa-earth-asia"></i>
                                                    <span><strong>30+</strong> Export Nations</span>
                                                </div>
                                                <div class="hero-pill-divider"></div>
                                                <div class="hero-pill-item">
                                                    <i class="fa-solid fa-building-circle-check"></i>
                                                    <span><strong>200+</strong> Global Clients</span>
                                                </div>
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

<section class="home-impact-strip">
    <div class="container-fluid">
        <div class="home-impact-grid">
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-business-time"></i></div>
                <div class="home-impact-txt">
                    <strong>40+</strong>
                    <span>Years of Manufacturing Heritage</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-globe"></i></div>
                <div class="home-impact-txt">
                    <strong>30+</strong>
                    <span>Countries Global Footprint</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-handshake-angle"></i></div>
                <div class="home-impact-txt">
                    <strong>200+</strong>
                    <span>Satisfied Enterprise Clients</span>
                </div>
            </div>
            <div class="home-impact-item">
                <div class="home-impact-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="home-impact-txt">
                    <strong>100%</strong>
                    <span>Batch Inspection &amp; QA Compliance</span>
                </div>
            </div>
        </div>
    </div>
</section>
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
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-5">
                <div class="widget-excellence__head">
                    <span class="widget-excellence__eyebrow"><?=$aboutrow['subtitle'];?></span>
                    <h2 class="widget-excellence__title"><?=$aboutrow['title'];?></h2>

                    <div class="widget-excellence__card">
                        <span class="widget-excellence__card-icon"><i class="fa-solid fa-medal"></i></span>
                        <div class="widget-excellence__card-txt">
                            <strong>Quality before Quantity</strong>
                            <p>Our founding motto &ndash; every zipper &amp; slider is rigorously tested at every manufacturing stage before dispatch.</p>
                        </div>
                    </div>

                    <ul class="widget-excellence__facts">
                        <li>
                            <span class="widget-excellence__fact-icon"><i class="fa-solid fa-industry"></i></span>
                            <span class="widget-excellence__fact-txt">
                                <strong>Meerut, India</strong>Zipper manufacturing capital of the country
                            </span>
                        </li>
                        <li>
                            <span class="widget-excellence__fact-icon"><i class="fa-solid fa-gears"></i></span>
                            <span class="widget-excellence__fact-txt">
                                <strong>In-house Manufacturing</strong>End-to-end production of coil zippers, LFC, CFC &amp; sliders
                            </span>
                        </li>
                        <li>
                            <span class="widget-excellence__fact-icon"><i class="fa-solid fa-earth-asia"></i></span>
                            <span class="widget-excellence__fact-txt">
                                <strong>Trusted Worldwide</strong>Reliable supply partner across 30+ countries
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="widget-excellence__content">
                    <?php $excDesc = trim($aboutrow['desc']); ?>
                    <?php if($excDesc !== ''){ ?>
                    <div class="excellence-desc" id="excellenceDesc">
                        <?=$excDesc;?>
                    </div>
                    <button type="button" class="excellence-desc__toggle" id="excellenceDescToggle" aria-expanded="false" aria-controls="excellenceDesc">
                        <span class="excellence-desc__toggle-txt">Read More</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <?php } ?>
                    
                    <!-- Asymmetrical Milestone Trio -->
                    <div class="excellence-stat-trio">
                        <div class="excellence-stat-card">
                            <span class="excellence-stat-num">1989</span>
                            <span class="excellence-stat-label">Founding Legacy</span>
                        </div>
                        <div class="excellence-stat-card">
                            <span class="excellence-stat-num">100%</span>
                            <span class="excellence-stat-label">In-House Quality Control</span>
                        </div>
                        <div class="excellence-stat-card">
                            <span class="excellence-stat-num">30+</span>
                            <span class="excellence-stat-label">Export Nations</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var btn = document.getElementById('excellenceDescToggle');
    var box = document.getElementById('excellenceDesc');
    if (!btn || !box) return;

    var label = btn.querySelector('.excellence-desc__toggle-txt');

    btn.addEventListener('click', function () {
        var isOpen = box.classList.toggle('is-open');
        btn.classList.toggle('is-open', isOpen);
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        if (label) label.textContent = isOpen ? 'Read Less' : 'Read More';

        /* Keep the max-height transition smooth in both directions */
        if (isOpen) {
            box.style.maxHeight = box.scrollHeight + 'px';
            var afterOpen = function () {
                box.style.maxHeight = 'none';
                box.removeEventListener('transitionend', afterOpen);
            };
            box.addEventListener('transitionend', afterOpen);
        } else {
            box.style.maxHeight = box.scrollHeight + 'px';
            void box.offsetHeight; /* force reflow so it animates closed */
            box.style.maxHeight = '';
        }
    });
})();
</script>

<!-- ==========================================================================
     SECTION 4: WHAT WE MANUFACTURE / PRODUCT SHOWCASE
     ========================================================================== -->
<?php
    $homeproductsql = mysqli_query($con, "SELECT p.*, c.url AS caturl, c.`order` AS catorder FROM `products` AS p INNER JOIN `category` AS c ON c.id = p.category WHERE p.status = 1 AND c.status = 1 ORDER BY c.`order` ASC, p.`order` ASC, p.id ASC LIMIT 6");
    if($homeproductsql && mysqli_num_rows($homeproductsql) > 0){
?>
<section class="home-products">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="home-products__head">
                    <span class="home-products__eyebrow">Precision Engineered Solutions</span>
                    <h2 class="home-products__title">Our Manufactured Range</h2>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="home-products__btn" href="<?=$path;?>our-products" title="View All Products">
                    <span>View All Products</span> <i class="far fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="row home-products__grid">
            <?php
                while($homeproductsrow = mysqli_fetch_array($homeproductsql)){
                    $homeprochildurl = __getChildCategoryName($con, $homeproductsrow['childcategory']);
                    $homeproducturl = ($homeproductsrow['caturl'] && $homeprochildurl) ? $path.'our-products/'.$homeproductsrow['caturl'].'/'.$homeprochildurl : $path.'our-products';
            ?>
            <div class="col-6 col-md-4 col-xl-2">
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
</section>
<?php } ?>

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
     SECTION 7: CLIENTELE / BRANDS WE CATER
     ========================================================================== -->


<!-- ==========================================================================
     SECTION 8: APPLICATIONS SHOWCASE (Where Our Zippers Perform)
     ========================================================================== -->
<section class="home-applications">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="home-applications__head">
                    <div class="home-applications__head-text">
                        <span class="home-applications__eyebrow">Versatility &amp; Performance</span>
                        <h2 class="home-applications__title">Applications Across Diverse Industries</h2>
                    </div>
                    <!-- Slider navigation -->
                    <div class="home-applications__aside">
                        <div class="bd-gallery__navigatin home-applications__nav">
                            <button class="gallery-button-prev" type="button" aria-label="Previous applications">
                                <i class="far fa-long-arrow-left"></i>
                            </button>
                            <button class="gallery-button-next" type="button" aria-label="Next applications">
                                <i class="far fa-long-arrow-right"></i>
                            </button>
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
                            <div class="swiper-slide">
                                <div class="bd-gallery__item home-app__card">
                                    <div class="bd-gallery__image w-img home-app__image">
                                        <a href="<?=$finalurl;?>" title="<?=$applicationsrow['title'];?>">
                                            <img src="<?=$path.$applicationsrow['file'];?>" alt="<?=$applicationsrow['title'];?>" loading="lazy">
                                        </a>
                                        <span class="home-app__arrow"><i class="far fa-long-arrow-right"></i></span>
                                        <div class="bd-gallery__content home-app__content">
                                            <h3><a href="<?=$finalurl;?>"><?=$applicationsrow['title'];?></a></h3>
                                            <span class="home-app__link">View Details <i class="far fa-long-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="home-applications__note">
                    <span class="home-applications__note-icon" aria-hidden="true"><i class="fa-solid fa-quote-left"></i></span>
                    <div class="home-applications__note-txt">
                        <p>Across these diverse industries, our coil zippers are trusted for their quality, versatility, and dependability, making them the top choice for manufacturers seeking excellence in their products. As a leading zipper manufacturing company in India, we are dedicated to providing top-quality zippers that meet the highest standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION 9: FOUNDATIONAL PILLARS (Home Values)
     ========================================================================== -->
<section class="home-values">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="home-values__head">
                    <!-- <span class="home-values__eyebrow">Our Core Principles</span> -->
                    <h2 class="home-values__title">The Standards That Guide Every Zipper We Make</h2>
                </div>
            </div>
        </div>
        <div class="row home-values__grid">
            <div class="col-md-4">
                <div class="home-values__item">
                    <div class="home-values__icon"><i class="fa-solid fa-compass-drafting"></i></div>
                    <span class="home-values__bar"></span>
                    <h3>Custom Creative</h3>
                    <p>Our creative team travels the world to hunt for innovative designs for all zippers and sliders &ndash; staying fashion-forward is the key to lead this industry. All products are unique and made-to-order for each brand.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-values__item">
                    <div class="home-values__icon"><i class="fa-solid fa-headset"></i></div>
                    <span class="home-values__bar"></span>
                    <h3>Unmatched Service</h3>
                    <p>We take time to understand the creative vision of our customers and turn it into reality. Therefore, we guarantee to encompass the brand's exact mission, aesthetic, and functional requirements in each product.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-values__item">
                    <div class="home-values__icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <span class="home-values__bar"></span>
                    <h3>Guaranteed Quality</h3>
                    <p>There is a reason Shiva Zippers is the choice for the largest brands in the world &ndash; each of our products goes through meticulous testing to ensure peak performance before reaching our customers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION 10: CORPORATE HERITAGE & PRESENCE TRILOGY (3 DISTINCT LAYOUTS)
     ========================================================================== -->

<!-- 10A: OUR PHILOSOPHY (Split Layout - Image Left, Story Right) -->
<?php if(!empty($philosophyrow)){ ?>
<section class="home-philosophy">
    <div class="container-fluid">
        <div class="row align-items-center home-philosophy__grid">
            <div class="col-md-12 col-lg-6">
                <div class="home-philosophy__media">
                    <span class="home-philosophy__frame" aria-hidden="true"></span>
                    <img src="<?=$path.$philosophyrow['file'];?>" alt="<?=$philosophyrow['title'];?>" class="home-philosophy__img" loading="lazy">
                    <span class="home-philosophy__quote" aria-hidden="true"><i class="fa-solid fa-quote-left"></i></span>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="home-philosophy__content">
                    <span class="home-philosophy__eyebrow">Our Philosophy</span>
                    <h2 class="home-philosophy__title"><?=$philosophyrow['title'];?></h2>
                    <?php
                    // Home page ke liye description ka short excerpt (limited words)
                    $philosophyText   = trim(strip_tags($philosophyrow['sdesc']));
                    $philosophyWords  = preg_split('/\s+/u', $philosophyText, -1, PREG_SPLIT_NO_EMPTY);
                    $philosophyLimit  = 80; // itne words homepage par dikhayenge
                    $philosophyShort  = implode(' ', array_slice($philosophyWords, 0, $philosophyLimit));
                    if(count($philosophyWords) > $philosophyLimit){ $philosophyShort .= '...'; }
                    ?>
                    <div class="home-philosophy__text">
                        <p><?=$philosophyShort;?></p>
                    </div>
                    <a class="home-philosophy__btn" href="<?=$path;?>company-information/<?=$philosophyrow['url'];?>" title="<?=$philosophyrow['title'];?>">
                        <span>Read More</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!-- 10B: GTB SYNDICATE / GLOBAL PRESENCE (Story Left, Map/Visual Right) -->
<?php if(!empty($sindicaterow)){ ?>
<section class="home-syndicate">
    <div class="container-fluid">
        <div class="row align-items-center home-syndicate__grid">
            <div class="col-lg-6 col-xl-6">
                <div class="home-syndicate__content">
                    <span class="home-syndicate__eyebrow">Global Footprint</span>
                    <h2 class="home-syndicate__title"><?=$sindicaterow['title'];?></h2>
                    <?php
                    // Home page ke liye description ka short excerpt (limited words)
                    $syndicateText   = trim(strip_tags(str_replace('text-white', '', $sindicaterow['sdesc'])));
                    $syndicateWords  = preg_split('/\s+/u', $syndicateText, -1, PREG_SPLIT_NO_EMPTY);
                    $syndicateLimit  = 80; // itne words homepage par dikhayenge
                    $syndicateShort  = implode(' ', array_slice($syndicateWords, 0, $syndicateLimit));
                    if(count($syndicateWords) > $syndicateLimit){ $syndicateShort .= '...'; }
                    ?>
                    <div class="home-syndicate__text">
                        <p><?=$syndicateShort;?></p>
                    </div>
                    <a class="home-syndicate__btn" href="<?=$path;?>company-information/<?=$sindicaterow['url'];?>" title="<?=$sindicaterow['title'];?>">
                        <span>Explore Global Network</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="home-syndicate__media">
                    <span class="home-syndicate__ring" aria-hidden="true"></span>
                    <span class="home-syndicate__sheet" aria-hidden="true"></span>
                    <img src="<?=$path.$sindicaterow['file'];?>" alt="<?=$sindicaterow['title'];?>" class="home-syndicate__img" loading="lazy">
                    <div class="home-syndicate__badge">
                        <span class="home-syndicate__badge-icon"><i class="fa-solid fa-earth-americas"></i></span>
                        <span class="home-syndicate__badge-txt">
                            <strong>13+ Countries</strong>Export Network
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!-- 10C: MADE IN INDIA / MEERUT HUB (Industrial Left, Content Right) -->
<?php if(!empty($gtbindiarow)){ ?>
<section class="home-india">
    <div class="container-fluid">
        <div class="row align-items-center home-india__grid">
            <div class="col-lg-6">
                <div class="home-india__media">
                    <span class="home-india__sheet" aria-hidden="true"></span>
                    <img src="<?=$path.$gtbindiarow['file'];?>" alt="<?=$gtbindiarow['title'];?>" class="home-india__img" loading="lazy">
                    <div class="home-india__stamp">
                        <span class="home-india__stamp-icon"><i class="fa-solid fa-industry"></i></span>
                        <span class="home-india__stamp-txt">
                            <strong>Since 1989</strong>Meerut, India
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="home-india__content">
                    <span class="home-india__eyebrow">Made In India</span>
                    <h2 class="home-india__title"><?=$gtbindiarow['title'];?></h2>
                    <?php
                    // Home page ke liye description ka short excerpt (limited words)
                    $indiaText   = trim(strip_tags($gtbindiarow['sdesc']));
                    $indiaWords  = preg_split('/\s+/u', $indiaText, -1, PREG_SPLIT_NO_EMPTY);
                    $indiaLimit  = 80; // itne words homepage par dikhayenge
                    $indiaShort  = implode(' ', array_slice($indiaWords, 0, $indiaLimit));
                    if(count($indiaWords) > $indiaLimit){ $indiaShort .= '...'; }
                    ?>
                    <div class="home-india__text">
                        <p><?=$indiaShort;?></p>
                    </div>
                    <a class="home-india__btn" href="<?=$path;?>company-information/<?=$gtbindiarow['url'];?>" title="<?=$gtbindiarow['title'];?>">
                        <span>Know More</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php /*
<!-- ==========================================================================
     SECTION 11: TESTEX CERTIFICATION & INDUSTRY ACCREDITATIONS (COMMENTED OUT)
     ========================================================================== -->
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
                    <img src="assets/img/certificate-img.png" alt="TESTEX certification compliance" loading="lazy">
                </div>
            </div>
            
            <div class="col-md-12 col-lg-6">
                <div class="home-certified__center">
                    <div class="home-certified__testex">
                        <img src="assets/img/testex-logo.png" alt="TESTEX Swiss laboratory accreditation" loading="lazy">
                    </div>
                    
                    <h3 class="home-certified__subtitle">Industry Memberships</h3>
                    
                    <div class="row home-certified__members">
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <script type="text/javascript">
                                    var memberfieo2009token = 'xUR6nkOJqD_106957', fieo2009img = 'horz';
                                </script>
                                <script src="https://fieo.org/fieome2009mberlogo.js"></script>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="assets/img/member-logos.png" alt="Federation of Indian Export Organisations member" loading="lazy">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="assets/img/member-logos2.png" alt="Indian Industry Association accreditation" loading="lazy">
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="home-certified__tile">
                                <img src="assets/img/member-logos3.png" alt="Chamber of Commerce member" loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 order-md-0 order-lg-1">
                <div class="home-certified__cert">
                    <img src="assets/img/certificate-img2.png" alt="ISO Quality assurance certification" loading="lazy">
                </div>
            </div>
        </div>

        <div class="home-certified__divider">
            <span>Trusted Worldwide</span>
        </div>

        <div class="row home-certified__trusted-row">
            <?php
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
            <div class="col-4 col-sm-4 col-md-2">
                <div class="home-certified__trusted">
                    <img src="<?=$trustedlogo;?>" alt="trusted partner badge" loading="lazy">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
*/ ?>

<!-- ==========================================================================
     SECTION 11B: GLOBAL PRESENCE & CERTIFICATIONS (WORLD MAP + BACKEND CERTS)
     ========================================================================== -->
<?php
// Global Presence button URL (Global Footprint page, na mile to contact page)
$globalPresenceUrl = !empty($sindicaterow['url']) ? $path.'company-information/'.$sindicaterow['url'] : $path.'contact-us';

// Certification images backend (admin) se
$homeCertSql = isset($con) ? mysqli_query($con, "SELECT * FROM `certificates` WHERE status=1 LIMIT 6") : false;
?>
<section class="home-global">
    <div class="container-fluid">
        <div class="row align-items-center home-global__grid">
            <div class="col-lg-4">
                <div class="home-global__info">
                    <span class="home-global__eyebrow"><i class="home-global__eyebrow-line"></i>Global Presence</span>
                    <h2 class="home-global__title">Exporting to 30+ Countries Across the World</h2>
                    <p class="home-global__text">The GTB Group&rsquo;s extensive global network enables us to serve customers across key markets with reliable products and timely delivery.</p>
                    <a class="home-global__btn" href="<?=$globalPresenceUrl;?>">
                        <span>Our Global Presence</span> <i class="far fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="home-global__map">
                    <img src="map-bg.png" alt="World map - exporting to 30+ countries" loading="lazy">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="home-global__certs">
                    <span class="home-global__eyebrow home-global__eyebrow--end">Our Certifications<i class="home-global__eyebrow-line"></i></span>
                    <p class="home-global__certs-text">Our commitment to quality is validated by international certifications and rigorous testing standards.</p>
                    <div class="home-global__cert-grid">
                        <?php if($homeCertSql){ while($homeCertRow = mysqli_fetch_array($homeCertSql)){ ?>
                        <div class="home-global__cert-tile">
                            <a href="<?=$path.$homeCertRow['file'];?>" class="popup-image" title="<?=$homeCertRow['title'];?>">
                                <img src="<?=$path.$homeCertRow['file'];?>" alt="<?=$homeCertRow['title'];?>" loading="lazy">
                            </a>
                        </div>
                        <?php } } ?>
                        <?php
                        // Pehle section se aane wali saari certification images (static)
                        // $homeStaticCerts = array(
                        //     'assets/img/testex-logo.png'      => 'TESTEX Swiss laboratory accreditation',
                        //     'assets/img/certificate-img.png'  => 'TESTEX certification compliance',
                        //     'assets/img/certificate-img2.png' => 'ISO quality assurance certification',
                        // );
                        foreach($homeStaticCerts as $homeCertImg => $homeCertAlt){
                        ?>
                        <div class="home-global__cert-tile">
                            <a href="<?=$homeCertImg;?>" class="popup-image" title="<?=$homeCertAlt;?>">
                                <img src="<?=$homeCertImg;?>" alt="<?=$homeCertAlt;?>" loading="lazy">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pehle wali saari images: Industry Memberships + Trusted Worldwide -->
        <div class="home-global__members">
            <h3 class="home-global__heading animated fadeInUp"><span>Industry Memberships</span></h3>
            <div class="row home-certified__members">
                <div class="col-6 col-md-3">
                    <div class="home-certified__tile">
                        <script type="text/javascript">
                            var memberfieo2009token = 'xUR6nkOJqD_106957', fieo2009img = 'horz';
                        </script>
                        <script src="https://fieo.org/fieome2009mberlogo.js"></script>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="home-certified__tile">
                        <img src="assets/img/member-logos.png" alt="Federation of Indian Export Organisations member" loading="lazy">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="home-certified__tile">
                        <img src="assets/img/member-logos2.png" alt="Indian Industry Association accreditation" loading="lazy">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="home-certified__tile">
                        <img src="assets/img/member-logos3.png" alt="Chamber of Commerce member" loading="lazy">
                    </div>
                </div>
            </div>

            <h3 class="home-global__heading home-global__heading--spaced animated fadeInUp"><span>Trusted Worldwide</span></h3>

            <div class="row home-certified__trusted-row">
                <?php
                    $homeTrustedLogos = array(
                        'assets/img/trusted-logo1.png',
                        'assets/img/trusted-logo2.png',
                        'assets/img/trusted-logo3.png',
                        'assets/img/trusted-logo4.png',
                        'assets/img/trusted-logo5.png',
                        'assets/img/trusted-logo6.png',
                    );
                    foreach($homeTrustedLogos as $homeTrustedLogo){
                ?>
                <div class="col-4 col-sm-4 col-md-2">
                    <div class="home-certified__trusted">
                        <img src="<?=$homeTrustedLogo;?>" alt="trusted partner badge" loading="lazy">
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php /*
<!-- ==========================================================================
     SECTION 12: HIGH-CONVERSION ENQUIRY & SAMPLING CONSULTATION (COMMENTED OUT)
     ========================================================================== -->
<section class="home-enquiry">
    <div class="container-fluid">
        <div class="row align-items-center home-enquiry__grid">
            <div class="col-lg-5">
                <div class="home-enquiry__info">
                    <span class="home-enquiry__eyebrow">Get In Touch</span>
                    <h2 class="home-enquiry__title">Let&rsquo;s Build Something Great Together</h2>
                    <p class="home-enquiry__lead">Share your required zipper specifications, tape colors, or slider designs. Our engineering team will revert with sampling support, technical drawings, and factory-direct pricing.</p>
                    
                    <ul class="home-enquiry__points">
                        <li>
                            <span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                            Competitive factory-direct pricing &amp; custom lengths
                        </li>
                        <li>
                            <span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                            Fast sampling turnaround &amp; Pantone color matching
                        </li>
                        <li>
                            <span class="home-enquiry__point-icon"><i class="fa-solid fa-check"></i></span>
                            Export-grade protective packaging &amp; worldwide logistics
                        </li>
                    </ul>

                    <div class="enquiry-direct-box">
                        <div class="enquiry-direct-item">
                            <i class="fa-regular fa-envelope"></i>
                            <span>Sales Support: <a href="mailto:<?=$emailid;?>"><?=$emailid;?></a></span>
                        </div>
                        <div class="enquiry-direct-item">
                            <i class="fa-regular fa-phone-volume"></i>
                            <span>Call Direct: <a href="tel:+91<?=$contactno;?>">+91-<?=$contactno;?></a></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="home-enquiry__card">
                    <form class="row home-enquiry__form" method="POST" id="submitForm">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Full Name*" id="name" required="" data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" required="" placeholder="Email Address*" data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="phone_number" placeholder="Phone Number*" id="phone_number" required="" data-error="Please enter your phone number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="msg_subject" placeholder="Subject / Product Requirement*" id="msg_subject" required="" data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message" id="message" placeholder="Describe your zipper/slider requirements, quantities, or customization specs..." cols="30" rows="4" required="" data-error="Please enter your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="home-enquiry__submit" style="pointer-events: all; cursor: pointer;">
                                <span>Request Quote &amp; Samples</span> <i class="far fa-long-arrow-right"></i>
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <div class="msgbox"></div>
                </div>
            </div>
        </div>
    </div>
</section>
*/ ?>

<!-- ==========================================================================
     SECTION 12: CTA BANNER - GET THE RIGHT ZIPPER SOLUTION
     ========================================================================== -->


<div class="clientsection">
    <div class="container-fluid text-center">
        <h5 class="animated fadeInUp">Who We Work With</h5>
        <h3 class="animated fadeInUp"><span>BRANDS WE CATER </span></h3>
        <div class="home-brands__slider-wrap">
            <button class="brand-button-prev brand-nav" type="button" aria-label="Previous brands">
                <i class="far fa-long-arrow-left"></i>
            </button>
            <div class="swiper-container bd-brand-active home-brands__slider">
                <div class="swiper-wrapper">
                    <?php
                        if($brandsql && mysqli_num_rows($brandsql) > 0){
                            while($brandsrow = mysqli_fetch_array($brandsql)){
                    ?>
                    <div class="swiper-slide">
                        <div class="brand-logo">
                            <img src="<?=$path.$brandsrow['file'];?>" alt="<?=$brandsrow['title'];?>" loading="lazy">
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </div>
            <button class="brand-button-next brand-nav" type="button" aria-label="Next brands">
                <i class="far fa-long-arrow-right"></i>
            </button>
        </div>
    </div>
</div>
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