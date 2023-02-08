 <style>
     /* .container {
         width: 100%;
         height: 100%;
         object-fit: cover;
     }

     .cover_img {
         width: 100%;
         height: 100%;
         object-fit: cover;
     } */
 </style>

 <div class="row h-100">
     <div class="col-lg-5 col-12">
         <div id="auth-left">
             <div class="auth-logo">
                 <a href="index.html"><img src="<?php echo base_url('/') . get_settings('logo'); ?>" alt="Shiror Matha"></a>
             </div>
             <h3 class="auth-title">Reset Password</h3>
             <form action="<?= site_url("admin/reset_pass_email") ?>" method="post" id="reset_pass_email" enctype="multipart/form-data">
                 <div class="form-group position-relative has-icon-left mb-3">
                     <input type="hidden" name="id" value="<?= $id; ?>">
                     <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Please Enter Your Password" required>
                     <div class="form-control-icon">
                         <i class="bi bi-person"></i>
                     </div>
                 </div>
                 <div class="form-group position-relative has-icon-left mb-3">
                     <input type="password" name="re_password" id="re_password" class="form-control form-control-xl" placeholder="Please Re Enter Your Paswword" required>
                     <div class="form-control-icon">
                         <i class="bi bi-shield-lock"></i>
                     </div>
                 </div>
                 <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Change Password</button>
             </form>

         </div>
     </div>
     <div class="col-lg-7 d-none d-lg-block">
         <div id="auth-right">
             <img src="<?= site_url("assets/images/logo/temple.jpg"); ?>" alt="Shiroormath" style="height: 100%;object-fit: cover;object-position: center;width: 100%;">
         </div>
     </div>
 </div>