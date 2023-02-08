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
            <table style="width:100%;margin-top: 1.5rem;">
                <tr>
                    <th style="font-weight: 400;">
                        <p style="font-size:30px;"><?= get_settings('system_name'); ?></p>
                        <?= get_settings('address'); ?>
                    </th>
                    <th style="padding-left: 250px;"><img src="<?= site_url(get_settings('logo')); ?>" alt="" style="width: 150px;"></th>
                </tr>
            </table>
            <table style="width:100%">
                <tr>
                    <th style="font-weight: 400;">
                        <?php if (isset($seva_start_date)) { ?>
                            <p style="font-size:20px;">From <?= date('d M,Y', strtotime($seva_start_date)); ?> To <?= date('d M,Y', strtotime($seva_end_date)); ?></p>
                        <?php } else {  ?>
                            <p style="font-size:20px;"><?= date('d M,Y', strtotime($seva_date)); ?></p>
                        <?php }   ?>
                    </th>
                </tr>
            </table>

            <?php foreach ($data as $data) { ?>
                <hr>
                <table style="width:100%;margin-top: 1.5rem;">
                    <tr>
                        <th style="font-weight: 400;">
                            <p style="letter-spacing:0.1em ; text-transform:uppercase;font-size:20px;">Devotee Details:</p>
                            <p style="font-size:18px;"><?= $data['name']; ?></p>

                            <p>Rashi : <?= $data['rashi']; ?> , Nakashatra : <?= $data['nakashatra']; ?></p>
                            <p>Gothra : <?= $data['gothra']; ?> </p>
                            <br>
                        </th>
                    </tr>
                </table>

                <table class="meta" style="width:100%;margin-top: 1.5rem;">
                    <thead>
                        <tr>
                            <th>Seva Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $seva = json_decode($data['seva_name']);
                        $count = count($seva);
                        for ($i = 0; $i < $count; $i++) {
                            $this->db->where('name', $seva[$i]);
                            $seva_details = $this->db->get("seva_list")->row_array();
                        ?>
                            <tr>
                                <td>
                                    <h6><?= $seva_details['name'] ?> </h6>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

</body>

</html>