<section class="apps aboutpg">
    <div class="container-fluid">

        <div class="factory-tour__head apps__head">
            <span class="home-philosophy__eyebrow">Who We Are</span>
            <h1 class="home-philosophy__title"><?=$pagename;?></h1>
        </div>

        <div class="row g-4 align-items-start apps__grid aboutpg__grid">
            <!-- Content (left) -->
            <div class="col-md-12 col-lg-7">
                <div class="apps__body aboutpg__body">
                    <?=$data;?>
                </div>
            </div>
            <!-- Image (right, sticky, full - not cropped) -->
            <div class="col-md-12 col-lg-5">
                <?php if(!empty($file)){ ?>
                <div class="apps__media aboutpg__media">
                    <img src="<?=$path.$file;?>" alt="<?=$pagename;?>">
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>
