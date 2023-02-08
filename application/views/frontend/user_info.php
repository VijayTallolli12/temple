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

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-detail-wrapper">
                    <div>
                        <h2>Namste <?= $user_data['first_name'] ?> <?= $user_data['last_name'] ?>,</h2>
                    </div>
                    <form action="<?= site_url("home/update_myinfo"); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?= $user_data['first_name'] ?>" maxlength="25" required>
                            </div>
                            <div class="col-xl-6 form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?= $user_data['last_name'] ?>" maxlength="25" required>
                            </div>

                            <div class="col-xl-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Your email" value="<?= $user_data['email'] ?>" required>
                            </div>
                            <div class="col-xl-6 form-group">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" name="phone_no" placeholder="Enter Your email" value="<?= $user_data['phone_no'] ?>" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                            </div>
                        </div>
                        <div class="col-xl-12 form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Please Select Your Gender</option>
                                <option value="Female" <?php if ($user_data['gender'] == "Female") {
                                                            echo "selected";
                                                        } ?>>Female</option>
                                <option value="Male" <?php if ($user_data['gender'] == "Male") {
                                                            echo "selected";
                                                        } ?>>Male</option>
                            </select>
                        </div>
                        <div class="col-xl-12 form-group">
                            <label>Data of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter Your Date Of Birth" value="<?= $user_data['dob']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 form-group">
                                <label>Rashi <span class="text-danger">*</span></label>
                                <select class="form-control" name="rashi" required>
                                    <option value="<?= $user_data['rashi']; ?>" selected><?= $user_data['rashi']; ?></option>
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
                            <div class="col-xl-6 form-group">
                                <label>Nakashatra <span class="text-danger">*</span></label>
                                <select class="form-control" name="nakshtra" required>
                                    <option value="<?= $user_data['nakshtra']; ?>" selected><?= $user_data['nakshtra']; ?></option>
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
                        </div>
                        <div class="form-group col-xl-12">
                            <label>Gothra <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Please Enter Gothra" name="gothra" class="form-control" value="<?= $user_data['gothra']; ?>" required>
                        </div>
                        <div class="form-group col-xl-12 mb-0">
                            <label>Address <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" placeholder="Enter Your Address To Send Prasada" rows="5" maxlength="200" required><?= $user_data['address']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-6 mb-0">
                                <label>Country</span></label>
                                <select class="form-control" name="country" id="country" required>
                                    <option value="<?= $user_data['country']; ?>" selected><?= $user_data['country']; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 mb-0">
                                <label>State</span></label>
                                <select class="form-control" name="state" id="state" required>
                                    <option value="<?= $user_data['state']; ?>" selected><?= $user_data['state']; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 mb-0">
                                <label>City</span></label>
                                <select class="form-control" name="city" id="city" required>
                                    <option value="<?= $user_data['city']; ?>" selected><?= $user_data['city']; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 mb-0">
                                <label>Pincode</span></label>
                                <input type="number" class="form-control" name="pincode" value="<?= $user_data['pincode']; ?>" pattern="^[1-9][0-9]{5}$ " maxlength="6" minlength="6" title="Please Enter Your Area Pincode Ex:590001,580001" required>
                            </div>
                        </div>
                        <div class="col-xl-12 pt-4 pb-4 text-center">
                            <button type="submit" class="sigma_btn-custom" name="button"> Submit </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-detail-wrapper" style="padding: 20px !important;">
                    <a class="sigma_btn-custom" data-toggle="collapse" href="#add_family_members" role="button" aria-expanded="false" aria-controls="collapseExample">
                        + Add Family Members
                    </a>
                    <div class="collapse pt-4" id="add_family_members">
                        <div class="card card-body">
                            <form action="<?= site_url('home/insert_my_family_members'); ?>" method="post" enctype="multipart/form-data">
                                <div class="col-xl-12 form-group">
                                    <label>Relationship</label>
                                    <select class="form-control" name="relationship" id="relationship">
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Son">Son</option>
                                        <option value="Nephew">Nephew</option>
                                        <option value="Cousin">Cousin</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Aunti">Aunti</option>
                                    </select>
                                </div>
                                <div class=" col-xl-12 form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fm_name" placeholder="Enter First Name" value="">
                                </div>
                                <div class="col-xl-12 form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="fm_last_name" placeholder="Enter Last Name" value="">
                                </div>
                                <div class="col-xl-12 form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" class="form-control" name="fm_phone_no" placeholder="Enter Your Phone Number" value="">
                                </div>
                                <div class="col-xl-12 form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="fm_dob" placeholder="Enter Your Date Of Birth" value="">
                                </div>
                                <div class="col-xl-12 form-group">
                                    <label>Rashi <span class="text-danger">*</span></label>
                                    <select class="form-control" name="fm_rashi" required>
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
                                <div class="col-xl-12 form-group">
                                    <label>Nakashatra <span class="text-danger">*</span></label>
                                    <select class="form-control" name="fm_nakashatra" required>
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
                                <div class="form-group col-xl-12">
                                    <label>Gothra <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Please Enter Gothra" name="fm_gothra" class="form-control" value="" required>
                                </div>
                                <div class="col-xl-12 pt-4 pb-4 text-center">
                                    <button type="submit" class="sigma_btn-custom" name="button"> Submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    $this->db->where('user_id', $this->session->userdata("user_id"));
                    $family_members = $this->db->get('user_family_members')->result_array();
                    foreach ($family_members as $value) {
                    ?>
                        <div class="pt-4">
                            <a class="sigma_btn-custom" data-toggle="collapse" href="#<?= $value['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                + <?= $value['first_name']; ?> <?= $value['last_name']; ?>
                            </a>
                            <div class="collapse pt-4" id="<?= $value['id']; ?>">
                                <div class="card card-body">
                                    <div class="col-xl-12 pt-4 pb-4 text-center">
                                        <a class="sigma_btn-custom" href="<?= site_url("home/delete_family_members/" . $value['id']); ?>"> Delete </a>
                                    </div>
                                    <form action="<?= site_url('home/update_my_family_members'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                        <div class="col-xl-12 form-group">
                                            <label>Relationship</label>
                                            <select class="form-control" name="relationship" id="relationship">
                                                <option value="<?= $value['relation']; ?>" selected><?= $value['relation']; ?></option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Son">Son</option>
                                                <option value="Nephew">Nephew</option>
                                                <option value="Cousin">Cousin</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Aunti">Aunti</option>
                                            </select>
                                        </div>
                                        <div class=" col-xl-12 form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fm_name" placeholder="Enter First Name" value="<?= $value['first_name']; ?>">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="fm_last_name" placeholder="Enter Last Name" value="<?= $value['last_name']; ?>">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <label>Phone Number</label>
                                            <input type="tel" class="form-control" name="fm_phone_no" placeholder="Enter Your Phone Number" value="<?= $value['phone_no']; ?>">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="fm_dob" placeholder="Enter Your Date Of Birth" value="<?= $value['dob']; ?>">
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <label>Rashi <span class="text-danger">*</span></label>
                                            <select class="form-control" name="fm_rashi" required>
                                                <option value="<?= $value['rashi']; ?>" selected><?= $value['rashi']; ?></option>
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
                                        <div class="col-xl-12 form-group">
                                            <label>Nakashatra <span class="text-danger">*</span></label>
                                            <select class="form-control" name="fm_nakashatra" required>
                                                <option value="<?= $value['nakshtra']; ?>" selected><?= $value['nakshtra']; ?></option>
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
                                        <div class="form-group col-xl-12">
                                            <label>Gothra <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Please Enter Gothra" name="fm_gothra" class="form-control" value="<?= $value['gothra']; ?>" required>
                                        </div>
                                        <div class="col-xl-12 pt-4 pb-4 text-center">
                                            <button type="submit" class="sigma_btn-custom" name="button"> Submit </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>