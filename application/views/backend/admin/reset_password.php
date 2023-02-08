    <style>
        #main {
            background-color: #f2f7ff;
        }

        .match-height {
            padding-left: 8%;
        }
    </style>
    <div class="page-heading">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-8 col-12 ml-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?= site_url("admin/reset_to_new_password"); ?>" method="POST" enctype="multipart/form-data" id="reset_password" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Old Password</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>New Password</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Re Enter New Password</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" class="form-control" id="re_new_password" name="re_new_password" placeholder="Re Enter New Password" required>
                                            </div>
                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
                                            </div>
                                            <div class="col-sm-8 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button id="error_title" class="btn btn-outline-warning btn-lg btn-block" style="display: none;">Warning</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>