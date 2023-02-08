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
         <?php
            if (sizeof($rooms) > 0) {
                foreach ($rooms as $key => $value) {
            ?>
                 <div class="sigma_box pb-0 m-0">
                     <div class="row pb-2 mb-2">
                         <div class="col-md-12">
                             <div class="sigma_icon-block icon-block-3 mb-0">
                                 <div class="sigma_icon-block-content">
                                     <h4 class="m-0"> <?= $value['room_name']; ?> </h4>
                                 </div>
                             </div>
                         </div>

                         <div class="col">
                             <div class="clearfix">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <h6 class="m-0"> <?= $value['type_of_room']; ?> </h6>
                                     </div>
                                     <div class="col-md-8 mt-3 pt-2">
                                         <div class="d-inline "><?= $value['description']; ?></div>
                                     </div>
                                     <div class="col-md-4 pt-2 pb-2 mb-2">

                                         <?php
                                            if ($value['image'] != "") {
                                            ?>
                                             <img class="rounded float-sm-start" src="<?= site_url($value['image']); ?>" alt="post">
                                         <?php
                                            } ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <br>
         <?php }
            }
            ?>
     </div>
 </section>