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
                         <h4 class="card-title">Website Settings</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/website_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-4">
                                             <label>Website Description</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="website_description" id="default" maxlength="200" cols="30" rows="10"><?php echo get_settings('website_description'); ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Website Keywords</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="website_keywords" id="default1" maxlength="200" cols="30" rows="10"><?php echo get_settings('website_keywords'); ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Terms and Condition</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="terms_and_condition" id="default2" maxlength="200" cols="30" rows="10"><?php echo get_settings('terms_and_condition'); ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Privacy Policy</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="privacy_policy" id="default3" maxlength="200" cols="30" rows="10"><?php echo get_settings('privacy_policy'); ?></textarea>
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