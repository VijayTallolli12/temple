<!-- Banner Start -->
<div class="sigma_banner banner-3">
    <div class="sigma_banner-slider">
        <?php
        if (sizeof($banners) > 0) {
            foreach ($banners as $key => $value) {
        ?>
                <!-- Banner Item Start -->
                <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat" style="background-image: url('<?= site_url($value['image']); ?>');">
                    <div class="sigma_banner-text">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h1 class="title" style="color: white;"><?= $value['title'] ?></h1>
                                    <?php
                                    if ($value['link'] != "") {
                                    ?>
                                        <div class="section-button d-flex align-items-center">
                                            <a href="<?= $value['link'] ?>" target="_blank" class="ms-3 sigma_btn-custom white">Read More <i class="far fa-arrow-right"></i> </a>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner Item End -->

        <?php
            }
        }
        ?>
    </div>
</div>
<!-- Banner End -->

<!-- About Start -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-lg-30">
                <div class="img-group">
                    <div class="img-group-inner crop">
                        <img src="<?= site_url("assets/frontend/img/1.jpg"); ?>" loading="lazy" alt="about">
                    </div>
                    <img class="crop_img" src="<?= site_url("assets/frontend/img/2.jpg"); ?>" loading="lazy" alt="about">
                    <img class="crop_img" src="<?= site_url("assets/frontend/img/3.jpg"); ?>" loading="lazy" alt="about">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="me-lg-30">
                    <div class="section-title mb-0 text-start">
                        <p class="subtitle">Shiroor Matha</p>
                        <h4 class="title">We are a Hindu that believe in Lord Shri Krishna</h4>
                    </div>
                    <p class="blockquote bg-transparent">Shiroor Matha is a Hindu monastery and one of the Ashta Mathas of Udupi. It which was founded by Sri Vamana Tirtha at Shiroor village on the banks of Suvarna River in Udupi, Karnataka who was a direct disciple of Sri Madhvacharya, the founder of the Dvaita school of Hindu philosophy </p>
                    <a href="<?= site_url("aboutus/shiroor-history") ?>" class="sigma_btn-custom light">Know More <i class="far fa-arrow-right"></i> </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- About End -->

<!-- About us Start -->
<div class="section section-padding pattern-squares dark-bg-2">
    <div class="container">

        <div class="section-title text-start">
            <p class="subtitle">About Us</p>
            <h4 class="title text-white">Know About Us</h4>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6">
                <a href="<?= site_url("aboutus/shiroor-history") ?>" class="sigma_service style-1 primary-bg">
                    <div class="sigma_service-thumb">
                        <i class="text-white flaticon-temple"></i>
                    </div>
                    <div class="sigma_service-body">
                        <h5 class="text-white">Shiroor History</h5>
                        <p class="text-white">Click here to Learn More About History of Shiroor Matha</p>
                    </div>
                    <span class="btn-link text-white">Read More <i class="text-white far fa-arrow-right"></i> </span>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mt-negative-sm">
                <a href="<?= site_url("aboutus/activities") ?>" class="sigma_service style-1 secondary-bg">
                    <div class="sigma_service-thumb">
                        <i class="custom-primary flaticon-hindu-2"></i>

                    </div>
                    <div class="sigma_service-body">
                        <h5 class="text-white">Activities</h5>
                        <p class="text-white">Click here to know more about Our Contribution to Society</p>
                    </div>
                    <span class="text-white btn-link">Read More <i class="text-white far fa-arrow-right"></i> </span>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 mt-negative-sm">
                <a href="<?= site_url("aboutus/daily-worshiped-deities") ?>" class="sigma_service style-1 bg-white">
                    <div class="sigma_service-thumb">
                        <i class="flaticon-pooja"></i>
                    </div>
                    <div class="sigma_service-body">
                        <h5>Daily Worship Dieties</h5>
                        <p>Click here to know more about Dieties Which are worshiped By Us</p>
                    </div>
                    <span class="btn-link">Read More <i class="far fa-arrow-right"></i> </span>
                </a>
            </div>

        </div>

        <div class="text-end">
            <a href="<?= site_url("aboutus/about_us") ?>" class="btn-link text-white"> Know More <i class="custom-primary far fa-arrow-right"></i> </a>
        </div>

    </div>
</div>
<!-- About us End -->

<!-- Upcoming Events -->
<div class="section section-padding">
    <div class="container">
        <div class="section-title text-center">
            <p class="subtitle">Shiroor Math Upcoming Events</p>
            <h4 class="title">Upcoming Events</h4>
        </div>
        <div class="row">

            <?php
            $this->db->order_by("id", "desc");
            $upcoming_events = $this->db->get_where('upcoming_events', array('status' => 1), 3)->result_array();
            foreach ($upcoming_events as $key => $value) {
                $sampleDate = $value['date'];
                $convertDate = date("d-m-Y", strtotime($sampleDate));

                $event_date = date("y-m-d", strtotime($sampleDate));
                $present_date = date('d-m-Y');
                $present_date = date("y-m-d", strtotime($present_date));

                if ($present_date < $event_date) {
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="sigma_service style-2">
                            <div class="sigma_service-thumb">
                                <img class="img-fluid history" src="<?= site_url($value['image']); ?>" loading="lazy" alt="img">
                            </div>
                            <div class="sigma_service-body">
                                <div class="row ">
                                    <div class="col-md-6 col-6 text-start">
                                        <a href="javascript:void(0)" style="color: black;"> <i class="fas fa-map-marker-alt sign_custom" style="color: black;"></i> <?= $value['place']; ?></a>
                                    </div>
                                    <div class=" col-md-6 col-6 text-end">
                                        <a href="javascript:void(0)" class="sigma_post-date" style="color: black;"><i class="far fa-calendar sign_custom" style="color: black;"></i> <?= $convertDate; ?></a>
                                    </div>
                                </div>
                                <div class="sigma_service-progress card_adj">
                                    <h5 class="text">
                                        <?= $value['title']; ?>
                                    </h5>
                                    <div class="text"><?= $value['description']; ?></div>
                                </div>
                                <a href="<?= site_url('upcoming_events/' . $value['id'] . '/' . $value['seo_title']); ?>" class="sigma_btn-custom">
                                    Read More
                                </a>

                            </div>
                        </div>
                    </div>
            <?php }
            } ?>

        </div>

    </div>
</div>
<!-- Upcoming Events End -->

<!-- Parampara Start -->
<section class="section section-padding light-bg">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 mb-lg-30">
                <div class="section-title mb-0 text-start">
                    <p class="subtitle">Shiroor Matha</p>
                    <h4 class="title">Parampara Of Shiroor Matha</h4>
                </div>
                <p class="blockquote bg-transparent"> <?= DESCRIPTION ?> </p>
                <div class="basic-dot-slider light-dots">
                    <div class="slide-item">
                        <p class="mb-0">Sri Vamana Theertha (1249-1327) was the first pontiff of Shiroor mutt who was given Ashrama by Sri Madhwacharya himself from then onwards The Mutt was Headed by 30 Swamiji's. The Present Head of Shiroor Mutt is Sri Vedavardhana Teertha. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="me-lg-30">
                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="sigma_volunteers volunteers-5">
                                <div class="sigma_volunteers-thumb">
                                    <img class="img-fluid" loading="lazy" src="<?= site_url("assets/frontend/img/head_of_mutt/30.jpg"); ?>" alt="Sri Lakshmivara Teertha(1971-2018)">
                                </div>
                                <div class="sigma_volunteers-body">
                                    <div class="sigma_volunteers-info">
                                        <p>30th Head of Mutt</p>
                                        <h5>
                                            <a>Sri Lakshmivara Teertha(1971-2018)</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="sigma_volunteers volunteers-5" style="padding-top: 5.5rem !important;">
                                <div class="sigma_volunteers-thumb">
                                    <img class="img-fluid" loading="lazy" src="<?= site_url("assets/frontend/img/head_of_mutt/31.jpg"); ?>" alt="Sri Vedavardhana Teertha">
                                </div>
                                <div class="sigma_volunteers-body">
                                    <div class="sigma_volunteers-info">
                                        <p>Present Head Of Mutt</p>
                                        <h5>
                                            <a>Sri Vedavardhana Teertha</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="<?= site_url("parampara") ?>" class="btn-link"> Know More <i class="custom-primary far fa-arrow-right"></i> </a>
            </div>
        </div>

    </div>
</section>
<!-- Parampara End -->

<!-- Seva Start -->
<div class="section section-padding">
    <div class="container">

        <div class="section-title text-start">
            <p class="subtitle">Shiroor Matha</p>
            <h4 class="title">Seva</h4>
        </div>

        <div class="text-center filter-items left">
            <h5 class="active portfolio-trigger" data-filter="*">All</h5>
            <h5 class="portfolio-trigger" data-filter=".e_seva">E-Seva</h5>
            <h5 class="portfolio-trigger" data-filter=".kanike">Kanike</h5>
            <h5 class="portfolio-trigger" data-filter=".daily_seva">Daily Seva</h5>
        </div>

        <div class="portfolio-filter row">
            <?php $e_seva = $this->db->get_where('seva_list', array('status' => 1))->result_array();
            foreach ($e_seva as $key => $value) {
            ?>
                <div class="col-lg-4 e_seva">
                    <div class="sigma_portfolio-item style-2">
                        <div class="sigma_portfolio-item-content">
                            <div class="sigma_portfolio-item-content-inner">
                                <h5> <a href="<?= site_url('seva/e-seva'); ?>"><?= $value['name']; ?></a> </h5>
                            </div>
                            <a href="<?= site_url('seva/e-seva'); ?>"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php $kanike = $this->db->get_where('kanike', array('status' => 1))->result_array();
            foreach ($kanike as $key => $value) {
            ?>
                <div class="col-lg-4 kanike">
                    <div class="sigma_portfolio-item style-2">
                        <div class="sigma_portfolio-item-content div_hover">
                            <div class="sigma_portfolio-item-content-inner">
                                <h5> <a href="<?= site_url('seva/kanike'); ?>"><?= $value['name']; ?></a> </h5>
                            </div>
                            <a href="<?= site_url('seva/kanike'); ?>"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php $daily_seva = $this->db->get_where('daily_seva', array('status' => 1))->result_array();
            foreach ($daily_seva as $key => $value) {
            ?>
                <div class="col-lg-4 daily_seva">
                    <div class="sigma_portfolio-item style-2">
                        <div class="sigma_portfolio-item-content">
                            <div class="sigma_portfolio-item-content-inner">
                                <h5> <a href="<?= site_url('seva/daily_seva'); ?>"><?= $value['title']; ?></a> </h5>
                            </div>
                            <a href="<?= site_url('seva/daily_seva'); ?>"><i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>
</div>
<!-- Seva End -->

<!-- Testimonials Start -->
<section class="section pt-0">

    <div class="container testimonial-section bg-contain bg-norepeat bg-center" style="background-image: url(assets/frontend/img/textures/map-2.png)">

        <div class="section-title text-center">
            <p class="subtitle">Testimonials</p>
            <h4 class="title">What Our Devotees Say</h4>
        </div>

        <div class="sigma_testimonial style-2">
            <div class="sigma_testimonial-slider">

                <?php $testimonial = $this->db->get_where('testimonial', array('status' => 1))->result_array();
                foreach ($testimonial as $key => $value) { ?>

                    <div class="sigma_testimonial-inner" style="height: 220px;">
                        <div class="sigma_testimonial-thumb">
                            <img src="<?= $value['image']; ?>" alt="testimonial">
                        </div>
                        <div>
                            <div class="sigma_testimonial-body card_adj_testimoials">
                                <?= $value['short_message']; ?>
                            </div>
                            <div class="sigma_testimonial-footer">
                                <div class="sigma_testimonial-author">
                                    <cite><?= $value['name']; ?></cite>
                                    <span><?= $value['occupation']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <div class="text-center mt-4">
            <div class="sigma_arrows style-2">
                <i class="far fa-chevron-left slick-arrow slider-prev"></i>
                <i class="far fa-chevron-right slick-arrow slider-next"></i>
            </div>
        </div>

    </div>
</section>
<!-- Testimonials End -->

<!-- Contact us Start -->
<div class="section pt-0">
    <div class="container">
        <div class="section-title text-center">
            <p class="subtitle">WAYS WE CAN HELP</p>
            <h4 class="title">Help Line</h4>
        </div>

        <div class="row align-items-center position-relative">
            <div class="col-md-6">
                <div class="sigma_cta primary-bg">
                    <img class="d-none d-lg-block" src="<?= site_url("assets/frontend/img/cta/1.png"); ?>" alt="cta">
                    <div class="sigma_cta-content">
                        <span class="fw-600 custom-primary">Need Help, Call Our HOTLINE!</span>
                        <h4 class="text-white"><?= get_settings("phone") ?></h4>
                    </div>
                </div>
            </div>
            <span class="sigma_cta-sperator d-none d-lg-flex">or</span>
            <div class="col-md-6">
                <div class="sigma_cta primary-bg">
                    <div class="sigma_cta-content">
                        <form action="<?= site_url('admin/subscribers/insret') ?>" enctype="multipart/form-data" method="post" id="subscribe">
                            <label class="mb-0 text-white">Temple Newsletter</label>
                            <div class="sigma_search-adv-input">
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>

                                    <div class="col-md-5">
                                        <input type="email" class="form-control" placeholder="email address" name="email" required>
                                    </div>

                                    <div class="col-md-2">
                                        <button type="submit" name="button"><i class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <img class="d-none d-lg-block" src="<?= site_url("assets/frontend/img/cta/2.png"); ?>" alt="cta">
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Contact us End -->

<!-- Gallery Start -->
<div class="section dark-overlay dark-overlay-3 bg-cover bg-center bg-norepeat" style="background-image: url(assets/frontend/img/bg1.jpg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="section-title text-start">
                    <p class="subtitle" style="color:ivory">Shiroor Matha</p>
                    <h4 class="title" style="color:ivory">Gallery</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $this->db->order_by("id", "desc");
                    $gallery = $this->db->get('gallery_images', 6)->result_array();
                    foreach ($gallery as $key => $value) { ?>
                        <div class="col-lg-4 col-6">
                            <div class="sigma_client">
                                <img class="img-fluid home_gallery_img" src="<?= site_url($value['photo']); ?>" loading="lazy" alt="client">
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery End -->

<!-- Blog Start -->
<div class="section section-padding">
    <div class="container">

        <div class="section-title text-center">
            <p class="subtitle">Blog</p>
            <h4 class="title">News Feed</h4>
        </div>

        <div class="row">

            <?php
            $this->db->order_by("id", "desc");
            $blogs = $this->db->get_where('blogs', array('status' => 1), 3)->result_array();
            foreach ($blogs as $key => $value) {
                $sampleDate = $value['date'];
                $convertDate = date("M d,Y", strtotime($sampleDate));

            ?>
                <!-- Article Start -->
                <div class="col-lg-4 col-md-6">
                    <article class="sigma_post">
                        <div class="sigma_post-thumb events_image">
                            <a href="<?= site_url('events/' . $value['id'] . '/' . $value['seo_title']) ?>">
                                <img src="<?= site_url($value['featured_image']); ?>" loading="lazy" alt="post">
                            </a>
                        </div>
                        <div class="sigma_post-body card_adj">
                            <div class="row sigma_post-meta">
                                <div class="col-md-6 col-6 text-start">
                                    <a href="#" class="sigma_post-category" style="color: black;"><i class="fas fa-map-marker-alt sign_custom" style="color: black;"></i> <?= $value['place']; ?></a>
                                </div>
                                <div class="col-6 col-md-6 text-end">
                                    <a href="#" class="sigma_post-date" style="color: black;"> <i class="far fa-calendar" style="color: black;"></i> <?= $convertDate; ?></a>
                                </div>
                            </div>
                            <h5 class="text-2"> <a href="<?= site_url('events/' . $value['id'] . '/' . $value['seo_title']) ?>"> <?= $value['title']; ?> </a></h5>
                        </div>
                    </article>
                </div>
                <!-- Article End -->
            <?php } ?>
        </div>

    </div>

    <div class="spacer spacer-bottom spacer-lg light-bg pattern-triangles"></div>

</div>
<!-- Blog End -->