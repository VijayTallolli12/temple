<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        p {
            margin: 0 0 0.25em;
        }

        .meta table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        .meta table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        .meta th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        .meta th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        .meta th {
            background: #EEE;
            border-color: #BBB;
        }

        .meta td {
            border-color: #DDD;
        }

        footer {
            clear: both;
            position: relative;
            height: 200px;
            margin-top: 200px;
        }

        hr {
            color: orange;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <table style="width:100%;margin-top: 2.5rem;">
                <tr>
                    <th style="font-weight: 400;">
                        <p style="font-size:30px;"><?= get_settings('system_name'); ?></p>
                        <?= get_settings('address'); ?>
                    </th>
                    <th style="padding-left: 250px;"><img src="<?= site_url(get_settings('logo')); ?>" alt="" style="width: 150px;"></th>
                </tr>
            </table>
            <hr>
            <table style="width:100%;margin-top: 1.5rem;">
                <tr>
                    <th style="font-weight: 400;">
                        <p style="letter-spacing:0.1em ; text-transform:uppercase;font-size:20px;">Devotee Details:</p>
                        <p style="font-size:18px;"><?= $data['name']; ?></p>
                        <?php if ($seva_type == "e_seva") { ?>
                            <p>Rashi : <?= $data['rashi']; ?> , Nakashatra : <?= $data['nakashatra']; ?></p>
                            <p>Gothra : <?= $data['gothra']; ?> </p>
                        <?php } ?>
                        <br>
                        <?php if ($seva_type == "kanike") { ?>
                            <p>Address: <?= $data['address']; ?></p>
                            <p>Phone No:<?= $data['phone_no']; ?></p>
                        <?php } elseif ($seva_type == "e_seva") { ?>
                            <p>Address: <?= $data['address']; ?></p>
                            <p><?= $data['city']; ?>, <?= $data['state']; ?></p>
                            <p><?= $data['country']; ?> - <?= $data['address']; ?></p>
                        <?php } ?>
                    </th>
                    <th style="margin-left: 50px;">
                        <table class="meta">
                            <tr>
                                <th>Invoice :-</th>
                                <?php
                                $string = date("YmdHis", strtotime($data['created_at']));
                                if ($seva_type == "e_seva") {
                                    $filename =  "seva_" . $data['id'] . "$string";
                                } elseif ($seva_type == "kanike") {
                                    $filename =  "kanike_" . $data['id'] . "$string";
                                }
                                ?>
                                <td><?= $filename; ?></td>
                            </tr>
                            <?php
                            if ($seva_type == "e_seva") { ?>
                                <tr>
                                    <th>Seva Date :-</th>
                                    <?php $date = date('d M,Y', strtotime($data['seva_date'])); ?>
                                    <td><?= $date; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th>Total Amount :-</th>
                                <?php
                                if ($seva_type == "e_seva") { ?>
                                    <td>₹ <?= $this->cart->total(); ?></td>
                                <?php } elseif ($seva_type == "kanike") { ?>
                                    <th>₹ <?= $data['amount']; ?> </th>
                                <?php } ?>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
            <?php if ($seva_type == "e_seva") { ?>
                <table class="meta" style="width:100%;margin-top: 1.5rem;">
                    <thead>
                        <tr>
                            <th>Seva Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->cart->contents() as  $items) {
                            $name1 = str_replace('-', '(', $items['name']);
                            $final_name = str_replace('_', ')', $name1);
                        ?>
                            <tr>
                                <td>
                                    <h6> <?= $final_name ?> </h6>
                                </td>
                                <td> ₹</i> <?= $items['price']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>
                                <h6 class="mb-0">Grand Total</h6>
                            </th>
                            <th>₹ <?= $this->cart->total(); ?> </th>
                        </tr>
                    </tbody>
                </table>
            <?php } elseif ($seva_type == "kanike") { ?>
                <table class="meta" style="width:100%;margin-top: 1.5rem;">
                    <thead>
                        <tr>
                            <th>Kanike Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <?php
                                $this->db->where('id', $data['kanike_id']);
                                $kanike = $this->db->get('kanike')->row_array();
                                ?>
                                <h6> <?= $kanike['name']; ?> </h6>
                            </td>
                            <td> ₹</i> <?= $data['amount']; ?></td>
                        </tr>
                        <tr>
                            <th>
                                <h6 class="mb-0">Grand Total</h6>
                            </th>
                            <th>₹ <?= $data['amount']; ?> </th>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

</body>

</html>