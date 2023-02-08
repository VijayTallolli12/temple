<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('meta.php'); ?>
    <?php include('styles.php');

    if (isset($styles_to_load)) {
        foreach ($styles_to_load as $key => $value) {
    ?>
            <script src="<?= site_url("assets/backend/css/" . $value) ?>"></script>
    <?php
        }
    }
    ?>
    <script>
        var base_url = "<?= site_url() ?>";
    </script>
    <style>
        .error {
            color: red !important;
        }
    </style>
</head>

<body>
    <?php
    $auth_pages = array("login", "forgot_password", "change_password_email");
    if (in_array($page_name, $auth_pages)) {
        $divID = "auth";
    } else {
        $divID = "app";
    }
    ?>
    <?php
    if ($this->session->userdata("Shiroor_Admin")) {
        include('sidebar.php');
    }
    ?>
    <div id="<?= $divID ?>">
        <?php
        if ($this->session->userdata("Shiroor_Admin")) {
            include('header.php');
        } ?>
        <?php if (in_array($page_name, $auth_pages)) { ?>
            <?php
            if ($page_name == null) {
                include $path;
            } else {
                include $page_name . ".php";
            }
            ?>
            <?php
            include('modal.php');
            if ($this->session->userdata("Shiroor_Admin")) {
                include('footer.php');
            }
            ?>
        <?php } else { ?>
            <div id="main">
                <?php
                if ($page_name == null) {
                    include $path;
                } else {
                    include $page_name . ".php";
                }
                ?>
                <?php
                if ($this->session->userdata("Shiroor_Admin")) {
                    include('modal.php');
                    include('footer.php');
                }
                ?>
            </div>
        <?php } ?>
    </div>
    <?php include('scripts.php');
    if (isset($script_to_load)) {
        foreach ($script_to_load as $key => $value) {
    ?>
            <script src="<?= site_url("assets/backend/js/" . $value) ?>"></script>
    <?php
        }
    }
    ?>
    <?php include('include_bottom.php'); ?>

</body>

</html>