 <?php $kanike_type = $this->db->get('kanike')->result_array(); ?>
 <!-- partial:partia/__subheader.html -->
 <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg"); ?>)">
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

 <!-- Form Start -->
 <div class="section">
     <div class="container">
         <?php if (!$this->session->userdata("Shiroor_devotee")) { ?>
             <div class="sigma_notice">
                 <p>Are you a returning Devotee? <a href="<?= site_url("home/login"); ?>">Click here to login</a> </p>
             </div>
         <?php } ?>
         <form method="post" enctype="multipart/form-data" action="<?= site_url("payment/razorpay_checkout"); ?>">
             <input type="hidden" name="payment_name" value="kanike">
             <div class="form-row sigma_donation-form">
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Devotee Details</h5>
                         <div class="row">
                             <?php
                                if ($this->session->userdata("Shiroor_devotee")) { ?>
                                 <div class="col-lg-4">
                                     <select id="name_change_kanike" class="form-control" placeholder="Please Enter Name" required>
                                         <?php
                                            $user_id = $this->session->userdata("user_id");
                                            $this->db->where("id", $user_id);
                                            $data = $this->db->get('users')->row_array();
                                            $this->db->where("user_id", $user_id);
                                            $data_family = $this->db->get('user_family_members')->result_array();
                                            ?>
                                         <option value="self">Self</option>
                                         <?php
                                            foreach ($data_family as $key => $value) {
                                            ?>
                                             <option value="<?= $value['id']; ?>"><?= $value['first_name']; ?> <?= $value['last_name']; ?></option>
                                         <?php }
                                            ?>
                                     </select>
                                 </div>
                                 <input type="hidden" name="name" id="change_name" value="<?= $data['first_name'] ?> <?= $data['last_name']; ?>">
                                 <input type="hidden" id="id" value="<?= $user_id; ?>">
                             <?php
                                } else { ?>
                                 <div class="col-lg-4">
                                     <input type="text" class="form-control" placeholder="Full Name" name="name" title="Please Enter Name" maxlength="30" required>
                                 </div>
                             <?php   } ?>
                             <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                                 <div class="col-lg-4 mt-3">
                                     <input type="text" class="form-control" placeholder="Contact Number" name="phone_no" id="change_phone_no" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" value="<?= $data['phone_no'] ?>" required>
                                 </div>
                             <?php } else { ?>
                                 <div class="col-lg-4 mt-3">
                                     <input type="text" class="form-control" placeholder="Contact Number" name="phone_no" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                                 </div>
                             <?php } ?>
                             <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                                 <div class="col-lg-4 mt-3 mt-lg-0">
                                     <input type="email" placeholder="Email Address" name="email" class="form-control" value="<?= $data['email'] ?>" required>
                                 </div>
                             <?php } else { ?>
                                 <div class="col-lg-4 mt-3 mt-lg-0">
                                     <input type="email" placeholder="Email Address" name="email" class="form-control" title="Please Enter Email" required>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Address*</h5>
                         <textarea name="address" class="form-control" placeholder="Enter Your Address To Send Prasada" rows="6" maxlength="250" required></textarea>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Kanike</h5>
                         <select name="kanike" class="form-control" required>
                             <option value="">Please Select Kanike</option>
                             <?php
                                if (sizeof($kanike_type) > 0) {
                                    foreach ($kanike_type as $key => $value) {

                                ?>
                                     <option value="<?= $value['id'] ?>" <?php
                                                                            if ($value['id'] == $kanike_id) {
                                                                                echo "selected";
                                                                            } ?>><?= $value['name'] ?></option>
                             <?php
                                    }
                                }
                                ?>

                         </select>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="form-group">
                         <h5>Message(optional)</h5>
                         <textarea name="message" class="form-control" placeholder="Enter Message" rows="6" maxlength="200"></textarea>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="form-group mb-2">
                         <h5>Kanike Amount</h5>
                         <div class="input-group" style="max-width: 750px !important;">
                             <div class="input-group-prepend">
                                 <button class="sigma_btn-custom shadow-none btn-sm" type="button"><i class="far fa-rupee-sign"></i></button>
                             </div>
                             <input type="text" name="amount" id="input_amount" class="form-control ms-0" placeholder="Please Enter Amount" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" title="Please Enter Amount ex:100,500,10001" required>
                         </div>
                     </div>
                 </div>
                 <div class="mb-3">
                     <button class="sigma_btn-custom add_amount_kanike m-2" data-amount="100" type="button"><i class="far fa-rupee-sign"></i> +100</button>
                     <button class="sigma_btn-custom add_amount_kanike m-2" data-amount="500" type="button"><i class="far fa-rupee-sign"></i> +500</button>
                     <button class="sigma_btn-custom add_amount_kanike m-2" data-amount="1000" type="button"><i class="far fa-rupee-sign"></i> +1000</button>
                     <button class="sigma_btn-custom add_amount_kanike m-2" data-amount="5000" type="button"><i class="far fa-rupee-sign"></i> +5000</button>
                     <button class="sigma_btn-custom add_amount_kanike m-2" data-amount="10000" type="button"><i class="far fa-rupee-sign"></i> +10000</button>
                 </div>
                 <div class="col-lg-12">
                     <p class="small"><input type="checkbox" title="Please Select This Check Box To Continue" required style="opacity: 1 !important; margin-right:10px;position: inherit;" checked>Your personal data will be used to process your Kanike Seva, support your experience throughout this website, and for other purposes described in our <a class="btn-link" href="<?= site_url("privacy_policy") ?>">privacy policy.</a> </p>
                 </div>
                 <div class="col-lg-12 text-center">
                    <input type="hidden" name="seva_type" value="Kanike">
                     <button type="submit" id="user_seva_payment_form" class="sigma_btn-custom" name="button"> Pay Now </button>
                 </div>
                 <div class="row mobile_list">
                     <div class="col-6 text-start">
                         <span>
                             <a href="<?= site_url("seva/kanike"); ?>" style="color: white;">
                                 <i class="fas fa-caret-left"></i>
                             </a>
                         </span>
                     </div>
                     <div class="col-6 text-end">
                         <span>
                             <button type="submit" class="sigma_btn-custom_m" style="font-size: 14px; padding: 0px 0px; font-weight: 1 !important;">Proceed to Pay </button> <i class="far fa-chevron-right" style="font-size: 14px;"></i>
                         </span>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>
 <!-- Form End -->