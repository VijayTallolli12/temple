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
                             <form action="<?php echo site_url('admin/settings/mail_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-4">
                                             <label>Protocol</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="protocol" placeholder="Protocol" value="<?php echo get_settings('protocol'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Smtp Host</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="smtp_host" placeholder="Smtp Host" value="<?php echo get_settings('smtp_host'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Smtp Port</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="smtp_port" placeholder="Smtp Port" value="<?php echo get_settings('smtp_port'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Smtp Username</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="smtp_user" placeholder="Smtp Username" value="<?php echo get_settings('smtp_user'); ?>" required>
                                         </div>

                                         <div class="col-md-4">
                                             <label>Smtp Password</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" id="first-name" class="form-control" name="smtp_pass" placeholder="Smtp Password" value="<?php echo get_settings('smtp_pass'); ?>" required>
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