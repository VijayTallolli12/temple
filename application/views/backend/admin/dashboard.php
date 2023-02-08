<style>
    #main {
        background-color: #f2f7ff;
    }

    .match-height {
        padding-left: 8%;
    }
</style>
<div class="page-heading">
    <h3><?= get_settings('system_name') ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon " style="background-color: purple;">
                                        <i class="fas fa-donate" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="text-muted font-semibold" style="font-size: 15px;">Kanike Donated</h6>
                                    <?php
                                    $this->db->select_sum('amount');
                                    $this->db->where("transaction_id !=", "");
                                    $result = $this->db->get('kanike_payment')->row()
                                    ?>
                                    <h6 class="font-extrabold mb-0"><i class="fas fa-rupee-sign"></i> <?= $result->amount; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="stats-icon " style="background-color: #a83264;">
                                        <i class="fas fa-hand-holding-heart" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="text-muted font-semibold" style="font-size: 15px;">E-Seva Collected</h6>
                                    <?php
                                    $this->db->select_sum('amount');
                                    $this->db->where("transaction_id !=", "");
                                    $result = $this->db->get('seva_list_payment')->row()
                                    ?>
                                    <h6 class="font-extrabold mb-0"><i class="fas fa-rupee-sign"></i> <?= $result->amount; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fas fa-praying-hands" style="color: white;"></i>
                                    </div>
                                </div>
                                <?php
                                $count_seva = $this->db->count_all_results('seva_list');
                                ?>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">E-Seva</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_seva; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon" style="background-color: orange;">
                                        <i class="fas fa-hand-holding-usd" style="color: white;"></i>
                                    </div>
                                </div>
                                <?php
                                $count_kanike = $this->db->count_all_results('kanike');
                                ?>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kanike</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_kanike; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <?php
                                $this->db->where('user_role', 'user');
                                $count_users = $this->db->count_all_results('users');
                                ?>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Users</h6>
                                    <h6 class="font-extrabold mb-0"><?= $count_users; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fas fa-gopuram" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Parampara</h6>
                                    <?php
                                    $parampara = $this->db->count_all_results('parampara');
                                    ?>
                                    <h6 class="font-extrabold mb-0"><?= $parampara ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fas fa-hotel" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Enquiry</h6>
                                    <?php
                                    $room = $this->db->count_all_results('contact_us');
                                    ?>
                                    <h6 class="font-extrabold mb-0"><?= $room ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon " style="background-color: orangered;">
                                        <i class="far fa-bell" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Subscribers</h6>
                                    <?php
                                    $room = $this->db->count_all_results('subscribers');
                                    ?>
                                    <h6 class="font-extrabold mb-0"><?= $room ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon " style="background-color: yellow;">
                                        <i class="fas fa-blog" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Blogs</h6>
                                    <?php
                                    $room = $this->db->count_all_results('blogs');
                                    ?>
                                    <h6 class="font-extrabold mb-0"><?= $room ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon " style="background-color: #82b844;">
                                        <i class="fas fa-hotel" style="color: white;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Subscribers</h6>
                                    <?php
                                    $room = $this->db->count_all_results('subscribers');
                                    ?>
                                    <h6 class="font-extrabold mb-0"><?= $room ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= site_url("admin/download_today_seva"); ?>" target="_blank">
                                        <div class="stats-icon " style="background-color: #c95c18;">
                                            <i class="fas fa-file-download" style="color: white;"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?= site_url("admin/download_today_seva"); ?>">
                                        <h6 class="text-muted font-semibold" style="font-size: 20px;">Today Seva List</h6>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= site_url("admin/download_tommorow_seva"); ?>">
                                        <div class="stats-icon " style="background-color: #c95c18;">
                                            <i class="fas fa-file-download" style="color: white;"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?= site_url("admin/download_tommorow_seva"); ?>">
                                        <h6 class="text-muted font-semibold" style="font-size: 18px;">Tomorrow Seva List</h6>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-2 py-4-5">
                            <form action="<?= site_url("admin/download_seva_between_dates"); ?>" id="btn_date" method="post">
                                <div class="row">

                                    <div class="col-md-10">
                                        <div class="pb-2">
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="stats-icon " style="background-color: #c95c18;">
                                            <a href="javascript:;" onclick="document.getElementById('btn_date').submit()">
                                                <i class="fas fa-file-download" style="color: white;"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-3 px-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= site_url(get_settings('logo')); ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $this->session->userdata("name"); ?></h5>
                            <h6 class="text-muted mb-0">@<?= $this->session->userdata("user_role"); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $date = strtotime(date("Y"));
        $year = date("Y", $date);
        for ($i = 1; $i <= 12; $i++) {
            $this->db->where("transaction_id !=", "");
            $this->db->where("MONTH(created_at)", $i);
            $this->db->where("YEAR(created_at)", $year);
            $data[] = $this->db->count_all_results("kanike_payment");
        }
        $final_data = implode(",", $data);

        for ($i = 1; $i <= 12; $i++) {
            $this->db->where("transaction_id !=", "");
            $this->db->where("MONTH(seva_date)", $i);
            $this->db->where("YEAR(seva_date)", $year);
            $data1[] = $this->db->count_all_results("seva_list_payment");
        }
        $final_data1 = implode(",", $data1);
        ?>
        <input type="hidden" id="kanike_collected_details" value="<?= $final_data ?>">
        <input type="hidden" id="seva_collected_details" value="<?= $final_data1 ?>">
        <div class="row">
            <div class="col-12  col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Kanike Collected</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Seva Collected</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit1"></div>
                    </div>
                </div>
            </div>

            <!-- Recent Kanike and seva -->
            <?php
            $this->db->where("transaction_id !=", "");
            $this->db->order_by('id', 'DESC');
            $this->db->limit(5);
            $seva_lp = $this->db->get_where('seva_list_payment')->result_array();

            $this->db->where("transaction_id !=", "");
            $this->db->order_by('id', 'DESC');
            $this->db->limit(5);
            $kanike_lp = $this->db->get_where('kanike_payment')->result_array();
            ?>
            <div class="col-12  col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Sevas By</h4>
                    </div>
                    <div class="card-content pb-4">
                        <?php foreach ($seva_lp as $key => $seva_lp) :
                            $seva = json_decode($seva_lp['seva_name']);
                            $seva_name = implode(', ', $seva);
                        ?>
                            <div class="recent-message d-flex px-3 py-3">
                                <div class="name ms-4">
                                    <h6 class="mb-1"><?= $seva_lp['name']; ?></h6>

                                    <h6 class="text-muted mb-0"><?= $seva_name; ?></h6>
                                    <h6 class="text-muted mb-0"><i class="fas fa-rupee-sign"></i> <?= $seva_lp['amount']; ?></h6>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-12  col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Kanike</h4>
                    </div>
                    <div class="card-content pb-4">
                        <?php foreach ($kanike_lp as $key => $kanike_lp) :
                            $this->db->where('id', $kanike_lp['kanike_id']);
                            $kanike = $this->db->get("kanike")->row_array();
                        ?>
                            <div class="recent-message d-flex px-3 py-3">
                                <div class="name ms-4">
                                    <h6 class="mb-1"><?= $kanike_lp['name']; ?></h6>

                                    <h6 class="text-muted mb-0"><?= $kanike['name']; ?></h6>
                                    <h6 class="text-muted mb-0"><i class="fas fa-rupee-sign"></i> <?= $kanike_lp['amount']; ?></h6>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Recent Seva and Kanike -->
        <!-- Recent Messages -->
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Messages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $this->db->where("response", 0);
                                    $this->db->order_by('id', 'DESC');
                                    $contactus_result = $this->db->get("contact_us", 3)->result_array();
                                    foreach ($contactus_result as $value) {
                                    ?>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <p class="font-bold ms-1 mb-0"><?= $value['name']; ?></p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"><?= $value['subject']; ?></p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"><?= $value['message']; ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- user details and recent sevas -->

</section>
</div>