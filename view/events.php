<section class="events">
    <div class="container-fluid">

        <!-- Page header -->
        <div class="factory-tour__head events__head">
            <span class="home-philosophy__eyebrow">News &amp; Events</span>
            <h1 class="home-philosophy__title"><?=!empty($pagename) ? $pagename : 'Events';?></h1>
        </div>

        <?php
            while($eventsrow = mysqli_fetch_array($eventssql)){
        ?>
        <article class="events__card">
            <div class="row g-4 align-items-start">
                <!-- Left: tag + title (sticky) -->
                <div class="col-lg-4">
                    <div class="events__side">
                        <span class="events__tag"><i class="fa fa-calendar-alt"></i> Event</span>
                        <h2 class="events__title"><?=$eventsrow['title'];?></h2>
                    </div>
                </div>

                <!-- Right: description + gallery -->
                <div class="col-lg-8">
                    <div class="events__desc">
                        <?=$eventsrow['desc'];?>
                    </div>

                    <?php
                        $eventsid = $eventsrow['id'];
                        $eventimagessql = mysqli_query($con, "SELECT * FROM `gallery_imgs` WHERE status=1 AND `galid`='$eventsid' ORDER BY `order` ASC");
                        if(mysqli_num_rows($eventimagessql) > 0){
                    ?>
                    <div class="events__gallery">
                        <?php while($eventimagesrow = mysqli_fetch_assoc($eventimagessql)){ ?>
                        <div class="events__img">
                            <img src="<?=$path2.$eventimagesrow['file'];?>" alt="<?=$eventsrow['title'];?>" loading="lazy">
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </article>
        <?php
            }
        ?>

    </div>
</section>
