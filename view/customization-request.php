<main class="conatct-us-wrapper">

    <section class="cpage cpage--form">
        <div class="container-fluid">
            <div class="factory-tour__head cpage__head">
                <span class="home-philosophy__eyebrow">Get Started</span>
                <h1 class="home-philosophy__title">Customization Request</h1>
                <p class="cpage__intro">Share your requirements and our team will craft a zipper or slider solution
                    tailored to your exact specifications.</p>
            </div>

            <div class="row g-4 align-items-start">
                <!-- Info panel (left) -->
                <div class="col-lg-4">
                    <aside class="forminfo">
                        <h3 class="forminfo__title">What We Need</h3>
                        <ul class="forminfo__list">
                            <li><span>01</span> Weight &amp; Length</li>
                            <li><span>02</span> Colour &amp; Contrast</li>
                            <li><span>03</span> Quantity &amp; Application</li>
                            <li><span>04</span> Any reference or sample</li>
                        </ul>
                        <div class="forminfo__note">
                            <i class="fa fa-lightbulb"></i>
                            <p>The more detail you share, the faster we can quote a precise, tailor-made solution.</p>
                        </div>
                        <a href="<?=$path;?>contact-us" class="forminfo__cta">Talk to an expert <i class="far fa-long-arrow-right"></i></a>
                    </aside>
                </div>

                <!-- Form (right) -->
                <div class="col-lg-8">
                    <div class="formcard">
                        <h4 class="formcard__title">Leave Us A Message for Customise Product Request.</h4>
                        <!-- form start -->
                        <form class="row" method="POST" name="customizeenquirysubmit" id="submitForm">
                            <div class="col-lg-6">
                                <div class="form-group has-error">
                                    <input type="text" name="companyname" placeholder="Company Name*" id="companyname" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="personname" id="personname" required="" placeholder="Contact Person Name*">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email ID" id="email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="Phone Number" id="phone_number" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5 class="formcard__section"><strong>Customization</strong></h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="weight" placeholder="Weight" id="weight" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="length" placeholder="Length" id="length" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="color" placeholder="Color" id="color" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="contrast" placeholder="Contrast" id="contrast" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea placeholder="Write your message, if any" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="customizeenquirysubmit" class="btn v1 d-block w-100" style="pointer-events: all; cursor: pointer;">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <div class="msgbox"></div>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
