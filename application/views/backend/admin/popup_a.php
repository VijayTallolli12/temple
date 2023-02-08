    <style>
        #main {
            background-color: #f2f7ff;
        }

        .match-height {
            padding-left: 8%;
        }
    </style>
    <div class="page-heading">
        <section id="section">
            <div class="row">
                <div class="col-12 col-md-12 ml-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Popup Banner</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form id="popups_title" action="<?= site_url("admin/popup_m/create") ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Popup Title</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="popup_title" class="form-control" name="title" placeholder="Banner Title" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Link</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="url" id="first-name" class="form-control" name="link" placeholder="Link">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="desc" id="default" cols="30" rows="10"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <!-- File uploader with image preview -->
                                                <input type="file" name="popup_image" id="formFile" class="form-control" accept="image/*" onchange="readURL(this);" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:seashell">.</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <img id="blah" src="#" alt="your image" / style="display: none;">
                                            </div>

                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/popup_m'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
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
    <!-- intiliasing tinymice text Editor for Kanike Description -->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                document.getElementById('blah').style.display = "block";
                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width('inherit')
                        .height('inherit');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>