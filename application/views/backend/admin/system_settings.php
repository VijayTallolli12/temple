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
                         <h4 class="card-title">System Settings</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/system_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-4">
                                             <label>System Name</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="system_name" placeholder="System Name" value="<?php echo get_settings('system_name'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>System Title</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="system_title" placeholder="System Title" value="<?php echo get_settings('system_title'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>System Email</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="email" id="first-name" class="form-control" name="system_email" placeholder="System Email" value="<?php echo get_settings('system_email'); ?>" title="Please Enter Proper Email Ex:abc@gmail.com,abc@yahoo.com" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Address</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <textarea name="address" id="default" maxlength="200" cols="30" rows="10"><?php echo get_settings('address'); ?></textarea>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Phone Number</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="phone" placeholder="Phone Number" pattern="[0-9+ ]+" value="<?php echo get_settings('phone'); ?>" title="Please Enter Proper Number Ex:+91 9876543210,0836 2111111" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Slogan</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="slogan" placeholder="Slogan" value="<?php echo get_settings('slogan'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Author</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="author" placeholder="Author" value="<?php echo get_settings('author'); ?>" required>
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