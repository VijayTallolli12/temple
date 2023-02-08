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
<section class="section" style="padding: 30px;">
    <div class="container">
        <div class="row">
            <!-- History Start -->
            <div class="section light-bg p-0">
                <div class="container p-0">
                    <div class="sigma_timeline">
                        <div class="row">
                            <div class="col-md-6 p-4" id="login_form">
                                <div>
                                    <h2>Devotee Login</h2>
                                    <p>New User ? <a href="<?= site_url("home/sign_up"); ?>">Create New Account </a></p>
                                </div>
                                <form action="<?= site_url('home/verify_login') ?>" method="post" enctype="multipart/form-data">
                                    <div class="col-xl-12 form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" name="login-email" placeholder="Email Address" value="">
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="login-pass" placeholder="Password" value="">
                                    </div>
                                    <div class="col-12 pb-2">
                                        <button type="submit" class="sigma_btn-custom" name="button">Login</button>
                                    </div>
                                </form>
                                <div>
                                    <span>Forgot Your Password ? <a href="#" id="forgot_pass"> Click Here to Reset</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 p-1 light-bg" id="forgot_form" style="display: none;">
                                <div>
                                    <h2>Forgot Password</h2>
                                    <p>New User ? <a href="<?= site_url("home/sign_up"); ?>">Create New Account </a></p>
                                    <form action="<?= site_url('home/reset_pass') ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-xl-12 form-group">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email Address" value="" required>
                                        </div>
                                        <div class="col-12 pb-2">
                                            <button type="submit" class="sigma_btn-custom" name="button">Reset Password</button>
                                        </div>
                                    </form>
                                    <div>
                                        <span>Remeber Your Password ? <a href="#" id="remeber_pass"> Click Here To Login</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 login_image">
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