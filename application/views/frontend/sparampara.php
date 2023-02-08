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

             <div class="col-md-8">
                 <div class="sigma_box pb-0 m-0">
                     <?php $svalue = $this->db->get_where('parampara', array('id' => $sparampara))->row_array(); ?>
                     <div class="col-md-12">
                         <div class="sigma_icon-block icon-block-3 mb-0">
                             <div class="sigma_icon-block-content">
                                 <h4><?= $svalue['name']; ?></h4>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-12">
                         <div class="clearfix">
                             <?php
                                if ($svalue['image'] != "") {
                                ?>
                                 <img class="col-md-4 p-3 rounded float-sm-start" src="<?= site_url($svalue['image']); ?>" alt="post" style="width: auto;height: 280px;">
                             <?php
                                } ?>
                             <div class="d-inline "><?= $svalue['description']; ?></div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="sigma_box pb-0 m-0">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="sigma_icon-block icon-block-3 mb-0">
                                 <div class="sigma_icon-block-content">
                                     <h6 style="font-size: 22px;">Shiroor Matha Parampara</h6>
                                 </div>
                             </div>
                         </div>
                         <?php
                            if (sizeof($parampara) > 0) {
                                foreach ($parampara as $key => $value) {
                            ?>
                                 <div class="col-md-12">
                                     <a href="<?= site_url("parampara/sparampara/" . $value['id']); ?>">
                                         <h6 style="color: black;"><?= $key + 1; ?>.<?= $value['name']; ?></h6>
                                     </a>
                                 </div>
                         <?php }
                            }
                            ?>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </section>