<div class="sigma_subheader dark-overlay dark-overlay-2"
    style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg") ?>)">
    <div class="container">
        <div class="sigma_subheader-inner">
            <div class="sigma_subheader-text">
                <h1>
                    <?= $page_title ?>
                </h1>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="btn-link" href="<?= site_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $page_title ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <!-- Login -->
                <?php if (!$this->session->userdata("Shiroor_devotee")) { ?>
                    <div class="sigma_notice">
                        <p>Are you a returning Devotee? <a href="<?= site_url("home/login"); ?>">Click here to login</a>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <form action="<?= site_url("payment/razorpay_checkout"); ?>" enctype="multipart/form-data"
            id="seva_user_payment_form" method="post">
            <input type="hidden" name="payment_name" value="e_seva">
            <div class="row">
                <div class="col-xl-7">
                    <!-- Devotee Info Start -->
                    <h4>Devotee Details</h4>
                    <div class="row">
                        <?php
                        if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <select id="name_change" class="form-control" placeholder="Please Enter Name" required>
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
                                        <option value="<?= $value['id']; ?>"><?= $value['first_name']; ?>         <?=
                                                         $value['last_name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="name" id="change_name"
                                value="<?= $data['first_name'] ?>         <?= $data['last_name']; ?>">
                            <input type="hidden" id="id" value="<?= $user_id; ?>">
                        <?php
                        } else { ?>
                            <div class="form-group col-xl-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Name" name="name" class="form-control" maxlength="30"
                                    minlength="1" title="Please Enter Name" required />
                            </div>
                        <?php }
                        ?>
                        <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" placeholder="Email" name="email" class="form-control"
                                    value="<?= $data['email'] ?>" required>
                            </div>
                        <?php } else { ?>
                            <div class=" form-group col-xl-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" placeholder="Email" name="email" class="form-control" required>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-6">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Phone Number" id="change_phone_no" name="phone_no"
                                    class="form-control" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}"
                                    title="Phone number with 6-9 and remaing 9 digit with 0-9"
                                    value="<?= $data['phone_no'] ?>" required>
                            </div>
                        <?php } else { ?>
                            <div class="form-group col-xl-6">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                <input type="text" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}"
                                    title="Phone number with 6-9 and remaing 9 digit with 0-9" placeholder="Phone Number"
                                    name="phone_no" class="form-control" required>
                            </div>
                        <?php } ?>

                        <div class="form-group col-xl-12">
                            <label>Seva Date <span class="text-danger">*</span></label>
                            <input type="date" placeholder="Seva Date" name="seva_date" class="form-control"
                                title="Please Select Date On which You want to Seva Performed" required>
                        </div>
                        <div class="form-group col-xl-6">
                            <label>Rashi <span class="text-danger">*</span></label>
                            <select class="form-control" name="rashi" id="change_rashi" title="Please Select Rashi"
                                required>
                                <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                                    <option value="<?= $data['rashi'] ?>"><?= $data['rashi'] ?></option>
                                <?php } else { ?>
                                    <option value="">Please Select Rashi</option>
                                <?php } ?>
                                <option value="Mesha">Mesha(Aries)</option>
                                <option value="Vrisabha">Vrisabha(Taurus)</option>
                                <option value="Mithun">Mithun(Gemini)</option>
                                <option value="Karka">Karka(Cancer)</option>
                                <option value="Simha">Simha(Leo)</option>
                                <option value="Kanya">Kanya(Vigro)</option>
                                <option value="Tula">Tula(Libra)</option>
                                <option value="Vrushika">Vrushika(scorpius)</option>
                                <option value="Dhanu">Dhanu(Sagittarius)</option>
                                <option value="Makar">Makar(Capricorn)</option>
                                <option value="Kumbha">Kumbha(Aquarius)</option>
                                <option value="Meena">Meena(Pisces)</option>
                            </select>
                        </div>
                        <div class="form-group col-xl-6">
                            <label>Nakashatra <span class="text-danger">*</span></label>
                            <select class="form-control" name="nakashatra" id="change_nakashatra"
                                title="Please Select Nakashatra" required>
                                <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                                    <option value="<?= $data['nakshtra'] ?>"><?= $data['nakshtra'] ?></option>
                                <?php } else { ?>
                                    <option value="">Please Select Nakashatra</option>
                                <?php } ?>
                                <option value="Ashwini">Ashwini</option>
                                <option value="Bharani">Bharani</option>
                                <option value="Krittika">Krittika</option>
                                <option value="Rohini">Rohini</option>
                                <option value="Mrigashira">Mrigashira</option>
                                <option value="Aardhra">Aardhra</option>
                                <option value="Punarvasu">Punarvasu</option>
                                <option value="pushyami">Pushyami</option>
                                <option value="Ashlesha">Ashlesha</option>
                                <option value="Magha">Magha</option>
                                <option value="PurvaPhalguni">Purva Phalguni</option>
                                <option value="UttaraPhalguni">Uttara Phalguni</option>
                                <option value="Hasta">Hasta</option>
                                <option value="Chitra">Chitra</option>
                                <option value="Swati">Swati</option>
                                <option value="Anuradha">Anuradha</option>
                                <option value="Vishakha">Vishakha</option>
                                <option value="Jestha">Jestha</option>
                                <option value="Moola">Moola</option>
                                <option value="Purvashada">Purvashada</option>\
                                <option value="Uttarashada">Uttarashada</option>
                                <option value="Shravana">Shravana</option>
                                <option value="Dhanishta">Dhanishta</option>
                                <option value="Shatabisha">Shatabisha</option>
                                <option value="Purvabhadra">Purvabhadra</option>
                                <option value="Uttarabhadra">Uttarabhadra</option>
                                <option value="Revati">Revati</option>
                            </select>
                        </div>

                        <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-12">
                                <label>Gothra <span class="text-danger">*</span></label>
                                <input type="text" id="change_gothra" placeholder="Please Enter Gothra" name="gothra"
                                    class="form-control" value="<?= $data['gothra'] ?>" title="Please Input gothra"
                                    maxlength="25" required>
                            </div>
                        <?php } else { ?>
                            <div class="form-group col-xl-12">
                                <label>Gothra <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Please Enter Gothra" name="gothra" class="form-control"
                                    title="Please Input gothra" maxlength="25" required>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-12 mb-0">
                                <label>Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control"
                                    placeholder="Enter Your Address To Send Prasada" rows="5" maxlength="200"
                                    title="Please Enter Your Address So we can send you the Prasad"
                                    required><?= $data['address'] ?></textarea>
                            </div>
                        <?php } else { ?>
                            <div class="form-group col-xl-12 mb-0">
                                <label>Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control"
                                    placeholder="Enter Your Address To Send Prasada" rows="5" maxlength="200"
                                    title="Please Enter Your Address So we can send you the Prasad" required></textarea>
                            </div>
                        <?php } ?>
                        <div class="form-group col-xl-6">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control" name="country" id="country" required>
                                <option>Please Select Country</option>
                                <?php if ($this->session->userdata("Shiroor_devotee") && $data['country'] != "") {
                                    ?>
                                    <option value="<?= $data['country'] ?>" selected><?= $data['country'] ?></option>
                                <?php
                                } ?>

                            </select>
                        </div>

                        <div class="form-group col-xl-6">
                            <label>State <span class="text-danger">*</span></label>
                            <select class="form-control" name="state" id="state" required>
                                <?php if ($this->session->userdata("Shiroor_devotee") && $data['state'] != "") {
                                    ?>
                                    <option value="<?= $data['state'] ?>"><?= $data['state'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>

                        <div class="form-group col-xl-6">
                            <label>City <span class="text-danger">*</span></label>
                            <select class="form-control" name="city" id="city" required>
                                <?php if ($this->session->userdata("Shiroor_devotee") && $data['city'] != "") {
                                    ?>
                                    <option value="<?= $data['city'] ?>"><?= $data['city'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <?php if ($this->session->userdata("Shiroor_devotee")) { ?>
                            <div class="form-group col-xl-6">
                            <label>Pincode <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Please Enter Pincode" name="pincode" class="form-control"
                                pattern="[0-9]+" maxlength="6" minlength="6"
                                title="Please Enter Your Area Pincode Ex:590001,580001" required value="<?=$data['pincode']?>">
                        </div>
                        <?php } else { ?>
                            <div class="form-group col-xl-6">
                            <label>Pincode <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Please Enter Pincode" name="pincode" class="form-control"
                                pattern="[0-9]+" maxlength="6" minlength="6"
                                title="Please Enter Your Area Pincode Ex:590001,580001" required>
                        </div>
                        <?php } ?>
                        
                        <input type="hidden" name="seva_type" value="Online Seva">
                    </div>
                    <!-- Buyer Info End -->
                </div>
                <div class="col-xl-5 checkout-billing">
                    <!-- Order Details Start -->
                    <table class="sigma_responsive-table">
                        <thead>
                            <tr>
                                <th>Seva</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $items) {
                                $name1 = str_replace('-', '(', $items['name']);
                                $final_name = str_replace('_', ')', $name1);
                                ?>
                                <tr>
                                    <td data-title="Seva">
                                        <div class="sigma_cart-product-wrapper">
                                            <div class="sigma_cart-product-body">
                                                <h6> <a href="#">
                                                        <?= $final_name ?>
                                                    </a> </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-title="Amount"> <strong><i class="far fa-rupee-sign"></i>
                                            <?= $items['price']; ?>
                                        </strong> </td>
                                </tr>
                            <?php } ?>
                            <tr class="total">
                                <td>
                                    <h6 class="mb-0">Grand Total</h6>
                                </td>
                                <td> <strong><i class="far fa-rupee-sign"></i>
                                        <?= $this->cart->total(); ?>
                                    </strong> </td>
                            </tr>
                        </tbody>
                    </table>


                    <p class="small"><input type="checkbox" title="Please Select This Check Box To Continue" required
                            style="opacity: 1 !important; margin-right:10px;position: inherit;" checked>Your personal
                        data will be used to process your E Seva, support your experience throughout this website, and
                        for other purposes described in our <a class="btn-link"
                            href="<?= site_url("privacy_policy") ?>">privacy policy.</a> </p>

                    <button type="submit" id="user_seva_payment_form"
                        class="sigma_btn-custom primary d-block w-100">Proceed to Pay</button>
                    <!-- Order Details End -->

                    <div class="row mobile_list">
                        <div class="col-2 text-start">
                            <span>
                                <a href="<?= site_url("seva/e-seva_list"); ?>" style="color: white;">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </span>
                        </div>
                        <div class="col-3 text-start">
                            <span>
                                <i class="far fa-rupee-sign"></i>
                                <?php if ($this->cart->total() > 0) {
                                    echo $this->cart->total();
                                } else {
                                    echo 0;
                                } ?>
                            </span>
                        </div>
                        <div class="col-7 text-end">
                            <span>
                                <?php if ($this->cart->total() > 0) { ?>
                                    <button type="submit" class="sigma_btn-custom_m"
                                        style="font-size: 15px; padding: 0px 0px; font-weight: 1 !important;">Proceed to Pay
                                    </button>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>