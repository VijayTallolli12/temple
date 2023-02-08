<!-- partial:partia/__header.html -->
<header id="myHeader" class="sigma_header header-3 can-sticky header-absolute">

    <!-- Middle Header Start -->
    <div class="sigma_header-middle">
        <nav class="navbar">

            <!-- Logo Start -->
            <div class="sigma_logo-wrapper">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= site_url(get_settings("logo")); ?>" alt="logo">
                </a>
            </div>
            <!-- Logo End -->

            <!-- Menu -->
            <div class="sigma_header-inner">
                <div class="sigma_header-top">
                    <div class="sigma_header-top-inner">
                        <ul class="sigma_header-top-links">
                            <li class="menu-item"> <a href="tel:<?= get_settings("phone") ?>"> <i class="fal fa-phone"></i> <?= get_settings("phone") ?></a> </li>
                            <li class="menu-item"> <a href="<?= get_settings("system_email") ?>"> <i class="fal fa-envelope"></i> <?= get_settings("system_email") ?></a> </li>
                        </ul>

                        <ul class="sigma_header-top-links">
                            <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                                <li class="menu-item"> <a href="<?= site_url("home/my_account"); ?>"> <i class="fas fa-user-cog"></i> My Account</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("home/logout"); ?>"> <i class="far fa-sign-out-alt"></i>Logout</a> </li>
                            <?php } else { ?>
                                <li class="menu-item"> <a href="<?= site_url("home/login"); ?>"> <i class="far fa-sign-in-alt"></i>Login</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("home/sign_up"); ?>"> <i class="far fa-user-alt"></i>Sign up</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-center justify-content-lg-between">

                    <ul class="navbar-nav">
                        <li class="menu-item">
                            <a href="<?= base_url() ?>">Home</a>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="<?= site_url("aboutus/about_us") ?>">About Us</a>
                            <ul class="sub-menu">
                                <li class="menu-item"> <a href="<?= site_url("aboutus/shiroor-history") ?>">Shiroor History</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("aboutus/daily-worshiped-deities") ?>">Daily Worshiped Deities</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("aboutus/our-branches") ?>">Our Branches</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("aboutus/educational-institutes") ?>">Educational Institutes</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("aboutus/activities") ?>">Activities By Us</a> </li>
                            </ul>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="<?= site_url("parampara") ?>">Parampara</a>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="#">Gallery</a>
                            <ul class="sub-menu">
                                <li class="menu-item"> <a href="<?= site_url("gallery/photos") ?>">Photos</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("gallery/videos") ?>">Videos</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#"> Events</a>
                            <ul class="sub-menu">
                                <li class="menu-item"> <a href="<?= site_url("events") ?>">Events</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("events/upcoming_event") ?>">Upcoming Events</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="#">Seva</a>
                            <ul class="sub-menu">
                                <li class="menu-item"> <a href="<?= site_url("seva/e-seva") ?>">E-seva</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("seva/kanike") ?>">Kanike</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("seva/daily-seva") ?>">Daily Seva</a> </li>
                                <li class="menu-item"> <a href="<?= site_url("seva/rooms") ?>">Rooms</a> </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= site_url("contactus") ?>">Contact Us</a>
                        </li>
                    </ul>

                    <div class="sigma_header-controls style-2 p-0 border-0">
                        <ul class="sigma_header-controls-inner pe-0">
                            <li class="sigma_header-cart style-2">
                                <a href="<?= site_url("seva/e-seva_list") ?>"> <i class="fal fa-shopping-bag"></i> </a>
                                <?php if ($this->cart->total_items() > 0) { ?>
                                    <span class="number" id="total_cart-number"><?= $this->cart->total_items(); ?></span>
                                    <ul class="cart-dropdown" id="seva_cart">
                                        <?php foreach ($this->cart->contents() as  $items) {
                                            $name1 = str_replace('-', '(', $items['name']);
                                            $final_name = str_replace('_', ')', $name1);
                                        ?>
                                            <li><a href="#" class="sigma_cart-product-wrapper">
                                                    <div class="sigma_cart-product-body">
                                                        <h6><?= $final_name; ?></h6>
                                                        <div class="sigma_product-price justify-content-start"><span>Amount: <i class="far fa-rupee-sign" style="font-size: 13px;"></i><?= $items['price'] ?></span></div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <span class="number" id="total_cart-number">0</span>
                                    <ul class="cart-dropdown" id="seva_cart">

                                    </ul>
                                <?php } ?>

                            </li>
                            <li class="sigma_header-wishlist style-2">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="sigma_header-controls style-2">

                <a href="<?= site_url("seva/e-seva") ?>" class="sigma_btn-custom">Book a E-Seva</a>

                <ul class="sigma_header-controls-inner">
                    <!-- Mobile Toggler -->
                    <li class="aside-toggler style-2 aside-trigger-left">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </li>
                </ul>

            </div>

        </nav>
    </div>
    <!-- Middle Header End -->

</header>
<!-- partial -->

<!-- Preloader Start -->
<div class="sigma_preloader">
    <img src="<?= site_url(get_settings("favicon")); ?>" alt="preloader">
</div>
<!-- Preloader End -->