 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
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
 <section class="section">
     <div class="container">
         <div class="row">
             <?php
                if (sizeof($kanike) > 0) {
                    foreach ($kanike as $key => $value) {
                        $desc = $value['description'];
                        $desc = str_replace("'", '"', $desc);
                ?>
                     <div class="col-lg-4 col-md-4">
                         <div class="sigma_service style-2">
                             <a href="#" class="open_kanike_details" data-image="<?= $value['image']; ?>" data-name="<?= $value['name']; ?>" data-desc='<?= $desc; ?>'>
                                 <div class="sigma_service-thumb">
                                     <img class="img-fluid history" src="<?= site_url($value['image']); ?>" alt="img">
                                 </div>
                             </a>
                             <div class="sigma_service-body">
                                 <h4>
                                     <?= $value['name']; ?>
                                 </h4>
                                 <a href="<?= site_url("payment/kanike_payment/" . $value['id']); ?>" class="sigma_btn-custom">
                                     Pay Now
                                 </a>
                             </div>
                         </div>
                     </div>
             <?php }
                }
                ?>
         </div>
     </div>
 </section>

 <!-- bootstrap modal popup -->
 <div class="modal fade" id="Kanike_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="kanike_title"></h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6 col-12">
                         <div class="sigma_service style-2">
                             <div class="sigma_service-thumb">
                                 <img class="img-fluid history" id="kanike_image" src="" alt="img">
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6 col-12">
                         <p id="kanike_desc"></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- modal end -->