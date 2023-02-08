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
                if (sizeof($photos) > 0) {
                    foreach ($photos as $key => $value) {
                ?>
                     <!-- Article Start -->
                     <div class="col-md-4">
                         <article class="sigma_post">
                             <div class="sigma_post-thumb">
                                 <a class="view_images" data-title="<?= $value['title']; ?>" href="#">
                                     <img src="<?= site_url($value['photo']); ?>" alt="post">
                                 </a>
                             </div>
                             <div class="sigma_post-body">

                                 <h5><i class="fas fa-om"></i> <a style="text-decoration: none;" class="view_images" data-title="<?= $value['title']; ?>" href="#"><?= $value['title']; ?></a> </h5>

                             </div>
                         </article>
                     </div>
                     <!-- Article End -->
             <?php }
                } ?>

         </div>
     </div>

 </section>

 <div id="lightgallery" style="display: none;"></div>