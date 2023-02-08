    <style>
        #main {
            background-color: #f2f7ff;
        }

        .match-height {
            padding-left: 8%;
        }

        /* .page-heading {
            padding-bottom: ;
        } */
    </style>
    <?php
    $videos = $this->db->get_where('videos', array('id' => $videos_id))->row_array();
    ?>
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
                                <form id="videos_title" action="<?php echo site_url('admin/videos/update'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    <input type="hidden" name="id" id="id" value="<?= $videos['id']; ?>" readonly>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="videos_title" class="form-control" name="title" placeholder="Video Title" value="<?= $videos['title']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Youtube Link</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="yt_link" class="form-control" name="link" placeholder="Youtube LINK" value="<?= $videos['link']; ?>" required>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>