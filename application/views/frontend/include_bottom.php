<?php if ($this->session->flashdata('message') != "") { ?>
    <script>
        $(document).ready(function() {
            Toastify({
                text: "<?php echo $this->session->flashdata("message"); ?>",
                duration: 3000,
                close: true,
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast();
        });
    </script>
<?php }
if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
} ?>

<?php if ($this->session->flashdata('failed') != "") { ?>
    <script>
        $(document).ready(function() {
            Toastify({
                text: "<?php echo $this->session->flashdata("failed"); ?>",
                duration: 3000,
                close: true,
                backgroundColor: "#FF0000",
            }).showToast();
        });
    </script>
<?php }
if (isset($_SESSION['failed'])) {
    unset($_SESSION['failed']);
} ?>