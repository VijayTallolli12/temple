 <!-- partial:partia/__sidenav.html -->
 <aside class="sigma_aside sigma_aside-right sigma_aside-right-panel sigma_aside-bg">
     <div class="sidebar">

         <div class="sidebar-widget widget-logo">
             <img src="" class="mb-30" alt="img">
             <p></p>
         </div>
     </div>
 </aside>
 <div class="sigma_aside-overlay aside-trigger-right"></div>
 <!-- partial -->

 <!-- partial:partia/__mobile-nav.html -->
 <aside class="sigma_aside sigma_aside-left">

     <a class="navbar-brand" href="<?= base_url() ?>"> <img src="<?= site_url(get_settings("logo")); ?>" alt="logo"> </a>

     <!-- Menu -->
     <ul>
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
                 <li class="menu-item"> <a href="<?= site_url("aboutus/activities") ?>">Activities</a> </li>
             </ul>
         </li>

         <li class="menu-item">
             <a href="<?= site_url("parampara") ?>">Parampara</a>
         </li>

         <li class="menu-item menu-item-has-children">
             <a href="#">Gallery</a>
             <ul class="sub-menu">
                 <li class="menu-item"> <a href="<?= site_url("gallery/photos") ?>">Photos</a> </li>
                 <li class="menu-item"> <a href="<?= site_url("gallery/videos") ?>">Videos</a> </li>
             </ul>
         </li>
         <li class="menu-item menu-item-has-children"">
             <a href=" #">Events</a>
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
         <li class="menu-item ">
             <a href="<?= site_url("contactus") ?>">Contact Us</a>
         </li>
         <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
             <li class="menu-item"> <a href="<?= site_url("home/my_account"); ?>"> My Account</a> </li>
             <li class="menu-item"> <a href="<?= site_url("home/logout"); ?>"> Logout</a> </li>
         <?php } else { ?>
             <li class="menu-item"> <a href="<?= site_url("home/login"); ?>"> Login</a> </li>
             <li class="menu-item"> <a href="<?= site_url("home/sign_up"); ?>"> Sign up</a> </li>
         <?php } ?>
     </ul>

 </aside>
 <div class="sigma_aside-overlay aside-trigger-left"></div>
 <!-- partial -->