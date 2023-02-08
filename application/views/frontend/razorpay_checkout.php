<?php
$razorpay_settings = $this->db->get_where('settings', array('key' => 'razorpay'))->row()->value;
$razorpay = json_decode($razorpay_settings);
if ($razorpay[0]->testmode == 'on') {
    $api_key = $razorpay[0]->test_key_id;
    $theme_color = $razorpay[0]->theme_color;
} else {
    $api_key = $razorpay[0]->live_key_id;
    $theme_color = $razorpay[0]->theme_color;
}
?>
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image:url(<?= site_url("assets/frontend/img/textures/3.jpg"); ?>)">
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
<div class="section" style="padding-top: 50px !important;">
    <div class="container">
        <div class="sigma_box pb-0 m-0">
            <div class="row">
                <div style="text-align:center;">
                    <img src="<?= site_url("vendor/svg-loaders/puff.svg"); ?>" class="me-4" style="width: 7rem" alt="audio">
                    <div>
                        <p class="mb-0" style="font-size: 30px;">Do Not Refresh The Page</p>
                        <p class="mb-0" style="font-size: 20px;">To Go To Home Page Press Home</p>
                    </div>
                    <div class="pb-4">
                        <a href="<?= site_url("home"); ?>" class="sigma_btn-custom">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button id="rzp-button1" style="display: none;">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "<?= $api_key; ?>", // Enter the Key ID generated from the Dashboard
        "amount": "<?= $razorpayOrder['amount']; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "<?= get_settings("system_name"); ?>",
        "description": "<?= get_settings("slogan"); ?>",
        "image": "<?= site_url(get_settings("logo")); ?>",
        "order_id": "<?= $razorpayOrder['id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "callback_url": "<?= site_url("payment/razorpay_payment_status") ?>",
        "prefill": {
            "name": "<?= $customer_data['name']; ?>",
            "email": "<?= $customer_data['email']; ?>",
            "contact": "<?= $customer_data['phone_no']; ?>"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "<?= $theme_color; ?>"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
    document.getElementById('rzp-button1').click();
</script>