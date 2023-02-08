<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Blog Images</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Images</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="content-types">
        <div class="row">
            <?php $blog_images = $this->db->get_where('blogs_image', array('blog_id' => $blogs_id));
            foreach ($blog_images->result_array() as $key => $blog_images) : ?>
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="<?= site_url($blog_images['image']); ?>" alt="Card image cap" />
                            <div class="card-body">
                                <a href="" class="btn btn-danger rounded-pill imagesspl" data-bs-toggle="modal" data-id="<?= $blog_images['id']; ?>" data-status="<?= $blog_images['blog_id']; ?>" data-bs-backdrop="false" data-bs-target="#status_change"><i class="bi bi-trash2"></i>Remove Image</a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section id="section">
        <div class="row">
            <div class="col-12 col-md-12 ml-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?= site_url("admin/blogs/images_insert") ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                <input type="hidden" name="b_id" value="<?= $blogs_id ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Images</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" id="first-name" name="blogs_images[]" placeholder="Place" class="multiple-files-filepond" multiple required>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6  justify-content-start">
                                            <a href="<?= site_url("admin/blogs/edit/" . $blogs_id . ""); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-end">
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
    <section id="section">
        <div class="row">
            <div class="col-12 col-md-12 ml-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="<?= site_url('admin/blogs/edit/' . $blogs_id . ''); ?>" class="btn btn-primary btn-lg">Finish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal popups -->
    <section id="basic-modals">
        <!-- status change modal -->
        <div class="col-md-6 col-12">
            <div class="card-content">
                <div class="card-body">
                    <!--Disabled Backdrop Modal -->
                    <div class="modal fade text-left" id="status_change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel4">Blog Image</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="<?= site_url("admin/blogs/delete_images"); ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="id" name="id" readonly>
                                    <input type="hidden" id="status" name="b_id" readonly>
                                    <div class="modal-body">
                                        <span style="color: red;">
                                            Do You Want to Delete Image?
                                        </span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of status change modal -->
    </section>
</div>