 <?php $kanike_type = $this->db->get('kanike')->result_array(); ?>
 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg"); ?>)">
     <div class="container">
         <div class="sigma_subheader-inner">
             <div class="sigma_subheader-text">
                 <h1><?= $page_title ?></h1>
             </div>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <!-- partial -->

 <!-- Form Start -->
 <div class="section">
     <div class="container">
         <form method="post" enctype="multipart/form-data" action="<?= site_url("payment/kanike_checkout"); ?>">
             <div class="form-row sigma_donation-form">
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Devotee Details</h5>
                         <div class="row">
                             <div class="col-lg-4">
                                 <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                             </div>
                             <div class="col-lg-4">
                                 <input type="text" class="form-control" placeholder="Contact Number" name="phone_no" pattern="[0-9 ]+" minlength="10" maxlength="10" title="Please Enter Correct Mobile No." required>
                             </div>
                             <div class="col-lg-4 mt-3 mt-lg-0">
                                 <input type="email" placeholder="Email Address" name="email" class="form-control">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Address*</h5>
                         <textarea name="address" class="form-control" placeholder="Enter Adress Your Address To Send Prasada" rows="6" required></textarea>
                     </div>
                 </div>
                 <div class="col-12">

                 </div>
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Message(optional)</h5>
                         <textarea name="message" class="form-control" placeholder="Enter Message" rows="6"></textarea>
                     </div>
                 </div>

                 <div class="col-12">
                     <div class="form-group mb-5">
                         <h5>Kanike Amount</h5>
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <button class="sigma_btn-custom shadow-none btn-sm" type="button"><i class="far fa-rupee-sign"></i></button>
                             </div>
                             <input type="text" name="amount" class="form-control ms-0" placeholder="Please Enter Amount" required>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12 text-center">
                     <button type="submit" class="sigma_btn-custom" name="button"> Pay Now </button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 <!-- Form End -->