<?php 
    if($geturl3){
?>

<main class="conatct-us-wrapper">
    <section class="mb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="productdet-cont sticky-top">
                        <div class="procutimg2 d-block">
                            <?php
                                if(mysqli_num_rows($productimagessql)>0){
                            ?>
                            <div id="carouselExampleIndicators" class="carousel slide detail-slider"
                                data-bs-ride="carousel">
                                <!-- <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              </div> -->
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
                <div class="col-md-6 col-lg-8">
                    <div class="productdet-det">
                        <h1><?=$productdetailsrow['title'];?></h1>
                        <?=$productdetailsrow['desc'];?>
                        <a href="<?=$path;?>contact-us" class="detailsenquiry">Enquire Now</a>

                        <!-- Nav tabs -->
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

                        <!-- Tab panes -->
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


                        <a href="<?=$path;?>contact-us" class="detailsenquiry">Enquire Now</a>

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
    <section class="mb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-sm-4" style='font-size:2em; text-align:center;'><?=$breadcrumbtitle;?></h4>
                </div>
                <?php
                    while($productsrow = mysqli_fetch_array($productsqlsc)){
                        $childid = $productsrow['childcategory'];
                        $producturl = $productsrow['url'];
                        $childurl = __getChildCategoryName($con, $childid);
                  ?>
                <div class="col-md-4 col-lg-3">
                    <div class="productcont">
                        <div class="procutimg">
                            <a href="<?=$path;?>our-products/<?=$productscaturl;?>/<?=$childurl;?>"
                                title="View Details">
                                <img src="<?=$path.$productsrow['file'];?>" alt="<?=$productsrow['title'];?>">
                            </a>
                        </div>
                        <div class="proname">
                            <h2><a href="<?=$path;?>our-products/<?=$productscaturl;?>/<?=$childurl;?>"
                                    title="View Details"><?=$productsrow['title'];?></a></h2>
                            <a class="btnn" href="<?=$path;?>our-products/<?=$productscaturl;?>/<?=$childurl;?>"
                                title="View Details">View Details</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
            if($geturl2 == 'coil-zippers'){
        ?>
    <section class='page-content'>
        <div class="container-fluid">
            <div class="row">
                <div class='col-md-12'>

                    <h3>Polyester coil Zippers in India: Quality You Can Trust</h3>
                    <p>Shiva Fasteners Pvt. Ltd., a premier zipper manufacturer in India, offers high-quality polyester
                        coil zippers, widely recognized as CFC zippers in India. Our polyester coil zippers are designed
                        for great durability and performance, making them ideal for various applications. Crafted with
                        precision, these zippers blend strength with smooth functionality, ensuring long-lasting use. As
                        a trusted name in the industry, Shiva Fasteners is dedicated to providing top-notch polyester
                        coil zippers, meeting the highest standards of quality and reliability. Our commitment to
                        excellence makes us a leading choice for clients seeking superior polyester coil zippers in
                        India.</p>

                    <h4>Polyester Coil Zippers (CFC Zippers)</h4>
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
    </section>
    <?php } ?>
</main>
<?php } ?>