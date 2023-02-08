<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include('meta.php'); ?>
    <?php include('styles.php');

    if (isset($styles_to_load)) {
        foreach ($styles_to_load as $key => $value) {
    ?>
            <link rel="stylesheet" href="<?= site_url("assets/frontend/css/" . $value) ?>">
    <?php
        }
    }
    ?>

</head>
<?php include('sidebar.php'); ?>
<?php include('header.php'); ?>

<?php
if ($page_name == null) {
    include $path;
} else {
    include $page_name . ".php";
}
?>

<?php include('footer.php'); ?>
<?php
if ($page_name == 'home') {
    include('modal.php');
}
include('scripts.php');
if (isset($script_to_load)) {
    foreach ($script_to_load as $key => $value) {
?>
        <script src="<?= site_url("assets/frontend/js/" . $value) ?>"></script>
<?php
    }
}
?>
<?php
$checkVars = array("e_seva", "e_seva_list", "kanike_payment", "e_seva_payment", "kanike");

if (!in_array($page_name, $checkVars)) { ?>
    <div class="float_button">
        <a href="#" class="float" id="menu-share">
            <i class="fa fa-plus my-float"></i>
        </a>

        <ul>
            <li>
                <a href="<?= site_url('seva/e-seva') ?>">
                    <i class="fa fa-plus my_float_link">Seva</i>
                </a>
            </li>
            <li>
                <a href="<?= site_url('seva/kanike') ?>">
                    <i class="fa fa-plus my_float_link">Kanike</i>
                </a>
            </li>
        </ul>
    </div>
<?php } ?>
<?php if ($page_name == 'home') { ?>
    <script>
        $(document).ready(function() {
            $(window).on('load', function() {
                $("#exampleModal").modal('show');
            });
        });
    </script>
<?php } ?>
<?php include('include_bottom.php'); ?>

<body>

</body>