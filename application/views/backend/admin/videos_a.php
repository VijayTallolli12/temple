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
                            <h4 class="card-title">Video's(Youtube)</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?= site_url("admin/videos/create"); ?>" method="POST" enctype="multipart/form-data" id="videos_title" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Video Ttitle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="video_title" class="form-control" name="title" placeholder="Video Title" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Youtube Link</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="yt_link" class="form-control" name="link" placeholder="Youtube Link" required>
                                            </div>
                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/videos'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
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