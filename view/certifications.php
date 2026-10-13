<main class="conatct-us-wrapper">
         <?php
            $i = 1;
            while($certificatrow = mysqli_fetch_array($certificatequery)){
         ?>
         <section class="bd-service__area pt-30 pb-10 testedcont">
            <div class="container-fluid">
               <div class="row pt-4">
                  <div class="col-lg-12">
                     <div class="application-content-wrapper">
                        <h4 class="content-title"><?=$certificatrow['title'];?></h4>
                     </div>
                  </div>
                  <?php if($i % 2 == 0){  ?>
                  <div class="col-lg-3 col-md-6 order-lg-2">
                  <?php }else { ?>
                  <div class="col-lg-3 col-md-6">
                  <?php } ?>
                     <div class="section-img-box mt-lg-3">
                        <a href="<?=$path.$certificatrow['file'];?>" data-group="1" class="galleryItem test">
                        <img src="<?=$path.$certificatrow['file'];?>" alt="certificate image" class="certificate-img">
                        </a>
                     </div>
                  </div>
                   <?php if($i % 2 == 0){  ?>
                  <div class="col-lg-9 col-md-6 order-lg-1">
                    <?php }else { ?>
                  <div class="col-lg-9 col-md-6">
                  <?php } ?>
                     <div class="application-content-wrapper">
                        <?=$certificatrow['desc'];?>
                     </div>
                  </div>
                  <a id="app9"></a>
               </div>
            </div>
         </section>
         <?php 
           $i++; }
         ?>
         <section class="bd-service__area pt-30 pb-10 testedcont">
            <div class="container-fluid">
               <div class="row pt-4 pb-4">
                 <div class="col-lg-5">
                   <h3 class="yearlytested-hd text-start">Yearly Tested at :</h3>
                   <img src="assets/img/testex-logo.png" alt="testex logo" class="testex-logo">
                 </div>
                 <div class="col-lg-7">
                   <h3 class="yearlytested-hd mb-4 text-start">We Are Also Members of :</h3>
                   <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="row">
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
               </div>
            </div>
         </section>


      </main>
      