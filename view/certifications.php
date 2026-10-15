<main class="conatct-us-wrapper">
    <section class="certs">
        <div class="container-fluid">

            <!-- Page header -->
            <div class="factory-tour__head certs__head">
                <span class="home-philosophy__eyebrow">Trust &amp; Compliance</span>
                <h1 class="home-philosophy__title">Certifications</h1>
                <p class="certs__intro">Internationally recognised standards that audit and validate every zipper
                    we manufacture — from raw material to the finished fastening.</p>
            </div>

            <?php
                $i = 1;
                while($certificatrow = mysqli_fetch_array($certificatequery)){
                    $flip = ($i % 2 == 0);
            ?>
            <div class="certs__item">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5 <?php echo $flip ? 'order-lg-2' : ''; ?>">
                        <div class="certs__media">
                            <a href="<?=$path.$certificatrow['file'];?>" data-group="1" class="galleryItem test certs__link">
                                <img src="<?=$path.$certificatrow['file'];?>" alt="<?=$certificatrow['title'];?> certificate" class="certificate-img">
                            </a>
                            <span class="certs__stamp">Certified</span>
                        </div>
                    </div>
                    <div class="col-lg-7 <?php echo $flip ? 'order-lg-1' : ''; ?>">
                        <div class="certs__body">
                            <span class="certs__index">0<?=$i;?></span>
                            <h2 class="certs__title"><?=$certificatrow['title'];?></h2>
                            <div class="certs__desc">
                                <?=$certificatrow['desc'];?>
                            </div>
                            <button type="button" class="certs__more">
                                <span>Read More</span> <i class="far fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <a id="app9"></a>
            </div>
            <?php
                $i++; }
            ?>

            <!-- Yearly tested + Members -->
            <div class="certs__meta">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="certs__metacard">
                            <h3 class="certs__metatitle">Yearly Tested at :</h3>
                            <div class="certs__logoarea">
                                <img src="assets/img/testex-logo.png" alt="Testex logo" class="testex-logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="certs__metacard">
                            <h3 class="certs__metatitle">We Are Also Members of :</h3>
                            <div class="certs__logos">
                                <div class="certs__logobox"><img src="assets/img/member-logos.png" alt="member logo" class="memberlogo"></div>
                                <div class="certs__logobox"><img src="assets/img/member-logos2.png" alt="member logo" class="memberlogo"></div>
                                <div class="certs__logobox"><img src="assets/img/member-logos3.png" alt="member logo" class="memberlogo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
    (function () {
        var items = document.querySelectorAll('.certs__item');
        if (!items.length) return;

        Array.prototype.forEach.call(items, function (item) {
            var img = item.querySelector('.certificate-img');
            var box = item.querySelector('.certs__desc');
            var body = item.querySelector('.certs__body');
            var btn = item.querySelector('.certs__more');
            if (!img || !box || !body) return;

            var clampH = 0;      /* remembered collapsed height */
            var expanded = false;

            /* Content ko image ki height tak clamp karo (sirf desktop / side-by-side) */
            function measure() {
                if (window.innerWidth < 992) return 0;
                var imgH = img.getBoundingClientRect().height;
                if (!imgH) return 0;
                var otherH = body.getBoundingClientRect().height - box.getBoundingClientRect().height;
                return Math.round(imgH - otherH);
            }

            function apply() {
                var avail = measure();
                if (avail > 80) {
                    clampH = avail;
                    if (!expanded) {
                        box.classList.add('is-clamped');
                        box.style.maxHeight = clampH + 'px';
                    }
                    if (btn) btn.style.display = '';
                } else {
                    /* mobile / chhota content: poori detail dikhao, button chhupao */
                    clampH = 0;
                    expanded = false;
                    box.classList.remove('is-clamped');
                    box.style.maxHeight = '';
                    if (btn) {
                        btn.style.display = 'none';
                        btn.classList.remove('is-open');
                        var s = btn.querySelector('span'); if (s) s.textContent = 'Read More';
                    }
                }
            }

            if (btn) {
                btn.addEventListener('click', function () {
                    if (!clampH) return;
                    expanded = !expanded;
                    var s = btn.querySelector('span');
                    if (expanded) {
                        box.classList.remove('is-clamped');
                        box.style.maxHeight = '';
                        btn.classList.add('is-open');
                        if (s) s.textContent = 'Read Less';
                    } else {
                        box.classList.add('is-clamped');
                        box.style.maxHeight = clampH + 'px';
                        btn.classList.remove('is-open');
                        if (s) s.textContent = 'Read More';
                    }
                });
            }

            function schedule() { window.requestAnimationFrame(apply); }
            if (img.complete) { schedule(); } else { img.addEventListener('load', schedule); }
            img.addEventListener('error', schedule);
            window.addEventListener('load', schedule);
            window.addEventListener('resize', schedule);
        });
    })();
    </script>

</main>
