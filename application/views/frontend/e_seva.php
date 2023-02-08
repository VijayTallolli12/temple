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
         <div id="seva_list_id" class="row pb-4 flex-row-reverse">
             <div class="col-md-2">
                 <a href="<?= site_url("seva/e-seva_list"); ?>" class="sigma_btn-custom">
                     Go To Seva List <i class="far fa-chevron-right"></i>
                 </a>
             </div>
         </div>
         <div class="row">
             <?php
                $cart_has = "";
                if (sizeof($e_seva) > 0) {

                    foreach ($e_seva as $key => $value) {

                        foreach ($this->cart->contents() as  $items) {
                            if ($this->cart->total_items() > 0) {
                                if ($items['id'] == $value['id']) {
                                    $cart_has = TRUE;
                                }
                            } else {
                                $cart_has = FALSE;
                            }
                        }
                ?>
                     <div class="col-lg-4 col-md-6 col-6 ">
                         <div class="sigma_service style-2">
                             <div class="sigma_service-body ">
                                 <h6>
                                     <?= $value['name']; ?>
                                 </h6>
                                 <div class="sigma_service-progress">
                                     <div class="progress-content">
                                         <p>Amount: <i class="far fa-rupee-sign sign_custom" style="color: #db4242 !important;"></i> <?= $value['price']; ?></p>
                                     </div>
                                 </div>
                                 <?php
                                    if ($cart_has == "TRUE") {
                                        foreach ($this->cart->contents() as  $items) {
                                            if ($this->cart->total_items() > 0) {
                                                if ($items['id'] == $value['id']) {
                                    ?>
                                                 <div id="a_<?= $value['id']; ?>">
                                                     <a href="<?= site_url("payment/remove_cart_seva/" . $items['rowid']) ?>" class="sigma_btn-added">
                                                         Remove Seva
                                                     </a>
                                                 </div>
                                     <?php   }
                                            }
                                        }
                                    } else { ?>
                                     <div id="<?= $value['id']; ?>">
                                         <a href="#" class="sigma_btn-custom add_seva_cart" data-id="<?= $value['id']; ?>" data-name="<?= $value['name']; ?>" data-price="<?= $value['price']; ?>">
                                             Book E-Seva
                                         </a>
                                     </div>
                                 <?php } ?>
                                 <div id="a_<?= $value['id']; ?>" style="display: none;">
                                 </div>

                             </div>
                         </div>
                     </div>
             <?php
                        $cart_has = FALSE;
                    }
                }
                ?>
         </div>
     </div>
 </section>

 <div class="row mobile_list">
     <div class="col-6 text-start">
         <span>
             <i class="far fa-rupee-sign"></i> <span id="total-amount"><?php if ($this->cart->total() > 0) {
                                                                            echo $this->cart->total();
                                                                        } else {
                                                                            echo 0;
                                                                        } ?></span>
         </span>
     </div>
     <div class="col-6 text-end">
         <span>
             <a href="<?= site_url("seva/e-seva_list"); ?>" style="color: white;">
                 Continue <i class="far fa-chevron-right"></i>
             </a>
         </span>
     </div>
 </div>