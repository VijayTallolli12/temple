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
                            <h4 class="card-title">E-seva</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?= site_url("admin/e_seva/create"); ?>" method="POST" enctype="multipart/form-data" id="e_sevas_title" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>E-Seva</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="e_seva_title" class="form-control" name="e_seva" placeholder="E-Seva" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="price" class="form-control" name="price" placeholder="Price" required>
                                            </div>
                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/e_seva'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
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