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
             <div class="col-12">
                 <div class="entry-content">
                     <?php
                        if (sizeof($institutes) > 0) {
                            foreach ($institutes as $key => $value) {
                        ?>
                             <div class="sigma_volunteer-detail mb-3">
                                 <div class="row">
                                     <div class="col-lg-12">
                                         <div class="sigma_volunteer-detail-inner mt-5 mt-lg-0 ps-0 ps-lg-3">
                                             <h3 class="sigma_member-name"><?= $value['name']; ?> </h3>
                                         </div>
                                     </div>
                                     <div class="col">
                                         <?php if ($value['image'] != "") { ?>
                                             <div class="clearfix">
                                                 <img class="col-md-5 p-1 ms-md-3 rounded float-sm-start" src="<?= site_url($value['image']); ?>" class="mb-0" alt="volunteer">

                                                 <div class="d-inline">
                                                     <?= $value['description']; ?>
                                                 </div>
                                             </div>
                                         <?php } else { ?>
                                             <div class="col">
                                                 <div class="ps-lg-3">
                                                     <?= $value['description']; ?>
                                                 </div>
                                             </div>
                                         <?php } ?>
                                     </div>
                                 </div>
                                 <?php if ($value['link'] != "") { ?>
                                     <a href="<?= $value['link']; ?>" class="float-sm-end">
                                         <span class="text-red btn-link">Know More <i class="text-red far fa-arrow-right"></i> </span>
                                     </a>
                                 <?php } ?>
                             </div>
                             <hr>
                     <?php }
                        }
                        ?>
                 </div>
             </div>
         </div>
     </div>
 </section>