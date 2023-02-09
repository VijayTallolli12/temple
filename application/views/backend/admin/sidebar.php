<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= site_url('admin/dashboard'); ?>"><img
                            src="<?php echo base_url('/') . get_settings('logo'); ?>" alt="Shiroor Matha"> </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php if ($page_name == 'dashboard') {
                    echo "active";
                } ?>">
                    <a href="<?= site_url('admin/dashboard'); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                $Bname = array("blogs", "blogs_a", "blogs_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $Bname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/blogs"); ?>" class='sidebar-link'>
                        <i class="fas fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <?php
                $UEname = array("upcoming_events", "upcoming_events_a", "upcoming_events_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $UEname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/upcoming_events"); ?>" class='sidebar-link'>
                        <i class="far fa-calendar-plus"></i>
                        <span>Upcoming Events</span>
                    </a>
                </li>
                <?php
                $Sname = array("e_seva", "e_seva_a", "e_seva_e", "kanike", "kanike_a", "kanike_e", "daily_seva", "daily_seva_a", "daily_seva_e");
                ?>
                <li class="sidebar-item has-sub <?php if (in_array($page_name, $Sname)) {
                    echo "active";
                } ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-praying-hands"></i>
                        <span>Seva</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/e_seva'); ?>">E-Seva</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/kanike'); ?>">Kanike</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/daily_seva'); ?>">Daily Seva</a>
                        </li>
                    </ul>
                </li>

                
                <li class="sidebar-item <?php if ($page_name == 'orders') {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/orders"); ?>" class='sidebar-link'>
                        <i class="bi bi-diagram-3-fill"></i>
                        <span>Booked Sevas / Donation</span>
                    </a>
                </li>
                <?php
                $PDname = array("seva_payment", "kanike_payment");
                ?>
                <li class="sidebar-item  has-sub <?php if (in_array($page_name, $PDname)) {
                    echo "active";
                } ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-receipt"></i>
                        <span>Payments Details</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/e_seva_payment'); ?>">E-Seva Payment</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/kanike_payment'); ?>">Kanike Payment</a>
                        </li>
                    </ul>
                </li>

                <?php
                $PDname = array("report_gen_excel");
                ?>
                <li class="sidebar-item  <?php if (in_array($page_name, $PDname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/report_gen_excel"); ?>" class='sidebar-link'>
                        <i class="far fa-file-excel"></i>
                        <span>Report Genration</span>
                    </a>
                </li>


                <?php
                $PAname = array("parampara", "parampara_a", "parampara_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $PAname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/parampara"); ?>" class='sidebar-link'>
                        <i class="fas fa-users"></i>
                        <span>Parampara</span>
                    </a>
                </li>
                <?php
                $AUname = array("dw_deities", "dw_deities_a", "dw_deities_e", "branches", "branches_a", "branches_e", "institutes", "institutes_a", "institutes_e", "activities", "activities_a", "activities_e", "history", "history_a", "history_e");
                ?>
                <li class="sidebar-item has-sub <?php if (in_array($page_name, $AUname)) {
                    echo "active";
                } ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-info-circle"></i>
                        <span>About Us</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/dw_deities'); ?>">Daily Worshiped Deities</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/branches'); ?>">Branches</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/institutes'); ?>">Educational Institutes</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/activities'); ?>">Activities</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/history'); ?>">History</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?php if ($page_name == 'subscribers') {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/subscribers"); ?>" class='sidebar-link'>
                        <i class="bi bi-diagram-3-fill"></i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <?php
                $Rname = array("rooms", "rooms_a", "rooms_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $Rname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/rooms"); ?>" class='sidebar-link'>
                        <i class='fas fa-archway'></i>
                        <span>Rooms</span>
                    </a>
                </li>
                <?php
                $Gname = array("gallery");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $Gname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/gallery"); ?>" class='sidebar-link'>
                        <i class="bi bi-file-earmark-image"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                <?php
                $VYTname = array("videos", "videos_a", "videos_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $VYTname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/videos"); ?>" class='sidebar-link'>
                        <i class="fab fa-youtube"></i>
                        <span>Videos(YouTube)</span>
                    </a>
                </li>
                <?php
                $VYTname = array("testimonials", "testimonials_a", "testimonials_e");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $VYTname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/testimonials"); ?>" class='sidebar-link'>
                        <i class="fas fa-quote-right"></i>
                        <span>Testmonial</span>
                    </a>
                </li>
                <?php
                $REname = array("rooms_enq");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $REname)) {
                    echo "active";
                }
                if (isset($page_id)) {
                    if ($page_id == "room_enquiry" && $page_name == "reply_msg") {
                        echo "active";
                    }
                } ?>">
                    <a href="<?= site_url("admin/rooms_enq"); ?>" class='sidebar-link'>
                        <i class="fas fa-envelope-square"></i>
                        <span>Rooms Enquiry</span>
                    </a>
                </li>
                <?php
                $EQname = array("enquiry");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $EQname)) {
                    echo "active";
                }
                if (isset($page_id)) {
                    if ($page_id == "enquiry" && $page_name == "reply_msg") {
                        echo "active";
                    }
                } ?>">
                    <a href="<?= site_url("admin/enquiry"); ?>" class='sidebar-link'>
                        <i class="fas fa-envelope-square"></i>
                        <span>Enquiry</span>
                    </a>
                </li>
                <?php
                $Sename = array("razorpay", "front_end_images", "mail_settings", "system_settings", "website_settings", "view_social_media");
                ?>
                <li class="sidebar-item has-sub <?php if (in_array($page_name, $Sename)) {
                    echo "active";
                } ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_razorpay'); ?>">Razorpay</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_fe_images'); ?>">Front End Images</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/banner_m'); ?>">Banner Managment</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/popup_m'); ?>">Popup Managment</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_mail'); ?>">Mail Settings</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_system'); ?>">System Settings</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_website'); ?>">Website Settings</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= site_url('admin/settings/view_social_media'); ?>">Social Media Link</a>
                        </li>
                    </ul>
                </li>
                <?php
                $CPname = array("reset_password");
                ?>
                <li class="sidebar-item <?php if (in_array($page_name, $CPname)) {
                    echo "active";
                } ?>">
                    <a href="<?= site_url("admin/change_password"); ?>" class='sidebar-link'>
                        <i class="fab fa-keycdn"></i>
                        <span>Change Password</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="<?= site_url("admin/logout"); ?>" class='sidebar-link'>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>