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
        <div class="row">
            <!-- History Start -->
            <div class="section light-bg p-2">
                <div class="container pt-2 pb-2">
                    <div class="sigma_timeline">
                        <div class="row">
                            <div class="col-md-6" id="login_form">
                                <div>
                                    <h2>Change Password</h2>
                                </div>
                                <form action="<?= site_url('home/change_password') ?>" method="post" enctype="multipart/form-data" id="reset_password">
                                    <div class="col-xl-12 form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="old_password" placeholder="Enter Your Old Password" value="" required>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter Your New Password" value="" required>
                                    </div>
                                    <div class="col-xl-12 form-group">
                                        <label> Re-Enter Password</label>
                                        <input type="text" class="form-control" id="re_new_password" name="re_new_password" placeholder="ReEnter Your New Password" value="" required>
                                    </div>
                                    <div class="col-12 pb-2">
                                        <button type="submit" class="sigma_btn-custom" name="button">Change Password</button>
                                    </div>
                                </form>
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