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

 <div class="section">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="row" id="load_data"></div>
                 <div id="load_data_message"></div>
             </div>
         </div>
     </div>
 </div>