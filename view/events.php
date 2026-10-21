  <section class='widget-event'>
      <div class='container'>
        <?php
            while($eventsrow = mysqli_fetch_array($eventssql)){
        ?>
          <div class='row'>
              <div class='col-md-12 head '> 
              <h4 class="title-events"><?=$eventsrow['title'];?></h4>
              <p><?=$eventsrow['desc'];?></p>
              </div>
              <?php 
                $eventsid = $eventsrow['id'];
                $eventimagessql = mysqli_query($con, "SELECT * FROM `gallery_imgs` WHERE status=1 AND `galid`='$eventsid' ORDER BY `order` ASC");
                while($eventimagesrow = mysqli_fetch_assoc($eventimagessql)){
              ?>
              <div class='col-md-3 eventbox'>
                  <img src="<?=$path2.$eventimagesrow['file'];?>" alt=''  />
              </div>
              <?php 
                }
              ?>
          </div>
          <?php
            }
          ?>
      </div>
  </section>