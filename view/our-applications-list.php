<?php
$ourappsql = mysqli_query($con, "SELECT * FROM `childcategory` WHERE `status` = '1' AND `subcat_id` = '90' ORDER BY `order` ASC, `id` ASC");
$ourappcount = ($ourappsql && mysqli_num_rows($ourappsql)) ? mysqli_num_rows($ourappsql) : 0;
?>
<section class="apps apps--list">
    <div class="container">

        <!-- Page header -->
        <div class="factory-tour__head apps__head">
            <span class="home-philosophy__eyebrow">Our Applications</span>
            <h1 class="home-philosophy__title"><?=$pagename;?></h1>
            <?php if($ourappcount){ ?>
            <p class="apps__lede">Our zippers and sliders are used across various industries, offering reliable fastening solutions for a wide range of applications.</p>
            <?php } ?>
        </div>

        <?php if($ourappcount){ ?>
        <div class="row g-4 apps__grid">
            <?php
            while($ourapprow = mysqli_fetch_assoc($ourappsql)){
                $ourappimg = !empty($ourapprow['file']) ? $path.$ourapprow['file'] : $path.'assets/img/no-image.png';
                $ourappurl = $path.'more-about-us/our-applications/'.$ourapprow['url'];
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <a class="home-app__card" href="<?=$ourappurl;?>" title="<?=$ourapprow['title'];?>">
                    <div class="home-app__image">
                        <img src="<?=$ourappimg;?>" alt="<?=$ourapprow['title'];?>" loading="lazy">
                    </div>
                    <div class="home-app__content">
                        <h3><?=$ourapprow['title'];?></h3>
                        <span class="home-app__arrow" aria-hidden="true"><i class="far fa-long-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
        <?php } else { ?>
        <p class="apps__empty">No applications found.</p>
        <?php } ?>

        <a id="app9"></a>
    </div>
</section>
