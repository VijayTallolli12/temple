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
                 <a href="index.html"><img src="<?php echo base_url('/') . get_settings('logo'); ?>" alt="Logo"></a>
             </div>
             <h3 class="auth-title">Forgot Password</h3>
             <p class="auth-subtitle mb-3">Input your email and we will send you reset password.</p>

             <form action="<?= site_url("admin/reset_password") ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group position-relative has-icon-left mb-3">
                     <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                     <div class="form-control-icon">
                         <i class="bi bi-envelope"></i>
                     </div>
                 </div>
                 <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send</button>
             </form>
             <div class="text-center mt-4 text-lg fs-4">
                 <p class='text-gray-600'>Remember your account? <a href="<?= site_url("admin") ?>" class="font-bold">Log in</a>.
                 </p>
             </div>
         </div>
     </div>
     <div class="col-lg-7 d-none d-lg-block">
         <div id="auth-right">
             <img src="<?= site_url("assets/images/logo/temple.jpg"); ?>" alt="Shiroormath" style="height: 100%;object-fit: cover;object-position: center;width: 100%;">
         </div>
     </div>
 </div>