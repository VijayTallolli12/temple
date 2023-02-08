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
                            <h4 class="card-title">Upcoming Event</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form id="upcoming_events_title" action="<?= site_url("admin/upcoming_events/create"); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="title" class="form-control" name="title" placeholder="Event Title" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="date" class="form-control" name="date" placeholder="Event Held Date" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Place</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="place" class="form-control" name="place" placeholder="Event Held Place" required>
                                            </div>
                                            <br>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="description" id="default" cols="30" rows="10"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Event Image</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <!-- File uploader with image preview -->
                                                <input type="file" name="upcoming_events_image" id="formFile" class="form-control" accept="image/*" onchange="readURL(this);">
                                            </div>
                                            <div class="col-md-4">
                                                <label style="color:seashell">.</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <img id="blah" src="#" alt="your image" / style="display: none;">
                                            </div>
                                            <div class="col-sm-4  justify-content-start">
                                                <a href="<?= site_url('admin/upcoming_events'); ?>" class="btn btn-secondary "><i class="fas fa-backward"></i> Back</a>
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
                        .width(625)
                        .height(450);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>