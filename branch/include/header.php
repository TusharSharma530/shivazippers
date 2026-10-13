<!-- <a href="https://api.whatsapp.com/send?phone=910000000000" id="whatsapp"
class="fab fa-whatsapp text-theme-colored font-36 mt-5 sm-display-block"
style="padding-top: 7px; color:#ffffff!important;" rel="nofollow" target="_blank"></a> -->

<!-- Offcanvas area start -->
<div class="fix">
<div class="offcanvas__info">
<div class="offcanvas__wrapper">
<div class="offcanvas__content">
<div class="offcanvas__top mb-20 d-flex justify-content-between align-items-center">
<div class="offcanvas__logo logo"> <a href="<?=$path;?>"> <img src="<?=$path.$logo;?>"> </a> </div>
<div class="offcanvas__close">
  <button> <i class="fal fa-times"></i> </button>
</div>
</div>
<div class="mobile-menu fix mb-40"></div>
</div>
</div>
</div>
</div>

<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>
<header>
<div id="header-sticky" class="bd-header__area-2 herder-transparent">
<div class="header-topbar">
<div class="container-fluid">
<div class="header-topbar-inner">
<div class="header-topbar-leftpart">
  <ul class="topbar-info">
    <li> <i class="fa-regular fa-envelope"></i> Customer Care: <a href="mailto:<?=$emailid;?>" target="_blank"><?=$emailid;?></a> </li>
      <li> <i class="fa-regular fa-mobile"></i> Phone: <a href="tel:+91<?=$contactno;?>" target="_blank">+91-<?=$contactno;?></a>, &nbsp;<a href="tel:+91<?=$alternateno;?>" target="_blank">+91-<?=$alternateno;?></a> </li>
    </ul>
  </div>
  <div class="header-topbar-rightpart">
    <a href="<?=$path;?>assets/slidercatalogue.pdf" target="_blank" class='blinksection'><i class="fa-regular fa-file-pdf"></i> Sliders Brochure</a>
    <a href="<?=$path;?>GTB-catalog2023-2024.pdf" target="_blank"><i class="fa-regular fa-file-pdf"></i> Zippers Brochure</a>
    <ul class="topbar-social">
      <li> <a href="<?=$facebook;?>" target="_blank"><i class="fab fa-facebook"></i></a> </li>
      <li> <a href="<?=$linkedin;?>"><i class="fab fa-linkedin"></i></a> </li>
      <li> <a href="<?=$instagram;?>" target="_blank"><i class="fab fa-instagram"></i></a> </li>
    </ul>
    </div>
  </div>
</div>
</div>


<div class="container-fluid">
<div class="row">
  <div class="col-lg-3 col-md-3 col-4 p-md-0">
    <div class="bd-header__logo"> <a href="<?=$path;?>"> <img src="<?=$path.$logo;?>"> </a> </div>
  </div>
  <div class="col-lg-9 col-md-9 d-md-block p-sm-0">
    <div class="bd-header__menu-wrapper d-flex justify-content-lg-end align-items-lg-end">

      <div class="main-menu d-none d-lg-block">
        <nav id="mobile-menu">
          <ul>
    <li><a href="<?=$path;?>" class="<?=empty($gettype) ? 'active_1' : '';?>"><i class="fa-regular fa-home"></i></a></li>
<?php
  $menu = mysqli_query($con, "SELECT * FROM category WHERE status=1 AND type=1 ORDER BY `order`");
  while ($cat = mysqli_fetch_assoc($menu)) {
      // sub category
      $sub = mysqli_query($con, "SELECT * FROM category WHERE type={$cat['id']} ORDER BY `order`");
      $hasSub = mysqli_num_rows($sub);
      $url = $hasSub ? "javascript:void(0);" : $path.$cat['url'];
      $icon = !empty($hasSub) ? "<i class='fa fa-chevron-down'></i>" : "";
      echo "<li class='has-dropdown'><a href='$url'>{$cat['title']}".$icon."</a>";
      // child category
      
      if ($hasSub) {
          echo "<ul class='submenu'>";
          while ($s = mysqli_fetch_assoc($sub)) {
            $child = mysqli_query($con, "SELECT * FROM childcategory WHERE `cat_id` = '{$cat['id']}' AND `subcat_id` = '{$s['id']}' ORDER BY `order`");
              $hasChild = mysqli_num_rows($child);
              echo "<li class='has-dropdown'><a href='{$path}{$cat['url']}/{$s['url']}' class=''>{$s['title']}</a>";
                  if($hasChild){
                    if($cat['url']== 'more-about-us'){
                      $rightalign ='rightalign';
                    }else {
                      $rightalign = '';
                    }
                    echo "<ul class='submenu $rightalign'>";
                      while($c=mysqli_fetch_assoc($child)){
                        if($c['url'] == 'view-catalogue'){
                            $childurl = $path."assets/slidercatalogue.pdf";
                            echo "<li><a target='_blank' href='{$childurl}'>{$c['title']}</a></li>";
                        }else{
                            $childurl = $path.$cat['url'].'/'.$s['url'].'/'.$c['url'];
                            echo "<li><a href='{$childurl}'>{$c['title']}</a></li>";
                        }
                      }
                    echo "</ul>";
                  }
              echo "</li>";
          }
          echo "</ul>";
      }
      echo "</li>";
  }
?>
 </ul>
        </nav>
      </div>
    </div>
    <div class="bd-header__right right-2 d-flex align-items-center justify-content-end">
      <div class="bd-header__hamburger">
        <div class="bd-header__hamburger-icon">
          <button class="side-toggle"> <img src="assets/img/icon/hamburger-icon.png"> </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</header>










