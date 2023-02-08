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
                         <h4 class="card-title">Logo</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/logo_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-3">
                                             <label>Logo</label>
                                         </div>
                                         <div class="col-md-2 square">
                                             <img src="<?php echo base_url('/') . get_settings('logo'); ?>" class="img-fluid" alt="Shiroor Matha Logo">
                                         </div>
                                         <div class=" col-md-6 form-group">
                                             <input type="file" id="first-name" name="logo" class="multiple-files-filepond" required>
                                         </div>
                                         <div class=" col-md-4">
                                         </div>
                                         <div class="col-sm-8 d-flex justify-content-end">
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

         <div class="row">
             <div class="col-12 col-md-12 ml-4">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Favicon</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/favicon_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">

                                         <div class="col-md-3">
                                             <label>Favicon</label>
                                         </div>
                                         <div class="col-md-2 square">
                                             <img src="<?php echo base_url('/') . get_settings('favicon'); ?>" class="img-fluid" alt="Shiroor Matha Favicon">
                                         </div>
                                         <div class=" col-md-6 form-group">
                                             <input type="file" id="first-name" name="favicon" class="multiple-files-filepond-favicon" required>
                                         </div>
                                         <div class=" col-md-4">
                                         </div>
                                         <div class="col-sm-8 d-flex justify-content-end">
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