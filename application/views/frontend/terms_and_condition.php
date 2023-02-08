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
         <div class="sigma_box pb-0 m-0">
             <div class="row pb-2 mb-2">
                 <div class="col-md-12">
                     <div class="sigma_icon-block icon-block-3 mb-0">
                         <div class="sigma_icon-block-content">
                             <h4 class="m-0">Terms and Conditions </h4>
                         </div>
                     </div>
                 </div>

                 <div class="col">
                     <div class="clearfix">
                         <?= get_settings("terms_and_condition"); ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>