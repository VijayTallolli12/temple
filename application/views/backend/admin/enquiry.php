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
                <h3>Enquiry Details</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enquiry</li>
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
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Reply Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($enquiry->result_array() as $key => $enquiry) :
                            if ($enquiry['subject'] != "room") {
                        ?>
                                <tr>
                                    <td style="width:10%"><b><?= $enquiry['name']; ?></b></td>
                                    <td><?= $enquiry['phone_no']; ?></td>
                                    <td style="width:13%"><?= $enquiry['email_id']; ?></td>
                                    <td style="width:7%"><?= $enquiry['subject']; ?></td>
                                    <td style="width:25%"><?= $enquiry['message']; ?></td>
                                    <?php if ($enquiry['response'] == NULL) { ?>
                                        <td><a href="<?= site_url("admin/reply_message/" . $enquiry['id'] . "/enquiry"); ?>"><i class="fas fa-reply"></i></a></td>
                                    <?php } else { ?>
                                        <td><i class="fas fa-inbox"></i></td>
                                    <?php } ?>
                                    <td style="width:20%"><?= $enquiry['response']; ?></td>
                                </tr>
                        <?php }
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>