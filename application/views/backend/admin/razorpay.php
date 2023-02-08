 <style>
     #main {
         background-color: #f2f7ff;
     }

     .match-height {
         padding-left: 8%;
     }
 </style>
 <?php
    $razorpay_settings = $this->db->get_where('settings', array('key' => 'razorpay'))->row()->value;
    $razorpay = json_decode($razorpay_settings);
    ?>

 <div class="page-heading">
     <section id="section">
         <div class="row">
             <div class="col-12 col-md-12 ml-4">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Razorpay</h4>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <form action="<?php echo site_url('admin/settings/razorpay_u'); ?>" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                 <div class="form-body">
                                     <div class="row">
                                         <div class="col-md-4">
                                             <label>Test Mode</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <select name="test_mode" class="choices form-select">
                                                 <?php if (!empty($razorpay[0]->test_mode)) { ?>
                                                     <option value="on" <?php if ($razorpay[0]->testmode == 'on') {
                                                                            echo 'selected';
                                                                        } ?>>On</option>
                                                     <option value="off" <?php if ($razorpay[0]->testmode == 'off') {
                                                                                echo 'selected';
                                                                            } ?>>Off</option>
                                                 <?php } else { ?>
                                                     <option value="on">On</option>
                                                     <option value="off">Off</option>
                                                 <?php }  ?>
                                             </select>
                                         </div>


                                         <div class="col-md-4">
                                             <label>Test Key Id</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" class="form-control" name="test_key_id" value="<?php if (!empty($razorpay[0]->test_key_id)) {
                                                                                                                    echo $razorpay[0]->test_key_id;
                                                                                                                } ?>">
                                         </div>

                                         <div class="col-md-4">
                                             <label>Test Key Secret</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" class="form-control" name="test_key_secret" value="<?php if (!empty($razorpay[0]->test_key_secret)) {
                                                                                                                        echo $razorpay[0]->test_key_secret;
                                                                                                                    } ?>">
                                         </div>

                                         <div class="col-md-4">
                                             <label>Live Key Id</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" class="form-control" name="live_key_id" value="<?php if (!empty($razorpay[0]->live_key_id)) {
                                                                                                                    echo $razorpay[0]->live_key_id;
                                                                                                                } ?>">
                                         </div>

                                         <div class="col-md-4">
                                             <label>Live Key Secret</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="text" class="form-control" name="live_key_secret" value="<?php if (!empty($razorpay[0]->live_key_secret)) {
                                                                                                                        echo $razorpay[0]->live_key_secret;
                                                                                                                    } ?>">
                                         </div>

                                         <div class="col-md-4">
                                             <label>Theme Color</label>
                                         </div>
                                         <div class="col-md-8 form-group">
                                             <input type="color" class="form-control" name="theme_color" value="<?php if (!empty($razorpay[0]->theme_color)) {
                                                                                                                    echo $razorpay[0]->theme_color;
                                                                                                                } ?>">
                                         </div>

                                         <div class="col-sm-12 d-flex justify-content-end">
                                             <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>