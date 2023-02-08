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
    $e_seva = $this->db->get_where('seva_list', array('id' => $e_seva_id))->row_array();
    ?>
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
                                <form id="e_sevas_u_title" action="<?php echo site_url('admin/e_seva/update'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    <input type="hidden" name="id" id="id" value="<?= $e_seva['id']; ?>" readonly>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>E-Seva</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="e_seva_title" class="form-control" name="e_seva" placeholder="E-Seva" pattern="[a-zA-Z ]+" value="<?= $e_seva['name']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="email-id" class="form-control" name="price" placeholder="Price" pattern="[0-9]+" value="<?= $e_seva['price']; ?>" required>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>