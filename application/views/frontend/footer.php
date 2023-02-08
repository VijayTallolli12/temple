<!-- partial:partia/__footer.html -->
<footer class="sigma_footer footer-2" id="footer_seva">

    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget">
                    <h5 class="widget-title">About Us</h5>
                    <p class="mb-4"><?= DESCRIPTION ?></p>
                    <div class="d-flex align-items-center justify-content-md-start">
                        <i class="far fa-phone custom-primary me-3"></i>
                        <span>
                            <p><?= get_settings("phone") ?></p>
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-md-start mt-2">
                        <i class="far fa-envelope custom-primary me-3"></i>
                        <span>
                            <p><?= get_settings("system_email") ?></p>
                        </span>
                    </div>
                    <div class="d-flex align-items-center justify-content-md-start mt-2">
                        <i class="far fa-map-marker custom-primary me-3"></i>
                        <span><?= get_settings("address") ?></span>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 footer-widget footer-widget_cat">
                    <h5 class="widget-title">Information</h5>
                    <ul>
                        <li> <a href="<?= site_url("aboutus/shiroor-history") ?>">History</a> </li>
                        <li> <a href="<?= site_url("aboutus/activities") ?>">Activities</a> </li>
                        <li> <a href="<?= site_url("aboutus/our-branches") ?>">Our Branches</a> </li>
                        <li> <a href="<?= site_url("parampara") ?>">Parampara</a> </li>
                        <li> <a href="<?= site_url("gallery/photos") ?>">Photos</a> </li>
                        <li> <a href="<?= site_url("contactus") ?>">Contact Us</a> </li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 footer-widget footer-widget_cat">
                    <h5 class="widget-title">Others</h5>
                    <ul>
                        <li> <a href="<?= site_url("seva/e-seva") ?>">E-Seva</a> </li>
                        <li> <a href="<?= site_url("seva/kanike") ?>">Kanike</a> </li>
                        <li> <a href="<?= site_url("seva/rooms") ?>">Rooms</a> </li>
                        <li> <a href="<?= site_url("events") ?>">Events</a> </li>
                        <li> <a href="<?= site_url("terms_and_condition") ?>">Terms & Condition</a> </li>
                        <li> <a href="<?= site_url("privacy_policy") ?>">Privacy Policy</a> </li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 d-lg-block footer-widget widget-recent-posts">
                    <h5 class="widget-title">Social Media</h5>
                    <ul class="sigma_sm square social_media" style="justify-content: left;">
                        <li>
                            <a href="<?= get_settings('facebook'); ?>">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_settings('twitter'); ?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_settings('instagram'); ?>">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_settings('linkdin'); ?>">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= get_settings('youtube'); ?>">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
        <div class="container-fluid">
            <div class="sigma_footer-copyright">
                <p style="font-size: 10px;"> Copyright © Shiroor Matha - <a href="#" class="custom-primary"><?= date("Y") ?></a> </p>
            </div>
            <!-- <div class="sigma_footer-logo">
                 <img src="<?= site_url(get_settings("logo")) ?>" alt="logo" class="img-fluid">
             </div> -->
            <div class="sigma_footer-copyright">
                <p style="font-size: 10px;"> Powered by - <a href="https://ampwork.com" class="custom-primary">AMPWORK PVT. LTD</a> </p>
            </div>
        </div>
    </div>

</footer>
<!-- partial -->