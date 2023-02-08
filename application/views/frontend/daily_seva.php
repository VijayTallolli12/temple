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
            if (sizeof($daily_seva) > 0) {
                foreach ($daily_seva as $key => $value) {
            ?>
                 <div class="sigma_box pb-0 m-0">
                     <div class="row ">
                         <div class="col-md-8">
                             <div class="sigma_icon-block icon-block-3 mb-0">
                                 <div class="sigma_icon-block-content">
                                     <h4 class="m-0"> <?= $value['title']; ?> </h4>
                                 </div>
                             </div>
                             <div class="col-md-8 mt-3">
                                 <div class="d-inline "><?= $value['timings']; ?></div>
                             </div>
                         </div>

                         <div class="col-md-4" style="padding-bottom: 30px;padding-top: 20px;">
                             <?php
                                if ($value['image'] != "") {
                                ?>
                                 <img class="rounded float-sm-start" src="<?= site_url($value['image']); ?>" alt="post" style="height: auto;width:100%">
                             <?php
                                } ?>
                         </div>

                     </div>
                 </div>
                 <br>
         <?php }
            }
            ?>
     </div>
 </section>