 <style>
     #main {
         background-color: #f2f7ff;
     }

     .match-height {
         padding-left: 8%;
     }
 </style>
 <?php
    $upcoming_events = $this->db->get_where('upcoming_events', array('id' => $upcoming_events_id))->row_array();
    ?>
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
                             <form id="upcoming_events_u_title" action="<?php echo site_url('admin/upcoming_events/update'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <input type="hidden" name="id" id="id" value="<?= $upcoming_events['id']; ?>" readonly>
                                 <div class="form-body">
                                     <div class="row">
                                         <div class="col-md-4">
                                             <label>Title</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="title" class="form-control" name="title" placeholder="Upcoming Event Title" value="<?= $upcoming_events['title']; ?>" required>
                                         </div>
                                         <div class="col-md-4">
                                             <label>Date</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="date" id="date" class="form-control" name="date" placeholder="Upcoming Event Date" value="<?= $upcoming_events['date']; ?>" required>
                                         </div>
                                         <div class="col-md-4">
                                             <label>plcae</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="place" class="form-control" name="place" placeholder="Upcoming Event place" value="<?= $upcoming_events['place']; ?>" required>
                                         </div>


                                         <div class="col-md-4">
                                             <label>Description</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="description" id="default" cols="30" rows="10"><?= $upcoming_events['description']; ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Image</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <?php if ($upcoming_events['image'] != "") { ?>
                                                 <img src="<?= site_url($upcoming_events['image']); ?>" alt="Shiroor Math" style="width:100%;height:100%" id="preview_img">
                                                 <br>
                                             <?php } else { ?>
                                                 <span id="preview_img"></span>
                                             <?php } ?>
                                         </div>
                                         <div class="col-md-4">
                                             <label style="color:seashell">.</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="file" name="upcoming_events_image" id="formFile" class="form-control" accept="image/*" onchange="readURL(this);">
                                         </div>
                                         <div class="col-md-4">
                                             <div id="change_img" style="display: none;margin-top: 26rem;margin-left: 9rem;">
                                                 <a type="button" onclick="change_img();" class="btn btn-primary me-1 mb-1">Remove Image</a>
                                             </div>
                                         </div>
                                         <div class=" col-md-8 form-group">
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
 <script>
     tinymce.init({
         selector: '#kanike_desc'
     });

     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             document.getElementById('blah').style.display = "block";
             document.getElementById('change_img').style.display = "block";
             document.getElementById('preview_img').style.display = "none";
             reader.onload = function(e) {
                 $('#blah')
                     .attr('src', e.target.result)
                     .width(625)
                     .height(450);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }

     function change_img() {
         document.getElementById('blah').style.display = "none";
         document.getElementById('change_img').style.display = "none";
         document.getElementById('preview_img').style.display = "block";
         document.getElementById('formFile').value = "";
     }
 </script>