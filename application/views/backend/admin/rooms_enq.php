<style>
    #main {
        background-color: #f2f7ff;
    }

    /* p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        max-height: 50px;
    } */
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rooms Enquiry Details</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rooms Enquiry</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">

            <div class="card-body">
                <table class="table table-striped" id="table1" style="width:250%!important;max-width:250%!important;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone No</th>
                            <th>Email Id</th>
                            <th>Message</th>
                            <th>Room Details</th>
                            <th>Date</th>
                            <th>Members</th>
                            <th>Reply</th>
                            <th>Reply Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rooms_enq->result_array() as $key => $rooms_enq) :
                            if ($rooms_enq['subject'] == "room") {
                        ?>
                                <tr>
                                    <td style="width: 10%;"><b><?= $rooms_enq['name']; ?></b></td>
                                    <td><?= $rooms_enq['phone_no']; ?></td>
                                    <td><?= $rooms_enq['email_id']; ?></td>
                                    <td style="width: 35%;"><?= $rooms_enq['message']; ?></td>
                                    <td style="width: 10%;"><?= $rooms_enq['Room_details']; ?></td>
                                    <td style="width: 5%;"><?= $rooms_enq['date']; ?></td>
                                    <td><?= $rooms_enq['members']; ?></td>
                                    <?php if ($rooms_enq['response'] == NULL) { ?>
                                        <td><a href="<?= site_url("admin/reply_message/" . $rooms_enq['id'] . "/room_enquiry"); ?>"><i class="fas fa-reply"></i></a></td>
                                    <?php } else { ?>
                                        <td><i class="fas fa-inbox"></i></td>
                                    <?php } ?>
                                    <td style="width:30%"><?= $rooms_enq['response']; ?></td>
                                </tr>
                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Modal popups -->

    <!-- end of modal popups -->
</div>