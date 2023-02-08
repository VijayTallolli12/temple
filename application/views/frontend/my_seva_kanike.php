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
<section class="section" style="padding: 30px;">
    <div class="container">
        <div class="section light-bg p-2">
            <div class="container pt-2 pb-2" id="sevaNkanike">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="sigma_btn-custom" data-toggle="collapse" href="#my_sevas" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Sevas
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a class="sigma_btn-custom" data-toggle="collapse" href="#my_kanike" role="button" aria-expanded="false" " aria-controls=" collapseExample">
                            Kanike
                        </a>
                    </div>
                    <div class="col-md-12">
                    <?php
                        $this->db->where("trans_id !=", "");
                        $this->db->where('email', $user_data['email']);
                        $sevas = $this->db->get('orders');
                        if ($sevas->num_rows() > 0) {
                            foreach ($sevas->result_array() as $value) {                                
                                $date = date('d M,Y', strtotime($value['seva_date']))
                        ?>
                                <div class="card card-body mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Name</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Seva Date</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $date ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Transaction Id</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['trans_id'] ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Amount</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><i class="fal fa-rupee-sign"></i> <?= $value['amount'] ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Transaction Date</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['created_at'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Seva</h6>
                                                </div>
                                                <div class="col-md-8"> 
                                                    <table>
                                                    <?php
                                                    $this->db->where("order_id", $value['order_id']);
                                                    $res=$this->db->get("order_detail")->result_array();
                                                    if(sizeof($res)>0){
                                                        foreach ($res as $key1 => $value1) {
                                                        ?>
                                                        <tr>
                                                        <td><?=$value1['seva_name']?></td>
                                                        <td><?=$value1['amount']?></td>
                                                        </tr>
                                                        <?php    
                                                        }
                                                    }
                                                    ?>                                                   
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                      

                                        <div class="col-md-12 text-center">
                                            <a class="sigma_btn-custom" href="<?= site_url("admin/download_seva_invoice/" . $value['order_id']); ?>"><i class="fas fa-file-download"></i> Download Recipt</a>
                                        </div>

                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="card card-body mb-4 text-center">
                                <h1>No Sevas Available</h1>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="collapse" id="my_sevas" data-parent="#sevaNkanike">
                        <?php
                        $this->db->where("transaction_id !=", "");
                        $this->db->where('email', $user_data['email']);
                        $sevas = $this->db->get('seva_list_payment');
                        if ($sevas->num_rows() > 0) {
                            foreach ($sevas->result_array() as $value) {
                                $seva = json_decode($value['seva_name']);
                                $seva_name = implode(', ', $seva);
                                $date = date('d M,Y', strtotime($value['seva_date']))
                        ?>
                                <div class="card card-body mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Name</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['name'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Seva</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $seva_name ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Amount</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><i class="fal fa-rupee-sign"></i> <?= $value['amount'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Seva Date</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $date ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Transaction Id</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['transaction_id'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Transaction Date</h6>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?= $value['created_at'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <a class="sigma_btn-custom" href="<?= site_url("admin/download_seva_invoice/" . $value['order_id']); ?>"><i class="fas fa-file-download"></i> Download Recipt</a>
                                        </div>

                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="card card-body mb-4 text-center">
                                <h1>No Sevas Available</h1>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">
                        <div class="collapse" id="my_kanike" data-parent="#sevaNkanike">
                            <?php
                            $this->db->where("transaction_id !=", "");
                            $this->db->where('email', $user_data['email']);
                            $kanike = $this->db->get('kanike_payment');
                            if ($kanike->num_rows() > 0) {
                                foreach ($kanike->result_array() as $value) {
                                    $this->db->where('id', $value['kanike_id']);
                                    $kanike_name = $this->db->get("kanike")->row_array();
                            ?>
                                    <div class="card card-body mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Name</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?= $value['name'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Kanike</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?= $kanike_name['name'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Amount</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><i class="fal fa-rupee-sign"></i> <?= $value['amount'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Transaction Id</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?= $value['transaction_id'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h6>Transaction Date</h6>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?= $value['created_at'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (!empty($value['message'])) { ?>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6>Message</h6>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p><?= $value['message'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-12 text-center">
                                                <a class="sigma_btn-custom" href="<?= site_url("admin/download_kanike_invoice/" . $value['order_id']); ?>"><i class="fas fa-file-download"></i> Download Recipt</a>
                                            </div>

                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="card card-body mb-4 text-center">
                                    <h1>No kanike Available</h1>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>