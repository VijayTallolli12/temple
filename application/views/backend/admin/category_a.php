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
                            <h4 class="card-title">Category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form id="categorys_title" action="<?= site_url("admin/category/create"); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Category</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="category_title" class="form-control" name="category" placeholder="Category" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Parent-Category</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="parent_category" class="choices form-select">
                                                    <option value="">No Parent</option>
                                                    <?php
                                                    $parent = $this->db->get('category');
                                                    foreach ($parent->result_array() as $key => $parent) :
                                                    ?>
                                                        <option value="<?= $parent['id']; ?>"><?= $parent['category']; ?></option>
                                                    <?php
                                                    endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/category'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
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