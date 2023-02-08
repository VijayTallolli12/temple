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
<section class="section" style="padding: 30px;">
    <div class="container">
        <div class="row">
            <!-- History Start -->
            <div class="section p-0">
                <div class="container p-0">
                    <div class="sigma_timeline">
                        <div class="row">
                            <div class="col-md-6 light-bg p-4">
                                <div>
                                    <h2>Devotee Registration</h2>
                                    <p>Registerd User ? <a href="<?= site_url("home/login"); ?>">Click Here To Login </a></p>
                                </div>
                                <form action="<?= site_url('home/resgister_user') ?>" method="post" enctype="multipart/form-data" id="signup_form">
                                    <div class="row">
                                        <div class="col-xl-6 form-group mb-0">
                                            <label class="mb-0">First Name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" maxlength="25" value="" required>
                                        </div>
                                        <div class="col-xl-6 form-group mb-0">
                                            <label class="mb-0">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" maxlength="25" value="" required>
                                        </div>
                                        <div class="col-xl-12 form-group mb-0">
                                            <label class="mb-0">Phone No.</label>
                                            <input type="text" class="form-control" name="phone_no" placeholder="Enter Phone Number" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" value="" required>
                                        </div>
                                        <div class="col-xl-12 form-group mb-0">
                                            <label class="mb-0">Email Address</label>
                                            <input type="email" class="form-control" name="signup-email" placeholder="Enter Email Address" value="" required>
                                        </div>
                                        <div class="col-xl-6 form-group mb-0">
                                            <label class="mb-0">Password</label>
                                            <input type="password" class="form-control" id="password" name="signup-pass" placeholder="Enter Your Password" minlength="8" maxlength="16" value="" required>
                                        </div>
                                        <div class="col-xl-6 form-group mb-0">
                                            <label class="mb-0">Confirm Password</label>
                                            <input type="password" class="form-control" id="re_password" placeholder="Re Enter Your Password" minlength="8" maxlength="16" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 form-group mt-3">
                                        <p class="small"><input type="checkbox" title="Please Select This Check Box To Continue" required style="opacity: 1 !important; margin-right:10px;position: inherit;">Your personal data will be used to process your Kanike Seva, support your experience throughout this website, and for other purposes described in our <a class="btn-link" href="<?= site_url("privacy_policy") ?>">privacy policy.</a> </p>
                                    </div>
                                    <div class="col-12 pb-2">
                                        <button type="submit" class="sigma_btn-custom" name="button">Sign Up</button>
                                    </div>
                                </form>
                                <!-- <div class="line">
                                    <span>or</span>
                                </div> -->
                            </div>
                            <div class="col-md-6 login_image" style="padding-top: 2.5rem !important;">
                                <img class="img-fluid" src="<?= site_url("assets/frontend/img/login_1.jpg") ?>" style="width: 100%;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- History End -->
        </div>
    </div>
</section>