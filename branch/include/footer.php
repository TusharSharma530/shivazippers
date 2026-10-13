
    <!-- Back to top start -->
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- Back to top end -->

    <!-- Footer area start -->
    <footer>
      <section class="bd-footer__area green-bg foo p-relative pt-40">
        <div class="bd-footer__bg w-img">
          <!-- <img src="assets/img/bg/footer-bg.png" alt="footer-bg"> -->
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
              <div class="bd-footer__widget footer-col-8 footercontact">
                <div class="bd-footer__title">
                  <h4>Contact Infomation</h4>
                </div>
                <div class="bd-footer__contact">
                  <div class="bd-footer__contact-item"> <span>Corp. Office :</span>
                    <p class="mb-25"><?=$address1;?></p>
                  </div>
                  <div class="bd-footer__contact-item"> <span>Factory :</span>
                    <p class="mb-25"><?=$address2;?></p>
                  </div>
                  <div class="bd-footer__support">
                    <div class="bd-footer__support-inner">
                      <div class="bd-footer__support-title"> <span>Contact Us</span>
                        <a href="mailto:<?=$email;?>" target="_blank"> <?=$email;?></a>
                        <div style="height: 15px;"></div>
                        <a href="tel:+91<?=$contactno?>" target="_blank">+91-<?=$contactno?></a>,
                        <a href="tel:+91<?=$alternateno;?>" target="_blank">+91-<?=$alternateno;?></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="bd-footer__link-2">
                  <div class="bd-footer__social">
                    <a target="_blank" href="<?=$facebook;?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a target="_blank" href="<?=$linkedin;?>"><i class="fa-brands fa-linkedin"></i></a>
                    <a target="_blank" href="<?=$instagram;?>"><i class="fa-brands fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="bd-footer__widget footer-col-1 mb-60">
                <div class="bd-footer__title">
                  <h4>Site Links</h4>
                </div>
                <div class="bd-footer__link-2">
                  <ul>
                    <li><a href="<?=$path;?>">Home</span></a></li>
                    <li><a href="<?=$path;?>/company-information/gtb-philosophy">Company Information</a></li>
                    <li><a href="<?=$path;?>certifications">Certifications </a></li>
                    <li><a href="<?=$path;?>our-aplications">Our Applications</a></li>
                    <li><a href="<?=$path;?>more-about-us/upcoming-events">Upcoming Events</a></li>
                    <li><a href="<?=$path;?>more-about-us/customization-request">Customization Request</span></a></li>
                    <li><a href="<?=$path;?>more-about-us/substantially-vision-2030">Substantially Vision 2030</span></a></li>
                    <li><a href="<?=$path;?>contact-us">Contact Us</a></li>
                  </ul>
                </div>

              </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="bd-footer__widget footer-col-7 mb-40">
                <div class="bd-footer__title">
                  <h4>Applications</h4>
                </div>
                <div class="bd-footer__link-2">
                  <ul>
                    <?php
                      while($footerapplicationrow = mysqli_fetch_array($footerapplicationsql)){
                    ?>
                      <li><a href="<?=$path;?>more-about-us/our-applications/<?=$footerapplicationrow['url'];?>"><?=$footerapplicationrow['title'];?></a></li>
                    <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>


          </div>
        </div>
        <div class="bd-copyright__area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="bd-copyright__main">
                <div class="bd-copyright__border">
                  <div class="bd-copyright__text">
                    <p>© Copyright 2025. All Rights Reserved. Shiva Fastners Pvt. Ltd. Designed &amp; Developed by <a href="javascript:" target="_blank">Promotion Paradise</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </footer>
    <!-- Footer area end -->
     <!-- Footer area end -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- JS here -->
 
<script src="<?=$path;?>assets/js/vendor/jquery.js"></script>
<script src="<?=$path;?>assets/js/vendor/waypoints.js"></script>
<script src="<?=$path;?>assets/js/bootstrap-bundle.js"></script>
<script src="<?=$path;?>assets/js/meanmenu.js"></script>
<script src="<?=$path;?>assets/js/swiper-bundle.js"></script>
<script src="<?=$path;?>assets/js/owl-carousel.js"></script>
<script src="<?=$path;?>assets/js/magnific-popup.js"></script>
<script src="<?=$path;?>assets/js/parallax.js"></script>
<script src="<?=$path;?>assets/js/backtotop.js"></script>
<script src="<?=$path;?>assets/js/nice-select.js"></script>
<script src="<?=$path;?>assets/js/counterup.js"></script>
<script src="<?=$path;?>assets/js/wow.js"></script>
<script src="<?=$path;?>assets/js/isotope-pkgd.js"></script>
<script src="<?=$path;?>assets/js/imagesloaded-pkgd.js"></script>
<script src="<?=$path;?>assets/js/ajax-form.js"></script>
<script src="<?=$path;?>assets/js/main.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script> 

  
  <script>
          jQuery(document).ready(function($) {
  $('#submitForm').on('submit', function(e) {
    e.preventDefault(); // stop normal submit

    grecaptcha.ready(function() {
      grecaptcha.execute('6LdbW-0rAAAAAK86zfTym5iJwQ2P-B_QFXSX5O7G', {action: 'submit'}).then(function(token) {
        
        // Add token to form
        if (!$('input[name="g-recaptcha-response"]').length) {
          $('<input>').attr({
            type: 'hidden',
            name: 'g-recaptcha-response',
            value: token
          }).appendTo('#submitForm');
        } else {
          $('input[name="g-recaptcha-response"]').val(token);
        }

        // AJAX submit
        $.ajax({
          url: '', // same page
          type: 'POST',
          data: $('#submitForm').serialize(),
          beforeSend: function() {
            $('.msgbox').html("<div class='alert alert-warning'>Please Wait...</div>");
          },
          success: function(data) {
            $('#submitForm')[0].reset();
            $('.msgbox').html(data);
          }
        });
      });
    });
  });
});
  </script>
  </body>

  </html>