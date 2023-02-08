<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
    <div class="container">
        <div class="sigma_subheader-inner">
            <div class="sigma_subheader-text">
                <h1><?= $page_title ?></h1>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- partial -->
<section class="section" style="padding: 10px;">
    <div class="container">
        <!-- Services Start -->
        <div class="section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <a href="<?= site_url("home/my_info") ?>" class="sigma_service style-1">
                            <div class="sigma_service-thumb">
                                <i class="fal fa-address-card"></i>
                            </div>
                            <div class="sigma_service-body">
                                <h5>Personal Info</h5>
                                <p>Provide Personal details and how we can reach you</p>
                            </div>
                            <span class="btn-link"> <i class="far fa-arrow-right"></i> </span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="<?= site_url("home/change_pass") ?>" class="sigma_service style-1">
                            <div class="sigma_service-thumb">
                                <i class="fal fa-fingerprint"></i>
                            </div>
                            <div class="sigma_service-body">
                                <h5>Login & Security</h5>
                                <p>Update your password and secure your account </p>
                            </div>
                            <span class="btn-link"> <i class="far fa-arrow-right"></i> </span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="<?= site_url("home/my_seva_kanike") ?>" class="sigma_service style-1">
                            <div class="sigma_service-thumb">
                                <i class="flaticon-temple"></i>
                            </div>
                            <div class="sigma_service-body">
                                <h5>My Sevas & Kanike</h5>
                                <p>Provides your upcoming and past booking information </p>
                            </div>
                            <span class="btn-link"> <i class="far fa-arrow-right"></i> </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Services End -->
    </div>
</section>