 <style>
     #main {
         background-color: #f2f7ff;
     }

     .match-height {
         padding-left: 8%;
     }

     .square {
         height: 150px;
         width: 150px;
     }
 </style>

 <div class="page-heading">
     <section id="section">

         <div class="row">
             <div class="col-12 col-md-12 ml-4">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Mail Settings</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/social_media_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-4">
                                             <label>FaceBook</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="url" id="first-name" class="form-control" name="facebook" placeholder="Facebook" value="<?php echo get_settings('facebook'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Twitter</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="url" id="first-name" class="form-control" name="twitter" placeholder="Twitter" value="<?php echo get_settings('twitter'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Instagram</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="url" id="first-name" class="form-control" name="instagram" placeholder="Instagram" value="<?php echo get_settings('instagram'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Linkdin</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="url" id="first-name" class="form-control" name="linkdin" placeholder="Linkdin" value="<?php echo get_settings('linkdin'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>YouTube</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="url" id="first-name" class="form-control" name="youtube" placeholder="YouTube" value="<?php echo get_settings('youtube'); ?>" required>
                                         </div>

                                         <div class="col-sm-12 d-flex justify-content-end">
                                             <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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