<style>
    #main {
        background-color: #f2f7ff;
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Gallery Images</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery Images</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#add_images"><i class="bi bi-image-alt"></i> Add New Images</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gallery->result_array() as $key => $gallery) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><b><?= $gallery['title']; ?></b></td>

                                <td>
                                    <a href="" class="view_gallery_img" data-bs-toggle="modal" data-bs-target="#view_image" data-title="<?= $gallery['title']; ?>" data-img_link="<?= site_url($gallery['photo']); ?>" data-bs-backdrop="true">
                                        <img class="img-fluid" src="<?= site_url($gallery['photo']); ?>" alt="Shiroor Matha" height=100 width=100 />
                                    </a>
                                </td>

                                <!-- <td><img src="<?= site_url($daily_seva['image']); ?>" alt="Shiroor Math" border=3 height=100 width=100></td> -->

                                <td>
                                    <a onclick="delete_function(<?= $gallery['id']; ?>);" class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-backdrop="false" data-bs-target="#delete_img"><i class="bi bi-trash2"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="section">
        <div class="modal fade" id="add_images" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Add New Images
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="insert_images" action="<?= site_url("admin/gallery/insert") ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="gallery_title" name="gallery_title" placeholder="Image Title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Images</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="file" id="first-name" name="gallery_images[]" class="multiple-files-filepond" multiple required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" onclick="form_submit();" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="image_show">
        <div class="modal fade text-left modal-borderless" id="view_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title"></h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="" id="gallery_image" style="height: 60%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
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
                    <div class="modal fade text-left" id="delete_img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel4">Gallery Image</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <form action="<?= site_url("admin/gallery/delete"); ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="d_id" name="id" readonly>
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

<script>
    function delete_function($id) {
        var id = $id;
        document.getElementById("d_id").value = id;
    }

    function form_submit() {
        if ($("#insert_images").valid()) {
            document.getElementById('insert_images').submit();
        } else {
            var title = document.getElementById("gallery_title").value;
            if (title != "") {
                document.getElementById("gallery_validation").click();
            }
        }
    }
</script>