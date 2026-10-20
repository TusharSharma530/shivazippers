<?php 
    if($geturl3){
?>

<main class="conatct-us-wrapper">
    <section class="pdp">
        <div class="container-fluid">

            <!-- Full-width hero header -->
            <div class="pdp__hero">
                <span class="home-philosophy__eyebrow">Our Products</span>
                <h1 class="pdp__title"><?=$productdetailsrow['title'];?></h1>
                <p class="pdp__lead"><?=$productscatrow['title'] ?? 'Product Details';?></p>
            </div>

            <div class="row pdp__grid">
                <!-- Gallery -->
                <div class="col-md-6 col-lg-5">
                    <div class="pdp__gallery">
                        <div class="procutimg2 d-block">
                            <?php
                                if(mysqli_num_rows($productimagessql)>0){
                            ?>
                            <div id="carouselExampleIndicators" class="carousel slide detail-slider"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?=$path.$productdetailsrow['file'];?>" alt="product images">
                                    </div>
                                    <?php
                                    if(mysqli_num_rows($productimagessql)>0){
                                        while($productimagesrow = mysqli_fetch_array($productimagessql)){
                                    ?>
                                    <div class="carousel-item">
                                        <img src="<?=$path.$productimagesrow['file'];?>" alt="product images">
                                    </div>
                                    <?php
                                        }
                                        }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <?php }else{ ?>
                                <img src="<?=$path.$productdetailsrow['file'];?>" alt="product images">
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-md-6 col-lg-7">
                    <div class="pdp__info">
                        <div class="pdp__desc">
                            <?=$productdetailsrow['desc'];?>
                        </div>
                        <div class="pdp__cta">
                            <a href="<?=$path;?>contact-us" class="detailsenquiry">Enquire Now</a>
                        </div>

                        <!-- Segmented tabs -->
                        <div class="pdp__tabs">
                            <ul class="nav nav-tabs enquirytabbing" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Key Features</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Applications</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab2" data-bs-toggle="tab"
                                        data-bs-target="#profile2" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Variants</button>
                                </li>
                            </ul>

                            <div class="tab-content enquirytabbingcontent">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <?=$productdetailsrow['keyfeatures'];?>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <?=$productdetailsrow['applications'];?>
                                </div>
                                <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                    <?=$productdetailsrow['variants'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
    }else {
?>
<main class="conatct-us-wrapper">
    <section class="mb-50 product-listing">
        <div class="container-fluid">
            <div class="factory-tour__head">
                <span class="home-philosophy__eyebrow">Our Products</span>
                <h1 class="home-philosophy__title"><?=$breadcrumbtitle;?></h1>
            </div>
            <div class="row factory-tour__grid">
                <?php
                    while($productsrow = mysqli_fetch_array($productsqlsc)){
                        $childid = $productsrow['childcategory'];
                        $producturl = $productsrow['url'];
                        $childurl = __getChildCategoryName($con, $childid);
                  ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a class="home-product__card" href="<?=$path;?>our-products/<?=$productscaturl;?>/<?=$childurl;?>"
                        title="View Details">
                        <div class="home-product__img">
                            <img src="<?=$path.$productsrow['file'];?>" alt="<?=$productsrow['title'];?>" loading="lazy">
                        </div>
                        <div class="home-product__body home-product__body--cta">
                            <h4><?=$productsrow['title'];?></h4>
                            <span class="home-product__cta">View Details</span>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
            if($geturl2 == 'coil-zippers'){
        ?>
    <section class='page-content coil-seo'>
        <div class="container-fluid">
            <!-- Header: eyebrow + title -->
            <div class="factory-tour__head coil-seo__head">
                <span class="home-philosophy__eyebrow">Quality You Can Trust</span>
                <h3 class="home-philosophy__title">Polyester coil Zippers in India</h3>
            </div>

            <!-- Intro paragraph (lead) -->
            <div class="row coil-seo__intro">
                <div class="col-lg-12">
                    <p>Shiva Fasteners Pvt. Ltd., a premier zipper manufacturer in India, offers high-quality polyester
                        coil zippers, widely recognized as CFC zippers in India. Our polyester coil zippers are designed
                        for great durability and performance, making them ideal for various applications. Crafted with
                        precision, these zippers blend strength with smooth functionality, ensuring long-lasting use. As
                        a trusted name in the industry, Shiva Fasteners is dedicated to providing top-notch polyester
                        coil zippers, meeting the highest standards of quality and reliability. Our commitment to
                        excellence makes us a leading choice for clients seeking superior polyester coil zippers in
                        India.</p>
                </div>
            </div>

            <!-- Two-column card: label left / content right -->
            <div class="row coil-seo__grid">
                <div class="col-lg-4">
                    <div class="coil-seo__label">
                        <h4>Polyester Coil Zippers</h4>
                        <span class="coil-seo__tag">(CFC Zippers)</span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="coil-seo__body">
                        <p>Polyester coil zippers, also known as CFC coil zippers, are a popular choice in the zipper
                            industry due to their strength, flexibility, and smooth operation. Made from high-quality
                            polyester, these zippers are designed to withstand wear and tear, making them ideal for a wide
                            range of applications, from fashion and sportswear to luggage and outdoor gear.</p>
                        <p>CFC zippers in India feature a continuous coil of polyester that forms the zipper teeth,
                            providing a seamless and reliable fastening solution. Their lightweight yet durable construction
                            ensures that they perform consistently under various conditions, offering excellent resistance
                            to corrosion and damage. Additionally, the smooth operation of polyester coil zippers makes them
                            easy to use, enhancing the user experience.</p>
                        <p>Shiva Fasteners Pvt. Ltd. specializes in manufacturing top-grade polyester coil zippers in India.
                            Our commitment to quality ensures that each zipper meets the highest standards, providing our
                            customers with dependable and long-lasting products. Whether for high-end fashion garments or
                            rugged outdoor equipment, our CFC zippers are engineered to deliver superior performance and
                            durability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<?php } ?>