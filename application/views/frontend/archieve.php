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
                 <div class="row">
                     <!-- Article Start -->
                     <?php foreach ($by_archive as $value) {
                            $sampleDate = $value['date'];
                            $convertDate = date("M d,Y", strtotime($sampleDate));
                            $this->db->where("id", $value['category']);
                            $category = $this->db->get('category')->row_array();
                        ?>
                         <div class="col-md-4">
                             <article class="sigma_post">
                                 <div class="sigma_post-thumb events_image">
                                     <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>">
                                         <img src="<?= site_url($value['featured_image']); ?>" alt="post">
                                     </a>
                                 </div>
                                 <div class="sigma_post-body events_body">
                                     <div class="sigma_post-meta">
                                         <div class="me-3">
                                             <i class="fas fa-feather"></i>
                                             <a href="#" class="sigma_post-category"><?= $category['category']; ?></a>
                                         </div>
                                         <a href="#" class="sigma_post-date"> <i class="far fa-calendar"></i> <?= $convertDate; ?></a>
                                     </div>
                                     <h5> <a href="<?= site_url("events/" . $value['id'] . "/" . $value['seo_title']); ?>"><?= $value['title']; ?></a> </h5>
                                 </div>
                             </article>
                         </div>
                     <?php } ?>
                     <!-- Article End -->
                 </div>
             </div>
         </div>
     </div>
 </div>