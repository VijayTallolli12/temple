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

  <!-- Map Start -->
  <div class="sigma_map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62113.68332641854!2d74.90253562396538!3d13.343731170809276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbca6c40912b8c1%3A0x345ce36cf8ad8c2f!2sShree%20Shiroor%20Mutt%20Moola%20Samsthanam!5e0!3m2!1sen!2sin!4v1638184983662!5m2!1sen!2sin" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe></iframe>
  </div>
  <!-- Map End -->

  <!-- Contact form Start -->
  <div class="section mt-negative pt-0">
      <div id="form_container" class="container">

          <form id="contact_us" onsubmit="return false;" class="sigma_box box-lg m-0 mf_form_validate " method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-lg-4">
                      <div class="form-group">
                          <input type="text" placeholder="Full Name" class="form-control dark" name="name" title="Please Enter Your Name" maxlength="30" required>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <input type="email" placeholder="Email Address" class="form-control dark" name="email" title="Please Enter Your Email So We Can Reply You" required>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <input type="text" placeholder="Phone No." class="form-control dark" name="phone_no" pattern="[0-9+ ]+" maxlength="13" minlength="10" title="Please Enter Your Phone Number So we Can Contact You ,Ex:9900112233,+91 9900112233" required>
                      </div>
                  </div>

                  <div class=" col-lg-12">
                      <div class="form-group">
                          <select name="subject" id="subject_select" class="form-control dark" title="Please Enter Subject" required>
                              <option value="">Please Select A Subject</option>
                              <option value="room">Book a Room</option>
                              <option value="e_seva">E-seva</option>
                              <option value="genral_query">Genral Query</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-lg-12" id="room_details_main" style="display: none;">

                  </div>

              </div>
              <div class="form-group">
                  <textarea name="message" placeholder="Enter Message" cols="45" rows="5" class="form-control dark" title="Please Enter Your Message Or Querry" maxlength="250" required></textarea>
              </div>
              <div class="text-center">
                  <button type="submit" class="sigma_btn-custom" name="button">Submit Now</button>
                  <div class="server_response w-100">
                  </div>
              </div>
          </form>

      </div>
      <div id="show_success" class="container" style="display: none;">
          <div class="row">
              <div class="col-md-12 sigma_box box-lg m-0 ">
                  <p style="color: red;font-size:28px;text-align: center;">Your Message Is successfully Recived ,We Will Reach You Soon</p>
              </div>
          </div>
      </div>
  </div>
  <!-- Contact form End -->

  <!-- Icons Start -->
  <div class="section section-padding pt-0">
      <div class="container">
          <div class="row">

              <div class="col-lg-4">
                  <div class="sigma_icon-block text-center light icon-block-7">
                      <i class="flaticon-email"></i>
                      <div class="sigma_icon-block-content">
                          <span>Send Email <i class="far fa-arrow-right"></i> </span>
                          <h5> Email Address</h5>
                          <p><?= get_settings("system_email") ?></p>

                      </div>
                      <div class="icon-wrapper">
                          <i class="flaticon-email"></i>
                      </div>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="sigma_icon-block text-center light icon-block-7">
                      <i class="flaticon-call"></i>
                      <div class="sigma_icon-block-content">
                          <span>Call Us Now <i class="far fa-arrow-right"></i> </span>
                          <h5> Phone Number </h5>
                          <p><?= get_settings("phone") ?></p>
                      </div>
                      <div class="icon-wrapper">
                          <i class="flaticon-call"></i>
                      </div>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="sigma_icon-block text-center light icon-block-7">
                      <i class="flaticon-location"></i>
                      <div class="sigma_icon-block-content">
                          <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
                          <h5> Location </h5>
                          <?= get_settings("address") ?>
                      </div>
                      <div class="icon-wrapper">
                          <i class="flaticon-location"></i>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <!-- Icons End -->
  <?php $room_details = $this->db->get_where("rooms", array("status" => "1"))->result_array();  ?>